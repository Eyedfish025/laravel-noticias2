<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller LogoutController
 * 
 * Responsável por encerrar a sessão do usuário autenticado.
 */
class LogoutController extends Controller
{
    /**
     * Realiza o logout do usuário
     * 
     * Este método:
     * 1. Desloga o usuário (remove da sessão)
     * 2. Invalida a sessão atual (apaga dados)
     * 3. Regenera o token CSRF (segurança)
     * 4. Redireciona para a página inicial pública
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Remove o usuário da sessão de autenticação
        Auth::logout();
        
        // Invalida a sessão atual
        $request->session()->invalidate();
        
        // Regenera o token CSRF para prevenir ataques
        $request->session()->regenerateToken();
        
        // Redireciona para a página inicial do portal
        return redirect()->route('home');
    }
}
