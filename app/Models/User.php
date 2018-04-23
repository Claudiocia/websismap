<?php

namespace WebSisMap\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use WebSisMap\Notifications\DefaultResetPasswordNotification;

class User extends Authenticatable implements TableInterface
{
    use Notifiable;

    const ROLE_ADMIN=1;
    const ROLE_OPERADOR=2;
    const ROLE_CLIENTE=3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'setor_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function generatePassword($password = null)
    {
        return !$password ? bcrypt(str_random(8)) : bcrypt($password);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new DefaultResetPasswordNotification($token));
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return['#', 'Nome', 'Email', 'Nivel', 'Setor'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'Email':
                return $this->email;
            case 'Setor':
                if (!isset($this->setor->nome)){
                    return 'Não Designado';
                }else {
                    return $this->setor->nome;
                }
            case'Nivel':
                return $this->role;
        }
    }

    public function scopeOfRole($query, $role)
    {
        return $query->select('id', 'name')->where('role', '=', $role);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_id', 'id', 'setors');
    }

    public function unidades()
    {
        return $this->belongsToMany(Unidade::class);
    }
}
