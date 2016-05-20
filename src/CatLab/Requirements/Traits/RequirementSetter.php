<?php

namespace CatLab\Requirements\Traits;

use CatLab\Requirements\Collections\RequirementCollection;
use CatLab\Requirements\Exists;
use CatLab\Requirements\Interfaces\Requirement;
use CatLab\Requirements\IsMax;
use CatLab\Requirements\IsMin;
use CatLab\Requirements\IsType;

/**
 * Class RequirementSetter
 * @package CatLab\Requirements\Traits
 */
trait RequirementSetter
{
    use TypeSetter;

    /**
     * @var RequirementCollection
     */
    private $requirements;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var bool
     */
    private $required = false;

    /**
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        $this->addRequirement(new IsType($type));
        return $this;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @param Requirement $requirement
     * @return $this
     */
    public function addRequirement(Requirement $requirement)
    {
        if (!isset($this->requirements)) {
            $this->requirements = new RequirementCollection();
        }
        $this->requirements->add($requirement);
        return $this;
    }

    /**
     * @return bool
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @return RequirementCollection
     */
    public function getRequirements()
    {
        if (!isset($this->requirements)) {
            $this->requirements = new RequirementCollection();
        }
        return $this->requirements;
    }

    /**
     * Mark a property as required
     * @return $this
     */
    public function required()
    {
        $this->addRequirement(new Exists());
        $this->required = true;
        return $this;
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function min(int $amount)
    {
        $this->addRequirement(new IsMin($amount));
        return $this;
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function max(int $amount)
    {
        $this->addRequirement(new IsMax($amount));
        return $this;
    }
}