@extends('layouts.app')

@section('title', $noticia->titulo)

@section('content')
    <article>
        <div class="article-header">
            @if($noticia->tipo)
                <span class="badge badge-success" style="margin-bottom: 1rem;">{{ $noticia->tipo->nome }}</span>
            @endif
            
            <h1 class="article-title">{{ $noticia->titulo }}</h1>
            
            <div class="article-meta">
                <div>
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="display: inline; vertical-align: middle; margin-right: 4px;">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                    {{ $noticia->usuario->name ?? 'Autor' }}
                </div>
                <div>
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="display: inline; vertical-align: middle; margin-right: 4px;">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    @if($noticia->publicado_em)
                        Publicado em {{ $noticia->publicado_em->format('d/m/Y \à\s H:i') }}
                    @else
                        <span style="color: var(--warning);">Rascunho (não publicado)</span>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="article-body">
            {!! nl2br(e($noticia->conteudo)) !!}
        </div>
        
        <div style="margin-top: 2rem; text-align: center;">
            <a href="{{ route('home') }}" class="btn btn-outline">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="display: inline; vertical-align: middle; margin-right: 4px;">
                    <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                </svg>
                Voltar para a página inicial
            </a>
        </div>
    </article>
@endsection
