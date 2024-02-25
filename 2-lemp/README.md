
# LEMP через Docker Compose

`Основная цель`: разбор конфигураций.

Поднять окружение с `LEMP` и приложением на `php`:
```bash
docker compose up -d
```

Теперь в браузере можно перейти по адресу: http://localhost:4002/

Приложение минималистично, нужно лишь ввести правильный логин и пароль (admin/password) чтобы увидеть что авторизация прошла успешно.

Подключиться к логам можно так:
```bash
docker compose logs -n 100 -f
```