# Imagem base com PHP 8.2 CLI
FROM php:8.2-cli

# Atualiza e instala dependências de sistema
RUN apt-get update && apt-get install -y \
    gnupg2 \
    unzip \
    git \
    curl \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    nano \
    netcat-openbsd \
    libssl-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libpq-dev \
    libgmp-dev \
    libkrb5-dev \
    apt-transport-https \
    software-properties-common \
    wget \
    lsb-release

# Adiciona a chave GPG oficial da Microsoft (no formato esperado)
RUN curl -sSL https://packages.microsoft.com/keys/microsoft.asc \
    | gpg --dearmor > /usr/share/keyrings/microsoft-prod.gpg

# Adiciona o repositório da Microsoft com suporte a Debian 12 (Bookworm)
RUN echo "deb [arch=amd64 signed-by=/usr/share/keyrings/microsoft-prod.gpg] https://packages.microsoft.com/debian/12/prod bookworm main" \
    > /etc/apt/sources.list.d/microsoft-prod.list

# Atualiza e instala o driver e ferramentas SQL Server
RUN apt-get update && ACCEPT_EULA=Y apt-get install -y \
    msodbcsql18 \
    mssql-tools18 \
    unixodbc-dev && \
    echo 'export PATH=\"$PATH:/opt/mssql-tools18/bin\"' >> ~/.bashrc

# Instala extensões PHP (inclui sqlsrv via PECL)
RUN pecl install pdo_sqlsrv sqlsrv \
    && docker-php-ext-enable pdo_sqlsrv sqlsrv \
    && docker-php-ext-install \
    bcmath \
    pdo \
    pcntl \
    intl \
    zip \
    gd \
    curl \
    mbstring \
    exif \
    opcache

# (Opcional) Instala Xdebug para debug com VS Code
# RUN pecl install xdebug \
#     && docker-php-ext-enable xdebug

# Instala Composer (multi-stage)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala Node.js + npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm

# Define diretório de trabalho
WORKDIR /var/www

# Expõe as portas usadas pelo Laravel (serve) e Vite
EXPOSE 8000 5173

# Comando padrão ao rodar o container (customizável via docker-compose)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
