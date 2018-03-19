<?php

namespace WebSisMap\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebSisMap\Repositories\EmpreRepository;
use WebSisMap\Models\Empre;
use WebSisMap\Validators\EmpreValidator;

/**
 * Class EmpreRepositoryEloquent.
 *
 * @package namespace WebSisMap\Repositories;
 */
class EmpreRepositoryEloquent extends BaseRepository implements EmpreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Empre::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EmpreValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
