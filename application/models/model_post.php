<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 22.05.17
 * Time: 17:58
 */
class Model_Post extends Model
{

    public function save_post($body, $id = null)
    {
        $body = htmlspecialchars($body, ENT_QUOTES);
        $user_id = $_SESSION["current_user"]["id"];

        $sql = 'INSERT INTO posts(body, parent_id, user_id) VALUES(:body, :parent_id, :user_id)';
        $statement = $this->get_pdo()->prepare($sql);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':parent_id', $id);
        $statement->bindValue(':user_id', $user_id);
        if ($statement->execute()) {

            return true;
        }else{
            return false;
        }
    }

    public function get_all_posts()
    {
        $userModel = new Model_User();

        $sql = 'SELECT * FROM posts WHERE parent_id IS NULL';
        $statement = $this->get_pdo()->prepare($sql);
        if ($statement->execute()) {
            $result = $statement->fetchAll();
            $posts = [];
            foreach ($result as $post){
                $post["user"] = $userModel->get_user_by_id($post["user_id"]);
                $post["comments"] = $this->get_comments($post["id"]);
                $posts[] = $post;
            }
            return $posts;
        }else{
            return false;
        }
    }

    public function build_post($post){
        $post["comments"] = $this->get_comments($post["id"]);
    }


    private function get_all_posts_by_id($parent_id)
    {
        $sql = 'SELECT * FROM posts WHERE parent_id = :id';
        $statement = $this->get_pdo()->prepare($sql);
        $statement->bindValue("id", $parent_id);
        if ($statement->execute()) {
            $result = $statement->fetch();
            return $result;
        }else{
            return false;
        }
    }

    private function get_comments($id)
    {
        $userModel = new Model_User();


        $sql = 'SELECT * FROM posts WHERE parent_id = :id';
        $statement = $this->get_pdo()->prepare($sql);
        $statement->bindValue("id", $id);
        if ($statement->execute()) {
            $result = $statement->fetchAll();
            $posts = [];
            foreach ($result as $post){
                $post["user"] = $userModel->get_user_by_id($post["user_id"]);
                $post["comments"] = $this->get_comments($post["id"]);
                $posts[] = $post;
            }
            return $posts;
        }else{
            return false;
        }
    }
}