<?php

namespace Simon\Projet4\Model;

class Manager
{

    protected $db;

	public function __construct()
	{
		try
		{
			$this->db = new PDO('mysql:host=localhost;port=3306;dbname=mabase;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
    }
}