@extends('layouts.admin')

@section('title','Tipos de Notícia')

@section('content')
    <div class="admin-header">
        <h2>Tipos de Notícia</h2>
        <a href="{{ route('admin.tipos-noticia.create') }}" class="btn btn-primary">
            <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="display: inline; vertical-align: middle; margin-right: 4px;">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
            </svg>
            Novo Tipo
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Slug</th>
                <th style="text-align: center; width: 120px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipos as $tipo)
                <tr>
                    <td><strong>{{ $tipo->nome }}</strong></td>
                    <td><code style="background: var(--bg-light); padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem;">{{ $tipo->slug }}</code></td>
                    <td style="text-align: center;">
                        <a href="{{ route('admin.tipos-noticia.edit', $tipo) }}" class="btn btn-outline" style="padding: 0.375rem 0.75rem; font-size: 0.875rem;">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 2rem;">
        {{ $tipos->links() }}
    </div>
@endsection
