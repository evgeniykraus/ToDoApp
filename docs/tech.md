## Требования:

·      Язык: php ^8.1

·      Фреймворк: Laravel ^8

·     Для аутентификации пользователей использовать Laravel Passport

## Описание

### Общее

REST API для управления заметками пользователя. Таблицу заметок можно создать с произвольными полями.

Каждый пользователь имеет доступ только к своим заметкам. Администратор – ко всем.

Реализовать автозаполнение базы данных, для возможности быстрого развертывания проекта с тестовыми данными с помощью seeder’ов.

### Аутентификация

Должны быть предусмотрены методы аутентификации пользователя в системе и выдача токенов для frontend’а.

Уведомление о создании

При создании заметки пользователем создается событие, которое асинхронно отправляет уведомление администратору по почте (заглушка).

### Документация к API

Нужно сделать описание методов API с помощью Swagger

### Дополнительно

Код проекта должен быть выгружен в публичный GitHub / GitLab репозиторий. В Readme проекта описать сборку проекта и его запуск.

### По желанию (необязательно)

Настроить проект для сборки в docker-контейнере.

Реализовать frontend с использованием написанного API.

Пара простеньких Unit-тестов.