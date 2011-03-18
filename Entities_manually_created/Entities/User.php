<?php
namespace Entities;

use Doctrine\Common\Collections;

/**
 * @Entity 
 * @Table(name="users")
 */
class User
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue 
	 * @var string
	 */
	protected $id;
	
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $name;
	
	/**
	 * @OneToMany(targetEntity="Bug", mappedBy="reporter")
	 * @var Bug[]
	 */
	protected $reportedBugs = null;
	
	/**
	 * @OneToMany(targetEntity="Bug", mappedBy="engineer")
	 * @var Bug[]
	 */
	protected $assignedBugs = null;
	
//	public function __construct()
//	{
//		$this->reportedBugs = new Collections\ArrayCollection();
//		$this->assignedBugs = new Collections\ArrayCollection();
//	}
//	
//	public function addReportedBug($bug)
//	{
//		$this->reportedBugs[] = $bug;
//	}
//	
//	public function assignedToBug($bug)
//	{
//		$this->assignedBugs[] = $bug;
//	}
}