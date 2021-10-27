<?php

namespace CatLab\Requirements\Models;

use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Interfaces\Requirement;

/**
 *
 */
class TranslatableMessage extends Message
{
    /**
     * @var string
     */
    private $template;

    /**
     * @var mixed[]
     */
    private $values;

    /**
     * Message constructor.
     * @param string $template
     * @param array $values
     * @param Requirement|null $requirement
     * @param string|null $propertyName
     * @param RequirementValidationException|null $validationException
     */
    public function __construct(
        string $template,
        array $values,
        Requirement $requirement = null,
        string $propertyName = null,
        RequirementValidationException $validationException = null
    ) {
        $this->template = $template;
        $this->values = $values;

        parent::__construct($this->getMessage(), $requirement, $propertyName, $validationException);
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return mixed[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return vsprintf($this->template, $this->values);
    }
}
