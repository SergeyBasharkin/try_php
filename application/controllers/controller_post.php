<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 22.05.17
 * Time: 17:57
 */
class Controller_Post extends Controller
{

    private $post_validator;
    function __construct()
    {
        $this->post_validator = new Post_Validator();
        $this->model = new Model_Post();
        $this->view = new View();
    }

    function action_index()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data["errors"] = $this->post_validator->validate();
            if (empty($data["errors"])) {

                $this->model->save_post($_POST["body"]);
            }
        }
        $data["posts"] = $this->model->get_all_posts();

        $this->view->generate("posts_view.php","template_view.php", $data);
    }
}