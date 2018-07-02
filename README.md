# Домашнее задание

[Результат тестов - ОК *(скриншот)*](tests_result.jpg)

***

## Описание
Создать страницы для рынка валют.

## Страницы
1. Страница со списком валют.
    - Должна быть доступна по адресу /сurrencies
    - Должна содержать заголовок "Currency market".
    - Список должен содержать следующие данные:
        - Имя
    - Название валюты должно быть кликабельно и вести на страницу соответствующей валюты.
    - Placeholder с текстом “No cars” в случае пустого списка машин.
2. Страница отдельной валюты
    - Страница должна быть доступна по адресу /сurrencies/{id}
    - Страница должна содержать данные:
        - Имя
        - Стоимость
    - Заголовок страницы должен содержать название валюты
3. Скриншоты страниц должен лежать в корне проекта.

## Требования
### Основные
- Для выполнения взять код из этого репозитория. Репозиторий не должен быть форкнут.
- Страницы должны быть созданы с помощью темплейтов Blade.
- Темплейты должны наследовать друг друга.
- Должна присутствовать защита от XSS и CSRF атак.
- Все тесты должны проходить. Тесты менять нельзя, но очень даже можно смотреть. Если какой-то тест написан с ошибкой (sic!) - обращайтесь в комментариях.
- Выложить выполненное ДЗ в **отдельный** репозиторий на github/bitbucket.

### Дополнительные
- Должны быть использованы возможности PHP 7.1
    - https://habrahabr.ru/post/309858/
- Весь PHP код должен быть задокументирован с помощью PHPDoc согласно стандарту PSR-5.
    - https://github.com/phpDocumentor/fig-standards/tree/master/proposed
- Код должен быть отформатирован согласно PSR-2 и PSR-12.
    - http://www.php-fig.org/psr/psr-2/
    -https://github.com/php-fig/fig-standards/blob/master/proposed/extended-coding-style-guide.md
- Приветствуется (но не обязательно) использование Bootstrap или другого front-end фреймворка для добавления стилей.
- Очень приветствуется добавление возможностей по редактированию, добавлению или удалению валют.

## Запуск тестов
1. Создайте APP_URL в .env
2. Запустите тесты
    ```
    php artisan dusk
    ```

### Запуск тестов c Homestead
1. Зайдите на виртуальную машину через ssh из папки, где установлен Homestead
    ```
    vagrant ssh
    ```
2. Перейдите в директорию проекта

3. Установите в '.env' строку
    ```
    APP_URL=http://192.168.10.10:8080
    ```
4. Теперь можно запустить тесты.
    ```
    php artisan dusk
    ```

- см. https://laravel.com/docs/5.4/dusk