<?php

/**
 * Class InArrayTest
 */
class InArrayTest extends PHPUnit_Framework_TestCase
{
    private $property;

    protected function setUp()
    {
        $this->property = new MockProperty();
        $this->property->enum([ 'active', 'expired', 'removed' ]);
    }

    public function testValid()
    {
        // No exception = fine
        $this->property->getRequirements()->validate($this->property, 'active');
        $this->property->getRequirements()->validate($this->property, 'expired');
        $this->property->getRequirements()->validate($this->property, 'removed');
        $this->property->getRequirements()->validate($this->property, null);
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testInvalid()
    {
        $this->property->getRequirements()->validate($this->property, 'foobar');
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testInvalidBool()
    {
        $this->property->getRequirements()->validate($this->property, true);
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testInvalidInt()
    {
        $this->property->getRequirements()->validate($this->property, 0);
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testInvalidNegativeInt()
    {
        $this->property->getRequirements()->validate($this->property, -1);
    }

    /**
     * @expectedException \CatLab\Requirements\Exceptions\PropertyValidationException
     */
    public function testInvalidNegativeZero()
    {
        $this->property->getRequirements()->validate($this->property, 0);
    }
}