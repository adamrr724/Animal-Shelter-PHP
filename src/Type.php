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
    }
 ?>
