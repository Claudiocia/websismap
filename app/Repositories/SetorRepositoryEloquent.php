<?php

namespace WebSisMap\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebSisMap\Repositories\SetorRepository;
use WebSisMap\Models\Setor;
use WebSisMap\Validators\SetorValidator;

/**
 * Class SetorRepositoryEloquent.
 *
 * @package namespace WebSisMap\Repositories;
 */
class SetorRepositoryEloquent extends BaseRepository implements SetorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Setor::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
