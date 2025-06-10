FROM php:8.2-apache

# Instala extensões para PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Ativa o módulo rewrite do Apache (necessário pro CodeIgniter)
RUN a2enmod rewrite

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia todos os arquivos para o container
COPY . /var/www/html/

# Ajusta permissões para o Apache acessar os arquivos
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão HTTP (usada pelo Railway)
EXPOSE 80
