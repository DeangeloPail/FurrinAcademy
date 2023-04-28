<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Bienvenido </h1>
          <p>
           <?php

echo "Bienvenido a tu area de trabajo $nombreUsuario";

?>
</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Bienvenido</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">En Mantenimiento</div>
          </div>
        </div>
      </div>
    </main>

<?php
include('./template/cabecera.php');
require_once 'includes/footer.php';
?>

