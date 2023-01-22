# kondate-api

## prepare
- Docker Desktop

## copy .env file
```bash
cp .env.example .env
```

## build and run docker container
```bash
docker compose up -d --build
```

## Laravel preparation
```bash
docker compose exec app composer install && npm install
docker compose exec app php artisan key:generate
```

## migrate and seed
```bash
docker compose exec app php artisan migrate
docker compose exec app php artisan db:seed
```