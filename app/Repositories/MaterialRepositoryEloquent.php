<?php

namespace WebSisMap\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebSisMap\Repositories\MaterialRepository;
use WebSisMap\Models\Material;
use WebSisMap\Validators\MaterialValidator;

/**
 * Class MaterialRepositoryEloquent.
 *
 * @package namespace WebSisMap\Repositories;
 */
class MaterialRepositoryEloquent extends BaseRepository implements MaterialRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Material::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
