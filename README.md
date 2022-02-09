## How to use

### Basic setup

```
git clone --recurse-submodules https://github.com/Ishydo/laravel-sauce-ishydo.git
cd laravel-sauce-ishydo
cp .env.example .env
cp .env.example.laradock laradock/.env
```

### Adapting names

You can adapt values in `.env` and `laradock/.env` to fit your project. 
Once done, you can get it all started.

### First launch

```
cd laravel-sauce-ishydo/laradock
docker compose up mariadb nginx
docker compose exec workspace bash
> composer install
> php artisan key:generate
> php artisan config:cache
> php artisan migrate
> php artisan db:seed
```

Then you can serve frontend assets. Run this command on your host.

```
npm run dev
```

Then you can visit `http://localhost`


### Launching

```
cd laravel-sauce-ishydo/laradock
docker compose up mariadb nginx
```

```
npm run dev
```
