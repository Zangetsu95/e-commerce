
# Shinsekai Manga(English version below)

Bienvenue dans mon projet de fin d'étude : un site e-commerce sur le thème des mangas


## Features

- Une gestion de son site pour l'admin
- Créer des produits,catégories,gérer les commandes
- Un espce client pour voir ses commandes,payer des produits,télécharger une facture
- Une liste de souhait


## Installer le projet

 * Installer le projet sur votre machine en faisant un git clone

 * assurez vous d'avoir le bon chemin dans votre terminal et après : php composer install

  -> Si vous n'avez pas composer, allez sur le site(https://getcomposer.org/download/) et télécharger la version .exe

  * le fichier .env.example doit etre .env(cp .env.example .env)

  * Configurer la DB

  * configurer le fichier env pour utiliser mailtrap

    DB_USERNAME should be root
    DB_PASSWORD should be root
    DB_DATABASE should be ecommerce
    DB_PORT should be 3306
    DB_HOST should be 127.0.0.1 or localhost

* Importer ce fichier <a href="https://drive.google.com/file/d/1wHcT92YbDdbkYtBnZny4Wrj43C408Dqm/view?usp=sharing" target="blank"> sql </a>


* php artisan serve et voila ! 
