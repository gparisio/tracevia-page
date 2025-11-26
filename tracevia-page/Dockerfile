FROM php:8.2-apache

# Habilita mod_rewrite do Apache (caso você use URLs amigáveis)
RUN a2enmod rewrite

# Copia todos os arquivos do projeto para a pasta pública do Apache
COPY . /var/www/html/

# Define permissões corretas
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta 80
EXPOSE 80

# Inicia o Apache
CMD ["apache2-foreground"]