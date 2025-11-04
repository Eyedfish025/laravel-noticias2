<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoNoticia;
use Illuminate\Http\Request;

/**
 * Controller TipoNoticiaController
 * 
 * CRUD completo para gerenciamento de tipos/categorias de notícias.
 * Permite criar, editar e remover categorias como "Política", "Esportes", etc.
 */
class TipoNoticiaController extends Controller
{
    /**
     * Lista todos os tipos de notícias (index)
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Busca tipos ordenados por nome, paginados
        $tipos = TipoNoticia::orderBy('nome')->paginate(20);
        
        return view('admin.tipos_noticias.index', compact('tipos'));
    }

    /**
     * Exibe o formulário de criação de novo tipo (create)
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tipos_noticias.create');
    }

    /**
     * Salva um novo tipo de notícia no banco (store)
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tipos_noticias,slug',
        ]);

        // Cria o tipo
        TipoNoticia::create($data);
        
        // Redireciona com mensagem de sucesso
        return redirect()
            ->route('admin.tipos-noticia.index')
            ->with('success', 'Tipo de notícia criado com sucesso.');
    }

    /**
     * Método show não implementado
     * 
     * Como não temos uma página de visualização individual de tipos,
     * este método fica vazio. O Laravel Resource Controller o inclui por padrão.
     */
    public function show(string $id)
    {
        // Não implementado - não temos página de detalhes de tipo
    }

    /**
     * Exibe o formulário de edição de um tipo existente (edit)
     * 
     * IMPORTANTE: O parâmetro se chama $tipos_noticia (singular) porque
     * configuramos isso nas rotas com ->parameters(['tipos-noticia' => 'tipos_noticia'])
     * 
     * @param TipoNoticia $tipos_noticia - Injetado automaticamente pelo Laravel
     * @return \Illuminate\View\View
     */
    public function edit(TipoNoticia $tipos_noticia)
    {
        return view('admin.tipos_noticias.edit', ['tipos_noticia' => $tipos_noticia]);
    }

    /**
     * Atualiza um tipo existente no banco (update)
     * 
     * @param Request $request
     * @param TipoNoticia $tipos_noticia - Injetado automaticamente pelo Laravel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, TipoNoticia $tipos_noticia)
    {
        // Valida os dados (slug deve ser único, exceto para este tipo)
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tipos_noticias,slug,' . $tipos_noticia->id,
        ]);

        // Atualiza o tipo
        $tipos_noticia->update($data);
        
        // Redireciona com mensagem de sucesso
        return redirect()
            ->route('admin.tipos-noticia.index')
            ->with('success', 'Tipo atualizado com sucesso.');
    }

    /**
     * Remove um tipo do banco de dados (destroy)
     * 
     * ATENÇÃO: Se existirem notícias vinculadas a este tipo,
     * a operação falhará devido à constraint de chave estrangeira.
     * 
     * @param TipoNoticia $tipos_noticia - Injetado automaticamente pelo Laravel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TipoNoticia $tipos_noticia)
    {
        // Deleta o tipo
        $tipos_noticia->delete();
        
        // Redireciona com mensagem de sucesso
        return redirect()
            ->route('admin.tipos-noticia.index')
            ->with('success', 'Tipo removido com sucesso.');
    }
}
