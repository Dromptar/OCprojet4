<?php

/*namespace OpenClassrooms\Blog\Model;*/

require_once("Manager.php");

class CommentManager extends Manager
{
    public function __construct() {
        parent::__construct();
    }

    public function getComments($postId)
    {
       $db = $this->database;
       $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') 
                                AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
       $comments->execute(array($postId));
   
       return $comments;
       
    }

    public function postComment($postId, $author, $comment)
    {
       $db = $this->database;
       $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) 
                                VALUES(?, ?, ?, NOW())');
       $affectedLines = $comments->execute(array($postId, $author, $comment));
   
       return $affectedLines;
       
    }

 
    public function addFlag()
    {
        $db = $this->database;
        $flag = $db->prepare('UPDATE comments SET flag= flag+1 WHERE id= :id, post_id= :post_id');
        $flag->execute(array(
                        'id' => $_GET['id'],
                        'post_id' => $_GET['post_id']
                            ));
        return $flag;
    }
   
}