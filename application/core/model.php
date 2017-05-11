<?php

class Model
{

    protected function open_connection()
    {
        $pdo = new PDO("pgsql:dbname=".$_ENV["DB_NAME"].";host=localhost;user=".$_ENV["DB_USERNAME"].";password=".$_ENV["DB_PASSWORD"]);
        return $pdo;
    }

	public function get_data()
	{
		// todo
	}
}