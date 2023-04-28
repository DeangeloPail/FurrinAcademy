<?php
require_once 'includes/header.php';

include './config/database.php';
$sql="SELECT `nombre_usuario`,profesores.Nombre_profe, profesores.Direccion,curso.nombre_curso,curso.Duracion FROM `usuario` INNER JOIN profesores on profesores.codigo_usuarioo=usuario.codigo_usuario INNER JOIN curso_profe on curso_profe.Codigo_profesor=profesores.codigo_profesor INNER JOIN curso on curso_profe.Codigo_curso=curso.codigo_curso WHERE`nombre_usuario`='$nombreUsuario'";
$result=mysqli_query($conexion, $sql);
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Mi Matricula</h1>
          <p>
</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="Matricula.php">Mi Matricula</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Nombre </th>
      <th scope="col">Apellido</th>
      <th scope="col">Direccion</th>
      <th scope="col">Curso a Impartir</th>
    </tr>
  </thead>
  <tbody>
    <?php while($profesor=mysqli_fetch_assoc($result)){?>
    <tr>
      <td><?php echo $profesor['nombre_usuario']; ?></td>
    </tr>
    <?php}?>
  </tbody>
</table>
          </div>
        </div>
      </div>
    </main>

<?php
require_once 'includes/footer.php';
?>

