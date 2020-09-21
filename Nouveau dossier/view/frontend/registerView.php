
  <?php $title = 'Inscription'; ?>
<?php ob_start(); ?>
<h1>Parrametre utilisateur</h1>


<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4" style="height:500px">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Nouveaux utilisateur</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Header:</div>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-area">
      <div class="form-group">
      <form method="post" action="index.php?action=addUser">
              
            <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationCustom01">Pseudo</label>
              <input type="text"class="form-control " id="username" name="username" placeholder="username" value="">
              
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustom02">password</label>
              <input  type="password"class="form-control " id="author"  id="password" name="password">
            
          </div>
          
      </div>
                </div>
                <input class="btn btn-primary  " type="submit" value="Inscription" id="submit" name="submit">
      
            </form>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Role</th>
                  <th scope="col">Date</th>
                  <th scope="col"></th>
                </tr>
              </thead>
                    
              <?php

                while ($data = $resultat->fetch())
                {
                ?>
                <tbody>
                    <tr>
                      <th scope="row"><?= $data['id'] ?></th>
                      <td><?= htmlspecialchars($data['username']) ?></td>
                      <td><?= htmlspecialchars($data['username']) ?></td>
                      <td><?= $data['creation_date_fr'] ?></td>
                      <td><a href="index.php?action=delUser&amp;id=<?= $data['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    
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

