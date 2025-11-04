@extends('layouts.app')

@section('title','Login')

@section('content')
    <div style="max-width: 400px; margin: 4rem auto;">
        <div style="background: var(--bg-white); padding: 2.5rem; border-radius: 8px; box-shadow: var(--shadow-lg);">
            <div style="text-align: center; margin-bottom: 2rem;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" style="margin-bottom: 1rem;">
                    <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <h2 style="margin: 0; font-size: 1.875rem; color: var(--text-dark);">Portal de Notícias</h2>
                <p style="margin: 0.5rem 0 0 0; color: var(--text-gray);">Acesse sua conta</p>
            </div>

            @if($errors->any())
                <div class="alert" style="background: #fee; border: 1px solid #fcc; color: #c33; margin-bottom: 1.5rem;">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" value="{{ old('email') }}" class="form-input" required autofocus>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Senha</label>
                    <input name="password" type="password" class="form-input" required>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                    Entrar
                </button>
            </form>
            
            <div style="margin-top: 1.5rem; text-align: center; padding-top: 1.5rem; border-top: 1px solid var(--border);">
                <a href="{{ route('home') }}" style="color: var(--text-gray); font-size: 0.875rem;">
                    ← Voltar para a página inicial
                </a>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 1.5rem; color: var(--text-light); font-size: 0.875rem;">
            <p>Credenciais de teste: admin@exemplo.com / password</p>
        </div>
    </div>
@endsection
