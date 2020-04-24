<?php


/*namespace Simon\Projet4\Model;*/

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function __construct() {
        parent::__construct();
    }

    public function getPosts(){

        /*var_dump($this->db);*/
        
        $db = $this->database;
        $req = $db->query('SELECT id, author, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\')
         AS date_post_fr FROM posts ORDER BY date_post DESC LIMIT 0, 3');

        return $req;/*->fetchAll();*/

        

        
        
    }

}