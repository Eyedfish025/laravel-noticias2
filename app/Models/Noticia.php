<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Noticia
 * 
 * Representa uma notícia do portal.
 * Cada notícia pertence a um tipo (categoria) e a um usuário (autor).
 * 
 * Relacionamentos:
 * - belongsTo: TipoNoticia (uma notícia pertence a um tipo)
 * - belongsTo: Usuario (uma notícia pertence a um autor)
 */
class Noticia extends Model
{
    use HasFactory;

    /**
     * Campos que podem ser preenchidos em massa (mass assignment)
     * 
     * @var array<int,string>
     */
    protected $fillable = [
        'titulo',           // Título da notícia
        'slug',             // Versão do título amigável para URLs (único)
        'resumo',           // Resumo/chamada da notícia (opcional)
        'conteudo',         // Conteúdo completo da notícia
        'tipo_noticia_id',  // ID do tipo/categoria (chave estrangeira)
        'usuario_id',       // ID do autor da notícia (chave estrangeira)
        'publicado_em',     // Data/hora de publicação (null = rascunho)
    ];

    /**
     * Conversão automática de tipos (casting)
     * 
     * O Laravel converte automaticamente o campo 'publicado_em' para um objeto Carbon,
     * permitindo usar métodos de data como ->format(), ->diffForHumans(), etc.
     * 
     * @var array<string,string>
     */
    protected $casts = [
        'publicado_em' => 'datetime',
    ];

    /**
     * Relacionamento: Uma notícia pertence a um tipo/categoria
     * 
     * Permite acessar: $noticia->tipo->nome para obter o nome do tipo.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo()
    {
        return $this->belongsTo(TipoNoticia::class, 'tipo_noticia_id');
    }

    /**
     * Relacionamento: Uma notícia pertence a um usuário (autor)
     * 
     * Permite acessar: $noticia->usuario->name para obter o nome do autor.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
