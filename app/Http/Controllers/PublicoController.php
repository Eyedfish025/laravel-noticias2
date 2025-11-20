<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

/**
 * Controller PublicoController
 *
 * Responsável pelas páginas públicas do portal de notícias.
 * Não requer autenticação - qualquer visitante pode acessar.
 */
class PublicoController extends Controller
{
    /**
     * Exibe a página inicial com a listagem de notícias publicadas
     *
     * Busca apenas notícias que têm data de publicação (publicado_em não é null),
     * ordena pelas mais recentemente atualizadas e pagina de 10 em 10.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Busca notícias publicadas (publicado_em não null)
        $noticias = Noticia::whereNotNull('publicado_em')
            ->orderBy('updated_at', 'desc')  // Ordena pelas mais recentes
            ->paginate(10);                   // 10 notícias por página

        // Retorna a view da página inicial com as notícias
        return view('publico.index', compact('noticias'));
    }

    /**
     * Exibe os detalhes completos de uma notícia específica
     *
     * Busca a notícia pelo slug (URL amigável) e garante que está publicada.
     * Se não encontrar ou não estiver publicada, retorna erro 404.
     *
     * @param string $slug - Slug da notícia (ex: "minha-noticia")
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // Busca por slug e garante que está publicada
        $noticia = Noticia::where('slug', $slug)
            ->whereNotNull('publicado_em')
            ->firstOrFail();  // Lança 404 se não encontrar

        // Retorna a view de detalhes da notícia
        return view('publico.show', compact('noticia'));
    }

    public function sounds ()
    {
        return view('landing');
    }

}
