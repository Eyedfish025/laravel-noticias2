
## 🧭 **Visão Geral**

O *Sounds Good* é uma **Single Page Application (SPA)** — ou seja, uma página contínua, rolável, dividida por **seções calmas e progressivas**, que o usuário pode acessar **com ou sem login**.

O design é feito para **reduzir estímulos visuais**, **diminuir a ansiedade** e **guiar o foco gradualmente**, sempre oferecendo **controle, previsibilidade e feedback**.

---

## 🧱 **Wireframe Detalhado**

### 🏠 **1. Cabeçalho (fixo no topo)**

**Função:** fornecer navegação mínima e senso de segurança.

**Elementos:**

* 🪷 Logo “Sounds Good” (esquerda, tamanho médio)
* 🔘 Botão “Entrar” / “Modo Visitante” (direita)
* ⚙️ Ícone de Configurações (canto superior direito, abre um modal)
* 🌙 Ícone de alternar Tema (claro/escuro)

**Feedback visual:**

* Ao rolar, o cabeçalho reduz de tamanho e ganha leve sombra (feedback de posição)
* Ícones com animação suave (hover → brilho leve)

---

### 💬 **2. Seção de Boas-vindas**

**Objetivo:** tranquilizar e orientar o usuário.

**Layout:**

* Centralizado, com espaçamento generoso e fonte grande.
* Texto:

  > “Tudo bem respirar um pouco. Vamos cuidar do seu momento.”
* Botão grande **“Começar Agora”** → rola suavemente até a primeira seção.

**Design:**

* Fundo com **gradiente suave** (azul-claro → lilás pastel)
* Microanimação lenta no fundo (ex: ondas leves ou partículas translúcidas)

---

### 🌬️ **3. Seção: Respiração Guiada**

**Layout dividido:**

* Lado esquerdo: **círculo animado** que expande e contrai no ritmo da respiração.
* Lado direito:

  * Botão grande **“Iniciar Respiração”**
  * Controle de ritmo: “Lento | Médio | Rápido”
  * Botão 🔈 para ativar/desativar o som da respiração

**Feedback visual:**

* Quando ativo → o círculo pulsa com luz suave
* Quando pausado → ícone muda e o círculo congela lentamente

**Texto leve na parte inferior:**

> “Inspire... (3s) Expire... (4s)”

---

### 🎧 **4. Seção: Sons Calmantes**

**Layout:**

* Título: “Escolha um som que te acalma”
* Grade de 2 colunas (para desktop) ou carrossel (no celular):

  * 🌧️ Chuva suave
  * 🌊 Mar
  * 🔥 Fogueira
  * 🌲 Floresta
  * 🎵 Ambiente tranquilo
  * 💗 Batimentos suaves

**Interação:**

* Clique → o botão fica com contorno colorido (ativo)
* Pode ativar mais de um som
* Controle global de volume no topo da seção

**Extras (usuário logado):**

* “+ Adicionar meu som” (upload ou link de áudio)

---

### 🤸 **5. Seção: Alongamentos**

**Layout:**

* Título: “Movimente-se com leveza”
... (74 linhas)
Recolher
message.txt
5 KB
LANDING.BLADE.PHP
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundsGood - Sons para Tranquilidade</title>... (20 KB restante(s))
Expandir
message.txt
70 KB
WELCOME.BLADE.PHP
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
... (33 KB restante(s))
Expandir
message.txt
83 KB
STYLE.CSS
/* ============================================
   RESET E CONFIGURAÇÕES GERAIS
   ============================================ */

* {
    margin: 0;
Expandir
message.txt
14 KB
Imagem
Peixindozoi1 — 18:53
https://prod.liveshare.vsengsaas.visualstudio.com/join?DAD0E94D427F4E2080CA900FCC10FBB97360
Visual Studio Code for the Web
Build with Visual Studio Code, anywhere, anytime, entirely in your browser.
﻿
## 🧭 **Visão Geral**

O *Sounds Good* é uma **Single Page Application (SPA)** — ou seja, uma página contínua, rolável, dividida por **seções calmas e progressivas**, que o usuário pode acessar **com ou sem login**.

O design é feito para **reduzir estímulos visuais**, **diminuir a ansiedade** e **guiar o foco gradualmente**, sempre oferecendo **controle, previsibilidade e feedback**.

---

## 🧱 **Wireframe Detalhado**

### 🏠 **1. Cabeçalho (fixo no topo)**

**Função:** fornecer navegação mínima e senso de segurança.

**Elementos:**

* 🪷 Logo “Sounds Good” (esquerda, tamanho médio)
* 🔘 Botão “Entrar” / “Modo Visitante” (direita)
* ⚙️ Ícone de Configurações (canto superior direito, abre um modal)
* 🌙 Ícone de alternar Tema (claro/escuro)

**Feedback visual:**

* Ao rolar, o cabeçalho reduz de tamanho e ganha leve sombra (feedback de posição)
* Ícones com animação suave (hover → brilho leve)

---

### 💬 **2. Seção de Boas-vindas**

**Objetivo:** tranquilizar e orientar o usuário.

**Layout:**

* Centralizado, com espaçamento generoso e fonte grande.
* Texto:

  > “Tudo bem respirar um pouco. Vamos cuidar do seu momento.”
* Botão grande **“Começar Agora”** → rola suavemente até a primeira seção.

**Design:**

* Fundo com **gradiente suave** (azul-claro → lilás pastel)
* Microanimação lenta no fundo (ex: ondas leves ou partículas translúcidas)

---

### 🌬️ **3. Seção: Respiração Guiada**

**Layout dividido:**

* Lado esquerdo: **círculo animado** que expande e contrai no ritmo da respiração.
* Lado direito:

  * Botão grande **“Iniciar Respiração”**
  * Controle de ritmo: “Lento | Médio | Rápido”
  * Botão 🔈 para ativar/desativar o som da respiração

**Feedback visual:**

* Quando ativo → o círculo pulsa com luz suave
* Quando pausado → ícone muda e o círculo congela lentamente

**Texto leve na parte inferior:**

> “Inspire... (3s) Expire... (4s)”

---

### 🎧 **4. Seção: Sons Calmantes**

**Layout:**

* Título: “Escolha um som que te acalma”
* Grade de 2 colunas (para desktop) ou carrossel (no celular):

  * 🌧️ Chuva suave
  * 🌊 Mar
  * 🔥 Fogueira
  * 🌲 Floresta
  * 🎵 Ambiente tranquilo
  * 💗 Batimentos suaves

**Interação:**

* Clique → o botão fica com contorno colorido (ativo)
* Pode ativar mais de um som
* Controle global de volume no topo da seção

**Extras (usuário logado):**

* “+ Adicionar meu som” (upload ou link de áudio)

---

### 🤸 **5. Seção: Alongamentos**

**Layout:**

* Título: “Movimente-se com leveza”
* Mini cards horizontais:

  * 🧍 Alongamento de pescoço
  * 🦵 Alongamento de pernas
  * 🤲 Alongamento de mãos
* Ao clicar → abre mini guia com animação leve e áudio opcional.

**Visual:**

* Ícones grandes e fundos com leve sombra, estilo “cartão calmo”
* Cada card muda de cor levemente ao ser selecionado.

---

### 🧠 **6. Seção: Técnicas de Regulação**

**Exemplos:**

* 🌈 Técnica 5-4-3-2-1
* ✋ Pressionar mãos e soltar lentamente
* 🔢 Contagem regressiva 10-0

**Ao clicar:**

* Mostra instrução simples no centro com áudio suave opcional.
* Opção “Próxima técnica” para alternar suavemente.

---

### ⚙️ **7. Configurações (Modal Flutuante)**

**Opções:**

* 🎨 Tema: Claro | Escuro | Contraste Suave
* 🌍 Idioma: PT-BR | EN
* 🔈 Volume padrão
* 👤 Preferências de privacidade
* 💾 Sons personalizados (somente logado)

**Visual:**

* Fundo semitransparente
* Transição suave (fade in/out)

---

### 🚨 **8. Modo Crise**

**Acesso:** botão fixo no canto inferior direito (“⚡ Estou em Crise”).

**Ao ativar:**

* Tela escurece, interface simplificada:

  * Fundo azul-marinho opaco
  * Som automático (ex: batimentos ou chuva suave)
  * Texto central:

    > “Está tudo bem. Respire. Eu estou aqui com você.”
  * Botão grande: “Sair do modo crise”

**Feedback:**

* Sons e luzes reduzem gradualmente, evitando sobressaltos.

---

## 🧩 **Navegação e Feedback Geral**

* Rolagem vertical natural (com ancoragem por seções).
* Transições suaves de 0.3–0.5s (fade + slide).
* Cada ação do usuário deve gerar **feedback visual leve** (mudança de cor, texto, ou som).
* Modo visitante sempre disponível e visível.
