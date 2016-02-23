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
    }
 ?>
