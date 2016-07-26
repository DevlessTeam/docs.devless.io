**Requiments**
* Database (mysql, postgres, sqlsrv etc..)
* An HTTP server
* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* composer

**Installation procedure**
* Clone the repo (git clone https://github.com/DevlessTeam/DV-PHP-CORE.git) 
* cd ../DV-PHP-CORE
* run composer install to grab dependecies
* copy .env.example to .env and update the database options 
* run migrations with php artisan migrate
* `` php artisan serve``

If everything goes on smoothly you should be able to access the setup screen at localhost:8000

If you will need extra  help setting up you may check out the laravel [installation](https://laravel.com/docs/5.1) guide as the devless core is based of laravel. 

