<?php

class Controller_Login extends Controller
{

    function __construct()
    {
        $this->model = new Model_User();
        $this->view = new View();
    }

    function action_logout(){
        session_start();
        unset($_SESSION['current_user']);
        session_destroy();
    }

    function action_index()
    {
        //$data["login_status"] = "";

        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            /*
            Производим аутентификацию, сравнивая полученные значения со значениями прописанными в коде.
            Такое решение не верно с точки зрения безопсаности и сделано для упрощения примера.
            Логин и пароль должны храниться в БД, причем пароль должен быть захеширован.
            */
            if ($user = $this->model->get_user_by_email($login)) {
			    if ($login === $user["email"] && $password === $user["password"]){
			        $data["login_status"] = "access_granted";

			        session_start();
			        $_SESSION['current_user'] = $user;

			        $this->view->generate('main_view.php', 'template_view.php', $data);
                } else {
                    $data["login_status"] = "access_denied";
                }
            }else {
                $data["login_status"] = "access_denied";
            }

        } else {
            session_start();
            if (isset($_SESSION['current_user'])){
                $this->view->generate('main_view.php', 'template_view.php');
            }else {
                $data["login_status"] = "";
                $this->view->generate('login_view.php', 'template_view.php', $data);
            }
        }

    }

}
