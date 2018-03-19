<?php

namespace WebSisMap\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Setor.
 *
 * @package namespace WebSisMap\Models;
 */
class Setor extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        [
            'nome', 'predio_id', 'user_id'
        ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['Id', 'Nome', 'Localização', 'Responsavel' ];
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
            case 'Id':
                return $this->id;
            case 'Nome':
                return $this->nome;
            case 'Localização':
                return $this->predio->nome;
            case 'Responsavel':
                return $this->user->name;
        }
    }

    public function predio()
    {
        return $this->belongsTo(Predio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
