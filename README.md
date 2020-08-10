## Репозиторий сайта личного блога https://galamoon.ru

[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=Galamoon_galamoon.ru&metric=alert_status)](https://sonarcloud.io/dashboard?id=Galamoon_galamoon.ru)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=Galamoon_galamoon.ru&metric=bugs)](https://sonarcloud.io/dashboard?id=Galamoon_galamoon.ru)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=Galamoon_galamoon.ru&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=Galamoon_galamoon.ru)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=Galamoon_galamoon.ru&metric=code_smells)](https://sonarcloud.io/dashboard?id=Galamoon_galamoon.ru)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=Galamoon_galamoon.ru&metric=coverage)](https://sonarcloud.io/dashboard?id=Galamoon_galamoon.ru)

### Сборка проекта
```
(cd local && composer install)
(cd local/js/galamoon/assets && npm i && gulp build)
(cd local/bin && php migrate.php up)
```