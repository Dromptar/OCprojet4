<?php

/*namespace Simon\Projet4\Model;*/

class Manager
{

    protected $database;

	public function __construct()
	{
		try
		{
			$this->database = new PDO($GLOBALS['connectionString'], $GLOBALS['dbUser'],
			 $GLOBALS['dbPassword'], $GLOBALS['optionsPDO']);
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
    }
}