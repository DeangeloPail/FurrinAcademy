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
ob_start();

include('../../template/cabecera.php');
include('../../sql/vistas/mat_estudiante.php');
if (isset($_GET['Message'])) {
  echo $_GET['Message'];
   }
?>
<form id="formulario" action="../../sql/agregar/est_matricul.php" method="POST" enctype="multipart/form-data" class="row  mx-3 g-3 needs-validation" novalidate >

        <div class = "form-group">
            <label for="CursEstID">ID:</label>
            <input type="text" class="form-control mt-3" 
            name="CursEstID" id="CursEstID"  placeholder="ID">
            <div class="invalid-feedback"id="alertaCursEstID"></div>
        </div>
        
        <div class = "form-group">
            <label for="Estudiante" >Estudiante:</label>
            <select class="form-control my-3" name="codigoEstudiante" id="Estudiante">
                <option selected disabled>Seleccione Estudiante...</option>
                <?php while($Estud=mysqli_fetch_assoc($resultEstudiante)) {?>
                    <option value="<?php echo $Estud['Codigo_estudiante'];?>"><?php echo $Estud['Nombre_estudiante'];?> <?php echo $Estud['Apellido_estudiante'];?></option>
                <?php }?>
            </select>
            <div class="invalid-feedback"id="alertaEstudiante"></div>
        </div>

        
        <div class = "form-group">
            <label for="Curso" >Curso:</label>
            <select class="form-control my-3" name="codigoCurso" id="Curso">
                <option selected disabled>Seleccione Curso...</option>
                <?php while($Curso=mysqli_fetch_assoc($resultCurso)) {?>
                    <option value="<?php echo $Curso['codigo_curso'];?>"><?php echo $Curso['nombre_curso'];?></option>
                <?php }?>
            </select>
            <div class="invalid-feedback"id="alertaCurso"></div>
        </div>

    <div class="d-grid gap-2 d-md-block ">
        <button type="submit" class="btn btn-success px-5">Agregar</button>
        <a type='button' class='btn btn-secondary px-5'href='../../lista_matriestu.php'>
            <i class="bi bi-x-circle"></i>   Cancelar
        </a>
    </div> 
</form>
<script src="../../js/mat_estudiante_agregar.js"></script>
<?php include('../../template/pie.php');?>