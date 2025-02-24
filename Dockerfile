# Utilise l'image PHP avec Apache
FROM php:8.0-apache

# Copie le contenu de votre répertoire local vers le répertoire d'Apache
COPY . /var/www/html/

# Expose le port 80
EXPOSE 80