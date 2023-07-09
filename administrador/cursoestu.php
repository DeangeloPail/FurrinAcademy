<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    

   <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/ISOTIPO.png" />
    <title>Matricular Alumnos|FurrinAcademy</title>
    <body class="body"  style="background-image: url('images/estuprofe.jpg');background-image: no-repeat;
background-image: fixed;
background-image: center;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Regresar a Panel</a>
        </li>
  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sistema
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="lista_usuario.php">Usuarios</a></li>
            <li><a class="dropdown-item" href="lista_profe.php">Profesores</a></li>
            <li><a class="dropdown-item" href="lista_estu.php">Estudiantes</a></li>
            <li><a class="dropdown-item" href="lista_cursos.php">Cursos</a></li>
            <li><a class="dropdown-item" href="lista_academico.php">Area Academica</a></li>
            <li><a class="dropdown-item" href="lista_pensum.php">Area Pedagogica</a></li>
          </ul>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
      <a class="navbar-brand" href="Home.html"><img src="images/FURRIN.png" alt="..." style="height: 4.5rem; margin-left: 10px;"/></a>

      </form>
    </div>
  </div>
</nav>
<?php 

include('./template/cabecera.php');
?>
<?php 
    ob_start();
  //post datos Usuario
  $CursEstID=(isset($_POST['CursEstID']))?$_POST['CursEstID']:"";
  $Estudiante=(isset($_POST['Estudiante']))?$_POST['Estudiante']:"";
  $Curso=(isset($_POST['Curso']))?$_POST['Curso']:"";
  
  //post datos aciones-botones
  $Accion=(isset($_POST['Accion']))?$_POST['Accion']:"";
  //agrego coneccion con la base de datos
  include("./config/db.php");
  //mostrando Usuario
  $sentenciaSQL=$conexionJF->prepare("SELECT `cod_curs_est`,estudiante.Nombre_estudiante,
  estudiante.Apellido_estudiante,curso.nombre_curso FROM `curso_estu` 
  INNER JOIN estudiante on estudiante.Codigo_estudiante=curso_estu.Codigo_estudiante 
  INNER JOIN curso on curso.codigo_curso=curso_estu.Codigo_curso;");
  $sentenciaSQL->execute();
  $ListaCursoEs=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  //mostrando Tipos de Usuario para usar en el select
  $sentenciaSQL=$conexionJF->prepare("SELECT codigo_curso,nombre_curso FROM `curso`;");
  $sentenciaSQL->execute();
  $ListaCurso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  
  $sentenciaSQL=$conexionJF->prepare("SELECT `Codigo_estudiante`,`Nombre_estudiante`,`Apellido_estudiante` FROM `estudiante`");
  $sentenciaSQL->execute();
  $ListaEstudiantes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


 
      switch($Accion){
        case"Agregar";
        
        
        $sentenciaSQL=$conexionJF->prepare("INSERT INTO curso_estu (cod_curs_est , Codigo_estudiante , Codigo_curso ) 
        VALUES (:CursEstID, :Estudiante, :Curso)");
        $sentenciaSQL->bindParam(':CursEstID',$CursEstID);
        $sentenciaSQL->bindParam(':Estudiante',$Estudiante);
        $sentenciaSQL->bindParam(':Curso',$Curso);
        $sentenciaSQL->execute();
        header("location: cursoestu.php");
        
        break;

        case"Editar";
        $sentenciaSQL=$conexionJF->prepare("UPDATE curso_estu 
        SET Codigo_estudiante =:Estudiante,Codigo_curso =:Curso WHERE cod_curs_est =:CursEstID" );
        $sentenciaSQL->bindParam(':CursEstID',$CursEstID);
        $sentenciaSQL->bindParam(':Estudiante',$Estudiante);
        $sentenciaSQL->bindParam(':Curso',$Curso);
        $sentenciaSQL->execute();
        header("location: cursoestu.php");
        
        break;

        case"Eliminar";
        $sentenciaSQL=$conexionJF->prepare("DELETE FROM curso_estu WHERE cod_curs_est  = :CursEstID" );
        $sentenciaSQL->bindParam(':CursEstID',$CursEstID);
        $sentenciaSQL->execute();
        header("location: cursoestu.php");
        break;

        case"Cancelar";
        header("location: cursoestu.php");
        break;

        case"Seleccionar":
            $sentenciaSQL=$conexionJF->prepare("SELECT * FROM curso_estu WHERE cod_curs_est  = :CursEstID" );
            $sentenciaSQL->bindParam(':CursEstID',$CursEstID);
            $sentenciaSQL->execute();
            
            $dataCurso=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
            $CursEstID=$dataCurso['cod_curs_est'];
            $Estudiante=$dataCurso['Codigo_estudiante'];
            $Curso=$dataCurso['Codigo_curso'];
        break;
      }
      
?>
<div class="col-md-5">
    <form id="formulario" method="POST" enctype="multipart/form-data" class="row g-3" >

        <div class = "form-group">
            <label for="CursEstID">ID:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $CursEstID; ?>" name="CursEstID" id="CursEstID"  placeholder="ID">
        </div>
        
        <div class = "form-group">
            <label for="Estudiante" >Estudiante:</label>
            <select class="form-control my-3" name="Estudiante" id="Estudiante">
                <option selected disabled>Seleccione Estudiante...</option>
                <?php foreach($ListaEstudiantes as $Estud){?>
                    <option value="<?php echo $Estud['Codigo_estudiante'];?>"><?php echo $Estud['Nombre_estudiante'];?> <?php echo $Estud['Apellido_estudiante'];?></option>
                <?php }?>
            </select>
        </div>

        
        <div class = "form-group">
            <label for="Curso" >Curso:</label>
            <select class="form-control my-3" name="Curso" id="Curso">
                <option selected disabled>Seleccione Curso...</option>
                <?php foreach($ListaCurso as $Curso){?>
                    <option value="<?php echo $Curso['codigo_curso'];?>"><?php echo $Curso['nombre_curso'];?></option>
                <?php }?>
            </select>
        </div>

        <div class="d-grid gap-2 d-md-block" role="group" aria-label="">
            <button type="submit" name="Accion" <?php echo ($Accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-success">Agregar</button>
            <button type="submit" name="Accion" <?php echo ($Accion!="Seleccionar")?"disabled":"";?> value="Editar" class="btn btn-success">Editar</button>
            <button type="submit" name="Accion" <?php echo ($Accion!="Seleccionar")?"disabled":"";?> value="Eliminar" class="btn btn-success">Eliminar</button>
            <button type="submit" name="Accion" <?php echo ($Accion!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-success">Cancelar</button>
        </div> 

        <div class="alert alert-success mt-2 d-none" id="alertSuccess">
    </div>
    <div class="alert alert-danger mt-2 d-none" id="alerteError">
    </div>
    </form>
</div>

<!--mostrar datos-->

<div class="col-md-7">
    
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>id</th>
                <th>Alumno</th>
                <th>Curso</th>
                <th>Accion</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($ListaCursoEs as $CursoEsto) {?>
            <tr><td><?php echo $CursoEsto['cod_curs_est']; ?></td>
                <td><?php echo $CursoEsto['Nombre_estudiante'];?> <?php echo $CursoEsto['Apellido_estudiante'];?></td>
                <td><?php echo $CursoEsto['nombre_curso']; ?></td>
                <td>
                
                <form method="post">
                    <input type="hidden" name="CursEstID" id="CursEstID" value="<?php echo $CursoEsto['cod_curs_est']; ?>">
                    <input type="submit" name="Accion" value="Seleccionar"class="btn btn-primary">
                </form>

                </td>

                

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



<?php include('./template/pie.php');