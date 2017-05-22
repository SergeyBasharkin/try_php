<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 22.05.17
 * Time: 15:33
 */
class Controller_Mailer extends Controller
{
    private $mailer;

    function __construct()
    {
        $this->mailer = new My_Mailer();
        $this->view = new View();
    }

    function action_index()
    {
        if (isset($_POST["email"])) {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $data["message"] = "email is not valid";
            } else {
                $email = $_POST["email"];
                $text = $_POST["body"];

                $sent = $this->mailer->send($email, $text);

                if ($sent) {
                    $data["message"] = "success";
                } else {
                    $data["message"] = "fail";
                }

                var_dump($data);
            }
        }

        $this->view->generate("mailer_view.php", "template_view.php", $data);
    }
}