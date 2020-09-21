<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
      
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <!-- <div class="category"><a href="#">Business</a><a href="#">Financial</a></div> -->
                </div>
                <h1><?= htmlspecialchars($post['title']) ?><a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                   
                    <div class="title"><span><?= htmlspecialchars($post['author']) ?></span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i> <?= $post['creation_date_fr'] ?></div>
                    <!-- <div class="views"><i class="icon-eye"></i> 500</div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div> -->
                  </div>
                </div>
                <div class="post-body">
                  <p class="lead"><?= htmlspecialchars($post['content']) ?></p>
                 
                </div>
                

                <div class="post-comments">
                  <header>
                    <h3 class="h6">Commentaire<span class="no-of-comments"></span></h3>
                  </header>

                  <?php
                   while ($comment = $comments->fetch())
        {  
        ?>
                  <div class="comment">
                    <div class="comment-header d-flex justify-content-between">
                      <div class="user d-flex align-items-center">
                        
                        <div class="title"><strong> <?= htmlspecialchars($comment['author']) ?></strong><span class="date">       <?= $comment['comment_date_fr'] ?></span></div>
                      </div>
                    </div>
                    <div class="comment-body">
                      <p>  <?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                      <?php
                    
                    if(($comment['flag'])) {
                     ?>
                     <p>Ce commentaire a déjà été signalé</p>
                     <?php
                      } else {
                     ?>
                   <a href="../public/index.php?action=flagComment&amp;id=<?= $comment['id'] ?>&amp;idp=<?= $post['id'] ?>">Signaler le commentaire</a>
                     <?php
                 }
                 ?>
                    </div>
                    
                  </div>
  
              
        <?php
        }
        ?>
  <nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($page  == 1) ? "disabled" : "" ?>">
            <a href="index.php?action=post&amp;id=<?=$post['id']?>&amp;page=<?= $page  - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($i = 1; $i <= $pages; $i++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($i == $page) ? "active" : "" ?>">
                <a href="index.php?action=post&amp;id=<?=$post['id']?>&amp;page=<?= $i ?>" class="page-link"><?= $i ?></a>
            </li>
        <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($page == $pages ) ? "disabled" : "" ?>">
            <a href="index.php?action=post&amp;id=<?=$post['id']?>&amp;page=<?= $page + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
</nav>
                </div>
                <div class="add-comment">
                  <header>
                    <h3 class="h6">Répondre</h3>
                  </header>
                  <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" class="commenting-form">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <input type="text"  id="author" name="author" placeholder="Name" class="form-control">
                      </div>
                      <!-- <div class="form-group col-md-6">
                        <input type="email" name="username" id="useremail" placeholder="Email Address (will not be published)" class="form-control">
                      </div> -->
                      <div class="form-group col-md-12">
                        <textarea id="comment" name="comment" placeholder="Type your comment" class="form-control"></textarea>
                      </div>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary">Envoyer</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <!-- <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header>
            <form action="#" class="search-form">
              <div class="form-group">
                <input type="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div> -->
          <!-- Widget [Latest Posts Widget]        -->
          <!-- <div class="widget latest-posts">
            <header>
              <h3 class="h6">Latest Posts</h3>
            </header>
            <div class="blog-posts"><a href="#">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="img/small-thumbnail-1.jpg" alt="..." class="img-fluid"></div>
                  <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="icon-eye"></i> 500</div>
                      <div class="comments"><i class="icon-comment"></i>12</div>
                    </div>
                  </div>
                </div></a><a href="#">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid"></div>
                  <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="icon-eye"></i> 500</div>
                      <div class="comments"><i class="icon-comment"></i>12</div>
                    </div>
                  </div>
                </div></a><a href="#">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid"></div>
                  <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="icon-eye"></i> 500</div>
                      <div class="comments"><i class="icon-comment"></i>12</div>
                    </div>
                  </div>
                </div></a></div>
          </div> -->
          <!-- Widget [Categories Widget]-->
          <!-- <div class="widget categories">
            <header>
              <h3 class="h6">Categories</h3>
            </header>
            <div class="item d-flex justify-content-between"><a href="#">Growth</a><span>12</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Sales</a><span>8</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Tips</a><span>17</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>
          </div> -->
          <!-- Widget [Tags Cloud Widget]-->
          <!-- <div class="widget tags">       
            <header>
              <h3 class="h6">Tags</h3>
            </header>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
            </ul>
          </div> -->
        </aside>
      </div>
    </div>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

