<?php

namespace WebSisMap\Models;

use Bootstrapper\Interfaces\TableInterface;
use function GuzzleHttp\Psr7\_caseless_remove;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use WebSisMap\Media\OsPaths;

/**
 * Class OrdemServ.
 *
 * @package namespace WebSisMap\Models;
 */
class OrdemServ extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use OsPaths;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        [
            'solicit_id', 'unid_id', 'data', 'hora', 'descri', 'priori',

        ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return [
            'No.', 'Data', 'Unidade', 'Solicitante',
            'Atendente', 'Status', 'Prioridade'
            ];
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
            case 'No.':
                return $this->id;
            case 'Data':
                return $this->data;
            case 'Unidade':
                return $this->unidade->nome;
            case 'Solicitante':
                return $this->user->name;
            case 'Atendente':
                if (!isset($this->atend->name)){
                    return 'Não Designado';
                }else{
                    return $this->atend->name;
                }
            case 'Status':
                switch ($this->status){
                    case 0:
                        return 'Solicitado';
                    case 1:
                        return 'Em Atendimento';
                    case 2:
                        return 'Com terceiros';
                    case 3:
                        return 'Pendente';
                    case 4:
                        return 'Concluído';
                    case 5:
                        return 'Cancelada';
                }
            case 'Prioridade':
                if ($this->priori == 0){
                    return 'Normal';
                }
                return 'Urgente';
        }
    }

    public function atend()
    {
        return $this->belongsTo(User::class, 'atend_id', 'id', 'users');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'solicit_id', 'id', 'users');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'unid_id', 'id', 'unidades');
    }

    public function scopeUnidadeuser($query, $idUser)
    {
        return $query->where('solicit_id', $idUser);
    }

    public function scopeUnidadelist($query, $idUnidade)
    {
        return $query->where('unid_id', $idUnidade);
    }
}
