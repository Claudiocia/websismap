<?php

namespace WebSisMap\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebSisMap\Repositories\PredioRepository;
use WebSisMap\Models\Predio;
use WebSisMap\Validators\PredioValidator;

/**
 * Class PredioRepositoryEloquent.
 *
 * @package namespace WebSisMap\Repositories;
 */
class PredioRepositoryEloquent extends BaseRepository implements PredioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Predio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
