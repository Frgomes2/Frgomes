FROM php:8.2-apache

# Instala extensões e dependências necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip zip git curl \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Ativa mod_rewrite para o CodeIgniter
RUN a2enmod rewrite

# Copia os arquivos do projeto
COPY . /var/www/html/

# Define permissões corretas
RUN chown -R www-data:www-data /var/www/html

# Define diretório público como raiz do Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Atualiza o Apache para usar o novo DocumentRoot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Expõe a porta padrão
EXPOSE 80
