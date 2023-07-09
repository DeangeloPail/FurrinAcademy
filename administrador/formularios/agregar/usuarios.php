<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">


   <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../../../assets/ISOTIPO.png" />
    <title>Admisnitrar Usuarios|FurrinAcademy</title>
    <body class="body"  style="background-image: url('../../images/usuarios.jpg');background-image: no-repeat; background-image: fixed; background-image: center;-webkit-background-size: cover;-moz-background-size: cover-o-background-size: cover; background-size: cover;">
    


    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../index.php">Regresar a Panel</a>
        </li>
  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sistema
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../../lista_usuario.php">Usuarios</a></li>
            <li><a class="dropdown-item" href="../../lista_profe.php">Profesores</a></li>
            <li><a class="dropdown-item" href="../../lista_estu.php">Estudiantes</a></li>
            <li><a class="dropdown-item" href="../../lista_cursos.php">Cursos</a></li>
            <li><a class="dropdown-item" href="../../lista_academico.php">Area Academica</a></li>
            <li><a class="dropdown-item" href="../../lista_pensum.php">Area Pedagogica</a></li>
            
          </ul>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
      <a class="navbar-brand" href="../../index.php"><img src="../../images/FURRIN.png" alt="..." style="height: 4.5rem; margin-left: 10px;"/></a>

      </form>
    </div>
  </div>
</nav>

<?php 
include('../../template/cabecera.php');
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