@extends('layouts.admin')

@section('title','Novo Usuário')

@section('content')
    <div class="admin-header">
        <h2>Criar Usuário</h2>
        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline">Voltar</a>
    </div>

    <form method="POST" action="{{ route('admin.usuarios.store') }}">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Nome *</label>
            <input name="name" type="text" value="{{ old('name') }}" class="form-input" required>
            @error('name')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Email *</label>
            <input name="email" type="email" value="{{ old('email') }}" class="form-input" required>
            @error('email')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Senha *</label>
            <input name="password" type="password" class="form-input" required>
            @error('password')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Confirmar Senha *</label>
            <input name="password_confirmation" type="password" class="form-input" required>
        </div>
        
        <div class="form-group">
            <div class="form-checkbox">
                <input type="checkbox" name="is_admin" value="1" id="is_admin" {{ old('is_admin') ? 'checked' : '' }}>
                <label for="is_admin" style="margin: 0;">É administrador</label>
            </div>
            <small style="color: var(--text-light); font-size: 0.875rem; margin-left: 1.5rem;">Administradores têm acesso total ao sistema</small>
        </div>
        
        <div style="display: flex; gap: 1rem; padding-top: 1rem; border-top: 1px solid var(--border);">
            <button type="submit" class="btn btn-primary">Criar Usuário</button>
            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline">Cancelar</a>
        </div>
    </form>
@endsection
