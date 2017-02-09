<?php
    class Tamagotchi
    {
            private $name;
            // private $food;
            // private $attention;
            // private $rest;

            function __construct($name)
            {
                $this->name = $name;
                // $this->food = $food;
                // $this->attention = $attention;
                // $this->rest = $rest;
            }

            function setName($new_name)
            {
                $this->name = (string) $new_name;
            }

            function getName()
            {
                return $this->name;
            }

            function setFood($new_food)
            {
                $this->food = (string) $new_food;
            }

            function getFood()
            {
                return $this->food;
            }

            function setAttention($new_attention)
            {
                $this->attention = (string) $new_attention;
            }

            function getAttention()
            {
                return $this->attention;
            }

            function setRest($new_rest)
            {
                $this->rest = (string) $new_rest;
            }

            function save()
            {
                array_push($_SESSION['list_of_properties'] , $this);
            }

            static function getAll()
            {
                return $_SESSION['list_of_properties'];
            }

            static function deleteAll()
            {
                $_SESSION['list_of_properties'] = array();
            }


    }

?>
