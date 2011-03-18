<?php
namespace Entities;

use Doctrine\Common\Collections;

/**
 * @Entity 
 * @Table(name="bugs")
 */
class Bug 
{
	/**
	 * @Id @Column(type="integer") 
	 * @GeneratedValue
	 */
	protected $id;
	
	/**
	 * @Column(type="string")
	 */
	protected $description;
	
	/**
	 * @Column(type="string")
	 */
	protected $status;
	
	/**
	 * @Column(type="datetime")
	 */
	protected $created;
	
	/**
	 * @ManyToMany(targetEntity="Product")
	 */
	private $products = null;
	
	/**
	 * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
	 */
	protected $engineer;
	
	/**
	 * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
	 */
	protected $reporter;
	
//	public function __construct()
//	{
//		$this->products = new Collections\ArrayCollection();
//	}
//	
//	public function setEngineer($engineer)
//	{
//		$engineer->assignedToBug($this);
//		$this->engineer = $engineer;
//	}
//	
//	public function setReporter($reporter)
//	{
//		$reporter->addReportedBug($this);
//		$this->reporter = $reporter;
//	}
//	
//	public function getEngineer()
//	{
//		return $this->engineer;
//	}
//	
//	public function getReporter()
//	{
//		return $this->reporter;
//	}
//	
//	public function assignToProduct($product)
//	{
//		$this->products[] = $product;
//	}
//	
//	public function getProducts()
//	{
//		return $this->products;
//	}
//	
}