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

# ⬇️ ADICIONA ESTA LINHA AQUI
RUN composer install --no-dev --optimize-autoloader

# Permissões e configurações para Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Ativa reescrita do Apache
RUN a2enmod rewrite

# Define o diretório correto para servir
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Altera o VirtualHost para usar o novo root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf && \
    echo "<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n\
DirectoryIndex index.php" >> /etc/apache2/apache2.conf

# Porta exposta pelo Apache
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
