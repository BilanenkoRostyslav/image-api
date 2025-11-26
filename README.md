Installation guide:

1. Clone project: use command ```git clone https://github.com/BilanenkoRostyslav/image-api.git```
2. Create ``.env`` file. Use command ```cp .env.example .env```
3. Set env variables ```DB_USERNAME DB_PASSWORD DB_PORT```
4. Run command ```docker-compose up -d```
5. Run command ```docker exec -it php-fpm composer install```
6. Run command ```docker exec -it php-fpm php bin/console doctrine:migrations:migrate --no-interaction```
7. Go to ```localhost/up```