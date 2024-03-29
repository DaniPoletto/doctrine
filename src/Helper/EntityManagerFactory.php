<?php
namespace Alura\Doctrine\Helper;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

//Classe para criar um gerenciador de entidades
class EntityManagerFactory{
    //exemplo de anotação informando que a função retornará esse tipo
    /**
     * @return EntityManagerInterface
     */
    public static function getEntityManager():EntityManagerInterface
    {
        //cria as configurações que o doctrine precisa através de anotações
        //busca apartir do directory src e com mode de desenvolvimento = true
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . '/..'],
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