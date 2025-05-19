FROM php:8.2-cli

# Etapa 1 - Dependências
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
    lsb-release \
    gcc \
    g++ \
    make \
    autoconf \
    unixodbc-dev \
    apt-utils \
    libodbc1

# Etapa 2 - Instalar drivers da Microsoft
RUN curl -sSL https://packages.microsoft.com/keys/microsoft.asc | gpg --dearmor > /usr/share/keyrings/microsoft-prod.gpg && \
    echo "deb [arch=amd64 signed-by=/usr/share/keyrings/microsoft-prod.gpg] https://packages.microsoft.com/debian/12/prod bookworm main" > /etc/apt/sources.list.d/microsoft-prod.list

RUN apt-get update && ACCEPT_EULA=Y apt-get install -y \
    msodbcsql18 \
    mssql-tools18

ENV PATH="${PATH}:/opt/mssql-tools18/bin"

# Etapa 3 - Instalar extensões PHP nativas primeiro (incluindo pdo_mysql)
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    bcmath \
    pcntl \
    intl \
    zip \
    gd \
    curl \
    mbstring \
    exif \
    opcache

# Etapa 4 - Instalar sqlsrv + pdo_sqlsrv
RUN pecl install pdo_sqlsrv sqlsrv && \
    docker-php-ext-enable pdo_sqlsrv sqlsrv

# Etapa 5 - Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Etapa 6 - Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm

WORKDIR /var/www

EXPOSE 8000 5173

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
