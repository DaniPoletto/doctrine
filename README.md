# Doctrine

Esse projeto foi desenvolvido durante o curso de Doctrine da Alura. 

O Doctrine Project é um conjunto de bibliotecas PHP focadas principalmente em fornecer serviços de persistência e funcionalidades relacionadas. ([wikipedia](https://en.wikipedia.org/wiki/Doctrine_(PHP)))

Antes de começar a utiliza-lo, é necessário instalar o [composer](https://getcomposer.org/download/).

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
 ### Comandos úteis
 
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

Para instalar as migrations:

```
composer require doctrine/migrations
```

Para configurar as migrations: [configuração](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.3/reference/configuration.html#configuration)

Utilizando injeção de dependência é criado um gerenciador de entidade que irá fazer as operações necessárias no banco.

A classe EntityManagerInterface necessita ser importada.
```
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
```

O método persist 'observa' a entidade que recebe como parametro até que seja utilizado o método flush para de fato persistir as alterações no banco. 

As alterações são mapeadas em memória otimizando a performance da aplicação.

```
        $this->entityManager->persist($medico);
        $this->entityManager->flush();
```

Caso a entidade seja obtida por meio do repositório, não há necessidade de usar o método persist pois o doctrine já 'observa' automaticamente essa entidade. 

Usando anotações para definir informações das colunas da tabela a ser criada
```
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
     public $id;
```
No código acima é informado que o atributo id é um campo do tipo identificador com valor gerado automaticamente e no formato inteiro.

Para informar um formato texto (char, varchar, text) basta fazer da seguinte forma:
```
@ORM\Column(type="string")
```

Gerar uma migration, comparando o seu banco de dados atual com as informações de mapeamento:

```
vendor\bin\doctrine-migrations migrations:diff
```

Executa todas as migrations:
```
vendor\bin\doctrine-migrations migrations:migrate
```

Retornar informações de uma entidade mapeada
```
vendor\bin\doctrine orm:mapping:describe Curso
```

Retorna um repositório (de médicos)
```
$repositorioDeMedicos = $this->getDoctrine()->getRepository(Medico::class);
```

Retorna todos os médicos com esse repositório
```
$medicoList = $repositorioDeMedicos->findAll();
```

