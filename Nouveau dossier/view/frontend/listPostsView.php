
  <?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>

<?php include("intro.php"); ?>
  <div class="container">

<div class="row">
<?php

while ($data = $posts->fetch())
{
?>
<main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
             
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <!-- <div class="category"><a href="#">Business</a><a href="#">Financial</a></div> -->
                </div>
                <h1><?= htmlspecialchars($data['title']) ?><a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><i class="fa fa-bookmark-o"></i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    
                    <div class="title"><span><?= $data['author'] ?></span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i> <?= $data['creation_date_fr'] ?></div>
                    
                    <div class="comments meta-last"><a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><i class="icon-comment"></i></a></div>
                  </div>
                </div>
                <div class="post-body">
                  <p class="lead"><?= $data['content']?></p>
                  <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  <p> <img src="img/featured-pic-3.jpeg" alt="..." class="img-fluid"></p>
                  <h3>Lorem Ipsum Dolor</h3>
                  <p>div Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda temporibus iusto voluptates deleniti similique rerum ducimus sint ex odio saepe. Sapiente quae pariatur ratione quis perspiciatis deleniti accusantium</p>
                  <blockquote class="blockquote">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                    <footer class="blockquote-footer">Someone famous in
                      <cite title="Source Title">Source Title</cite>
                    </footer>
                  </blockquote>
                  <p>quasi nam. Libero dicta eum recusandae, commodi, ad, autem at ea iusto numquam veritatis, officiis. Accusantium optio minus, voluptatem? Quia reprehenderit, veniam quibusdam provident, fugit iusto ullam voluptas neque soluta adipisci ad.</p> -->
                </div>
                
            </div>
          </div>
        </main>


 
     
      
<?php
}
$posts->closeCursor();
?>





  </div>




</div>


</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>