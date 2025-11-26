FROM php:8.2-apache

# Habilita mod_rewrite do Apache
RUN a2enmod rewrite

# Copia os arquivos da pasta tracevia-page para o Apache
COPY tracevia-page/ /var/www/html/

# Define permissões corretas
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta 80
EXPOSE 80

# Inicia o Apache
CMD ["apache2-foreground"]