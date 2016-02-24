<?php
    Class Type
    {
        private $id;
        private $animal_type;

        function __construct($animal_type, $id = null)
        {
            $this->id = $id;
            $this->animal_type = $animal_type;
        }

        function getId()
        {
            return $this->id;
        }

        function getAnimalType()
        {
            return $this->animal_type;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO type (animal_type) VALUES ('{$this->getAnimalType()}')");
            $this->id= $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_type = $GLOBALS['DB']->query("SELECT * FROM type;");
            $output_types = array();
            foreach($returned_type as $type) {
                $animal_type = $type['animal_type'];
                $id = $type['id'];
                $new_type = new Type($animal_type, $id);
                array_push($output_types, $new_type);
            }
            return $output_types;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM type;");
        }

        function getAnimals()
        {
            $animals = Array();
            $returned_animals = $GLOBALS['DB']->query("SELECT * FROM animals WHERE animal_type_id = {$this->getId()};");
            foreach($returned_animals as $animal) {
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

        static function find($search_id)
        {
            $found_type = null;
            $types = Type::getAll();
            foreach($types as $type) {
                $type_id = $type->getId();
                if ($type_id == $search_id) {
                  $found_type = $type;
                }
            }
            return $found_type;
        }

    }
 ?>
