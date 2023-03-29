<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {

        if(Auth::check()) {
            return redirect()->route('users.index');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();
            session(['name' => $user->name]); // adiciona o nome do usuário à sessão
    
            return redirect()->intended('/painel/usuarios');
        }
    
        return back()->withErrors([
            'email' => 'Dados fornecidos não encontrados no sistema. Verifique e tente novamente. :)',
        ]);
    }

    public function signOut()
    {
        Auth::logout();

        return redirect('login');
    }
}
