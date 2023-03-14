<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function insert(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data["situation_id"] = 1;
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        Log::create(['user_id' => auth()->id() ?? 1, 'action' => 'user created']);

        return redirect('/home')->with('status', 'Usuário Cadastrado com Sucesso!');
    }

    public function loginView()
    {
        return view('users.login');
    }


    function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem sucedida
            return redirect()->intended('/home');
        }

        // Autenticação falhou
        return redirect('/login')->withErrors([
            'email' => 'As credenciais informadas não são válidas.',
        ]);
    }

    function logout()
    {
        Auth::logout();

        return redirect('/login')->withErrors([]);
    }


}