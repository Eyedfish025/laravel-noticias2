<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Model TipoNoticia
 * 
 * Representa as categorias/tipos de notícias (ex: Política, Esportes, Cultura).
 * Usado para classificar e organizar as notícias do portal.
 * 
 * Relacionamentos:
 * - hasMany: Um tipo pode ter várias notícias
 */
class TipoNoticia extends Model
{
    use HasFactory;

    /**
     * Nome da tabela no banco de dados
     * 
     * Por padrão, o Laravel usaria "tipo_noticias" (plural em inglês),
     * mas nossa tabela se chama "tipos_noticias", então precisamos especificar.
     */
    protected $table = 'tipos_noticias';

    /**
     * Campos que podem ser preenchidos em massa (mass assignment)
     * 
     * @var array<int,string>
     */
    protected $fillable = [
        'nome',           // Nome do tipo (ex: "Política", "Esportes")
        'slug',           // Versão do nome amigável para URLs (ex: "politica", "esportes")
    ];

    /**
     * Relacionamento: Um tipo pode ter várias notícias
     * 
     * Permite acessar: $tipo->noticias para obter todas as notícias deste tipo.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function noticias()
    {
        return $this->hasMany(Noticia::class, 'tipo_noticia_id');
    }
}
