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
        $statement = $this->get_pdo()->prepare($sql);
        $statement->bindValue(':email', $email);
        if ($statement->execute()) {
            return $statement->fetch();
        }else{
            return false;
        }
    }

    public function get_data()
    {
        $sql = 'SELECT users.email as email, users.avatar_url as avatar, groups.id as group_id, groups.name as group_name FROM users INNER JOIN user_groups ON users.id = user_groups.user_id INNER JOIN groups ON user_groups.group_id = groups.id';

        $statement = $this->get_pdo()->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll();
        }else{
            return false;
        }
    }

    public function save_user($name, $password, $email, $uploadfile)
    {
        $sql = 'INSERT INTO users(name,password,email,avatar_url) VALUES(:name,:password,:email,:file)';

        $password = hash('sha256',$password);

        $statement=$this->get_pdo()->prepare($sql);
        $statement->bindValue(':name',$name);
        $statement->bindValue(':password',$password);
        $statement->bindValue(':email',$email);
        $statement->bindValue(':file',$uploadfile);

        return $statement->execute();
    }

    public function add_group($group_id, $user_id)
    {
        $sql = 'INSERT INTO user_groups(group_id, user_id) VALUES(:group_id, :user_id)';

        $statement=$this->get_pdo()->prepare($sql);
        $statement->bindValue(':group_id',$group_id);
        $statement->bindValue(':user_id',$user_id);

        return $statement->execute();
    }

    public function update_group($group_id, $user_id){
        $sql = 'UPDATE user_groups SET group_id = :group_id, user_id = :user_id';

        $statement=$this->get_pdo()->prepare($sql);
        $statement->bindValue(':group_id',$group_id);
        $statement->bindValue(':user_id',$user_id);

        return $statement->execute();
    }

    public function delete_all_groups($user_id)
    {
        $sql = 'DELETE FROM user_groups WHERE user_id = :user_id';

        $statement=$this->get_pdo()->prepare($sql);
        $statement->bindValue(':user_id',$user_id);

        return $statement->execute();
    }
}