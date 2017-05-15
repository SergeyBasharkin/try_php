<?php

class Model
{
    private $pdo;

    protected function get_pdo()
    {
         return $this->pdo;
    }

	public function get_data()
	{
		// todo
	}

	function __construct()
    {
        $this->pdo=DB_Connection::getInstance();
    }
}