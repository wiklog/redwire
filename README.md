<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# README
## Mise en Place
### Importation du projet

Dans le dossier de votre choix, vous allez ouvrir git bash et y insérer la commande :

    git clone https://github.com/GuiguianMateo/Laravel-10-Blanc.git
    
### Téléchargement des fichiers suplémentaires

Après avoir installé votre project, il vous sufit de l'ouvrir depuis un IDE et d'y inséré dans un terminal :

    composer install

### Connexion

A la racine du projet, si un fichier .env est déjà créé, ouvrez le. Sinon vous allez le crée manuelement ".env" situer dans votre-répertoire/redwire
Vous copierez l'interrieur du fichier .env.exemple (à coter du fichier .env)
Et vous le collerez dans le fichier .env

Ensuite vous allez y modifier :

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=redwire
    DB_USERNAME=root
    DB_PASSWORD=

### Terminal
Dans un tereminal de votre IDE vous allez pouvoir lancez ces commandes :

    php artisan migrate

Si un message vous demande de créé la base de donnée, vous selectionnez "yes"

### Tinker

Ensuite nous allons entrez dans Tinker

    php artisan tinker

Créeation des utilisateurs

    User::create(["name"=> "Admin","email"=>"admin@gmail.com","password"=>bcrypt("adminadmin")]);
    User::create(["name"=> "User","email"=>"user@gmail.com","password"=>bcrypt("useruser")]);

Ensuite la création des roles et leurs abilities

    Bouncer::allow('admin')->to('motif-create');
    Bouncer::allow('admin')->to('motif-show');
    Bouncer::allow('admin')->to('motif-edit');
    Bouncer::allow('admin')->to('motif-delete');
    
    Bouncer::allow('admin')->to('absence-create');
    Bouncer::allow('admin')->to('absence-show');
    Bouncer::allow('admin')->to('absence-edit');
    Bouncer::allow('admin')->to('absence-delete');
    
    Bouncer::allow('admin')->to('user-create');
    Bouncer::allow('admin')->to('user-show');
    Bouncer::allow('admin')->to('user-edit');
    Bouncer::allow('admin')->to('user-delete');
    
    Bouncer::allow('salarie')->to('absence-create');
    Bouncer::allow('salarie')->to('absence-show');
    Bouncer::allow('salarie')->to('user-show');

Puis assigner les roles aux utilisateurs

    $user = User::find(1);
    Bouncer::assign('admin')->to($user);

    $user = User::find(2);
    Bouncer::assign('salarie')->to($user);

### Base de donnée

Vous allez grâce à la commande suivante, peupler votre base de donnée

   php artisan db:seed

## Lancement du projet  
Pour finaliserla mise en place du projet, vous allez activez l'application

    php artisan serve

Ainsi que la commande suivante pour faire fonctioner les scrips JS 

    npm run dev

### Connexion au comptes
Connectez-vous avec le compte que vous souaiter

    admin@gmail.com
    adminadmin

ou

    user@gmail.com
    useruser

