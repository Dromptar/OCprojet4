<?php

/*namespace Simon\Projet4\Model;*/

class Manager
{

    protected $database;

	public function __construct()
	{
		try
		{
			$this->database = new PDO('mysql:host=dromptarvzdrom.mysql.db;port=3306;
									dbname=dromptarvzdrom;charset=utf8', 'dromptarvzdrom', 'celeDromptar1492', 
									array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
    }
}