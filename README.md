# Test-Traffic-Light

## Развертывание проекта

Клонируйте проект:
```shell
git clone https://github.com/Valentin-Ivlev/test-traffic-light.git
```
Установите зависимости проекта:
```shell
composer install
npm install
```
Создайте свой файл настроек:
```shell
cp .env.example .env
```
Сгенерируйте ключ приложения:
```shell
php artisan key:generate
```
Настройете подключение к базе данных в файле `.env`

Установите права на папки проекта:
```shell
chmod 755 -R [путь к папке проекта]/
chmod -R o+w [путь к папке проекта]/storage
```
Настройте web-сервер, чтобы он указывал на папку `[путь к папке проекта]/public/`

Соберите frontend:
```shell
vite build
```
Очистите проект:
```shell
php artisan cache:clear
php artisan view:clear
php artisan config:clear
```
Выполните миграции:
```shell
php artisan migrate
```
