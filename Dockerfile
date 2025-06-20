FROM php:8.2-apache

# Ativa o mod_rewrite
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

# Substitui a porta padrão 80 pela variável de ambiente $PORT
RUN sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf \
 && echo "Listen ${PORT}" >> /etc/apache2/ports.conf

# Railway define a variável PORT automaticamente
ENV PORT=8080

# Comando final que inicia o Apache
CMD ["apache2-foreground"]
