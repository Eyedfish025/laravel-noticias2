# Prompt / Instruções para configurar o projeto dentro do devcontainer

Este arquivo contém o "prompt" completo e autoexplicativo para executar o que planejamos: criar um projeto didático em Laravel (Portal de Notícias) usando PHP 8.4, Laravel 12, MySQL 8.x, sem Vite/Node, com nomes e comentários em Português-BR.

Use este arquivo caso você reabra o devcontainer e perca o histórico do chat — copie e cole os comandos conforme indicado ou siga as seções passo a passo.

---

Resumo do objetivo
- Projeto: portal-de-noticias (simples e didático)
- Tecnologias: PHP 8.4, Laravel 12, Composer 2, MySQL 8.x
- Organização: área pública (lista de notícias ordenada por updated_at) e área administrativa (`/admin`) com CRUD de `usuarios`, `tipos_noticias` e `noticias`.
- Convenções: nomes de classes, tabelas e variáveis em Português-BR: `Usuario`, `TipoNoticia`, `Noticia`, tabelas `usuarios`, `tipos_noticias`, `noticias`.
- Não usar Breeze nem Vite. Assets simples em `public/css`, `public/js`, `public/img`.

Configurações do devcontainer (já criadas)
- Arquivos criados em `.devcontainer/`:
  - `devcontainer.json`
  - `docker-compose.yml` (serviços `workspace` e `db` - MySQL 8.0)
  - `Dockerfile` (PHP 8.4, extensões básicas, Composer instalado)

Credenciais padrão do banco (definidas no `docker-compose.yml`)
- host: `db`
- database: `laravel_news`
- usuário: `laravel`
- senha: `laravel`
- root: `rootpassword`

Passo-a-passo (no terminal dentro do container `workspace`)

1) Criar o projeto Laravel (se você ainda não tiver o código criado)

```bash
# estando na pasta /workspace/laravel-noticias
composer create-project laravel/laravel:^12 .
```

Obs: se já clonou um repositório com o código, em vez disso rode `composer install`.

2) Ajustar `.env` para conectar ao MySQL do devcontainer

Edite o arquivo `.env` (ou copie `.env.example`) e defina as variáveis de BD:

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel_news
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

3) Gerar chave da aplicação e instalar dependências

```bash
composer install
php artisan key:generate
```

4) Criar modelo `Usuario` (usaremos autenticação didática)

```bash
php artisan make:model Usuario -m
```

- Abra a migration criada (`database/migrations/xxxx_create_usuarios_table.php`) e crie colunas:
  - `name` (string)
  - `email` (string, unique)
  - `password` (string)
  - `is_admin` (boolean, default false)
  - timestamps

- No arquivo `config/auth.php`, ajuste o provider `users` para usar `App\Models\Usuario::class`.

5) Criar `TipoNoticia` e `Noticia` (migrations, modelo e factory)

```bash
php artisan make:model TipoNoticia -m
php artisan make:model Noticia -m -f
```

- Em `tipos_noticias` migration: `nome`, `slug` (único), timestamps.
- Em `noticias` migration: `titulo`, `slug` (único), `resumo` (text, nullable), `conteudo` (longText), `tipo_noticia_id` (foreign), `usuario_id` (foreign), `publicado_em` (timestamp nullable), timestamps.

6) Criar seeders básicos

```bash
php artisan make:seeder UsuarioSeeder
php artisan make:seeder TipoNoticiaSeeder
php artisan make:seeder NoticiaSeeder
```

- No `UsuarioSeeder`, crie um usuário admin didático:

```php
// Exemplo em PHP (UsuarioSeeder)
Usuario::create([
  'name' => 'Administrador',
  'email' => 'admin@exemplo.com',
  'password' => bcrypt('password'),
  'is_admin' => true,
]);
```

- No `TipoNoticiaSeeder`, insira tipos como `Política`, `Esportes`, `Cultura`.
- No `NoticiaSeeder`, use a factory para criar ~10 notícias com `updated_at` variados (para ordenação didática).

Não se esqueça de registrar os seeders em `DatabaseSeeder`.

7) Criar middleware `EhAdmin` e registrá-lo

```bash
php artisan make:middleware EhAdmin
```

Implementação (exemplo):

```php
public function handle($request, Closure $next)
{
    if (! $request->user() || ! $request->user()->is_admin) {
        abort(403, 'Acesso negado: usuário não é administrador.');
    }
    return $next($request);
}
```

- Registrar em `app/Http/Kernel.php` como `'eh.admin' => \App\Http\Middleware\EhAdmin::class`.

8) Criar controllers didáticos

Exemplos:

```bash
php artisan make:controller PublicoController
php artisan make:controller Admin/NoticiaController --resource
php artisan make:controller Admin/TipoNoticiaController --resource
php artisan make:controller Admin/UsuarioController --resource
```

- `PublicoController@index` deve listar notícias publicadas (whereNotNull('publicado_em')) ordenadas por `updated_at` desc e paginar.
- `PublicoController@show` mostra detalhe por `slug`.
- Controllers admin: CRUD simples usando `$request->validate([...])` e redirecionamentos com mensagens de sessão.

9) Rotas (arquivo `routes/web.php`) — nomes em PT-BR

```php
// PÚBLICO
Route::get('/', [PublicoController::class, 'index'])->name('home');
Route::get('/noticia/{slug}', [PublicoController::class, 'show'])->name('noticia.show');

// AUTENTICAÇÃO (simples — criar controllers em Auth/)
Route::get('login', [Auth\LoginController::class, 'mostrarForm'])->name('login');
Route::post('login', [Auth\LoginController::class, 'login']);
Route::post('logout', [Auth\LogoutController::class, 'logout'])->name('logout');

// ADMIN
Route::middleware(['auth','eh.admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('tipos-noticia', Admin\TipoNoticiaController::class);
    Route::resource('noticias', Admin\NoticiaController::class);
    Route::resource('usuarios', Admin\UsuarioController::class)->except(['show']);
});
```

10) Views Blade e assets simples

- Layout base em `resources/views/layouts/app.blade.php` com `{{ asset('css/app.css') }}` e `{{ asset('js/app.js') }}`.
- Páginas públicas em `resources/views/publico/*` e administração em `resources/views/admin/*`.
- Assets: coloque `public/css/app.css`, `public/js/app.js`, `public/img/*`.

Exemplo de uso de assets no Blade:

```blade
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script>
<img src="{{ asset('img/logo.png') }}" alt="Logo">
```

11) Executar migrations e seeders

```bash
php artisan migrate:fresh --seed
```

12) Iniciar servidor de desenvolvimento (para testes locais)

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

A aplicação ficará disponível em `http://localhost:8000` (quando os containers estiverem rodando e a porta mapeada).

Credenciais de exemplo (seeders)
- email: `admin@exemplo.com`
- senha: `password`

Verificações rápidas após rodar o setup
- Acesse a página inicial e confirme que a listagem de notícias aparece e está ordenada por `updated_at`.
- Faça login com o usuário admin e acesse `/admin`.
- Crie/edite/exclua uma notícia para confirmar o CRUD.

Notas pedagógicas (para os alunos)
- Explique sempre por que usamos `updated_at` para ordem: reflete a última modificação e é útil para notícias atualizadas.
- Mostrar diferença entre assets em `public/` (simples) e um pipeline (Vite) — justificativa: optamos por simplicidade para primeiros períodos.
- Comentários em código devem estar em Português-BR.

Se quiser que eu gere automaticamente esse scaffold (migrations, models, controllers, views e seeders) aqui no repositório, responda neste ambiente (eu posso criar os arquivos por você). Caso prefira executar manualmente com os alunos, siga este prompt passo-a-passo dentro do devcontainer.

---

Arquivo criado por instrução do professor — mantido para referência dentro do devcontainer.
