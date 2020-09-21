<?php
require_once("../model/Manager.php");

class Usermanager extends Manager
{

    public function getUser()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, username, password, DATE_FORMAT(creation_date, \'%d/%m/%Y \') AS creation_date_fr  FROM users WHERE id !=1  ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }
    public function newUser($username ,$password)
    {
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $Users = $db->prepare('INSERT INTO users(username, password, creation_date) VALUES(:username, :password,  NOW())');
        $NUsers = $Users->execute(array(
            'username' => $username,
            'password' => $pass_hache,
            
            ));
        return $NUsers;
    }

    public function connectUser( $username ,$password)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, username, password FROM users WHERE username = :username');
        $req->execute(array(
            'username' => $username,
            
            ));
        $resultat = $req->fetch();

        return  $resultat ;
    }
    public function deleteUser($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM users  WHERE id = ?');
        $delUser= $req->execute(array($id));

        return $delUser;
    }
    public function checkUser($username)
    {
        var_dump($_POST);
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM users WHERE username = ?');
        $req->execute(array( $username));
        $isUnique = $req->fetch();
        return $isUnique;
      
    }
}