# personalwebsite
ddev composer create symfony/skeleton
ddev composer require twig
ddev composer require symfony/form
ddev composer require symfony/security-csrf
ddev composer require symfony/validator
ddev composer require symfony/orm-pack
ddev composer require --dev symfony/maker-bundle

ddev exec bin/console make:migration
ddev exec bin/console doctrine:migrations:migrate
