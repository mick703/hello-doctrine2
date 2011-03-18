<?php

namespace Entities;

/**
 * Entities\User
 */
class User
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
    private $reportedBugs;

    /**
     * @var Entities\Bug
     */
    private $assignedBugs;

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
     * Add reportedBugs
     *
     * @param Entities\Bug $reportedBugs
     */
    public function addReportedBugs(\Entities\Bug $reportedBugs)
    {
        $this->reportedBugs[] = $reportedBugs;
    }

    /**
     * Get reportedBugs
     *
     * @return Doctrine\Common\Collections\Collection $reportedBugs
     */
    public function getReportedBugs()
    {
        return $this->reportedBugs;
    }

    /**
     * Add assignedBugs
     *
     * @param Entities\Bug $assignedBugs
     */
    public function addAssignedBugs(\Entities\Bug $assignedBugs)
    {
        $this->assignedBugs[] = $assignedBugs;
    }

    /**
     * Get assignedBugs
     *
     * @return Doctrine\Common\Collections\Collection $assignedBugs
     */
    public function getAssignedBugs()
    {
        return $this->assignedBugs;
    }
}