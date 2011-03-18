<?php
namespace Entities;

/**
 * @Entity 
 * @Table(name="products")
 */
class Product
{
	/**
	 * @id @Column(type="integer") 
	 * @GeneratedValue
	 */
	protected $id;
	
	/**
	 * @Collumn(type="string")
	 */
	protected $name;
}