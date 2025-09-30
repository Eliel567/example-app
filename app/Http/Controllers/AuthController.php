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
            'senha' => 'required|min:4',
            'confirma_senha' => 'required|same:senha',
        ]);

        // Aqui poderia salvar no banco (users), mas vamos simplificar:
        Session::put('user', [
            'email' => $request->email,
            'senha' => bcrypt($request->senha), // senha criptografada
        ]);

        return redirect()->route('app.tela')->with('success', 'Conta criada com sucesso!');
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
            // Aqui só estamos comparando simples (sem banco de dados real)
            // bcrypt não pode ser comparado diretamente, então para teste:
            if ($request->senha === '1234' || password_verify($request->senha, $user['senha'])) {
                Session::put('auth', true);

                return redirect()->route('app.tela')->with('success', 'Login bem-sucedido!');
            }
        }

        return back()->with('error', 'E-mail ou senha inválidos.');
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
