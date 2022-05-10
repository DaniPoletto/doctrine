# Doctrine

Antes de começar a usar o doctrine, é necessário instalar o [composer](https://getcomposer.org/download/).

Com o composer instalado, o próximo passo é instalar o doctrine pelo terminal com o comando:

```
composer require doctrine/orm
```
E para configurar o autoload através do composer é preciso editar o arquivo composer.json:
```
{
    "require": {
        "doctrine/orm": "^2.11"
    },
    "autoload": {
        "psr-4": {
            "Alura\\Doctrine\\" : "src/"
        }
    }
}
```

Em seguida, rode o comando no terminal:
```
 composer dumpautoload
 ```
 
 Caso necessário, rode também:
 ```
 composer require symfony/cache
```
 ```
 composer require doctrine/annotations
 ```
 
 Mostrar os comandos disponiveis pelo doctrine:
  ```
 vendor\bin\doctrine.bat
 ```
 Mapear uma classe:
  ```
 vendor\bin\doctrine.bat orm:info
 ```
 Criar o esquema/sql:
  ```
 vendor\bin\doctrine.bat orm:schema-tool:create
 ```

### Relacionamento One to Many

Para instalar as migrations:

```
composer require doctrine/migrations
```

Para configurar as migrations:

[configuração](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.3/reference/configuration.html#configuration)

Gerar uma migration, comparando o seu banco de dados atual com as informações de mapeamento:

```
vendor\bin\doctrine-migrations migrations:diff
```

Executa todas as migrations:
```
vendor\bin\doctrine-migrations migrations:migrate
```



