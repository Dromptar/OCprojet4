<?php

/*namespace OpenClassrooms\Blog\Model;*/

require_once("Manager.php");

class CommentManager extends Manager
{
    public function __construct() {
        parent::__construct();
    }

    public function allComments()
    {
        $db = $this->database;
        $req = $db->query('SELECT id, author, comment, flag,  DATE_FORMAT(comment_date, \'%d/%m/%Y\')
                                AS comment_date_fr FROM comments where flag >= 5 ORDER BY comment_date DESC');
        return $req;
    }

    public function deleteComment($deleteComment)
    {
        $db = $this->database;
        $req = $db->prepare('DELETE FROM comments WHERE id= :id');
        $req->execute(array(
                    'id' => $deleteComment
                    ));
        
        return $req;  
    }
    
       
    /**
     * getComments
     *
     * @param  mixed $postId
     * @return void
     */
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

 
    public function addFlag($comId)
    {
        $db = $this->database;
        $flags = $db->prepare('UPDATE comments SET flag= flag+1 WHERE id=:id');
        $flags->execute(array(
                        'id'=>$comId
                        ));
        return $flags;
    }
   
}