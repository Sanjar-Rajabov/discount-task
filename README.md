# Техническое задание
Было реализовано два эндпоинта API:
- **/api/documents/generate**
  - Принимает данные, создает запись в бд и job
  - Возвращает объект Document со статусом и пустым полем `url`
- **/api/documents/:id**
  - Возвращает объект Document
  - Если статус `ready`, в поле `url` возвращается ссылка на сгенерированный файл.

Чтобы не усложнять, для очередей тоже используется бд.
Всё окружение можно настроить с помощью `docker-compose.yml`.

Для добавления новых полей нужно следующее:
- Добавить поле в шаблон — `resources/template/agreement.blade.php`
- Добавить поле в `DocumentGenerateRequest` для валидации
- Добавить поле в `DocumentGenerateDTO`

### Инструкция для запуска

- `cp .env.example .env`
- `docker-compose up`

### Документация к API

Импортируйте файл `postman-collection.json` в Postman

### Шаблон
Пример PDF-шаблона — `./sample.pdf`
