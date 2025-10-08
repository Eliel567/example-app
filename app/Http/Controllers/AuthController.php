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
        return view('cadastro');
    }

    public function processaCadastro(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'email'    => $request->email,
            'password' => Hash::make( $request->password),
        ]);

        Auth::login($user);

        return redirect()->route('app.index')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function processaLogin(Request $request)
    {
        $credenciais = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->route('app.index')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout realizado com sucesso!');
    }
}
