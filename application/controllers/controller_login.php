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

        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if ($user = $this->model->get_user_by_email($login)) {
			    if ($login === $user["email"] && hash('sha256',$password) === $user["password"]){
			        $data["login_status"] = "access_granted";

			        session_start();
			        $_SESSION['current_user'] = $user;

			        $this->view->generate('main_view.php', 'template_view.php', $data);
                } else {
                    $data["login_status"] = "access_denied";
                    $this->view->generate('login_view.php', 'template_view.php', $data);
                }
            }else {
                $data["login_status"] = "access_denied";
                $this->view->generate('login_view.php', 'template_view.php', $data);
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
