FROM php:8.2-apache

# Instala extensões necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev unzip git curl libzip-dev libicu-dev libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql intl mbstring zip

# Ativa mod_rewrite do Apache
RUN a2enmod rewrite

# Define a pasta pública como raiz do Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Altera o DocumentRoot no Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Copia o projeto
COPY . /var/www/html/

# Permissões corretas
RUN chown -R www-data:www-data /var/www/html/writable \
    && chmod -R 775 /var/www/html/writable

EXPOSE 80
