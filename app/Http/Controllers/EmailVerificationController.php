<?php

namespace WebSisMap\Http\Controllers;

use Illuminate\Http\Request;
use Jrean\UserVerification\Traits\VerifiesUsers;
use WebSisMap\Repositories\UserRepository;

class EmailVerificationController extends Controller
{
    use VerifiesUsers;
    private $repository;


    /**
     * EmailVerificationController constructor.
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function redirectAfterVerification()
    {
        $this->loginUser();
        return route('admin.user_settings.edit');
    }

    protected function loginUser(){
        $email = \Request::get('email');
        $user = $this->repository->findByField('email', $email)->first();
        \Auth::login($user);

    }
}
