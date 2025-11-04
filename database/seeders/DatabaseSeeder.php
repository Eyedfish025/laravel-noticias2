<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * DatabaseSeeder - Seeder principal
 * 
 * Este é o seeder principal que orquestra a execução de todos os outros seeders.
 * Executado com: php artisan db:seed
 * 
 * A ordem de execução importa:
 * 1. Primeiro usuários (independente)
 * 2. Depois tipos (independente)
 * 3. Por último notícias (depende de usuários e tipos)
 */
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Popula o banco de dados com dados iniciais
     * 
     * Chama os seeders específicos na ordem correta.
     */
    public function run(): void
    {
        // Executa os seeders na ordem de dependência
        $this->call([
            UsuarioSeeder::class,       // Cria usuários (admin e autor exemplo)
            TipoNoticiaSeeder::class,   // Cria tipos de notícias
            NoticiaSeeder::class,       // Cria notícias usando factory
        ]);
    }
}
