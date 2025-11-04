<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration: Criar tabela de notícias
 * 
 * Esta é a tabela principal do sistema, armazenando as notícias do portal.
 * Cada notícia pertence a um tipo (categoria) e a um usuário (autor).
 */
return new class extends Migration
{
    /**
     * Executa a migração (cria a tabela)
     * 
     * Estrutura da tabela noticias:
     * - id: Chave primária auto-incrementável
     * - titulo: Título da notícia
     * - slug: Versão do título para URLs (único)
     * - resumo: Resumo/chamada da notícia (opcional)
     * - conteudo: Conteúdo completo (texto longo)
     * - tipo_noticia_id: Chave estrangeira para tipos_noticias
     * - usuario_id: Chave estrangeira para usuarios (autor)
     * - publicado_em: Data/hora de publicação (null = rascunho)
     * - timestamps: created_at e updated_at automáticos
     */
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');                     // Título da notícia
            $table->string('slug')->unique();             // Slug único para URL
            $table->text('resumo')->nullable();           // Resumo opcional
            $table->longText('conteudo');                 // Conteúdo completo
            
            // Chave estrangeira para tipos_noticias
            // cascadeOnDelete(): Se o tipo for deletado, deleta as notícias associadas
            $table->foreignId('tipo_noticia_id')
                  ->constrained('tipos_noticias')
                  ->cascadeOnDelete();
            
            // Chave estrangeira para usuarios (autor)
            // cascadeOnDelete(): Se o usuário for deletado, deleta suas notícias
            $table->foreignId('usuario_id')
                  ->constrained('usuarios')
                  ->cascadeOnDelete();
            
            // Data de publicação (null = rascunho, não aparece no site)
            $table->timestamp('publicado_em')->nullable();
            
            $table->timestamps();                         // created_at, updated_at
        });
    }

    /**
     * Reverte a migração (apaga a tabela)
     * 
     * Executado com: php artisan migrate:rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
