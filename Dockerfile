FROM php:8.2-apache

# Instala dependências para PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Ativa mod_rewrite
RUN a2enmod rewrite

# Copia os arquivos do projeto
COPY . /var/www/html/

# Substitui o .htaccess_prod como o oficial
RUN cp /var/www/html/.htaccess_prod /var/www/html/.htaccess

# Permissões
RUN chown -R www-data:www-data /var/www/html

# Habilita AllowOverride All no Apache
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Define diretório de trabalho
WORKDIR /var/www/html

# Define o ambiente como produção para Railway
ENV ENV=production

# Entrypoint customizado (se precisar executar algo ao subir)
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8080

CMD ["/entrypoint.sh"]
