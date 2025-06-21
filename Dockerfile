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

# Define variável de ambiente global (production para Railway)
ENV ENV=production

# Script de entrada customizado
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expor a porta (Railway ignora, mas bom para testes locais)
EXPOSE 8080

CMD ["/entrypoint.sh"]
