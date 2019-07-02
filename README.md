# Phrase Analyse Web Application

## Projects setup with composer

1. First need to run below composer command to create project

composer create-project dilina/phrase

2. Change the server configuration to hit index.php

nginx config -

    location / {
        try_files $uri $uri/ /index.php?$args;
    }
    
.htaccess file has already added for apache servers.
