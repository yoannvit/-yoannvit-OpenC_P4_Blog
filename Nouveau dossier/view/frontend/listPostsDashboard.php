<?php $title = 'Article'; ?>
<?php ob_start(); ?>
<h1>Article</h1>


<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4" style="height:500px">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Liste d'articles</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
      
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-area">
      <div class="form-group">
  
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Titre</th>
                  <th scope="col">Catégorie</th>
                  <th scope="col">Auteur</th>
                  <th scope="col">Date</th>
                  <th scope="col"></th>
                </tr>
              </thead>
                    
              <?php

                while ($data = $posts->fetch())
                {
                ?>
                <tbody>
                    <tr> 
                      <th scope="row"><?= $data['id'] ?></th>
                      <td><a class="nav-link" href="../public/index.php?action=Article&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title'])?></a></td>
                      <td> catégorie </td>
                      <td><?= $data['author'] ?></td>
                      <td> Publié le <?= $data['creation_date_fr'] ?></td>
                      <td><a href="index.php?action=delPost&amp;id=<?= $data['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    
                    </tr>

                  </tbody>
                      
                      
                <?php
                }
                ?>
 
       
            </table>
    </div>
  

  
    </div>
     
  </div>
</div>




<?php $content = ob_get_clean(); ?>


<?php require('templateDashboard.php'); ?>