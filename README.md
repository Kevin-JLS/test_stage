👋 Bonjour et bienvenue. 

Ce test a été réalisé avec la configuration suivante : 

- Symfony version : 5.4.11 
- PHP version : 8.1.2
- Base de données : MySQL

😌 Quelques instructions pour faciliter la mise en place du projet : 

Lorsque vous avez téléchargé le dossier, rendez vous dans le projet avec votre terminal puis : 

- Installez les dépendences pour l'environnement PHP avec composer install. Dans le cas du message d'erreur avec openssl extension il faudra décommenter (extension=php_openssl.so) sous Linux et Max et la ligne (extension=php_openssl.dll) sous Windows. 
- Installez les dépendences pour l'environnement JavaScript avec npm install.
- Téléchargez Yarn avec la commande : npm i -g yarn puis buildez le tout avec la commande : yarn encore dev
- Configurez votre base de données MySQL (id, mdp, dbname et version) puis créer la base de données avec php bin/console doctrine:database:create
- Exécuter la commande : php bin/console doctrine:migrations:migrate afin de charger dans votre base de données les données nécessaire au bon fonctionnement de l'application.
- Chargez les DataFixtures (php bin/console doctrine:datafixtures:load).
- Lancez un serveur local avec la commande : symfony serve. Pour télécharger la CLI de Symfony : https://github.com/symfony-cli/symfony-cli/releases/download/v5.4.12/symfony-cli_windows_386.zip (Pour que le nom d'applet soit disponible directement depuis le terminal, ajoutez l'exécutable de Symfony dans vos variables d'environnements). 

⚠️ La route /admin permet d'accéder au panel d'administration, ne la loupez pas !

Kevin JOLLIS