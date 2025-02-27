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

---

## 3. Сборка и запуск контейнеров
```bash
docker-compose up -d --build
```

---

## 4. Установка зависимостей Laravel
После запуска контейнеров установите зависимости Laravel внутри контейнера PHP:

```bash
docker-compose exec app composer install
```

---

```bash
docker-compose exec appp php artisan key:generate
```

---

## 5. Запуск миграций и seeder'ов
Теперь выполните миграции и seeders для настройки базы данных:

```bash
docker-compose exec app php artisan migrate --seed
```

---

### 6. Даем права пользователю www-data
```
docker-compose exec app bash
```

```
chown www-data:www-data -R /var/www/html/storage
```

---

Фронт: http://localhost:8080


phpmyadmin: http://localhost:8081

login: laraveluser
password: larapass

