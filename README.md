# sym5.2

create env.local with sym52 MariaDB database

## Import DB
    php bin/console doctrine:mapping:import App\\Entity annotation --path=src/Entity

puis générer les getters et setters

    php bin/console make:entity --regenerate App\Entity\User
    
    php bin/console make:entity --regenerate App\Entity\Section

    php bin/console make:entity --regenerate App\Entity\Role

    php bin/console make:entity --regenerate App\Entity\Message