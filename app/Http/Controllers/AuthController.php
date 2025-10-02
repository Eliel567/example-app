<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Mostra o formulário de cadastro
     */
    public function showCadastro()
    {
        return view('cadastro');
    }

    /**
     * Processa o cadastro
     */
    public function processaCadastro(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:4|confirmed', 
            // usa "senha_confirmation" no form
        ]);

        // Salva o usuário na sessão
        Session::put('user', [
            'email' => $request->email,
            'senha' => password_hash($request->senha, PASSWORD_DEFAULT), // gera hash seguro
        ]);

        return redirect()->route('login')->with('success', 'Conta criada com sucesso! Faça login para continuar.');
    }

    /**
     * Mostra o formulário de login
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Processa o login
     */
    public function processaLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $user = Session::get('user');

        if ($user && $user['email'] === $request->email) {
            if (password_verify($request->senha, $user['senha'])) {
                Session::put('auth', true);
                return redirect()->route('app.index')->with('success', 'Login bem-sucedido!');
            }
        }

        return back()->withErrors(['error' => 'E-mail ou senha inválidos.']);
    }

    /**
     * Faz logout
     */
    public function logout()
    {
        Session::forget('auth');
        Session::forget('user');

        return redirect()->route('login')->with('success', 'Você saiu da conta.');
    }
}
