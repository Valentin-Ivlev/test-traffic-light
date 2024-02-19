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

## Задача
<i>
Задача реализовать мини Laravel приложение.
Бизнес-логика: по середине страницы выводим небольшой блок, где слева светофор (просто вертикально в ряд 3 кружка: зеленый, желтый, красный).
А справа кнопка «Вперед».
Ниже, по центру таблица с логами, о ней подробнее ниже.

Цвета светофора должны постоянно меняться по следующей логике: 5 сек зеленый, потом 2 сек желтый, потом 5 сек красный, потом опять 2 сек желтый и снова зеленый. Как-то подсвечивать тот цвет, который сейчас активен.

При нажатию на конпку "Вперед" в лог должно записываться сообщение и выводится ниже, в таблицу с логами по следующей логике:
- если нажали кнопку "Вперед" на красный, то сообщение в лог "Проезд на красный. Штраф!"
- если нажали кнопку "Вперед" на зеленый, то сообщение в лог "Проезд на зеленый!"
- если нажали кнопку "Вперед" на желтый, то: если желтый был после зеленого, тогда сообщение в лог "Успели на желтый!", если желтый был после красного то сообщение в лог "Слишком рано начали движение!".

При выполнение тестового учитывать следующие моменты:
1. Использовать Laravel 10.
   2 JS должен подключаться к странице и собираться через webpack/vite
3. Использовать jQuery вместо нативного JS там, где это возможно
4. Запись в логи должна происходить без обновления страницы
5. Запись в логи должна быть в базу данных с использованием модели
6. Написать код максимально чисто, красиво
7. Код должен написан быть так, как для реального проекта, а не тестового задания. То есть должен учитывать расширение, переиспользования кода в других частях проекта и т.п.
8. Название функций в JS/PHP и имена PHP файлов/классов пишем в camelCase, все остальное (название blade шаблонов, название переменных, ключей массива и т.д.) в snake_case
9. База данных должна быть спроектирована с расчетом на то, что таких запписей в логи будет очень большое количество, нужно чтобы размер БД разростался максимально медленно
10. Перед всеми функциями JS/PHP (в том числе методами) писать комментарий в виде /** Здесь краткий комментарий: что делает функция */
11. Залить работу на GitGub и отправить ссылку на репозиторий. Важно: первый коммит должен быть "init" с инициализацией Laravel. Второй коммит должен быть целиком результат работы, без последующих коммитов с доработками.
12. Засчечь и по итогу написать сколько примерно времени ушло на задачу.
</i>
