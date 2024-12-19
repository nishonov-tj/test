```markdown
**"Управление задачи"** — Сайт позволяет пользователям аутентифицироваться через Laravel Sanctum, получать токен для доступа к системе и выполнять операции с задачами через API.

## Функциональность

- **Аутентификация через API с использованием Laravel Sanctum** — пользователи могут получить токен для доступа к системе и выполнять операции с задачами.
- **Создание задач** — пользователи могут создавать новые задачи с заголовком, описанием и статусом.
- **Редактирование задач** — пользователи могут редактировать существующие задачи.
- **Удаление задач** — пользователи могут удалять задачи.
- **Просмотр задач** — пользователи могут получать список задач через API.
- **Статусы задач**:
  - **1** — новая задача.
  - **2** — задача в процессе.
  - **3** — задача завершена.

## Установка

### Требования

- PHP 7.4+
- Composer
- MySQL
- Laravel 8

### Шаги по установке

1. **Клонировать репозиторий**  
   Для начала клонируйте репозиторий:

   ```bash
   git clone https://github.com/nishonov-tj/test.git
   ```

2. **Перейти в директорию проекта**  
   После клонирования проекта перейдите в папку с проектом:

   ```bash
   cd test
   ```

3. **Установить зависимости с помощью Composer**  
   Установите все необходимые зависимости с помощью Composer:

   ```bash
   composer install
   ```

4. **Создать файл `.env` и настроить параметры подключения к базе данных**  
   Скопируйте файл `.env.example` в файл `.env`:

   ```bash
   cp .env.example .env
   ```

5. **Настроить параметры подключения к базе данных**  
   Откройте файл `.env` и настройте параметры подключения к базе данных:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Выполнить миграции**  
   Для создания таблиц в базе данных выполните миграции:

   ```bash
   php artisan migrate
   ```

7. **Запустить сервер разработки**  
   Запустите сервер Laravel:

   ```bash
   php artisan serve
   ```

   Теперь приложение будет доступно по адресу `http://127.0.0.1:8000`.

## Использование

### Аутентификация через API

Для использования API необходимо пройти аутентификацию. Для этого:

1. **Получение токена**

    Первый получайте токен через laravel sanctum
    ```bash
    GET /sanctum/csrf-cookie
    ```
    
   Для получения токена отправьте POST-запрос с данными пользователя и с X-XSRF-TOKEN:

   ```bash
   POST /api/login
   ```

   Пример тела запроса:

   ```json
   {
     "email": "user@example.com",
     "password": "password",
     "X-XSRF-TOKEN": "token"
   }
   ```

   В ответ вы получите токен:

   ```json
   {
     "token": "Ваш токен"
   }
   ```

2. **Авторизация с использованием токена**

   Для выполнения операций с задачами необходимо передавать токен в заголовке запроса:

   ```bash
   Authorization: Bearer ваш токен
   ```

### API для работы с задачами

#### Получить все задачи (GET)
- **Метод**: `GET`
- **URL**: `/api/tasks`

Пример ответа:

```json
[
  {
    "id": 1,
    "title": "Задача 1",
    "description": "Описание 1",
    "status": 0,
    "created_at": "2024-12-01T00:00:00.000000Z",
    "updated_at": "2024-12-01T00:00:00.000000Z"
  },
  {
    "id": 2,
    "title": "Задача 2",
    "description": "Описание 2",
    "status": 0,
    "created_at": "2024-12-01T00:00:00.000000Z",
    "updated_at": "2024-12-01T00:00:00.000000Z"
  }
]
```

#### Получить задачу по ID (GET)
- **Метод**: `GET`
- **URL**: `/api/tasks/{id}`

Пример ответа:

```json
{
  "id": 1,
  "title": "Задача 1",
  "description": "Описание 1",
  "status": 0,
  "created_at": "2024-12-01T00:00:00.000000Z",
  "updated_at": "2024-12-01T00:00:00.000000Z"
}
```

#### Создать задачу (POST)
- **Метод**: `POST`
- **URL**: `/api/tasks`

Пример тела запроса:

```json
{
  "title": "Новая задача",
  "description": "Описание",
  "status": 0
}
```

Пример ответа:

```json
{
  "id": 3,
  "title": "Новая задача",
  "description": "Описание",
  "status": 0,
  "created_at": "2024-12-01T00:00:00.000000Z",
  "updated_at": "2024-12-01T00:00:00.000000Z"
}
```

#### Обновить задачу (PUT)
- **Метод**: `PUT`
- **URL**: `/api/tasks/{id}`

Пример тела запроса:

```json
{
  "title": "Обновлено",
  "description": "Описание",
  "status": 1
}
```

Пример ответа:

```json
{
  "id": 1,
  "title": "Обновлено",
  "description": "Описание",
  "status": 1,
  "created_at": "2024-12-01T00:00:00.000000Z",
  "updated_at": "2024-12-01T00:00:00.000000Z"
}
```

#### Удалить задачу (DELETE)
- **Метод**: `DELETE`
- **URL**: `/api/tasks/{id}`

Пример ответа:

```json
{
  "message": "Задача удалено"
}
```

## Тестирование

Для запуска тестов выполните команду:

```bash
php artisan test
```