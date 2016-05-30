<?php

/**
 * Class RequirementsTest
 */
class MaxTest extends PHPUnit_Framework_TestCase
{
    private $property;

    protected function setUp()
    {
        $this->property = new MockProperty();
        $this->property->max(20);
        $this->property->setType(\CatLab\Requirements\Enums\PropertyType::STRING);
    }

    public function testMaxLength()
    {
        // No exception = fine
        $this->property->getRequirements()->validate($this->property, null);
        $this->property->getRequirements()->validate($this->property, 'Quite short string');
        $this->property->getRequirements()->validate($this->property, 'A rather long string');
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testMaxLengthInvalid()
    {
        $this->property->getRequirements()->validate($this->property, 'A very, very long string');
    }

    /**
     *
     */
    public function testMaxValue()
    {
        $numericProperty = new MockProperty();
        $numericProperty->setType(\CatLab\Requirements\Enums\PropertyType::INTEGER);
        $numericProperty->max(4);

        $numericProperty->getRequirements()->validate($numericProperty, null);
        $numericProperty->getRequirements()->validate($numericProperty, 3);
        $numericProperty->getRequirements()->validate($numericProperty, -123456789);
    }

    public function testMaxValueFloat()
    {
        $numericProperty = new MockProperty();
        $numericProperty->setType(\CatLab\Requirements\Enums\PropertyType::NUMBER);
        $numericProperty->max(4);

        $numericProperty->getRequirements()->validate($numericProperty, 3.14);
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testMaxValueInvalid()
    {
        $numericProperty = new MockProperty();
        $numericProperty->setType(\CatLab\Requirements\Enums\PropertyType::INTEGER);
        $numericProperty->max(100);

        $numericProperty->getRequirements()->validate($numericProperty, 101);
    }
}