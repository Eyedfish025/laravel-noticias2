@extends('layouts.admin')

@section('title','Nova Notícia')

@section('content')
    <div class="admin-header">
        <h2>Criar Nova Notícia</h2>
        <a href="{{ route('admin.noticias.index') }}" class="btn btn-outline">Voltar</a>
    </div>

    <form method="POST" action="{{ route('admin.noticias.store') }}">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Título *</label>
            <input name="titulo" type="text" value="{{ old('titulo') }}" class="form-input" required>
            @error('titulo')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Slug *</label>
            <input name="slug" type="text" value="{{ old('slug') }}" class="form-input" required>
            @error('slug')
                <span class="form-error">{{ $message }}</span>
            @enderror
            <small style="color: var(--text-light); font-size: 0.875rem;">URL amigável (ex: minha-noticia)</small>
        </div>
        
        <div class="form-group">
            <label class="form-label">Resumo</label>
            <textarea name="resumo" class="form-textarea" style="min-height: 80px;">{{ old('resumo') }}</textarea>
            @error('resumo')
                <span class="form-error">{{ $message }}</span>
            @enderror
            <small style="color: var(--text-light); font-size: 0.875rem;">Breve descrição que aparecerá na listagem</small>
        </div>
        
        <div class="form-group">
            <label class="form-label">Conteúdo *</label>
            <textarea name="conteudo" rows="12" class="form-textarea" required>{{ old('conteudo') }}</textarea>
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
                        <option value="{{ $t->id }}" {{ old('tipo_noticia_id') == $t->id ? 'selected' : '' }}>{{ $t->nome }}</option>
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
                        <option value="{{ $u->id }}" {{ old('usuario_id', auth()->id()) == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                    @endforeach
                </select>
                @error('usuario_id')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <div class="form-checkbox">
                <input type="checkbox" name="publicar" value="1" id="publicar" {{ old('publicar', true) ? 'checked' : '' }}>
                <label for="publicar" style="margin: 0;">Publicar imediatamente</label>
            </div>
            <small style="color: var(--text-light); font-size: 0.875rem; margin-left: 1.5rem;">Se marcado, a notícia ficará visível na página inicial</small>
        </div>
        
        <div style="display: flex; gap: 1rem; padding-top: 1rem; border-top: 1px solid var(--border);">
            <button type="submit" class="btn btn-primary">Salvar Notícia</button>
            <a href="{{ route('admin.noticias.index') }}" class="btn btn-outline">Cancelar</a>
        </div>
    </form>
@endsection
