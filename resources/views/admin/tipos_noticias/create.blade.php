@extends('layouts.admin')

@section('title','Novo Tipo de Notícia')

@section('content')
    <div class="admin-header">
        <h2>Criar Tipo de Notícia</h2>
        <a href="{{ route('admin.tipos-noticia.index') }}" class="btn btn-outline">Voltar</a>
    </div>

    <form method="POST" action="{{ route('admin.tipos-noticia.store') }}">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Nome *</label>
            <input name="nome" type="text" value="{{ old('nome') }}" class="form-input" required>
            @error('nome')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Slug *</label>
            <input name="slug" type="text" value="{{ old('slug') }}" class="form-input" required>
            @error('slug')
                <span class="form-error">{{ $message }}</span>
            @enderror
            <small style="color: var(--text-light); font-size: 0.875rem;">URL amigável (ex: politica, esportes)</small>
        </div>
        
        <div style="display: flex; gap: 1rem; padding-top: 1rem; border-top: 1px solid var(--border);">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('admin.tipos-noticia.index') }}" class="btn btn-outline">Cancelar</a>
        </div>
    </form>
@endsection
