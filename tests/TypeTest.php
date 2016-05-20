<?php

/**
 * Class RequirementsTest
 */
class TypeTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testString()
    {
        $property = new MockProperty();
        $property->setType(\CatLab\Requirements\Enums\PropertyType::STRING);


        $property->getRequirements()->validate($property, 'string');
        $property->getRequirements()->validate($property, '123');
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testStringInvalidNumber()
    {
        $property = new MockProperty();
        $property->setType(\CatLab\Requirements\Enums\PropertyType::STRING);

        $property->getRequirements()->validate($property, 123);
    }


    public function testInt()
    {
        $property = new MockProperty();
        $property->setType(\CatLab\Requirements\Enums\PropertyType::INTEGER);

        $property->getRequirements()->validate($property, 123);
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testIntInvalidNumber()
    {
        $property = new MockProperty();
        $property->setType(\CatLab\Requirements\Enums\PropertyType::INTEGER);

        $property->getRequirements()->validate($property, 123.5);
    }

    /**
     *
     */
    public function testNumber()
    {
        $property = new MockProperty();
        $property->setType(\CatLab\Requirements\Enums\PropertyType::NUMBER);

        $property->getRequirements()->validate($property, 123);
        $property->getRequirements()->validate($property, 123.5);
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testNumberInvalid()
    {
        $property = new MockProperty();
        $property->setType(\CatLab\Requirements\Enums\PropertyType::NUMBER);

        $property->getRequirements()->validate($property, 'abc');
    }
}