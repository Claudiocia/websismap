<?php

namespace WebSisMap\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Material.
 *
 * @package namespace WebSisMap\Models;
 */
class Material extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'tipo', 'descricao', 'observacao'
    ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['Id', 'Nome', 'Tipo', 'Descrição', 'Obs.:'];
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
            case 'Tipo':
                return $this->tipo;
            case 'Descrição':
                return $this->descricao;
            case 'Obs.:':
                return $this->observacao;
        }
    }
}
