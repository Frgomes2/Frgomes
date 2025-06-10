FROM php:8.2-apache

# Instala dependências do sistema e extensões
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip zip git curl \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Define o diretório onde está o index.php
WORKDIR /var/www/html/public

# Copia todos os arquivos do projeto
COPY . /var/www/html/

# Corrige permissões
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão
EXPOSE 80
