<?php

namespace WebSisMap\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Empre.
 *
 * @package namespace WebSisMap\Models;
 */
class Empre extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'fantasia', 'cnpj', 'email', 'tel', 'site',
        'end', 'num', 'bairro', 'cep', 'cidade', 'uf',
        'und_princ', 'und_sub1', 'und_sub2', 'und_sub3',
	];

}
