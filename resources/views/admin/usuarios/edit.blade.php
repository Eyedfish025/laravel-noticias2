@extends('layouts.admin')

@section('title','Editar Usuário')

@section('content')
    <div class="admin-header">
        <h2>Editar Usuário</h2>
        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline">Voltar</a>
    </div>

    <form method="POST" action="{{ route('admin.usuarios.update', $usuario) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label">Nome *</label>
            <input name="name" type="text" value="{{ old('name', $usuario->name) }}" class="form-input" required>
            @error('name')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Email *</label>
            <input name="email" type="email" value="{{ old('email', $usuario->email) }}" class="form-input" required>
            @error('email')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Nova Senha</label>
            <input name="password" type="password" class="form-input">
            @error('password')
                <span class="form-error">{{ $message }}</span>
            @enderror
            <small style="color: var(--text-light); font-size: 0.875rem;">Deixe em branco para manter a senha atual</small>
        </div>
        
        <div class="form-group">
            <label class="form-label">Confirmar Nova Senha</label>
            <input name="password_confirmation" type="password" class="form-input">
        </div>
        
        <div class="form-group">
            <div class="form-checkbox">
                <input type="checkbox" name="is_admin" value="1" id="is_admin" {{ old('is_admin', $usuario->is_admin) ? 'checked' : '' }}>
                <label for="is_admin" style="margin: 0;">É administrador</label>
            </div>
            <small style="color: var(--text-light); font-size: 0.875rem; margin-left: 1.5rem;">Administradores têm acesso total ao sistema</small>
        </div>
        
        <div style="display: flex; gap: 1rem; padding-top: 1rem; border-top: 1px solid var(--border);">
            <button type="submit" class="btn btn-primary">Atualizar Usuário</button>
            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline">Cancelar</a>
        </div>
    </form>
    
    <hr style="margin: 2rem 0; border: none; border-top: 2px solid var(--border);">
    
    <div style="background: #fef2f2; padding: 1.5rem; border-radius: 8px; border: 1px solid #fecaca;">
        <h3 style="margin: 0 0 0.5rem 0; color: var(--danger); font-size: 1.125rem;">Zona de Perigo</h3>
        <p style="margin: 0 0 1rem 0; color: var(--text-gray); font-size: 0.9375rem;">Esta ação não pode ser desfeita. Todas as notícias criadas por este usuário serão mantidas.</p>
        <form method="POST" action="{{ route('admin.usuarios.destroy', $usuario) }}" onsubmit="return confirm('Tem certeza que deseja excluir este usuário? Esta ação não pode ser desfeita.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="display: inline; vertical-align: middle; margin-right: 4px;">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                Excluir Usuário Permanentemente
            </button>
        </form>
    </div>
@endsection
