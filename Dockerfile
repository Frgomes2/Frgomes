FROM php:8.2-apache

# Instala extensões e dependências necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev unzip zip git curl \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Ativa o mod_rewrite para URLs amigáveis
RUN a2enmod rewrite

# Define o DocumentRoot corretamente para a pasta public/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Atualiza o virtualhost com o novo DocumentRoot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Copia o projeto inteiro para o container
COPY . /var/www/html/

# Define permissões corretas no diretório writable
RUN chown -R www-data:www-data /var/www/html/writable \
    && chmod -R 775 /var/www/html/writable

EXPOSE 80
