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

        function __construct($name, $id, $age, $admittance_date, $gender, $breed, $type_id)
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
    }






?>
