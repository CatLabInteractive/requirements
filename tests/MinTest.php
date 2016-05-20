<?php

/**
 * Class RequirementsTest
 */
class MinTest extends PHPUnit_Framework_TestCase
{
    private $property;

    protected function setUp()
    {
        $this->property = new MockProperty();
        $this->property->min(3);
        $this->property->setType(\CatLab\Requirements\Enums\PropertyType::STRING);
    }

    /**
     *
     */
    public function testMinLength()
    {
        // No exception = fine
        $this->property->getRequirements()->validate($this->property, 'This is a long string');
        $this->property->getRequirements()->validate($this->property, 'abc');
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testMinLengthInvalid()
    {
        $this->property->getRequirements()->validate($this->property, 'st');
    }

    /**
     *
     */
    public function testMinValue()
    {
        $numericProperty = new MockProperty();
        $numericProperty->setType(\CatLab\Requirements\Enums\PropertyType::INTEGER);
        $numericProperty->min(3);

        $numericProperty->getRequirements()->validate($numericProperty, 3);
        $numericProperty->getRequirements()->validate($numericProperty, 4);
        $numericProperty->getRequirements()->validate($numericProperty, PHP_INT_MAX);
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testMinValueInvalid()
    {
        $numericProperty = new MockProperty();
        $numericProperty->setType(\CatLab\Requirements\Enums\PropertyType::INTEGER);
        $numericProperty->min(100);

        $numericProperty->getRequirements()->validate($numericProperty, 99);
    }
}