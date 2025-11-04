<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\TipoNoticia;
use App\Models\Usuario;
use Illuminate\Http\Request;

/**
 * Controller NoticiaController
 * 
 * CRUD completo para gerenciamento de notícias no painel administrativo.
 * Implementa todos os métodos do padrão Resource Controller do Laravel.
 */
class NoticiaController extends Controller
{
    /**
     * Lista todas as notícias (index)
     * 
     * Exibe uma tabela com todas as notícias cadastradas,
     * carregando também os relacionamentos (tipo e usuário) para evitar N+1 queries.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Carrega notícias com seus relacionamentos (eager loading)
        // Ordena pelas mais recentemente atualizadas
        // Pagina de 15 em 15
        $noticias = Noticia::with('tipo', 'usuario')
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
            
        return view('admin.noticias.index', compact('noticias'));
    }

    /**
     * Exibe o formulário de criação de nova notícia (create)
     * 
     * Carrega os tipos e usuários para os selects do formulário.
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Busca todos os tipos de notícias para o select
        $tipos = TipoNoticia::all();
        
        // Busca todos os usuários para o select de autor
        $usuarios = Usuario::all();
        
        return view('admin.noticias.create', compact('tipos', 'usuarios'));
    }

    /**
     * Salva uma nova notícia no banco de dados (store)
     * 
     * Valida os dados do formulário e cria a notícia.
     * Se a checkbox "publicar" estiver marcada, define a data de publicação.
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida os dados enviados pelo formulário
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:noticias,slug',
            'resumo' => 'nullable|string',
            'conteudo' => 'required|string',
            'tipo_noticia_id' => 'required|exists:tipos_noticias,id',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        // Verifica se a checkbox "publicar" está marcada
        // Se sim, define a data de publicação como agora
        // Se não, a notícia fica como rascunho (publicado_em = null)
        if ($request->has('publicar') && $request->publicar == '1') {
            $data['publicado_em'] = now();
        }

        // Cria a notícia no banco
        Noticia::create($data);

        // Redireciona para a lista com mensagem de sucesso
        return redirect()
            ->route('admin.noticias.index')
            ->with('success', 'Notícia criada com sucesso.');
    }

    /**
     * Exibe o formulário de edição de uma notícia existente (edit)
     * 
     * @param Noticia $noticia - Injetado automaticamente pelo Laravel (Route Model Binding)
     * @return \Illuminate\View\View
     */
    public function edit(Noticia $noticia)
    {
        // Carrega tipos e usuários para os selects
        $tipos = TipoNoticia::all();
        $usuarios = Usuario::all();
        
        return view('admin.noticias.edit', compact('noticia', 'tipos', 'usuarios'));
    }

    /**
     * Atualiza uma notícia existente no banco (update)
     * 
     * Valida os dados e atualiza a notícia.
     * Gerencia o status de publicação baseado na checkbox.
     * 
     * @param Request $request
     * @param Noticia $noticia - Injetado automaticamente pelo Laravel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Noticia $noticia)
    {
        // Valida os dados (slug deve ser único, exceto para esta notícia)
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:noticias,slug,' . $noticia->id,
            'resumo' => 'nullable|string',
            'conteudo' => 'required|string',
            'tipo_noticia_id' => 'required|exists:tipos_noticias,id',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        // Gerencia a publicação:
        // - Se checkbox marcada E notícia já estava publicada: mantém a data original
        // - Se checkbox marcada E notícia era rascunho: publica agora
        // - Se checkbox desmarcada: transforma em rascunho (publicado_em = null)
        if ($request->has('publicar') && $request->publicar == '1') {
            // Mantém data de publicação original se já estava publicada
            $data['publicado_em'] = $noticia->publicado_em ?? now();
        } else {
            // Desmarcou: volta para rascunho
            $data['publicado_em'] = null;
        }

        // Atualiza a notícia
        $noticia->update($data);

        // Redireciona com mensagem de sucesso
        return redirect()
            ->route('admin.noticias.index')
            ->with('success', 'Notícia atualizada com sucesso.');
    }

    /**
     * Remove uma notícia do banco de dados (destroy)
     * 
     * @param Noticia $noticia - Injetado automaticamente pelo Laravel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Noticia $noticia)
    {
        // Deleta a notícia do banco
        $noticia->delete();
        
        // Redireciona com mensagem de sucesso
        return redirect()
            ->route('admin.noticias.index')
            ->with('success', 'Notícia removida com sucesso.');
    }
}
