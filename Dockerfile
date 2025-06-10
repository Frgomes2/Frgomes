FROM php:8.2-apache

# Instala dependências
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip unzip git curl \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Habilita mod_rewrite do Apache
RUN a2enmod rewrite

# Define a pasta pública como diretório de trabalho
WORKDIR /var/www/html/public

# Copia o projeto todo
COPY . /var/www/html/

# Corrige permissões
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta para o Railway saber qual usar
EXPOSE 80
