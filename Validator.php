<?php

class Validator{

    public static function string($value, $min=4, $max=15){

       $value = trim($value);

       return strlen($value)>= $min && strlen($value)<= $max;
    }
}