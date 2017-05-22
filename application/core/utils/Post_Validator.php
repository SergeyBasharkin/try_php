<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 22.05.17
 * Time: 18:07
 */
class Post_Validator
{
    public function validate(){
        $errors = [];
        if (!isset($_POST["body"])){
            $errors[] = "empty body";
        }
        if (!isset($_SESSION["current_user"])){
            $errors[]= "you must sing up";
        }
        return $errors;
    }
}