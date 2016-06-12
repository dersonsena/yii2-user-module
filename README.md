Yii2 User Module
===========================

Implementação padrão de um Módulo de Usuários para meus projetos no Yii2

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

INSTRUÇÕES PARA INSTALAÇÃO
-------------------

A maneira recomendada para instalar esta extensão é através [composer](http://getcomposer.org/download/).

Execute no seu terminal

```
$ php composer.phar require dersonsena/yii2-user-module "dev-master"
```

ou adicione 

```
"dersonsena/yii2-user-module": "dev-master"
```

na seção ```require``` do seu arquivo `composer.json`.

EXECUTANDO MIGRATIONS
-------------------

Execute o comando abaixo para criação das tabelas ```users``` e ```groups```

```
php yii migrate --migrationPath=@vendor/dersonsena/yii2-user-module/migrations
```

Abaixo seguem as credenciais de acesso:

E-mail: admin@admin.com.br

Senha: 123456