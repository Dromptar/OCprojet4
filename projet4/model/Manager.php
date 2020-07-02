<?php

/*namespace Simon\Projet4\Model;*/

class Manager
{

    protected $database;

	public function __construct()
	{
		try
		{
			$this->database = new PDO('mysql:host=localhost;port=3306;
			dbname=projet4', 'root', '', 
									array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
    }
}