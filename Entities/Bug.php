<?php

namespace Entities;

/**
 * Entities\Bug
 */
class Bug
{
    /**
     * @var text $description
     */
    private $description;

    /**
     * @var datetime $created
     */
    private $created;

    /**
     * @var string $status
     */
    private $status;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Entities\User
     */
    private $reporter;

    /**
     * @var Entities\User
     */
    private $engineer;

    /**
     * @var Entities\Product
     */
    private $products;

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime $created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string $status
     */
    public function getStatus()
    {
        return $this->status;
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
     * Set reporter
     *
     * @param Entities\User $reporter
     */
    public function setReporter(\Entities\User $reporter)
    {
        $this->reporter = $reporter;
    }

    /**
     * Get reporter
     *
     * @return Entities\User $reporter
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * Set engineer
     *
     * @param Entities\User $engineer
     */
    public function setEngineer(\Entities\User $engineer)
    {
        $this->engineer = $engineer;
    }

    /**
     * Get engineer
     *
     * @return Entities\User $engineer
     */
    public function getEngineer()
    {
        return $this->engineer;
    }

    /**
     * Add products
     *
     * @param Entities\Product $products
     */
    public function addProducts(\Entities\Product $products)
    {
        $this->products[] = $products;
    }

    /**
     * Get products
     *
     * @return Doctrine\Common\Collections\Collection $products
     */
    public function getProducts()
    {
        return $this->products;
    }
}