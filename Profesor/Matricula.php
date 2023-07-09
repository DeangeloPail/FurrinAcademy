<?php
require_once 'includes/header.php';
include("./sql/vistas/datos_profesor.php");
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Bienvenido</h1>
          <p>
            <?php

echo "Bienvenido a tu area de trabajo $nombreUsuario "; 
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
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Nombre de profesor</th>
                      <th>dirección</th>   
                  </tr>
              </thead>
              <tbody>
                <?php while($datosProfesor=mysqli_fetch_assoc($resultadoProfesor)) {?>
                  <tr>
                      <th><?php echo $datosProfesor['Nombre_profe'];?></th>
                      <th><?php echo $datosProfesor['Direccion'];?></th>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Nombre de curso</th>
                      <th>Duración</th>
                      <th>Area</th>
                      <th>Tipo de curso</th>
                  </tr>
              </thead>
              <tbody>
                <?php while($datos=mysqli_fetch_assoc($resultado)) {?>
                  <tr>
                      <th><?php echo $datos['nombre_curso'];?></th>
                      <th><?php echo $datos['Duracion'];?> Horas</th>
                      <th><?php echo $datos['Area'];?></th>
                      <th><?php echo $datos['tipocurso'];?></th>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>

<?php
include('./template/cabecera.php');
require_once 'includes/footer.php';
?>

