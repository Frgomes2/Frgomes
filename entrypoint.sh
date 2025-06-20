#!/bin/bash

# Usa a porta passada pela Railway (ou 8080 localmente)
PORT=${PORT:-8080}

# Atualiza Apache para escutar na porta correta
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf
echo "Listen ${PORT}" > /etc/apache2/ports.conf

# Inicia o Apache
exec apache2-foreground
