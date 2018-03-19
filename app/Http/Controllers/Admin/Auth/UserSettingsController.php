<?php

namespace WebSisMap\Http\Controllers\Admin\Auth;

use FormBuilder;
use Illuminate\Http\Request;
use WebSisMap\Forms\UserSettingsForm;
use WebSisMap\Http\Controllers\Controller;
use WebSisMap\Repositories\UserRepository;

class UserSettingsController extends Controller
{
    private $repository;

    /**
     * UserSettingsController constructor.
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function edit()
    {
        /**
         * Show the form for editing the specified resource
         *
         * @param \WebSisMap\Models\User $user
         * @return \Illuminate\Http\Response
         * @internal param int $id
         */
        $form = FormBuilder::create(UserSettingsForm::class, [
            'url' => route('admin.user_settings.update'),
            'method' => 'PUT'
        ]);
        return view('admin.auth.setting', compact('form'));
    }


    /**
     * @param Request $request
     * @return $this
     */
    public function update(Request $request)
    {
        $form = \FormBuilder::create(UserSettingsForm::class);

        if (!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $data = $form->getFieldValues();
        $this->repository->update($data, \Auth::user()->id);
        $request->session()->flash('message', 'Senha registrada com sucesso');

        return redirect()->route('admin.user_settings.edit');
    }


}
