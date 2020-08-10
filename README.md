# Репозиторий сайта личного блога https://galamoon.ru

### Сборка проекта
```
(cd local && composer install)
(cd local/js/galamoon/assets && npm i && gulp build)
(cd local/bin && php migrate.php up)
```