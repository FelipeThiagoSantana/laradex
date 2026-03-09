# LaraDex

LaraDex é uma projeto em **Laravel 12** que consome a API do **PokeAPI** para listar e exibir informações de pokémons.

# Tecnologias Utilizadas

- **Laravel 12**
- **Livewire 3**
- **Flux**
- **Tailwind CSS**
- **PokeAPI**
- **Font Awesome**
- **MySQL** -**Node.js v20+ (Para o Vite)**

## Funcionalidades

- Listagem de pokémons
- Detalhes do pokémon
- Busca de pokémons
- Filtro de pokémons
- Autenticação
- Roles

## Como rodar (Linux)

git clone <https://github.com/FelipeThiagoSantana/laradex.git>

Entre na pasta do projeto e rode os comandos abaixo:

```bash
-- Instalação das dependências --
composer install --no-scripts

-- Criação do arquivo .env --
cp .env.example .env

-- Geração da chave da aplicação --
sudo php artisan key:generate

-- Cache de rotas --
sudo php artisan route:cache

-- Cache de configuração --
sudo php artisan config:cache

-- Atualização das dependências --
composer update

-- Permissões de escrita --
sudo chmod -R 775 storage

sudo chmod -R 775 bootstrap/cache

-- Migração do banco de dados --
php artisan migrate --seed

-- Instalação das dependências do node --
npm install

-- Compilação dos assets --
npm run build

-- Servidor local --
php artisan serve


```

## Criação do Banco de Dados

```bash
sudo apt update

sudo apt install mysql-server

mysql -u root -p

-- Para criação de um novo banco --
CREATE DATABASE laradex CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

--Para criação de um novo usuario--

CREATE USER 'laradex_user'@'localhost' IDENTIFIED BY 'l@radex!';

GRANT ALL PRIVILEGES ON laradex.* TO 'laradex_user'@'localhost';
FLUSH PRIVILEGES;


```

## Usuários de teste

- **Email:** [admin@example.com]
- **Senha:** password

- **Email:** [editor@example.com]
- **Senha:** password

- **Email:** [viewer@example.com]
- **Senha:** password
