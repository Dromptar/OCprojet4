<?php


/*namespace Simon\Projet4\Model;*/

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function __construct() {
        parent::__construct();
    }

    public function getLastPosts(){

        /*var_dump($this->db);*/
        
        $db = $this->database;
        $req = $db->query('SELECT id, author, title, quote, content, DATE_FORMAT(date_post, \'%d/%m/%Y\')
         AS date_post_fr FROM posts ORDER BY date_post DESC LIMIT 0, 3');

        return $req;/*->fetchAll();*/
    
    }

    public function getAllPosts(){

        var_dump($this->db);

        $db = $this->database;
        $req = $db->query('SELECT id, author, title, quote, content, DATE_FORMAT(date_post, \'%d/%m/%Y\')
         AS date_post_fr FROM posts ORDER BY date_post');

        return $req;


    }

}