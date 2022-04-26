<?php
use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunoList */
$alunoList = $alunoRepository->findAll();

foreach ($alunoList as $aluno) {
    echo "ID: {$aluno->getId()} \nNome: {$aluno->getNome()}\n\n";
}

$nico = $alunoRepository->find(6);
echo $nico->getNome();

$Ana = $alunoRepository->findBy([
    'nome' => 'Ana'
]);

var_dump($Ana);

//retorna só o objeto do tipo aluno
$Ana = $alunoRepository->findOneBy([
    'nome' => 'Ana'
]);

var_dump($Ana);

//Para buscar apenas 2 entidades, ordenadas pelo campo nome de forma crescente, começando a partir do 3 resultado
$teste = $alunoRepository->findBy([], ['nome' => 'ASC'], 2, 3);

var_dump($teste);

/*
public function findBy(
    array $criteria,
    ?array $orderBy = null,
    ?int $limit = null,
    ?int $offset = null
)
*/
