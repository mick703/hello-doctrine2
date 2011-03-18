<?php
define('APPLICATION_ENV', 'development');

require_once __DIR__. '/library/Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine', __DIR__. '/library');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Entities', __DIR__);
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Proxies', __DIR__);
$classLoader->register();

$config = new \Doctrine\ORM\Configuration();

//Proxy configuration
$config->setProxyDir(__DIR__. '/Proxies');
$config->setProxyNamespace('Proxies');
$config->setAutoGenerateProxyClasses((APPLICATION_ENV == 'development'));

//Mapping configuration using annotation driver
//$driverImpl = $config->newDefaultAnnotationDriver(__DIR__. '/Entities_manually_created');
//$config->setMetadataDriverImpl($driverImpl);

//Mapping configuration with XML
$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/config/mappings/xml");
$config->setMetadataDriverImpl($driverImpl);

//Caching configuration
if (APPLICATION_ENV == 'development') {
	$cache = new \Doctrine\Common\Cache\ArrayCache();
} else {
	$cache = new \Doctrine\Common\Cache\ApcCache();
}

$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

//Database configuration parameters
$connectionParams = array(
	'dbname' => 'doctrinedb',
	'user' => 'doctrine',
	'password' => '',
	'host' => 'localhost',
	'driver' => 'pdo_mysql'
);

//Get the entity manager
$evm = new \Doctrine\Common\EventManager();
$entityManager = \Doctrine\ORM\EntityManager::create($connectionParams, $config, $evm);

//Set up helper set for the command line tool
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
	'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper(
		$entityManager->getConnection()),
	'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager, __DIR__. '/Entities')
));

//$metaData = $entityManager->getClassMetadata(new \Entities\Product());


