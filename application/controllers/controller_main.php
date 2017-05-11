<?php

class Controller_Main extends Controller
{

    function action_index()
    {
        $this->view->generate('welcome_view.php','template_view.php');
    }
}