<?php

/**
 * Class RequirementsTest
 */
class RequiredTest extends PHPUnit_Framework_TestCase
{
    private $property;

    protected function setUp()
    {
        $this->property = new MockProperty();
        $this->property->required();
    }

    public function testRequiredValid()
    {
        // No exception = fine
        $this->property->getRequirements()->validate($this->property, 'This is a value');
        $this->property->getRequirements()->validate($this->property, 0);
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testRequiredInvalid()
    {
        $this->property->getRequirements()->validate($this->property, null);
    }
}