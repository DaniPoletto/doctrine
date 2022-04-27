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
