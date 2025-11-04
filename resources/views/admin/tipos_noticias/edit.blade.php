@extends('layouts.admin')

@section('title','Editar Tipo de Notícia')

@section('content')
    <div class="admin-header">
        <h2>Editar Tipo de Notícia</h2>
        <a href="{{ route('admin.tipos-noticia.index') }}" class="btn btn-outline">Voltar</a>
    </div>

    <form method="POST" action="{{ route('admin.tipos-noticia.update', $tipos_noticia) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label">Nome *</label>
            <input name="nome" type="text" value="{{ old('nome', $tipos_noticia->nome) }}" class="form-input" required>
            @error('nome')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Slug *</label>
            <input name="slug" type="text" value="{{ old('slug', $tipos_noticia->slug) }}" class="form-input" required>
            @error('slug')
                <span class="form-error">{{ $message }}</span>
            @enderror
            <small style="color: var(--text-light); font-size: 0.875rem;">URL amigável (ex: politica, esportes)</small>
        </div>
        
        <div style="display: flex; gap: 1rem; padding-top: 1rem; border-top: 1px solid var(--border);">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('admin.tipos-noticia.index') }}" class="btn btn-outline">Cancelar</a>
        </div>
    </form>
    
    <hr style="margin: 2rem 0; border: none; border-top: 2px solid var(--border);">
    
    <div style="background: #fef2f2; padding: 1.5rem; border-radius: 8px; border: 1px solid #fecaca;">
        <h3 style="margin: 0 0 0.5rem 0; color: var(--danger); font-size: 1.125rem;">Zona de Perigo</h3>
        <p style="margin: 0 0 1rem 0; color: var(--text-gray); font-size: 0.9375rem;">Esta ação não pode ser desfeita. Todas as notícias deste tipo poderão ser afetadas.</p>
        <form method="POST" action="{{ route('admin.tipos-noticia.destroy', $tipos_noticia) }}" onsubmit="return confirm('Tem certeza que deseja excluir este tipo de notícia? Esta ação não pode ser desfeita.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="display: inline; vertical-align: middle; margin-right: 4px;">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                Excluir Tipo Permanentemente
            </button>
        </form>
    </div>
@endsection
