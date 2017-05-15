<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 15.05.17
 * Time: 15:46
 */
class Controller_Users extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_User();
    }

    function action_index()
    {
        $users = [];
        foreach ($this->model->get_data() as $column){
            if (!isset($users[$column["email"]])){
                $users[$column["email"]]["groups"] = [];
                $users[$column["email"]]["avatar"] = $column["avatar"];
            }
            $users[$column["email"]]["groups"][] = $column["group_name"];

        }
        $data["users"]=$users;
        $this->view->generate("users_view.php", "template_view.php", $data);
    }


}