<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('user.index', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Validation
        $this->validateStoreUser();

        // Hashing the password
        $hashedPassword = Hash::make(request('password'));

        // Storing the new user
        $user = new User();
        $user->nome = request('nome');
        $user->email = request('email');
        $user->password = $hashedPassword;
        $user->save();

        // Redirecting the view
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $this->validateUpdateUser($user);
        $user->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->utilizador_id);
        $user->delete();
        return back();
    }

    protected function validateStoreUser()
    {
        return request()->validate([
            'nome' => 'required|max:255',
            'email' => 'required|unique:user|email|max:255',
            'password' => 'required|max:255|confirmed',
        ]);
    }

    protected function validateUpdateUser(User $user)
    {
        return request()->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255|unique:user,email,' . $user->id,
        ]);
    }
}