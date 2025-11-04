<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration: Criar tabela de usuários
 * 
 * Esta tabela armazena os usuários que podem acessar o sistema.
 * Inclui um campo is_admin para diferenciar administradores de usuários comuns.
 */
return new class extends Migration
{
    /**
     * Executa a migração (cria a tabela)
     * 
     * Estrutura da tabela usuarios:
     * - id: Chave primária auto-incrementável
     * - name: Nome completo do usuário
     * - email: Email único para login
     * - password: Senha criptografada (hash)
     * - is_admin: Flag booleana (true = admin, false = usuário comum)
     * - timestamps: created_at e updated_at automáticos
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('name');                      // Nome do usuário
            $table->string('email')->unique();           // Email único
            $table->string('password');                  // Senha criptografada
            $table->boolean('is_admin')->default(false); // Por padrão não é admin
            $table->timestamps();                        // created_at, updated_at
        });
    }

    /**
     * Reverte a migração (apaga a tabela)
     * 
     * Executado com: php artisan migrate:rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
