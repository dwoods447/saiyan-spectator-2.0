
## About SaiyanSpectator
Dragonball fansite built using Laravel 8  and Vue.js 3 w/Inertia  upagrade of an [older version](https://github.com/dwoods447/SaiyanSpecatator)

## Installation
For Details Please refer to Laravel 8 Sail [docs](https://laravel.com/docs/8.x/sail#installing-sail-into-existing-applications)

```
composer install
```
build project

```
./vendor/bin/sail build --no-cache

```
start project

```
./vendor/bin/sail up
```

To migrate and create database tables
```
./vendor/bin/sail artisan migrate
```

To seed database tables

```
./vendor/bin/sail artisan db:seed
```




Install javascript dependencies

```
npm install
```

## Development

To run the development server 

```
npm run dev
```

Configure a bash alias

```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```


