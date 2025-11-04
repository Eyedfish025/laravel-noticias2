<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Model Usuario
 * 
 * Representa os usuários do sistema que podem se autenticar.
 * Herda de Authenticatable para ter funcionalidades de autenticação do Laravel.
 * 
 * Relacionamentos:
 * - hasMany: Uma usuário pode ter várias notícias (como autor)
 */
class Usuario extends Authenticatable
{
    use HasFactory;

    /**
     * Campos que podem ser preenchidos em massa (mass assignment)
     * 
     * Isso protege contra preenchimento malicioso de campos sensíveis.
     * Apenas os campos listados aqui podem ser preenchidos via create() ou fill().
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'name',           // Nome completo do usuário
        'email',          // Email único para login
        'password',       // Senha criptografada
        'is_admin',       // Flag booleana: true = administrador, false = usuário comum
    ];

    /**
     * Campos que devem ser ocultados ao serializar o model
     * 
     * Quando o model é convertido para JSON ou array (ex: em APIs),
     * os campos listados aqui não serão incluídos por segurança.
     *
     * @var array<int,string>
     */
    protected $hidden = [
        'password',       // Nunca expor a senha, nem criptografada
    ];

    /**
     * Relacionamento: Um usuário pode ter várias notícias (como autor)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function noticias()
    {
        return $this->hasMany(Noticia::class, 'usuario_id');
    }
}
