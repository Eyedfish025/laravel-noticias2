<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware EhAdmin
 * 
 * Verifica se o usuário autenticado é um administrador.
 * Protege rotas administrativas contra acesso não autorizado.
 * 
 * Este middleware deve ser aplicado em conjunto com o middleware 'auth':
 * Route::middleware(['auth', 'eh.admin'])->group(...)
 */
class EhAdmin
{
    /**
     * Processa a requisição verificando se o usuário é admin
     * 
     * Fluxo de verificação:
     * 1. Obtém o usuário autenticado
     * 2. Verifica se existe usuário E se is_admin é true
     * 3. Se não for admin, retorna erro 403 (Forbidden)
     * 4. Se for admin, permite continuar a requisição
     * 
     * @param Request $request - Requisição HTTP atual
     * @param Closure $next - Próximo middleware ou controller
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtém o usuário autenticado (pode ser null se não estiver logado)
        $user = $request->user();

        // Verifica se não está logado OU se não é administrador
        if (!$user || !($user->is_admin ?? false)) {
            // Retorna erro 403 (Forbidden) com mensagem personalizada
            abort(403, 'Acesso negado: usuário não é administrador.');
        }

        // Usuário é admin: permite continuar para o próximo middleware/controller
        return $next($request);
    }
}
