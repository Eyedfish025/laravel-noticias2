@extends('layouts.admin')

@section('title','Editar Notícia')

@section('content')
    <div class="admin-header">
        <h2>Editar Notícia</h2>
        <a href="{{ route('admin.noticias.index') }}" class="btn btn-outline">Voltar</a>
    </div>

    <form method="POST" action="{{ route('admin.noticias.update', $noticia) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label">Título *</label>
            <input name="titulo" type="text" value="{{ old('titulo', $noticia->titulo) }}" class="form-input" required>
            @error('titulo')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Slug *</label>
            <input name="slug" type="text" value="{{ old('slug', $noticia->slug) }}" class="form-input" required>
            @error('slug')
                <span class="form-error">{{ $message }}</span>
            @enderror
            <small style="color: var(--text-light); font-size: 0.875rem;">URL amigável (ex: minha-noticia)</small>
        </div>
        
        <div class="form-group">
            <label class="form-label">Resumo</label>
            <textarea name="resumo" class="form-textarea" style="min-height: 80px;">{{ old('resumo', $noticia->resumo) }}</textarea>
            @error('resumo')
                <span class="form-error">{{ $message }}</span>
            @enderror
            <small style="color: var(--text-light); font-size: 0.875rem;">Breve descrição que aparecerá na listagem</small>
        </div>
        
        <div class="form-group">
            <label class="form-label">Conteúdo *</label>
            <textarea name="conteudo" rows="12" class="form-textarea" required>{{ old('conteudo', $noticia->conteudo) }}</textarea>
            @error('conteudo')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label class="form-label">Tipo de Notícia *</label>
                <select name="tipo_noticia_id" class="form-select" required>
                    <option value="">Selecione...</option>
                    @foreach($tipos as $t)
                        <option value="{{ $t->id }}" {{ old('tipo_noticia_id', $noticia->tipo_noticia_id) == $t->id ? 'selected' : '' }}>{{ $t->nome }}</option>
                    @endforeach
                </select>
                @error('tipo_noticia_id')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Autor *</label>
                <select name="usuario_id" class="form-select" required>
                    <option value="">Selecione...</option>
                    @foreach($usuarios as $u)
                        <option value="{{ $u->id }}" {{ old('usuario_id', $noticia->usuario_id) == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                    @endforeach
                </select>
                @error('usuario_id')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <div class="form-checkbox">
                <input type="checkbox" name="publicar" value="1" id="publicar" {{ old('publicar', $noticia->publicado_em) ? 'checked' : '' }}>
                <label for="publicar" style="margin: 0;">Publicada</label>
            </div>
            <small style="color: var(--text-light); font-size: 0.875rem; margin-left: 1.5rem;">Se marcado, a notícia ficará visível na página inicial</small>
        </div>
        
        <div style="display: flex; gap: 1rem; padding-top: 1rem; border-top: 1px solid var(--border);">
            <button type="submit" class="btn btn-primary">Atualizar Notícia</button>
            <a href="{{ route('admin.noticias.index') }}" class="btn btn-outline">Cancelar</a>
        </div>
    </form>
    
    <hr style="margin: 2rem 0; border: none; border-top: 2px solid var(--border);">
    
    <div style="background: #fef2f2; padding: 1.5rem; border-radius: 8px; border: 1px solid #fecaca;">
        <h3 style="margin: 0 0 0.5rem 0; color: var(--danger); font-size: 1.125rem;">Zona de Perigo</h3>
        <p style="margin: 0 0 1rem 0; color: var(--text-gray); font-size: 0.9375rem;">Esta ação não pode ser desfeita. Todos os dados relacionados serão permanentemente removidos.</p>
        <form method="POST" action="{{ route('admin.noticias.destroy', $noticia) }}" onsubmit="return confirm('Tem certeza que deseja excluir esta notícia? Esta ação não pode ser desfeita.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="display: inline; vertical-align: middle; margin-right: 4px;">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                Excluir Notícia Permanentemente
            </button>
        </form>
    </div>
@endsection
