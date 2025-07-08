FROM php:8.1-apache

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia o código do Laravel para o container
COPY . /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Permissões e configurações para Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Ativa reescrita do Apache
RUN a2enmod rewrite

# Porta exposta pelo Apache
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
