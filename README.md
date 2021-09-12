# Laravel Contact-Importer

This application allows users to upload contact files in CSV format and process them 
to generate a unified contact file. The contacts are associate to the user who imported
them into the platform.


## Installation Steps

Copy .env.example file and change the name to .env, the edit and set de Database config
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

⚠ If Adminltle says the file already exists, say no replace.

```
composer install

npm install

npm install cross-env

npm run dev
```

Generate encryption key
```
php artisan key:generate
```

Run migrations and seeder to create franchises credit-card catalog and two users
```
php artisan migrate:fresh --seed
```

Users Created:

- **Email:** user_a@mail.com **Password:** password
- **Email:** user_ab@mail.com **Password:** password

Create a sesond DB for Test and modify file phpunit.xml file add the name of test DB
```$xslt
    <server name="DB_DATABASE" value="contact-importer-test"/
``` 
### Import Files
To import .csv files is used queued jobs, so to run job is necessary execute:

```
php artisan queue:work
``` 
