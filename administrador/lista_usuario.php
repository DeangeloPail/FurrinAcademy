<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Lista de Usuarios</h1>
          <a href="./formularios/agregar/usuarios.php" class="btn btn-primary" style="background-color:#FFC300 ; border-color: black; border-radius: 8px"  >Administrar</a>
          <a href="reportes/repor_usu.php" target="_blank" class="btn btn-primary" style="background-color:#EE493B; border-color: black; border-radius: 8px" >Reporte PDF</a>
          <a href="yuca.php" class="btn btn-primary" style="background-color:#11A723  ; border-color: black; border-radius: 8px" >Reporte EXCEL</a>

    </div>         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lista de Usuarios</a></li>
        </ul>
        </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
          <div class="tile-body">
          <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<?php 
ob_start();
include('./template/cabecera.php');
include('./sql/vistas/usuarios.php')
?>
<script type="text/javascript">
  function confirmar(){
    return confirm('¿Estas Seguro?, se eliminaran los datos');
  }
</script>
<!--mostrar datos-->

<div class="col-md-12"   >
    
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Constrasena</th>
                <th>Tipo Usuario</th>
                <th>Acción</th>

                
            </tr>
        </thead>
        <tbody>
            <?php while($Usuario=mysqli_fetch_assoc($resultado)) {?>
            <tr>
                <td><?php echo $Usuario['nombre_usuario']; ?></td>
                <td><?php echo $Usuario['contrasena']; ?></td>
                <td><?php echo $Usuario['Tipodeusuario']; ?></td>
                <th><?php echo "<a type='submit' class='btn btn-outline-dark'
                                  href='./formularios/editar/usuarios.php?id=".$Usuario['codigo_usuario']."'>
                                  <i class='bi bi-pencil-square'></i>
                  </a>";?>
                <?php echo "<a type='submit' class='btn btn-outline-dark'
                              href='./sql/eliminar/usuario.php?id=".$Usuario['codigo_usuario']."'
                              onclick='return confirmar()'>
              <i class='bi bi-trash'></i>
              </a>";?>  
                </th>
            </tr>
           <?php }?>
        </tbody>
    </table>

</div>
   <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   <script>
      $(document).ready(function () {
      $('#example').DataTable();
      });
   </script>

</body>




          



       
              





   

 

<?php
require_once 'includes/footer.php'
?>

