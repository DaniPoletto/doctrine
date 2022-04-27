<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
// $alunoRepository = $entityManager->getRepository(Aluno::class);

$id = $argv[1];
$novoNome = $argv[2];

// $aluno = $alunoRepository->find($id);
//não é necessário repositorio pra buscar apenas 1
$aluno = $entityManager->find(Aluno::class, $id);
$aluno->setNome($novoNome);

//não é necessario persist nesse caso pq a entidade já foi buscada pelo doctrine
$entityManager->flush();
