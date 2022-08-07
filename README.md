<h1> 👋 Bonjour et bienvenue </h1>

Ce test a été réalisé avec la configuration suivante : 

- Symfony version : 5.4.11 
- PHP version : 8.1.2
- Base de données : MySQL

<hr>

😌 Quelques instructions pour faciliter la mise en place du projet : 

Lorsque vous avez téléchargé le dossier, rendez vous dans le projet avec votre terminal puis : 

- Installez les dépendences pour l'environnement PHP avec <b>composer install</b>. Dans le cas du message d'erreur avec openssl extension il faudra décommenter la ligne (extension=php_openssl.so) sous Linux et Mac et la ligne (extension=php_openssl.dll) sous Windows dans votre fichier php.ini. 
- Installez les dépendences pour l'environnement JavaScript avec <b>npm install</b>.
- Téléchargez Yarn avec la commande : <b>npm i -g yarn</b> puis buildez le tout avec la commande : <b>yarn encore dev</b>
- Configurez votre base de données MySQL (id, mdp, dbname et version) puis créer la base de données avec <b>php bin/console doctrine:database:create</b>
- Exécuter la commande : <b>php bin/console doctrine:migrations:migrate</b> afin de charger dans votre base de données les données nécessaire au bon fonctionnement de l'application.
- Chargez les DataFixtures : <b>php bin/console doctrine:datafixtures:load</b>. 
- Lancez un serveur local avec la commande : <b>symfony serve </b>. 
Pour télécharger la CLI de Symfony : https://github.com/symfony-cli/symfony-cli/releases/download/v5.4.12/symfony-cli_windows_386.zip (Pour que le nom d'applet soit disponible directement depuis le terminal, ajoutez l'exécutable de Symfony dans vos variables d'environnements). 

<hr>

⚠️ La route /admin permet d'accéder au panel d'administration, ne la loupez pas !

<hr>

Kevin JOLLIS