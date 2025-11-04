<?php

namespace Database\Seeders;

use App\Models\TipoNoticia;
use Illuminate\Database\Seeder;

/**
 * TipoNoticiaSeeder - Popula a tabela de tipos de notícias
 * 
 * Cria as categorias/tipos iniciais de notícias do portal.
 * Estas categorias serão usadas para classificar as notícias.
 */
class TipoNoticiaSeeder extends Seeder
{
    /**
     * Popula a tabela tipos_noticias com categorias iniciais
     * 
     * IMPORTANTE PARA ALUNOS:
     * - Str::slug() converte texto para formato de URL (remove acentos, espaços, etc)
     * - Ex: "Política" vira "politica", "Esportes" vira "esportes"
     */
    public function run(): void
    {
        // Array com os tipos de notícias que serão criados
        $tipos = ['Política', 'Esportes', 'Cultura', 'Economia', 'Tecnologia'];

        // Loop: para cada tipo no array, cria um registro no banco
        foreach ($tipos as $tipo) {
            TipoNoticia::create([
                'nome' => $tipo,                              // Nome original
                'slug' => \Illuminate\Support\Str::slug($tipo), // Versão para URL
            ]);
        }
        
        // Resultado final no banco:
        // Política   -> politica
        // Esportes   -> esportes
        // Cultura    -> cultura
        // Economia   -> economia
        // Tecnologia -> tecnologia
    }
}
