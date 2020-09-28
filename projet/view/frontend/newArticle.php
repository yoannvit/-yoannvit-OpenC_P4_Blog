

<?php $title = 'Article'; ?>
<?php ob_start(); ?>


<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Nouvelle article</h6>
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
      <form  action="index.php?action=addNewpost" method="post">
              
            <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationCustom01">Titre</label>
              <input type="text"class="form-control " id="titre" name="titre" placeholder="Titre" value="">
              
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustom02">Auteur</label>
              <input type="text"class="form-control " id="author" name="author" value=<?= $_SESSION['username']?>>
              
          </div>
            
                <label for="exampleFormControlSelect2"></label>
    <textarea class="form-control" id="exampleFormControlSelect2"id="content" name="content" rows="8"></textarea>
         
                <input class="btn btn-primary  " type="submit" value="Envoyer" id="submit" name="submit">
               
              
            
         
        
            </form>
  
</div></div></div>
<?php $content  = ob_get_clean(); ?>

<?php require('templateDashboard.php'); ?>

