<?php

namespace WebSisMap\Repositories;

use Jrean\UserVerification\Facades\UserVerification;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WebSisMap\Models\User;


/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace WebSisMap\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * @param array $attributes
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(array $attributes)
    {
        $attributes['password'] = User::generatePassword();
        $model = parent::create($attributes);
        UserVerification::generate($model);
        UserVerification::send($model, 'Conta criada no WebSisMap');
        return $model;
    }

    public function update(array $attributes, $id)
    {
        if (isset($attributes['password'])){
            $attributes['password'] = User::generatePassword($attributes['password']);
        }
        $model = parent::update($attributes, $id);
        return $model;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
