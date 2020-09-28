<?php

require_once('../Model/PostManager.php');
require_once('../Model/CommentManager.php');
require_once('../Model/Usermanager.php');
    function listPosts()
    {
        $postManager = new PostManager(); 
        $posts = $postManager->getPosts();
    
        require('../view/frontend/listPostsView.php');
       
    }
    function listArticleDashboard()
    {
        session_start();
       
        if(isset($_SESSION['username']))
        {
            $postManager = new PostManager(); 
            $posts = $postManager->getPosts();
            $commentManager = new CommentManager();
            $comments = $commentManager->nomberComment();
            require('../view/frontend/listPostsDashboard.php');
        }else{
           require('../view/frontend/connecView.php');
        }
    }

    function delPost($id)
    {
        $postManager = new PostManager(); 
        $delPost = $postManager->deletePost($id);

        header('Location:index.php?action=list_Article');
    }
  
    
    function post($page)
    {
   
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $commentParPage = 4;
        $firstComment = ($page - 1) * $commentParPage;
        $nbComments = $commentManager->nomberCommentByPost($_GET['id']);
        $pages = ceil($nbComments/ $commentParPage);
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id'],$firstComment, $commentParPage);
       

        require('../view/frontend/postView.php');
    }

    function articleDashboard($page){
        session_start();
        if(isset($_SESSION['username']))
        {
            $commentParPage =4;
            
            $firstComment = ($page - 1) * $commentParPage;
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id'],$firstComment, $commentParPage);
          
            $nbComments = $commentManager->nomberCommentByPost($_GET['id']);
            $pages = ceil($nbComments / $commentParPage);
          
            require('../view/frontend/postDashboard.php');
        
        }else{
           require('../view/frontend/connecView.php');
        }
       
  
    }

    function addNewpost($title, $author, $content){
        
        $postManager = new PostManager();
        $newpost = $postManager->postPost($title, $author, $content);
        if ($newpost === false) {
            throw new Exception('Impossible d\'ajouter un Article !');
        }
        else {
           
            header('Location:  index.php?action=vnarticle');
        }
    }
    function editPost($id, $title, $author, $content)
    {
      
        $postManager = new PostManager();
     
        $newContent = $postManager->updatepost($id, $title, $author, $content);
     
        if ($newContent === false) {
     
            throw new Exception('Impossible de modifier le commentaire !');
        }
        else {
            
            echo 'commentaire : ' . $_POST['content'];
            header('Location: index.php?action=list_Article');
        }
    }
    function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
    
        $affectedLines = $commentManager->postComment($postId, $author, $comment);
    
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
   
    
    function delComment($id , $idp)
    {
        $commentManager = new CommentManager();
        $dComment = $commentManager->deleteComment($id);
     
        if ($dComment === false) {
     
            throw new Exception('Impossible de modifier le commentaire !');
        }
        else {
            echo 'commentaire : ' . $_POST['comment'];
            header('Location: index.php?action=list_Comment_flag');
        }
    }
   


        function  flagComment($flag, $id, $idp )
        {
            $commentParPage = 5;
            $firstComment = 1;
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            $fComment = $commentManager->flagerComment($flag, $id , $idp);
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id'], $firstComment, $commentParPage);
            
            header('Location: index.php?action=post&id=' . $idp);
        }

        function listcommentsflagDashboard($page){
            session_start();

           
            if(isset($_SESSION['username']))
            {
                $commentParPage = 5;
           
                $firstComment = ($page - 1) * $commentParPage;
                $commentManager = new CommentManager();
                $comments = $commentManager->LgetComments($firstComment, $commentParPage);
                // On calcule le nombre de pages total
                $nbComments = $commentManager->nomberCommentflag();
    
                $pages = ceil($nbComments / $commentParPage);
                
  
                require('../view/frontend/listcommentsignaler.php');
            
            }else{
               require('../view/frontend/connecView.php');
            }
        }
        
      


    function delUser($id)
    {
     
        $Usermanager = new Usermanager();
        $delUser = $Usermanager->deleteUser($id);
        
        if ($delUser === false) {
     
            throw new Exception('Impossible de modifier le commentaire !');
        }
        else {
           
            header('Location:index.php?action=viewregisterconnect');
           
        }
    
    }
    function addUser($username, $password)
    {
        $usermanager = new Usermanager();
        $isUnique = $usermanager->checkUser($username);

        if ($isUnique) {
            
            header('Location:index.php?action=viewregisterconnect');
           
        } else {
                $usermanager = new Usermanager();
                $addnewUse = $usermanager->newUser($username ,$password);
                header('Location:index.php?action=viewregisterconnect');
                
            
        }
      
    }
  function viewError(){
    require('../view/frontend/404.php');
  }  
 function viewadmin(){
     session_start();
    
   require('../view/frontend/profilView.php');

 }
    function viewnewarticle()
    {  
        
         session_start();
         if(isset($_SESSION['username']))
         {
            require('../view/frontend/newArticle.php');
         }else{
            require('../view/frontend/connecView.php');
         }
            
 
    }
    function rconnect()
    {
        session_start();
        require('../view/frontend/registerView.php');
    }
    function viewconnect()
    {
        session_start();
        if(isset($_SESSION['username'])) 
            {
                $_SESSION['logged_in'] = true;
            
                require('../view/frontend/profilView.php');
            }
        else {
            require('../view/frontend/connecView.php');
        }
        
        
    }

    function  viewregisterView()

    {  
        session_start();
        if(isset($_SESSION['username'])){
            $Usermanager = new Usermanager();
            $resultat = $Usermanager->getUser();
              require('../view/frontend/registerView.php');
        }else{
            require('../view/frontend/connecView.php');
        }
    }

    function login($username, $password)
    {
        $Usermanager = new Usermanager();
        $resultat = $Usermanager->connectUser($username, $password);
        
        $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) {
                
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['username'] = $username;
              
                require('../view/frontend/profilView.php');
            
            }
            else {
                var_dump($isPasswordCorrect);
                echo 'Mauvais identifiant ou mot de passe!';
            }
        }
    }
 function logoutprofil()
   
    {
        if (isset($_COOKIE["PHPSESSID"])) {
            session_start();
            session_destroy();
            header('Location: index.php');
        } else {
            echo "don't see one";
        }
    
    }
