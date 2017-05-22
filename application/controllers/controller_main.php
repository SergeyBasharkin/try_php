<?php

class Controller_Main extends Controller
{

    function action_index()
    {
        $mailer=new My_Mailer();
        $mailer->index();
        $this->view->generate('welcome_view.php','template_view.php');
    }
}