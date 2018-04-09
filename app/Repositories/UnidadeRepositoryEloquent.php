<?php

namespace WebSisMap\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebSisMap\Repositories\UnidadeRepository;
use WebSisMap\Models\Unidade;
use WebSisMap\Validators\UnidadeValidator;

/**
 * Class UnidadeRepositoryEloquent.
 *
 * @package namespace WebSisMap\Repositories;
 */
class UnidadeRepositoryEloquent extends BaseRepository implements UnidadeRepository
{
    public function update(array $attributes, $id)
    {
        $model = parent::update($attributes, $id);
        if (isset($attributes['users'])){
            $model->users()->sync($attributes['users']);
        }
        if (isset($attributes['materials'])){
            $model->materials()->sync($attributes['materials']);
        }
        return $model;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Unidade::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UnidadeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
