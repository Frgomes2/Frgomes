FROM php:8.2-apache

# Instala dependências do sistema necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    zip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Ativa mod_rewrite do Apache (necessário pro CI4 funcionar)
RUN a2enmod rewrite

# Define diretório do projeto
WORKDIR /var/www/html

# Copia todos os arquivos
COPY . /var/www/html/

# Corrige permissões
RUN chown -R www-data:www-data /var/www/html
