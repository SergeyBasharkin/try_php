<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 10.05.17
 * Time: 20:12
 */
class Controller_Registration extends Controller
{

    function __construct()
    {
        $this->model = new Model_User();
        $this->view = new View();
    }

    function action_index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Form_Validator();

            $resource =     'public/avatars/';
            $filename = uniqid() . $_FILES['image']['name'];
            $uploadfile = $resource . $filename;


            $errors = $validator->validate_reg_form($uploadfile);

            if (empty($errors)) {
                $this->model->save_user($_POST["name"],$_POST["password"],$_POST["email"], $uploadfile);
                $data["login_status"]="";
                $this->view->generate('login_view.php','template_view.php',$data);
            } else {
                $data["login_status"] = "";
                $data["errors"] = $errors;
                $this->view->generate('registration_view.php', 'template_view.php', $data);
            }
        }else{
            $this->view->generate('registration_view.php', 'template_view.php');
        }
    }
}