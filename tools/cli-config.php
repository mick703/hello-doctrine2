<?php
require_once __DIR__. '/../Bootstrap.php';
$bootstrap = new Bootstrap('development');
//For console to work
$entityManager = $bootstrap->getEntityManager();

if (!($entityManager instanceof \Doctrine\ORM\EntityManager)) {
	throw new \RuntimeException('Entity Manager was not found.');
}

//Set up helper set for the command line tool
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
	'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper(
		$entityManager->getConnection()),
	'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)
));
