<?php

namespace WebSisMap\Http\Controllers\Admin;

use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Kris\LaravelFormBuilder\Form;
use WebSisMap\Forms\UserForm;
use WebSisMap\Models\User;
use Illuminate\Http\Request;
use WebSisMap\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = FormBuilder::create(UserForm::class,[
           'url' => route('admin.users.store'),
           'method' => 'POST'
        ]);

        return view('admin.users.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var Form $form */
        $form = FormBuilder::create(UserForm::class);

        if (!$form->isValid()){
            //redirecionar para a página de criação de usuários
        }
        $data = $form->getFieldValues();
        $data['role'] = User::ROLE_ADMIN;
        $data['password'] = User::generatePassword();
        User::create($data);
        $request->session()->flash('message', 'Usuário criado com sucesso.');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \WebSisMap\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \WebSisMap\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \WebSisMap\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \WebSisMap\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
