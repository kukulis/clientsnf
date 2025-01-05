# Klientų sąrašas nenaudojant jokio freimworko ( nf = no freimwork )

## paleidimas

    git clone git@github.com:kukulis/clientsnf.git

    cd clientsnf

    composer install 

arba atsisiuntus iš getcomposer.org composer.phar

    php composer.phar install

Tuo atveju, kai skiriasi php versijos, tai prieš tai (prieš composer install) galima ištrinti  composer.lock.


    cd public
    php -S localhost:8888

Tada naršyklėje įvesti:

    http://localhost:8888

