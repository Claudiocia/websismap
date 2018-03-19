<?php

namespace WebSisMap\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Predio.
 *
 * @package namespace WebSisMap\Models;
 */
class Predio extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        [
            'nome', 'empre_id', 'localiz',
        ];

    /**
     * @return array
     */
    public function getTableHeaders()
    {
        return ['Id', 'Nome', 'Localização'];
    }

    /**
     * @param $header
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
                return $this->localiz;
        }
    }

    public function empre()
    {
        return $this->belongsTo(Empre::class);
    }
}
