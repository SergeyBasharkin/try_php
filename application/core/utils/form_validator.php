<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 11.05.17
 * Time: 12:47
 */
class Form_Validator
{

    function validate_reg_form($uploadfile)
    {
        $errors = [];
        if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["confirmPass"])) {
            $errors[] = "some fields is not present";
        }
        if (empty($_POST["email"]) || empty($_POST["name"]) || empty($_POST["password"])) {
            $errors[] = "some fields is empty";

        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "email is not valid";
        }
        if (!($_POST["password"] === $_POST["confirmPass"])) {
            $errors[] = "passwords does not equals";
        }
        if ($_FILES['image']['type'] === "image/png" || $_FILES['image']['type'] === "image/jpeg") {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                $errors[] = "upload error";
            }
        } else {
            $errors[] = $_FILES['image']['type'];
            $errors[] = "error of type";
        }
        if ($_FILES['image']['error'] == 2) {
            $errors[] = "file is too big";
        }
        return $errors;
    }

}