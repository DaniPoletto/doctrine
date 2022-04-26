<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$aluno = new Aluno();
$aluno->setNome($argv[1]);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//começa a 'observar' esse aluno
$entityManager->persist($aluno);
// $aluno->setNome("Dani");

//metódo que efetiva o que foi manipulado no banco
$entityManager->flush();
