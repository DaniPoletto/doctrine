<?php
namespace Alura\Doctrine\Helper;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

//Classe para criar um gerenciador de entidades
class EntityManagerFactory{
    //exemplo de anotação informando que a função retornará esse tipo
    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager():EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        //cria as configurações que o doctrine precisa através de anotações
        //busca apartir do directory src e com mode de desenvolvimento = true
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],
            true
        );

        //informações de conexão
        $connection = [
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'curso_doctrine',
            'user' => 'root',
            'password' => ''  
        ];

        //cria um gerenciador de entidades
        return EntityManager::create($connection, $config);

    }
}

?>