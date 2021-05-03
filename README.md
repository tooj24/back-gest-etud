# requirements
php >= 7.2.5 && composer

# configuration bdd
remplacer les configurations db_user, db_password, serverVersion

# migration
php bin/console d:d:c
php bin/console d:m:m

# importation des données
importer le fichier student.sql dans la bdd 'student'

# lancer le serveur
php -S localhost:8000 -t public