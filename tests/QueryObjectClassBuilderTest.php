<?php

use GraphQL\SchemaGenerator\CodeGenerator\QueryObjectClassBuilder;

class QueryObjectClassBuilderTest extends CodeFileTestCase
{
    /**
     * @return string
     */
    protected static function getExpectedFilesDir()
    {
        return parent::getExpectedFilesDir() . '/query_object_classes';
    }

    /**
     * @covers QueryObjectClassBuilder::addProperty
     */
    public function testAddProperty()
    {
        $objectName = 'WithProperty';
        $traitBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $traitBuilder->addProperty('property');
        $traitBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @depends testAddProperty
     *
     * @covers QueryObjectClassBuilder::addProperty
     */
    public function testAddProperties()
    {
        $objectName = 'WithMultipleProperties';
        $traitBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $traitBuilder->addProperty('first_property');
        $traitBuilder->addProperty('secondProperty');
        $traitBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @covers QueryObjectClassBuilder::addSimpleSetter
     */
    public function testAddSimplePropertySetter()
    {
        $objectName = 'WithSetter';
        $classBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $classBuilder->addSimpleSetter('name', 'Name');
        $classBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @depends testAddSimplePropertySetter
     *
     * @covers QueryObjectClassBuilder::addSimpleSetter
     */
    public function testAddMultipleSimplePropertySetters()
    {
        $objectName = 'WithMultipleSetters';
        $classBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $classBuilder->addSimpleSetter('last_name', 'LastName');
        $classBuilder->addSimpleSetter('first_name', 'FirstName');
        $classBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @covers QueryObjectClassBuilder::addListSetter
     */
    public function testAddListSetter()
    {
        $objectName = 'ListSetter';
        $classBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $classBuilder->addListSetter('names', 'Names', 'String');
        $classBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @depends testAddListSetter
     *
     * @covers QueryObjectClassBuilder::addListSetter
     */
    public function testAddMultipleListSetters()
    {
        $objectName = 'MultipleListSetters';
        $classBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $classBuilder->addListSetter('last_names', 'LastNames', 'String');
        $classBuilder->addListSetter('firstNames', 'FirstNames', 'String');
        $classBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @covers QueryObjectClassBuilder::addInputObjectSetter
     */
    public function testAddInputObjectSetter()
    {
        $objectName = 'InputObjectSetter';
        $classBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $classBuilder->addInputObjectSetter('filterBy', 'FilterBy', '_TestFilter');
        $classBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @depends testAddInputObjectSetter
     *
     * @covers QueryObjectClassBuilder::addInputObjectSetter
     */
    public function testAddMultipleObjectSetters()
    {
        $objectName = 'MultipleInputObjectSetters';
        $classBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $classBuilder->addInputObjectSetter('filter_one_by', 'FilterOneBy', '_TestFilterOne');
        $classBuilder->addInputObjectSetter('filterAllBy', 'FilterAllBy', '_TestFilterAll');
        $classBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @covers QueryObjectClassBuilder::addSimpleSelector
     */
    public function testAddSimpleSelector()
    {
        $objectName = 'SimpleSelector';
        $classBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $classBuilder->addSimpleSelector('name', 'Name');
        $classBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @depends testAddSimpleSelector
     * 
     * @covers QueryObjectClassBuilder::addSimpleSelector
     */
    public function testAddMultipleSimpleSelectors()
    {
        $objectName = 'MultipleSimpleSelectors';
        $classBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $classBuilder->addSimpleSelector('first_name', 'FirstName');
        $classBuilder->addSimpleSelector('last_name', 'LastName');
        $classBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @covers QueryObjectClassBuilder::addObjectSelector
     */
    public function testAddObjectSelector()
    {
        $objectName = 'ObjectSelector';
        $classBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $classBuilder->addObjectSelector('others', 'Others', 'Other');
        $classBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }

    /**
     * @depends testAddObjectSelector
     * 
     * @covers QueryObjectClassBuilder::addObjectSelector
     */
    public function testAddMultipleObjectSelectors()
    {
        $objectName = 'MultipleObjectSelectors';
        $classBuilder = new QueryObjectClassBuilder(static::getGeneratedFilesDir(), $objectName);
        $objectName .= 'QueryObject';
        $classBuilder->addObjectSelector('right_objects', 'RightObjects', 'RightObject');
        $classBuilder->addObjectSelector('left_objects', 'LeftObjects', 'LeftObject');
        $classBuilder->build();

        $this->assertFileEquals(
            static::getExpectedFilesDir() . "/$objectName.php",
            static::getGeneratedFilesDir() . "/$objectName.php"
        );
    }
}