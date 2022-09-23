<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Alura\Doctrine\Helper\EntityManagerFactory;

// replace with path to your own project bootstrap file
require_once __DIR__.'/../vendor/autoload.php';
// replace with mechanism to retrieve EntityManager in your app
$entityManager = entityManagerFactory::getEntityManager();

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);