
# Запуск двух взаимодействующих контейнеров в одной сети

## Сеть

Создать сеть, чтобы мы могли в нее помещать контейнеры, которые смогу связываться друг с другом:
```bash
docker network create -d bridge my-first-net
```

Просмотр списка сетей (должны увидеть сеть `my-first-net`):
```bash
docker network ls
```

## Контейнер БД

Запуск контейнера с `mysql`:
* помещаем в сеть
* даем название хосту чтобы другие контейнеры могли по этому названию обратиться
* создаем именованный том `mysql-volume` чтобы он хранился на хосте даже если контейнер будет удален
* прокидываем порт контейнера `3306` на хостовый порт `13306`

```bash
docker run \
    --name mysql \
    --network my-first-net \
    --hostname db \
    -v mysql-volume:/var/lib/mysql \
    -p 13306:3306 \
    -e MYSQL_DATABASE=my_db \
    -e MYSQL_ROOT_PASSWORD=root \
    -d \
    mysql:8.0
```

Теперь из клиента _MySQL_ можно попробовать подключиться к серверу:
* хост - `localhost`
* порт - `13306`
* пользователь - `root`
* пароль - `root`

Просмотр списка запущенных контейнеров (должны увидеть контейнер `mysql`):
```bash
docker ps
```

## Контейнер со скриптом генерации данных для БД

Сборка образа `php` из `Dockerfile` (внутри установка нужных зависимостей и запуск интерпретатора):
```bash
docker build -t my-php:tag ./php
```

Просмотр списка образов (должны увидеть новый образ `my-php:tag`):
```bash
docker images
```

Запуск контейнера со скриптом, который будет вставлять новые записи в таблицу БД каждую секунду (передний план):
```bash
docker run \
    --name php \
    -v ./db.php:/db.php \
    --network my-first-net \
    --init \
    my-php:tag \
    /db.php
```

Можно зайти в контейнер с `php` в другом окне терминала так:
```bash
docker exec -it php bash
```
