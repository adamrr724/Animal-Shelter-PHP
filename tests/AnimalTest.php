<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Animal.php";
    require_once "src/Type.php";

    $server = 'mysql:host=localhost;dbname=animal_shelter_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class AnimalTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Animal::deleteAll();
            Type::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $animal_type = "Dog";
            $id = null;
            $test_type = new Type($animal_type, $id);
            $test_type->save();

            $name = "Fluffy";
            $gender = 'female';
            $age = 12;
            $admittance_date = '2016-03-23';
            $breed = 'bulldog';
            $type_id = $test_type->getId();
            $test_animal = new Animal($name, $id, $age, $admittance_date, $gender, $breed, $type_id);

            //Act
            $test_animal->save();
            $result = Animal::getAll();

            //Assert
            $this->assertEquals($test_animal, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $animal_type = "Dog";
            $id = null;
            $test_type = new Type($animal_type, $id);
            $test_type->save();

            $name = "Fluffy";
            $gender = 'female';
            $age = 12;
            // $id = null;
            $admittance_date = '2016-03-23';
            $breed = 'bulldog';
            $type_id = $test_type->getId();
            $test_animal = new Animal($name, $id, $age, $admittance_date, $gender, $breed, $type_id);
            $test_animal->save();

            $name2 = "Dingo";
            $gender2 = 'male';
            $age2 = 1;
            $admittance_date2 = '2016-03-22';
            $breed2 = 'greyhound';
            $type_id2 = $test_type->getId();
            $test_animal2 = new Animal($name2, $id, $age2, $admittance_date2, $gender2, $breed2, $type_id2);
            $test_animal2->save();

            //Act
            $result = Animal::getAll();

            //Assert
            $this->assertEquals([$test_animal, $test_animal2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $animal_type = "Dog";
            $id = null;
            $test_type = new Type($animal_type, $id);
            $test_type->save();

            $name = "Fluffy";
            $gender = 'female';
            $age = 12;
            $admittance_date = '2016-03-23';
            $breed = 'bulldog';
            $type_id = $test_type->getId();
            $test_animal = new Animal($name, $id, $age, $admittance_date, $gender, $breed, $type_id);
            $test_animal->save();

            $name2 = "Dingo";
            $gender2 = 'male';
            $age2 = 1;
            $admittance_date2 = '2016-03-22';
            $breed2 = 'greyhound';
            $type_id2 = $test_type->getId();
            $test_animal2 = new Animal($name2, $id, $age2, $admittance_date2, $gender2, $breed2, $type_id2);
            $test_animal2->save();

            //Act
            Animal::deleteAll();

            //Assert
            $result = Animal::getAll();
            $this->assertEquals([], $result);
        }
    }
?>
