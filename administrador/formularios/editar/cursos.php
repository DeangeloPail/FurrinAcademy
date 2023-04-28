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
include('../../sql/vistas/cursos.php');
    $id=$_GET['id'];
  $sql="SELECT * FROM curso  where codigo_curso='".$id."'";
  $resultadoCursos=mysqli_query($conexion,$sql);

  $filaCurso=mysqli_fetch_assoc($resultadoCursos);
  $codigo=$filaCurso["codigo_curso"];
  $nombre=$filaCurso["nombre_curso"];
  $duracion=$filaCurso["Duracion"];

?>
<form id="formulario" action="../../sql/modificar/cursos.php" method="POST" enctype="multipart/form-data" class="row  mx-3 g-3 needs-validation" novalidate >
        <div class = "form-group">
          <input type="hidden" class="form-control mt-3" 
          value="<?php echo $codigo?>" name="CodigoCurso" id="CodigoCurso"  placeholder="Codigo Curso">
        </div>
        <div class = "form-group">
            <label for="NombreCurso">Nombre Curso:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $nombre?>" name="NombreCurso" id="NombreCurso"  placeholder="Nombre Curso">
            <div class="invalid-feedback"id="alertaNombreCurso"></div>
        </div>

        <div class="form-group">
            <label for="Duracion" class="form-label">Duracion</label>
            <div class="input-group has-validation">
            <input type="text" class="form-control" id="Duracion" value="<?php echo $duracion?>" name="Duracion" 
            aria-describedby="inputGroupPrepend" placeholder="Duracion">
            <span class="input-group-text">Horas</span>
            <div class="invalid-feedback"id="alertaDuracion"></div>
            </div>
        </div>


        <div class = "form-group">
            <label for="AreaCurso" >Area Curso :</label>
            <select class="form-control my-3" name="AreaCurso" id="AreaCurso">
                <option selected disabled>Seleccione Area del Curso...</option>
                <?php while($TPAreaCurso=mysqli_fetch_assoc($resultadoTPAreaCurso)) {?>
                    <option value="<?php echo $TPAreaCurso['id_area'];?>"><?php echo $TPAreaCurso['Area'];?></option>
                <?php }?>
            </select>
            <div class="invalid-feedback"id="alertaAreaCurso"></div>
        </div>

        <div class = "form-group">
            <label for="TipoCurso" >Tipo Curso:</label>
            <select class="form-control my-3" name="TipoCurso" id="TipoCurso">
                <option selected disabled>Seleccione Tipo de Curso...</option>
                <?php while($Curso=mysqli_fetch_assoc($resultadoCurso)) {?>
                    <option value="<?php echo $Curso['Tipocurso_id'];?>"><?php echo $Curso['tipocurso'];?></option>
                <?php }?>
            </select>
            <div class="invalid-feedback"id="alertaTipoCurso"></div>
        </div>
        
        <div class = "form-group">
            <label for="CodigoUsuario" >Creador:</label>
            <select class="form-control my-3" name="CodigoUsuario" id="CodigoUsuario">
                <option selected disabled>Seleccione Creador...</option>
                <?php while($TpUsuario=mysqli_fetch_assoc($resultadoTpUsuario)) {?>
                    <option value="<?php echo $TpUsuario['codigo_usuario'];?>"><?php echo $TpUsuario['nombre_usuario'];?></option>
                <?php }?>
            </select>
            <div class="invalid-feedback"id="alertaCodigoUsuario"></div>
        </div>

    <div class="d-grid gap-2 d-md-block ">
        <button type="submit" class="btn btn-success px-5">editar</button>
        <a type='button' class='btn btn-secondary px-5'href='../../lista_cursos.php'>
            <i class="bi bi-x-circle"></i>   Cancelar
        </a>
    </div> 
</form>
<script src="../../js/cursos.js"></script>
<?php include('../../template/pie.php');?>