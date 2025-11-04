<?php

namespace Database\Seeders;

use App\Models\Noticia;
use Illuminate\Database\Seeder;

/**
 * NoticiaSeeder - Popula a tabela de notícias
 * 
 * Cria notícias de exemplo usando a Factory (NoticiaFactory).
 * As factories geram dados falsos realistas usando a biblioteca Faker.
 */
class NoticiaSeeder extends Seeder
{
    /**
     * Popula a tabela noticias com dados de exemplo
     * 
     * IMPORTANTE PARA ALUNOS:
     * - factory() usa a NoticiaFactory para gerar dados falsos
     * - count(10) cria 10 notícias
     * - A factory já preenche automaticamente:
     *   - titulo e slug (gerados aleatoriamente)
     *   - resumo e conteudo (textos falsos)
     *   - tipo_noticia_id (tipo aleatório existente)
     *   - usuario_id (usuário aleatório existente)
     *   - publicado_em (80% publicadas, 20% rascunhos)
     */
    public function run(): void
    {
        // Cria 10 notícias usando a factory
        // A factory resolve automaticamente os relacionamentos
        Noticia::factory()->count(10)->create();
        
        // Para criar mais notícias, basta mudar o número:
        // Noticia::factory()->count(50)->create();  // Cria 50 notícias
    }
}
