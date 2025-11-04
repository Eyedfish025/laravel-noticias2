<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller LoginController
 * 
 * Responsável pela autenticação de usuários no sistema.
 * Exibe o formulário de login e processa as credenciais.
 */
class LoginController extends Controller
{
    /**
     * Exibe o formulário de login
     * 
     * @return \Illuminate\View\View
     */
    public function mostrarForm()
    {
        return view('auth.login');
    }

    /**
     * Processa a tentativa de login
     * 
     * Valida as credenciais (email e senha) e tenta autenticar o usuário.
     * Se bem-sucedido, cria uma sessão e redireciona para o painel administrativo.
     * Se falhar, retorna ao formulário com mensagem de erro.
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Valida os dados do formulário
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Tenta autenticar com email e senha
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            // Regenera a sessão por segurança (previne session fixation)
            $request->session()->regenerate();
            
            // Redireciona para o dashboard administrativo
            return redirect()->route('admin.dashboard');
        }

        // Se falhou, retorna ao formulário com erro
        return back()
            ->withErrors(['email' => 'Credenciais inválidas. Verifique seu email e senha.'])
            ->withInput();  // Mantém o email preenchido (não a senha)
    }
}
