
# Redmine через Docker Compose

Этот практический пример сделан для сравнения: [как раньше без Docker поднимали Redmine](https://byurrer.ru/redmine-rvm-ror-unicorn-nginx) и как стало просто с _Docker_.

> На самом деле [Docker образ для Redmine существовал](https://hub.docker.com/_/redmine/tags?page=1&ordering=-last_updated) на момент написания статьи, но статья отражает весь тот объем работы, который необходимо было проделать на хосте без контейнеризации.

Файл `docker-compose.yml` по большей части взят из документации к [образу Redmine](https://hub.docker.com/_/redmine) и немного доделан под свои нужды.

