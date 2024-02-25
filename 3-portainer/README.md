
# Знакомство с Portainer (web-интерфейс для управления Docker)

Поднять окружение с приложением:
```bash
docker compose up -d
```

Перейти по адресу: https://localhost:9443/

Необходимо подтвердить риск в браузере:

![](images/https-self-signed.png)

Задать логин и пароль для нового пользователя:

![](images/create-new-user.png)

В открывшемся интерфейсе выбрать "Get started":

![](images/create-new-env.png)

В открывшейся странице перейти в единственное доступное `local` окружение:

![](images/environments.png)

Пример как выглядит локальное окружение:

![](images/local-environment.png)
