<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Type.php";
    require_once "src/Animal.php";

    $server = 'mysql:host=localhost;dbname=animal_shelter_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class TypeTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
          Type::deleteAll();
        //   Animal::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $animal_type = "Dog";
            $test_Type = new Type($animal_type);
            $test_Type->save();

            //Act
            $result = Type::getAll();

            //Assert
            $this->assertEquals($test_Type, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $animal_type = "Dog";
            $animal_type2 = "Cat";
            $test_Type = new Type($animal_type);
            $test_Type->save();
            $test_Type2 = new Type($animal_type2);
            $test_Type2->save();

            //Act
            $result = Type::getAll();

            //Assert
            $this->assertEquals([$test_Type, $test_Type2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $animal_type = "Dog";
            $animal_type2 = "Cat";
            $test_Type = new Type($animal_type);
            $test_Type->save();
            $test_Type2 = new Type($animal_type2);
            $test_Type2->save();

            //Act
            Type::deleteAll();
            $result = Type::getAll();

            //Assert
            $this->assertEquals([], $result);
        }
    }

?>
