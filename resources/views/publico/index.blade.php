@extends('layouts.app')

@section('title','Início')

@section('content')
    <div style="margin-bottom: 2rem;">
        <h2 style="font-size: 2rem; font-weight: 700; color: var(--text-dark); margin: 0 0 0.5rem 0;">Últimas Notícias</h2>
        <p style="color: var(--text-gray); margin: 0;">Fique por dentro das principais notícias</p>
    </div>

    @if($noticias->count())
        <div class="news-grid">
            @foreach($noticias as $noticia)
                <article class="news-card">
                    <div class="news-card-content">
                        <h3 class="news-card-title">
                            <a href="{{ route('noticia.show', $noticia->slug) }}">{{ $noticia->titulo }}</a>
                        </h3>
                        
                        <p class="news-card-excerpt">
                            {{ $noticia->resumo ?? \Illuminate\Support\Str::limit(strip_tags($noticia->conteudo), 150) }}
                        </p>
                        
                        <div class="news-card-meta">
                            <div>
                                @if($noticia->tipo)
                                    <span class="news-badge">{{ $noticia->tipo->nome }}</span>
                                @endif
                            </div>
                            <div>
                                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="display: inline; vertical-align: middle; margin-right: 4px;">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                {{ $noticia->updated_at->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div style="margin-top: 3rem;">
            {{ $noticias->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 4rem 2rem; background: var(--bg-white); border-radius: 8px;">
            <svg width="64" height="64" viewBox="0 0 20 20" fill="var(--text-light)" style="margin-bottom: 1rem;">
                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
            </svg>
            <p style="color: var(--text-gray); font-size: 1.125rem;">Nenhuma notícia publicada no momento.</p>
        </div>
    @endif
@endsection
