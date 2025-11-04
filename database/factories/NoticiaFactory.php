<?php

namespace Database\Factories;

use App\Models\TipoNoticia;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * NoticiaFactory - Fábrica de dados falsos para notícias
 * 
 * As factories são usadas para gerar dados de teste realistas.
 * Utilizam a biblioteca Faker para criar textos, datas, etc.
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Noticia>
 */
class NoticiaFactory extends Factory
{
    /**
     * Define o estado padrão do model
     * 
     * Este método é chamado toda vez que factory()->create() é executado.
     * Retorna um array com os valores para cada campo da notícia.
     * 
     * IMPORTANTE PARA ALUNOS:
     * - $this->faker gera dados falsos (textos, números, datas aleatórias)
     * - random_int() gera números aleatórios
     * - Str::slug() converte texto para formato de URL
     * - optional(0.8) = 80% de chance de retornar valor, 20% retorna null
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Gera um título aleatório com 3 a 8 palavras
        $titulo = $this->faker->sentence(random_int(3, 8));
        
        // Busca um tipo de notícia aleatório existente no banco
        // Se não existir nenhum, cria um novo
        $tipoId = TipoNoticia::inRandomOrder()->value('id') 
                  ?? TipoNoticia::factory()->create()->id;
        
        // Busca um usuário aleatório existente no banco
        // Se não existir nenhum, cria um novo
        $usuarioId = Usuario::inRandomOrder()->value('id') 
                     ?? Usuario::factory()->create()->id;

        return [
            // Título gerado pelo Faker
            'titulo' => $titulo,
            
            // Slug baseado no título + 5 caracteres aleatórios (garante unicidade)
            'slug' => Str::slug($titulo) . '-' . Str::random(5),
            
            // Resumo: 80% terá resumo, 20% será null
            'resumo' => $this->faker->optional()->paragraph(),
            
            // Conteúdo: 3 a 7 parágrafos concatenados em uma string
            'conteudo' => $this->faker->paragraphs(random_int(3, 7), true),
            
            // Tipo da notícia (relacionamento)
            'tipo_noticia_id' => $tipoId,
            
            // Autor da notícia (relacionamento)
            'usuario_id' => $usuarioId,
            
            // Data de publicação:
            // - 80% (0.8) terão data entre 30 dias atrás e agora (publicadas)
            // - 20% serão null (rascunhos)
            'publicado_em' => $this->faker->optional(0.8)->dateTimeBetween('-30 days', 'now'),
            
            // Data de criação: entre 0 e 30 dias atrás
            'created_at' => now()->subDays(random_int(0, 30)),
            
            // Data de atualização: entre 0 e 5 dias atrás
            'updated_at' => now()->subDays(random_int(0, 5)),
        ];
    }
}
