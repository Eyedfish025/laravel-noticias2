<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\TipoNoticia;
use App\Models\Usuario;

/**
 * Controller DashboardController
 * 
 * Responsável pela página inicial do painel administrativo.
 * Exibe estatísticas e métricas do sistema para o administrador.
 */
class DashboardController extends Controller
{
    /**
     * Exibe o painel administrativo com estatísticas
     * 
     * Calcula e exibe:
     * - Total de notícias cadastradas
     * - Total de notícias publicadas (visíveis no site)
     * - Total de tipos/categorias de notícias
     * - Total de usuários cadastrados
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Conta todas as notícias (publicadas + rascunhos)
        $totalNoticias = Noticia::count();
        
        // Conta apenas notícias publicadas (publicado_em não é null)
        $noticiasPublicadas = Noticia::whereNotNull('publicado_em')->count();
        
        // Conta todos os tipos de notícias
        $totalTipos = TipoNoticia::count();
        
        // Conta todos os usuários
        $totalUsuarios = Usuario::count();
        
        // Retorna a view do dashboard com as estatísticas
        return view('admin.dashboard', compact(
            'totalNoticias',
            'noticiasPublicadas',
            'totalTipos',
            'totalUsuarios'
        ));
    }
}
