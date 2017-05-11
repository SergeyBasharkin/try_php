<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 11.05.17
 * Time: 11:51
 */
class Model_User extends Model
{

    public function get_user_by_email($email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $statement = $this->open_connection()->prepare($sql);
        $statement->bindValue(':email', $email);
        if ($statement->execute()) {
            return $statement->fetch();
        }else{
            return false;
        }
    }

    public function get_data()
    {
    }

    public function save_user($name, $password, $email, $uploadfile)
    {
        $sql = 'INSERT INTO users(name,password,email,avatar_url) VALUES(:name,:password,:email,:file)';

        $password = hash('sha256',$password);
        var_dump($password);
        $statement=$this->open_connection()->prepare($sql);
        $statement->bindValue(':name',$name);
        $statement->bindValue(':password',$password);
        $statement->bindValue(':email',$email);
        $statement->bindValue(':file',$uploadfile);

        return $statement->execute();
    }
}