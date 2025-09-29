<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showCadastro()
    {
        return view('auth.cadastro');
    }

    public function processaCadastro(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->email, // ou pode adicionar campo nome
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Conta criada com sucesso!');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function processaLogin(Request $request)
    {
        $credenciais = $request->only('email', 'password');

        if (Auth::attempt($credenciais)) {
            return redirect()->route('app');
        }

        return back()->withErrors(['email' => 'E-mail ou senha inválidos.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
