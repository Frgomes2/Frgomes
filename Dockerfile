FROM php:8.2-apache

# Ativa o mod_rewrite
RUN a2enmod rewrite

# Copia os arquivos do projeto
COPY . /var/www/html/

# Permissões
RUN chown -R www-data:www-data /var/www/html

# Habilita AllowOverride All no Apache (essencial!)
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Define diretório de trabalho
WORKDIR /var/www/html

# Expor porta padrão
EXPOSE 80
