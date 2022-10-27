<?php
    include_once('genderdao.php');
    class GenderController{
        public static function get(){
            $genders = GenderDao::getAll();
            return json_encode($genders);
        }

    }
