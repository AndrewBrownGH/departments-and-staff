## Что сделал:
- список отделов
- список сотрудников
- добавление отелов
- удаление отделов
- валидация ошибок и их отображение
- фикстуры для тестирования
- form request для валидации
- развернул vue js для фронта

## Что не сделал:
+ редактирование отделов и сотрудников
+ удаление сотрудников (нужно также предусмотреть удаление в смежной таблице)
+ добавление сотрудников
+ раздел "Сетка"

## Что хотел бы сделать:
+ регистрация и аутентификация пользователей приложения
+ аутентификация для запросов и ответов (токен?)

## Как развернуть:
1. скачать проект
2. `composer install`
3. настроить конфиг файл `.env` для подключения к бд
4. загрузить миграции с данными для тестирования: `php artisan migrate --seed`
5. запустить сервер: `php artisan serve`