<?php

class Model
{
	
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/

	// метод выборки данных

    protected function open_connection()
    {
        return new PDO('pgsql:dbname=php_dev;host=localhost;user=sergey;password=3336754');
    }

	public function get_data()
	{
		// todo
	}
}