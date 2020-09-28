<?php
require_once("../model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y \') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

   public function getPost($postId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, title, author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y \') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    public function postPost($title, $author, $content)
    {
        $db = $this->dbConnect();
        $npost = $db->prepare('INSERT INTO posts(title, author, content, creation_date) VALUES(?, ?, ?, NOW())');
        $newpost = $npost->execute(array($title, $author, $content));

        return $newpost;
    }
    public function updatepost($id, $title, $author, $content)
    {
        var_dump($_POST);
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, author = ?,content = ?, creation_date = NOW() WHERE id = ?');
        $newContent = $req->execute(array($title, $author, $content, $id));

        return $newContent;
    }
    public function deletePost($id)
    {
        $db = $this->dbConnect();


        $req = $db->prepare('DELETE FROM comments  WHERE id = ?');
        $delComment = $req->execute(array($id));

        $req = $db->prepare('DELETE FROM posts  WHERE id = ?');
        $delPost = $req->execute(array($id));

        return $delPost;
    }

    
}