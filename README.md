## Репозиторий сайта личного блога https://galamoon.ru

[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=Galamoon_galamoon.ru&metric=alert_status)](https://sonarcloud.io/dashboard?id=Galamoon_galamoon.ru)

### Сборка проекта
```
(cd local && composer install)
(cd local/js/galamoon/assets && npm i && gulp build)
(cd local/bin && php migrate.php up)
```