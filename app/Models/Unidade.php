<?php

namespace WebSisMap\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Unidade.
 *
 * @package namespace WebSisMap\Models;
 */
class Unidade extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        [
            'nome', 'tipo', 'localiz', 'foto', 'setor_id'
        ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['Id', 'Tipo'];
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
            case 'Tipo':
                return $this->tipo;
        }
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);

    }
}
