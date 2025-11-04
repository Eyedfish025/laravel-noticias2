@extends('layouts.admin')

@section('title','Usuários')

@section('content')
    <div class="admin-header">
        <h2>Gerenciar Usuários</h2>
        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary">
            <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="display: inline; vertical-align: middle; margin-right: 4px;">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
            </svg>
            Novo Usuário
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th style="text-align: center; width: 120px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td><strong>{{ $usuario->name }}</strong></td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        @if($usuario->is_admin)
                            <span class="badge badge-success">Administrador</span>
                        @else
                            <span class="badge" style="background: var(--bg-light); color: var(--text-gray);">Usuário</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <a href="{{ route('admin.usuarios.edit', $usuario) }}" class="btn btn-outline" style="padding: 0.375rem 0.75rem; font-size: 0.875rem;">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 2rem;">
        {{ $usuarios->links() }}
    </div>
@endsection
