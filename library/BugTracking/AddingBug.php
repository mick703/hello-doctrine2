<?php
require_once __DIR__ . '/../../Bootstrap.php';
$bootstrap = new Bootstrap();
$entityManager = $bootstrap->getEntityManager();

//Create a user as bug reporter
$reporter = new \Entities\User;
$reporter->name = 'Tom Hudson';

$entityManager->persist($reporter);
$entityManager->flush();
