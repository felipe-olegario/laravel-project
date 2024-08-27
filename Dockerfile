# Use uma imagem oficial do PHP com Apache
FROM php:8.3-apache

# Instalar extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Habilitar mod_rewrite, necessário para o Laravel
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar o diretório de trabalho
WORKDIR /var/www/html

# Copiar os arquivos do projeto para o diretório de trabalho
COPY . .

# Instalar as dependências do PHP
RUN composer install

# Configurar o Apache para usar o diretório 'public' como root
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

RUN docker-php-ext-install pdo pdo_mysql

# Expor a porta 80
EXPOSE 80

# Definir o comando para iniciar o Apache
CMD ["apache2-foreground"]
