@extends('layouts.admin')

@section('title','Painel Administrativo')

@section('content')
    <div class="admin-header">
        <h2>Painel Administrativo</h2>
    </div>
    
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total de Notícias</h3>
            <p>{{ $totalNoticias }}</p>
        </div>
        
        <div class="stat-card">
            <h3>Publicadas</h3>
            <p>{{ $noticiasPublicadas }}</p>
        </div>
        
        <div class="stat-card">
            <h3>Tipos de Notícia</h3>
            <p>{{ $totalTipos }}</p>
        </div>
        
        <div class="stat-card">
            <h3>Usuários</h3>
            <p>{{ $totalUsuarios }}</p>
        </div>
    </div>
    
    <div style="background: var(--bg-light); padding: 1.5rem; border-radius: 8px;">
        <h3 style="margin: 0 0 1rem 0; font-size: 1.125rem;">Acesso Rápido</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
            <a href="{{ route('admin.noticias.index') }}" class="btn btn-primary">Gerenciar Notícias</a>
            <a href="{{ route('admin.tipos-noticia.index') }}" class="btn btn-secondary">Gerenciar Tipos</a>
            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Gerenciar Usuários</a>
        </div>
    </div>
@endsection
