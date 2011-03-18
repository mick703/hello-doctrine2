<?php
require_once __DIR__. '/library/Doctrine/Common/ClassLoader.php';

class Bootstrap
{
	/**
	 * Doctrine entity manager object
	 * @var \Doctrine\ORM\EntityManager
	 */
	protected $entityManager;
	
	/**
	 * Configuration object
	 * @var \Doctrine\ORM\Configuration
	 */
	protected $config;
	
	/**
	 * Constructor function
	 * 
	 * @param string $applicationEnv Application environment
	 */
	public function __construct($applicationEnv = 'Production')
	{
		define('APPLICATION_ENV', $applicationEnv);//hardcoded for now		
		
		//Init class loader
		$this->initClassLoader();
		
		//Init Configuration object
		$this->initConfig();
		
		//Init Entity Manager
		$this->initEnityManager();
	}
	
	/**
	 * Initialize the class loader to enable class autoloading
	 */
	protected function initClassLoader()
	{
		$classLoader = new \Doctrine\Common\ClassLoader('Doctrine', __DIR__. '/library');
		$classLoader->register();
		
		$classLoader = new \Doctrine\Common\ClassLoader('Entities', __DIR__);
		$classLoader->register();
		
		$classLoader = new \Doctrine\Common\ClassLoader('Proxies', __DIR__);
		$classLoader->register();

		return $this;
	}
	
	/**
	 * Initialize the config object
	 */
	protected function initConfig()
	{
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
		
		$this->config = $config;
		
		return $this;
	}
	
	/**
	 * Initialize the entity manager
	 */
	protected function initEnityManager()
	{
		//Database configuration parameters hardcoded for now
		$connectionParams = array(
			'dbname' => 'doctrinedb',
			'user' => 'doctrine',
			'password' => '',
			'host' => 'localhost',
			'driver' => 'pdo_mysql'
		);
		
		//Get the entity manager
		$evm = new \Doctrine\Common\EventManager();
		$config = $this->config;
		
		if (!($config instanceof \Doctrine\ORM\Configuration)) {
			throw new \RuntimeException('Config object was not found.');
		}
		
		$entityManager = \Doctrine\ORM\EntityManager::create($connectionParams, $config, $evm);
		
		$this->entityManager = $entityManager;
		
		return $this;
	}
	
	/**
	 * Init helper set for the console tool
	 */
	public function initHelperSet() 
	{
		$entityManager = $this->entityManager;
		
		if (!($entityManager instanceof \Doctrine\ORM\EntityManager)) {
			throw new \RuntimeException('Entity Manager was not found.');
		}
		
		//Set up helper set for the command line tool
		$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
			'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper(
				$entityManager->getConnection()),
			'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager, __DIR__. '/Entities')
		));
	}
	
	/**
	 * Return the Entity Manager
	 * 
	 * @return \Doctrine\ORM\EntityManager Configued entity manager object
	 */
	public function getEntityManager() 
	{
		if (!($entityManager instanceof \Doctrine\ORM\EntityManager)) {
			throw new \RuntimeException('Entity Manager was not found.');
		}
		return $this->entityManager;	
	}
	
}


