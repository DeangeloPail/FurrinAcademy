<?php
require_once '../includes/header.php';
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Area Academica</h1>
         

    </div>         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="lista_academico.php">Area Academica</a></li>
        </ul>
        </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
          <div class="tile-body">

          <div class="container text-center">
          <?php 
include('../template/cabecera.php');
include('../../sql/vistas/tipo_usuarios.php');
if (isset($_GET['Message'])) {
  echo $_GET['Message'];
   }
?>
<form id="formulario" action="../../sql/agregar/usuarios.php" method="POST" enctype="multipart/form-data" class="row  mx-3 g-3 needs-validation" novalidate >
  <div class = "form-group">
      <input type="hidden"  readonly class="form-control"  
            name="UsuarioID" required="" id="UsuarioID"  placeholder="ID">
  </div>
        
  <div class = "form-group">
      <label for="usuario">Nombre de Usuario:</label>
      <input type="text" class="form-control mt-3" 
             name="usuario" required="" id="usuario"  placeholder="Nombre de Usuario">
      <div class="invalid-feedback" id="alertaUsuario"></div>
  </div>

  <div class = "form-group">
      <label for="constrasena">Constrasena:</label>
      <input type="password" class="form-control mt-3" 
             name="constrasena" required="" id="constrasena"  placeholder="Constrasena">
      <div class="invalid-feedback" id="alertaContrasena"></div>
  </div>
        
  <div class = "form-group">
      <label for="TipUsuario" >Tipo Usuario:</label>
      <select class="form-control my-3" name="TipUsuario" required="" id="TipUsuario">
          <option selected disabled>Seleccione Tipo Usuario...</option>
          <?php while($TpUsuario=mysqli_fetch_assoc($tipUsuario)){?>
              <option value="<?php echo $TpUsuario['codigo_tusuario'];?>"><?php echo $TpUsuario['Tipodeusuario'];?></option>
          <?php }?>
      </select>
      <div class="invalid-feedback"id="alertaTpUsuario"></div>
  </div>

    <div class="d-grid gap-2 d-md-block ">
        <button type="submit" class="btn btn-success px-5">Agregar</button>
        <a type='button' class='btn btn-secondary px-5'href='../../lista_usuario.php'>
            <i class="bi bi-x-circle"></i>   Cancelar
        </a>
    </div>
</form>
<script src="../../js/usuarios.js"></script>
          
<?php include('../../template/pie.php');?>
<?php
require_once '../includes/footer.php'


?>
