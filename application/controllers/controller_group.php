<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 15.05.17
 * Time: 14:24
 */
class Controller_Group extends Controller
{
    private $group;
    private $validator;

    function __construct()
    {
        $this->model = new Model_User();
        $this->view = new View();
        $this->group = new Model_Group();
        $this->validator = new Form_Validator();
    }

    function action_index()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST["groups"]) {
                $groups = $_POST["groups"];
                $this->model->delete_all_groups($_SESSION["current_user"]["id"]);
                foreach ($groups as $group){
                    if ($this->group->group_exist($group)){
                        $this->model->add_group($group, $_SESSION["current_user"]["id"]);
                    }
                }
                header("Location:/users");
            }
        } else {
            if ($_SESSION["current_user"]) {
                $data["current_user"] = $_SESSION["current_user"];
            } else {
                header("Location:/login");
            }
            $data["groups"] = $this->group->get_data();
            $this->view->generate('group_view.php', 'template_view.php', $data);
        }
    }
}