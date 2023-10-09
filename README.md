# personalwebsite
1. ddev composer create symfony/skeleton
2. ddev composer require twig
3. ddev composer require symfony/asset
4. ddev composer require symfony/form
5. ddev composer require symfony/security-csrf
6. ddev composer require symfony/validator
7. ddev composer require symfony/orm-pack
8. ddev composer require --dev symfony/maker-bundle

db:
1. ddev exec bin/console make:migration
2. ddev exec bin/console doctrine:migrations:migrate

go to db: 
1. ddev exec mariadb

SQL:
1. SHOW DATABASES;
2. USE db;
3. SHOW TABLES;
4. SELECT * FROM ???db_table???;
- Example: contact_entity
