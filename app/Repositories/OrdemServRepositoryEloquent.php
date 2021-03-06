<?php

namespace WebSisMap\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebSisMap\Repositories\OrdemServRepository;
use WebSisMap\Models\OrdemServ;
use WebSisMap\Validators\OrdemServValidator;

/**
 * Class OrdemServRepositoryEloquent.
 *
 * @package namespace WebSisMap\Repositories;
 */
class OrdemServRepositoryEloquent extends BaseRepository implements OrdemServRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrdemServ::class;
    }

    public function whereUser($id)
    {
        return OrdemServ::unidadeuser($id);
    }

    public function whereUnidade($id)
    {
        return OrdemServ::unidadelist($id);
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
