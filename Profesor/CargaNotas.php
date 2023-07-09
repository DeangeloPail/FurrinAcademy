<?php
require_once 'includes/header.php';
include("./sql/vistas/mostrar_cursos.php");
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
          <form action="" method="GET">
            <div class="row">                        
              <div class="col-md-4">
                  <div class="form-group">
                      <label><b> Cursos</b></label>
                      <select name="curso" class="form-control">
                        <?php while($Cursos=mysqli_fetch_assoc($mostrarCursos)) {?>
                          <option value="<?php echo $Cursos['codigo_curso'];?>"><?php echo $Cursos['nombre_curso'];?></option>
                        <?php }?>
                      </select>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label><b></b></label> <br>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    
                  </div>
              </div>
            </div>
            <br>
          </form>
            <table class="table table-bordered" id="tabla2">
              <thead>
                  <tr>
                      <th>Nombre de estudiante</th>
                      <th>cedula de estudiante</th>
                      <th>corte 1</th>
                      <th>corte 2</th>
                      <th>corte 3</th>
                      <th>corte 4</th>
                      <th>accion</th>
                  </tr>
              </thead>
              <tbody>
                  <?php if(isset($_GET['curso']))
                      {
                          $curso = $_GET['curso'];
                          $query = "SELECT estudiante.Codigo_estudiante, curso_estu.cod_curs_est,
                          curso_estu.nota_estudiante1,curso_estu.nota_estudiante2,
                          curso_estu.nota_estudiante3,curso_estu.nota_estudiante4,
                          estudiante.Nombre_estudiante, estudiante.Apellido_estudiante 
                          FROM `curso` 
                          INNER JOIN area_curso on area_curso.id_area=curso.area_curso 
                          INNER JOIN tipo_curso on tipo_curso.Tipocurso_id=curso.tipo_curso 
                          INNER JOIN curso_estu on curso_estu.Codigo_curso=curso.codigo_curso 
                          INNER JOIN estudiante on estudiante.Codigo_estudiante=curso_estu.Codigo_estudiante 
                          WHERE curso.codigo_curso=$curso";
                          $query_run = mysqli_query($conexion, $query);

                          if(mysqli_num_rows($query_run) > 0)
                            {
                              foreach($query_run as $fila)
                                {
                  ?>
                <tr>
                  <td><?php echo $fila['Nombre_estudiante']; ?>
                  <?php echo $fila['Apellido_estudiante']; ?></td>
                  <td><?php echo $fila['Codigo_estudiante']; ?></td>
                  <td><?php echo $fila['nota_estudiante1']; ?></td>
                  <td><?php echo $fila['nota_estudiante2']; ?></td>
                  <td><?php echo $fila['nota_estudiante3']; ?></td>
                  <td><?php echo $fila['nota_estudiante4']; ?></td>
                  <td><?php echo "<a type='submit' class='btn btn-outline-dark'
                                  href='./formularios/agregar/notas_estudiante.php?id=".$fila['cod_curs_est']."'>
                                  <i class='bi bi-plus-square'></i>
                                 </a>";?>
                  </td>
                </tr>
                  <?php
                                }
                            }
                          else
                          {
                  ?>                            
                    <tr>
                      <td colspan="6" class="text-center"><?php  echo "No se encontraron resultados"; ?></td>
                    </tr>
                  <?php
                          }
                      }
                  ?>         
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

