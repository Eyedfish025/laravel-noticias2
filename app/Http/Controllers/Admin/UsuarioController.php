<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

/**
 * Controller UsuarioController
 * 
 * CRUD completo para gerenciamento de usuários do sistema.
 * Permite criar, editar e remover usuários, além de definir permissões de admin.
 */
class UsuarioController extends Controller
{
    /**
     * Lista todos os usuários (index)
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Busca usuários ordenados por nome, paginados
        $usuarios = Usuario::orderBy('name')->paginate(20);
        
        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Exibe o formulário de criação de novo usuário (create)
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Salva um novo usuário no banco (store)
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6|confirmed',  // confirmed = precisa do campo password_confirmation
            'is_admin' => 'sometimes|boolean',
        ]);

        // Criptografa a senha antes de salvar
        $data['password'] = bcrypt($data['password']);

        // IMPORTANTE: Checkboxes desmarcados não enviam valor no formulário
        // Se 'is_admin' não estiver no request, significa que foi desmarcado
        // Define explicitamente como false (usuário comum)
        $data['is_admin'] = $request->has('is_admin') ? true : false;

        // Cria o usuário
        Usuario::create($data);
        
        // Redireciona com mensagem de sucesso
        return redirect()
            ->route('admin.usuarios.index')
            ->with('success', 'Usuário criado com sucesso.');
    }

    /**
     * Método show não implementado
     * 
     * Como não temos página de detalhes de usuário,
     * este método fica vazio. Ele foi excluído nas rotas com ->except(['show'])
     */
    public function show(string $id)
    {
        // Não implementado - não temos página de detalhes de usuário
    }

    /**
     * Exibe o formulário de edição de um usuário existente (edit)
     * 
     * @param Usuario $usuario - Injetado automaticamente pelo Laravel (Route Model Binding)
     * @return \Illuminate\View\View
     */
    public function edit(Usuario $usuario)
    {
        return view('admin.usuarios.edit', compact('usuario'));
    }

    /**
     * Atualiza um usuário existente no banco (update)
     * 
     * A senha é opcional na edição - só atualiza se for preenchida.
     * 
     * @param Request $request
     * @param Usuario $usuario - Injetado automaticamente pelo Laravel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Usuario $usuario)
    {
        // Valida os dados (email deve ser único, exceto para este usuário)
        // Senha é nullable (opcional) na edição
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'password' => 'nullable|string|min:6|confirmed',  // Senha é opcional na edição
            'is_admin' => 'sometimes|boolean',
        ]);

        // Se uma nova senha foi informada, criptografa
        // Se não, remove do array para não sobrescrever a senha atual
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        // IMPORTANTE: Checkboxes desmarcados não enviam valor no formulário
        // Se 'is_admin' não estiver no request, significa que foi desmarcado
        // Precisamos definir explicitamente como false
        $data['is_admin'] = $request->has('is_admin') ? true : false;

        // Atualiza o usuário
        $usuario->update($data);

        // Redireciona com mensagem de sucesso
        return redirect()
            ->route('admin.usuarios.index')
            ->with('success', 'Usuário atualizado com sucesso.');
    }

    /**
     * Remove um usuário do banco de dados (destroy)
     * 
     * ATENÇÃO: Se existirem notícias vinculadas a este usuário,
     * a operação falhará devido à constraint de chave estrangeira.
     * 
     * @param Usuario $usuario - Injetado automaticamente pelo Laravel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Usuario $usuario)
    {
        // Deleta o usuário
        $usuario->delete();
        
        // Redireciona com mensagem de sucesso
        return redirect()
            ->route('admin.usuarios.index')
            ->with('success', 'Usuário removido com sucesso.');
    }
}
