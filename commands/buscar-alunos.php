<?php
use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//DQL - Doctrine Query Language
//Retorna todos os alunos
$dql = 'SELECT aluno FROM Alura\\Doctrine\\Entity\\Aluno aluno WHERE aluno.id = 3 OR aluno.nome = \'Daniela\' ORDER BY aluno.nome';
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach ($alunoList as $aluno) {
    $telefones = $aluno
                ->getTelefones()
                ->map(function(Telefone $telefone){
                    return $telefone->getNumero();
                })
                ->toArray();
    echo "ID: {$aluno->getId()} \nNome: {$aluno->getNome()}\n";
    echo "Telefones: ".implode(', ', $telefones);
    echo "\n\n";
}

// $nico = $alunoRepository->find(6);
// echo $nico->getNome();

// $Ana = $alunoRepository->findBy([
//     'nome' => 'Ana'
// ]);

// var_dump($Ana);

// //retorna só o objeto do tipo aluno
// $Ana = $alunoRepository->findOneBy([
//     'nome' => 'Ana'
// ]);

// var_dump($Ana);

// //Para buscar apenas 2 entidades, ordenadas pelo campo nome de forma crescente, começando a partir do 3 resultado
// $teste = $alunoRepository->findBy([], ['nome' => 'ASC'], 2, 3);

// var_dump($teste);

/*
public function findBy(
    array $criteria,
    ?array $orderBy = null,
    ?int $limit = null,
    ?int $offset = null
)
*/
