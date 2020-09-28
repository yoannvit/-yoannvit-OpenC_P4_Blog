<?php

require('../controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                
                if(isset($_GET['page']) && !empty($_GET['page'])){
            
                    $currentPage = (int) ($_GET['page']); 
                    post($currentPage);
                }else{
                    $currentPage = 1;
                    post($currentPage);
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addNewpost') {
            if (!empty($_POST['titre']) && !empty($_POST['author']) && !empty($_POST['content'])) {
                addNewpost($_POST['titre'], $_POST['author'], $_POST['content']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            } 
        }

        elseif ($_GET['action'] == 'editPost') {
           
            if (!empty($_POST['content'])) {
                
                editPost($_GET['id'], $_POST['title'], $_POST['author'], $_POST['content']);
               }
           else {
            throw new Exception('Tous les champs ne sont pas remplis !');
        }
    }
    elseif($_GET['action'] =='delPost'){
        delPost($_GET['id']);
    }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif ($_GET['action'] == 'viewComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                viewComment();
               
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
       
            elseif ($_GET['action'] == 'editComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['comment'])) {
                        editComment($_GET['id'], $_POST['comment']);   
                       }
                   else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'delComment') {
                delComment($_GET['id'], $_GET['idp']);              
     }

     elseif($_GET['action'] == 'flagComment'){         
        flagComment(1, $_GET['id'], $_GET['idp']);    
    }
     elseif($_GET['action'] == 'Article'){         
        
        if(isset($_GET['page']) && !empty($_GET['page'])){
            
            $currentPage = (int) ($_GET['page']); 
            
            articleDashboard($currentPage);
           
        }else{
            $currentPage = 1;
            articleDashboard($currentPage);
        }
    }
    
     elseif($_GET['action'] == 'list_Article'){         
        listArticleDashboard();
          
    }
     elseif($_GET['action'] == 'list_Comment_flag'){   

        if(isset($_GET['page']) && !empty($_GET['page'])){
            
            $currentPage = (int) ($_GET['page']); 
            
            listcommentsflagDashboard($currentPage);
           
        }else{
            $currentPage = 1;
            listcommentsflagDashboard($currentPage);
        }
    }
    
        elseif($_GET['action'] == 'addUser'){
                   
                        if (!empty($_POST['username']) && !empty($_POST['password'])) {
                            addUser($_POST['username'], $_POST['password']);
                        }
                        else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }  
        }

        elseif($_GET['action'] =='delUser'){
            delUser($_GET['id']);
        }
        
        elseif($_GET['action'] =='logout'){
            logoutprofil();
        }
        elseif($_GET['action'] =='vnarticle'){
            viewnewarticle();
        }
        elseif($_GET['action'] =='viewadmin'){
            viewadmin();
        }
        
            elseif($_GET['action'] =='connect'){
                viewconnect();
            }
            elseif($_GET['action'] =='viewregisterconnect'){
                viewregisterView();
            }
        elseif($_GET['action'] =='login'){
           
            if ( !empty($_POST['username']) && !empty($_POST['password'])){
                login($_POST["username"],$_POST["password"]);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }  
        
          } else {
            throw new Exception('l\'action');
            }
        }
        
      
    
    else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    viewError();
    echo 'Erreur : ' . $e->getMessage();
}
