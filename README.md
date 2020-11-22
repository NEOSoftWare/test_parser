Тестовый парсер
=====================

Установка
------------

```shell script
composer install
cp .env.example .env
```

Настройка файла .env

    APP_URL=http://127.0.0.1:8000 # урл по которому будет доступен сайт

Настройка для базы данных

    DB_CONNECTION=pgsql # Сервер базы даных sqlite, mysql, pgsql или sqlsrv
    DB_HOST=127.0.0.1 
    DB_PORT=5432
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=


Продолжение настройки проекта
```shell script
php artisan key:generate
npm install
npm run dev
php artisan migate
```

Пример использования
------------

### Запуск парсера

```shell script
php artisan parse:run
```

Запуск web сервера (если не нужен nginx и etc)

```shell script
php artisan serv
```

Переходим на [http://127.0.0.1:8000](http://127.0.0.1:8000)
