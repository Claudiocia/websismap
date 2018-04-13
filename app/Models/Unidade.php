<?php

namespace WebSisMap\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use WebSisMap\Media\UnidadePaths;

/**
 * Class Unidade.
 *
 * @package namespace WebSisMap\Models;
 */
class Unidade extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use UnidadePaths;

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
        return ['Id', 'Tipo', 'Setor'];
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
            case 'Setor':
                if (!isset($this->setor->nome)){
                    return 'Não Designado';
                }else {
                    return $this->setor->nome;
                }
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

    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }
}
