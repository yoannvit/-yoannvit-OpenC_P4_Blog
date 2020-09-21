<?php
require_once("../model/Manager.php");
class CommentManager extends Manager
{
    // public function getComments($postId)
    // {
    //     $db = $this->dbConnect();
    //     $comments = $db->prepare('SELECT id, author, comment, flag, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC LIMIT 10');
    //     $comments->execute(array($postId));
    
    //     return $comments;
    // }
    public function LgetComments($commentParPage,$firstComment)
    {
        $db = $this->dbConnect();
       
        $comments = $db->prepare('SELECT id, author, comment, flag, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE flag = 1 ORDER BY comment_date DESC LIMIT :number, :first');
        $comments->bindValue('number', $commentParPage, PDO::PARAM_INT);
        $comments->bindValue('first', $firstComment, PDO::PARAM_INT);
        $comments->execute();
        return $comments;
    }
    
    public function getComments($postId, $firstComment, $commentParPage)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, flag, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = :post_id ORDER BY comment_date DESC LIMIT :first, :number');
        
        $comments->bindValue('number', $commentParPage, PDO::PARAM_INT);
        $comments->bindValue('first', $firstComment, PDO::PARAM_INT);
        $comments->bindValue('post_id', $postId, PDO::PARAM_INT);
        $comments->execute();
    
        return $comments;
    }
    
    public function getComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, flag, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?  ');
        $req->execute(array($id));
        $comment = $req->fetch();
        return $comment;
    }
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, flag, comment_date) VALUES(?, ?, ?,0, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }


    public function updateComment($id, $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = ?, comment_date = NOW() WHERE id = ?');
        $newComment = $req->execute(array($comment, $id));

        return $newComment;
    }

    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments  WHERE id = ?');
        $delComment = $req->execute(array($id));

        return $delComment;
    }

    public function flagerComment($flag, $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET flag = ? WHERE id = ?');
        $fComment = $req->execute(array($flag, $id));

        return $fComment;
    }

    public function nomberComment()
    {

        $db = $this->dbConnect();
        $req = $db->prepare("SELECT COUNT(*) as nb_Comments FROM comments GROUP BY post_id ");
        $req ->execute();
        $result = $req->fetch();

        $nbComments = (int) $result['nb_Comments'];
        return $nbComments ;

    }
   
    public function nomberCommentByPost($id)
    {

        $db = $this->dbConnect();
        $req = $db->prepare("SELECT COUNT(*) as nb_Comments FROM comments WHERE post_id = ?");
        $req ->execute(array($id));
        $result = $req->fetch();

        $nbComments = (int) $result['nb_Comments'];
        return $nbComments ;
        
     
        
     
    }
 
    public function nomberCommentflag()
    {

        $db = $this->dbConnect();
        $req = $db->prepare("SELECT COUNT(*) as nb_Comments FROM comments WHERE flag = 1");
        $req ->execute();
        $result = $req->fetch();

        $nbComments = (int) $result['nb_Comments'];
        return $nbComments ;
        
     
        
     
    }
}
