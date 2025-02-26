# Инструкция по настройке Laravel-приложения в Docker

## 1. Клонирование репозитория
Сначала клонируйте репозиторий с помощью команды:

```bash
git clone https://github.com/username/repository-name.git
cd repository-name
```

---

## 2. Настройка файла `.env`
Скопируйте файл `.env.example` в `.env`:

```bash
cp .env.example .env
```

Откройте файл `.env` в текстовом редакторе и убедитесь, что настройки базы данных соответствуют вашему `docker-compose.yml`. Например:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laraveldb
DB_USERNAME=laraveluser
DB_PASSWORD=larapass
```

---

## 3. Сборка и запуск контейнеров
Используйте команду `docker-compose up -d --build`, чтобы собрать новые образы и запустить контейнеры в фоновом режиме:

```bash
docker-compose up -d --build
```

- Флаг `--build` гарантирует пересборку образов, если были внесены изменения в `Dockerfile` или зависимости.
- Флаг `-d` запускает контейнеры в фоновом режиме.

---

## 4. Установка зависимостей Laravel
После запуска контейнеров установите зависимости Laravel внутри контейнера PHP:

```bash
docker-compose exec apache_php composer install
```

---

## 5. Генерация ключа приложения
Генерация ключа выполняется внутри контейнера:

```bash
docker-compose exec apache_php php artisan key:generate
```

---

## 6. Запуск миграций и seeder'ов
Теперь выполните миграции и seeders для настройки базы данных:

```bash
docker-compose exec apache_php php artisan migrate --seed
```

Если seeders разделены на классы, вы можете запустить конкретный seeder:

```bash
docker-compose exec apache_php php artisan db:seed --class=YourSeederClass
```

---

## 7. Проверка работы приложения
После завершения всех шагов откройте браузер и перейдите по адресу:

```
http://localhost
```

Если все настроено правильно, вы увидите главную страницу вашего приложения.

---

## 8. Дополнительные команды

### Остановка контейнеров
Чтобы остановить контейнеры, выполните:

```bash
docker-compose down
```

### Просмотр логов контейнеров
Для просмотра логов контейнеров используйте:

```bash
docker-compose logs -f
```

### Пересборка образов
Если изменились зависимости или конфигурации, выполните пересборку образов:

```bash
docker-compose up -d --build
```

---

Теперь ваш проект должен быть полностью настроен и готов к работе в Docker-контейнерах!