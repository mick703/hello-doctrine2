<?php

namespace Entities;

/**
 * Entities\Product
 */
class Product
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Entities\Bug
     */
    private $bugs;

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add bugs
     *
     * @param Entities\Bug $bugs
     */
    public function addBugs(\Entities\Bug $bugs)
    {
        $this->bugs[] = $bugs;
    }

    /**
     * Get bugs
     *
     * @return Doctrine\Common\Collections\Collection $bugs
     */
    public function getBugs()
    {
        return $this->bugs;
    }
}