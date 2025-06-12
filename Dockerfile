FROM php:8.2-apache

# Ativa o mod_rewrite (necessário para o CI3 funcionar com URLs amigáveis)
RUN a2enmod rewrite

# Copia os arquivos do projeto pro diretório padrão do Apache
COPY . /var/www/html/

# Define permissões (garante que o Apache pode ler tudo)
RUN chown -R www-data:www-data /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Expor a porta que o Railway usa
EXPOSE 80
chmod -R 755 application/controllers
