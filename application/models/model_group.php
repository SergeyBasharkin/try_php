<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 15.05.17
 * Time: 15:06
 */
class Model_Group extends Model
{

    public function group_exist($id){
        $sql = 'SELECT * FROM groups WHERE id = :id';
        $statement = $this->get_pdo()->prepare($sql);
        $statement->bindValue(':id', $id);
        if ($statement->execute()) {
            return true;
        }else{
            return false;
        }
    }
    public function get_data()
    {
        $sql = 'SELECT * FROM groups';
        $statement = $this->get_pdo()->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll();
        }else{
            return false;
        }
    }

}