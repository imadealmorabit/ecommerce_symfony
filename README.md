
## Installation

 * **Récupérer le code**

Via Git, en clonant ce dépôt ;

 * **Définir vos paramètres d'application**

Pour qu'on se partage pas tous nos mots de passe, le fichier app/config/parameters.yml est ignoré dans ce dépôt. A la place, vous avez le fichier parameters.yml.dist que vous devez renommer (enlevez le .dist) et modifier.

 * **Télécharger les vendors**

Avec Composer :

php composer.phar install

 * **Créez la base de données**

php bin/console doctrine:database:create
Puis créez les tables correspondantes au schéma Doctrine :

php bin/console doctrine:schema:update --dump-sql
php bin/console doctrine:schema:update --force
Enfin, éventuellement, ajoutez les fixtures :

php bin/console doctrine:fixtures:load

 * **Publiez les assets**

Publiez les assets dans le répertoire web :

php bin/console assets:install web

**Et profitez !**





