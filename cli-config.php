<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/vendor/autoload.php';

$entityManager = entityManagerFactory::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
