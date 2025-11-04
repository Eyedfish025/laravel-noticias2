@extends('layouts.admin')

@section('title','Notícias')

@section('content')
    <div class="admin-header">
        <h2>Gerenciar Notícias</h2>
        <a href="{{ route('admin.noticias.create') }}" class="btn btn-primary">
            <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="display: inline; vertical-align: middle; margin-right: 4px;">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
            </svg>
            Nova Notícia
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Tipo</th>
                <th>Autor</th>
                <th>Status</th>
                <th>Atualizado</th>
                <th style="text-align: center; width: 180px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($noticias as $n)
                <tr>
                    <td><strong>{{ $n->titulo }}</strong></td>
                    <td>{{ $n->tipo->nome ?? '-' }}</td>
                    <td>{{ $n->usuario->name ?? '-' }}</td>
                    <td>
                        @if($n->publicado_em)
                            <span class="badge badge-success">Publicada</span>
                        @else
                            <span class="badge badge-warning">Rascunho</span>
                        @endif
                    </td>
                    <td>{{ $n->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div style="display: flex; gap: 0.5rem; justify-content: center;">
                            <a href="{{ route('admin.noticias.edit', $n) }}" class="btn btn-outline" style="padding: 0.375rem 0.75rem; font-size: 0.875rem;">Editar</a>
                            <form action="{{ route('admin.noticias.destroy', $n) }}" method="POST" style="display:inline; margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja remover esta notícia?')" class="btn btn-danger" style="padding: 0.375rem 0.75rem; font-size: 0.875rem;">Remover</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 2rem;">
        {{ $noticias->links() }}
    </div>
@endsection
