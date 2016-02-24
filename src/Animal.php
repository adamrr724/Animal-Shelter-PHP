<?php
    class Animal
    {
        private $name;
        private $id;
        private $age;
        private $admittance_date;
        private $gender;
        private $breed;
        private $type_id;

        function __construct($name, $id = null, $age, $admittance_date, $gender, $breed, $type_id)
        {
            $this->name = $name;
            $this->id = $id;
            $this->age = $age;
            $this->admittance_date = $admittance_date;
            $this->gender = $gender;
            $this->breed = $breed;
            $this->type_id = $type_id;
        }


        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function getAge()
        {
            return $this->age;
        }

        function getAdmittanceDate()
        {
            return $this->admittance_date;
        }

        function getGender()
        {
            return $this->gender;
        }

        function getBreed()
        {
            return $this->breed;
        }

        function getTypeId()
        {
            return $this->type_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO animals (name, age, date_of_admittance, gender, breed, animal_type_id) VALUES ('{$this->getName()}', {$this->getAge()}, '{$this->getAdmittanceDate()}', '{$this->getGender()}', '{$this->getBreed()}', {$this->getTypeId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_animal = $GLOBALS['DB']->query("SELECT * FROM animals;");
            $animals = array();
            foreach($returned_animal as $animal) {
                $name = $animal['name'];
                $gender = $animal['gender'];
                $age = $animal['age'];
                $admittance_date = $animal['date_of_admittance'];
                $breed = $animal['breed'];
                $id = $animal['id'];
                $type_id = $animal['animal_type_id'];
                $new_animal = new Animal($name, $id, $age, $admittance_date, $gender, $breed, $type_id);
                array_push($animals, $new_animal);
            }
            return $animals;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM animals;");
        }

        static function find($search_id)
        {
            $found_animal = null;
            $animals = Animal::getAll();
            foreach($animals as $animal) {
                $animal_id = $animal->getId();
                if ($animal_id == $search_id) {
                  $found_animal = $animal;
                }
            }
            return $found_animal;
        }
    }
?>
