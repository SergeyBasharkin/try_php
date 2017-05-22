<?php

class Controller_Main extends Controller
{

    function action_index()
    {
        session_start();
        $this->view->generate('welcome_view.php','template_view.php');
    }
}