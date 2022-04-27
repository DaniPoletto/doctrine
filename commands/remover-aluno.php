<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
// $aluno = $entityManager->find(Aluno::class, $id);

// $entityManager->remove($aluno);
// $entityManager->flush();

//cria uma entidade apenas com o id para ser observada pelo doctrine
//uma forma de ganhar performance não precisando ir até o banco pra buscar
$aluno = $entityManager->getReference(Aluno::class, $id);

$entityManager->remove($aluno);
$entityManager->flush();
