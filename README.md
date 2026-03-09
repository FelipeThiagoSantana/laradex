# LaraDex

LaraDex é uma projeto em **Laravel 12** que consome a API do **PokeAPI** para listar e exibir informações de pokémons.

# Tecnologias Utilizadas

- **Laravel 12**
- **Livewire 3**
- **Flux**
- **Tailwind CSS**
- **PokeAPI**
- **Font Awesome**

## Funcionalidades

- Listagem de pokémons
- Detalhes do pokémon
- Busca de pokémons
- Filtro de pokémons
- Autenticação
- Roles

## Como rodar

git clone <https://github.com/FelipeThiagoSantana/laradex.git>

Entre na pasta do projeto (Linux):

```bash

composer install --no-scripts

cp .env.example .env

sudo php artisan key:generate

sudo php artisan route:cache

sudo php artisan config:cache

composer update

sudo chmod -R 775 storage

sudo chmod -R 775 bootstrap/cache

php artisan migrate --seed

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
