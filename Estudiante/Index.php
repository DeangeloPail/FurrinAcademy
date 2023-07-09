<?php
require_once './includes/header.php';
include_once "./sql/mostrar_notas_datos.php"; 
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
          <li class="breadcrumb-item"><a href="#">Panel Estudiantil</a></li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-6 col-lg-6">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x" style= "background-color:#2f6fe7"></i>
            <div class="info">

              <h4>Cursos Inscritos</h4>
              <p><b><?php echo $contador?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6">
          <div class="widget-small info coloured-icon"><i class="icon "  style= "background-color:#1b9dcf;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
</svg></i>
            
            
            <div class="info">
            <?php include 'config/conejf.php';
              $query = "SELECT COUNT(codigo_curso) AS num FROM curso";
              $resquery = mysqli_query($conexionjf, $query);
              $row3 = mysqli_fetch_assoc($resquery);
              ?>
              <h4>Promedio</h4>
              <p><b><strong><?php echo $row3['num']?> pts</strong></b></p>
            </div>
          </div>
        </div>
      </div>
         </div>
       </div>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Tus Estadisticas</div>
            <br>                             
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>telefon</th>
                        <th>cedula</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($datos=mysqli_fetch_assoc($resultaDatos)){?>
                  <tr>
                    <td><?php echo $datos['Nombre_estudiante'];?> <?php echo $datos['Apellido_estudiante'];?></td>
                    <td><?php echo $datos['Direccion']; ?></td>
                    <td><?php echo $datos['Telefono']; ?></td>
                    <td><?php echo $datos['Codigo_estudiante']; ?></td>
                    
                  </tr>
                    <?php }?>                             
                </tbody>
              </table>
              <table class="table table-bordered" id="tabla2">
                <thead>
                    <tr>
                        <th>Nombre de Curso</th>
                        <th>corte 1</th>
                        <th>corte 2</th>
                        <th>corte 3</th>
                        <th>corte 4</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($notas=mysqli_fetch_assoc($resultadoNotas)){?>
                  <tr>
                    <td><?php echo $notas['nombre_curso']; ?>
                    <td><?php echo $notas['nota_estudiante1']; ?></td>
                    <td><?php echo $notas['nota_estudiante2']; ?></td>
                    <td><?php echo $notas['nota_estudiante3']; ?></td>
                    <td><?php echo $notas['nota_estudiante4']; ?></td>
                    </td>
                  </tr>
                    <?php }?>                             
                </tbody>
              </table>
            </div>
            
    </main>

<?php
include('./template/cabecera.php');
require_once 'includes/footer.php';
?>
































































