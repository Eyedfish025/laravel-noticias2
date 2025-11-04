<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

/**
 * UsuarioSeeder - Popula a tabela de usuários
 * 
 * Cria usuários iniciais para facilitar o desenvolvimento e testes.
 * Inclui um administrador e um usuário comum de exemplo.
 */
class UsuarioSeeder extends Seeder
{
    /**
     * Popula a tabela usuarios com dados iniciais
     * 
     * IMPORTANTE PARA ALUNOS:
     * - bcrypt() criptografa a senha de forma segura (irreversível)
     * - is_admin determina se o usuário pode acessar o painel administrativo
     * - Estas credenciais são apenas para desenvolvimento/aprendizado
     */
    public function run(): void
    {
        // Cria um usuário administrador
        // Poderá acessar: /admin
        // Login: admin@exemplo.com / password
        Usuario::create([
            'name' => 'Administrador',
            'email' => 'admin@exemplo.com',
            'password' => bcrypt('password'),  // Senha criptografada
            'is_admin' => true,                // É administrador
        ]);

        // Cria um usuário comum (autor de notícias)
        // Não poderá acessar /admin (is_admin = false)
        // Login: autor@exemplo.com / password
        Usuario::create([
            'name' => 'Autor Exemplo',
            'email' => 'autor@exemplo.com',
            'password' => bcrypt('password'),
            'is_admin' => false,               // NÃO é administrador
        ]);
    }
}
