<?php $title = 'Article'; ?>
<?php ob_start(); ?>

    <div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Modifier</h6>
    
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-area">
      <div class="form-group">
      <form  action="index.php?action=editPost&amp;id=<?= $post['id'] ?>" method="post">
              
            <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationCustom01">Titre</label>
              <input type="text"class="form-control " id="title" name="title" placeholder="" value="<?= htmlspecialchars($post['title']) ?>">
              
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustom02">Auteur</label>
              <input type="text"class="form-control " id="author" name="author"  value="<?= htmlspecialchars($post['author']) ?>">
            
          </div>

         

                <label for="exampleFormControlSelect2"></label>
    <textarea class="form-control" id="exampleFormControlSelect2 "id="content" name="content" rows="8"><?= nl2br(htmlspecialchars($post['content'])) ?></textarea>
<br>

                <input class="btn btn-primary  " type="submit" value="Envoyer" id="submit" name="submit">
            </form>
  
</div></div></div>

<br>
<br>
<h6 class="m-0 font-weight-bold text-primary">Liste des Commentaires</h6>
<br>
<table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">auteur</th>
                  
                  <th scope="col">Auteur</th>
                  <th scope="col">Date</th>
                  <th scope="col">Contenue</th>
                </tr>
              </thead>
                    
              <?php

                while ($comment = $comments->fetch())
                {
                ?>
                <tbody>
                    <tr> 
                      <th scope="row"><?= $comment['id'] ?></th>
                      <td><?= nl2br(htmlspecialchars($comment['author'])) ?></a></td>
                    
                      <td>  <?= htmlspecialchars($comment['author']) ?></td>
                      <td>  <?= $comment['comment_date_fr'] ?></td>
                      <td>  <?= $comment['comment'] ?></td>
                      <td><a href="index.php?action=delComment&amp;id=<?= $comment['id'] ?>&amp;idp=<?= $post['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                      
                    </tr>

                  </tbody>
                      
                      
                <?php
                }
                ?>
 
 <nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($page  == 1) ? "disabled" : "" ?>">
            <a href="index.php?action=Article&id=<?= $post['id'] ?>&amp;page=<?= $page  - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($i = 1; $i <= $pages; $i++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($i == $page) ? "active" : "" ?>">
                <a href="index.php?action=Article&id=<?= $post['id'] ?>&amp;page=<?= $i ?>" class="page-link"><?= $i ?></a>
            </li>
        <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($page == $pages ) ? "disabled" : "" ?>">
            <a href="index.php?action=Article&id=<?= $post['id'] ?>&amp;page=<?= $page + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
            </table>
    <?php $content = ob_get_clean(); ?>

 
<?php require('templateDashboard.php'); ?>