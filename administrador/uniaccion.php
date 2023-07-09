<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">



   <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/ISOTIPO.png" />
    <title>Admisnitrar Usuarios|FurrinAcademy</title>
    <body class="body"  style="background-image: url('images/unidades.jpg');background-image: no-repeat; background-image: fixed; background-image: center;-webkit-background-size: cover;-moz-background-size: cover-o-background-size: cover; background-size: cover;">


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
  $UnidadID=(isset($_POST['UnidadID']))?$_POST['UnidadID']:"";
  $Unidad=(isset($_POST['Unidad']))?$_POST['Unidad']:"";
  $Curso=(isset($_POST['Curso']))?$_POST['Curso']:"";
  
  //post datos aciones-botones
  $Accion=(isset($_POST['Accion']))?$_POST['Accion']:"";
  //agrego coneccion con la base de datos
  include("./config/db.php");
  //mostrando Usuario
  $sentenciaSQL=$conexionJF->prepare("SELECT id_unidad,`Unidad`,curso.nombre_curso 
  FROM `unidad_curso` INNER JOIN curso on curso.codigo_curso=unidad_curso.codigo_curso;");
  $sentenciaSQL->execute();
  $ListaunidadCursa=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  //mostrando Tipos de Usuario para usar en el select
  $sentenciaSQL=$conexionJF->prepare("SELECT codigo_curso,nombre_curso FROM `curso`;");
  $sentenciaSQL->execute();
  $ListaCurso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

 
      switch($Accion){
        case"Agregar";
        
        
        $sentenciaSQL=$conexionJF->prepare("INSERT INTO unidad_curso (id_unidad, Unidad, codigo_curso) 
        VALUES (:UnidadID, :Unidad, :Curso)");
        $sentenciaSQL->bindParam(':UnidadID',$UnidadID);
        $sentenciaSQL->bindParam(':Unidad',$Unidad);
        $sentenciaSQL->bindParam(':Curso',$Curso);
        $sentenciaSQL->execute();
        header("location: uniaccion.php");
        
        break;

        case"Editar";
        $sentenciaSQL=$conexionJF->prepare("UPDATE unidad_curso 
        SET Unidad=:Unidad,codigo_curso=:Curso WHERE id_unidad=:UnidadID" );
        $sentenciaSQL->bindParam(':UnidadID',$UnidadID);
        $sentenciaSQL->bindParam(':Unidad',$Unidad);
        $sentenciaSQL->bindParam(':Curso',$Curso);
        $sentenciaSQL->execute();
        header("location: uniaccion.php");
        
        break;

        case"Eliminar";
        $sentenciaSQL=$conexionJF->prepare("DELETE FROM unidad_curso WHERE id_unidad = :UnidadID" );
        $sentenciaSQL->bindParam(':UnidadID',$UnidadID);
        $sentenciaSQL->execute();
        header("location: uniaccion.php");
        break;

        case"Cancelar";
        header("location: uniaccion.php");
        break;

        case"Seleccionar":
            $sentenciaSQL=$conexionJF->prepare("SELECT * FROM unidad_curso WHERE id_unidad = :UnidadID" );
            $sentenciaSQL->bindParam(':UnidadID',$UnidadID);
            $sentenciaSQL->execute();
            
            $dataCurso=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
            $UnidadID=$dataCurso['id_unidad'];
            $Unidad=$dataCurso['Unidad'];
            $Curso=$dataCurso['codigo_curso'];
        break;
      }
      
?>
<div class="col-md-5">
    <form id="formulario" method="POST" enctype="multipart/form-data" class="row g-3" >

        <div class = "form-group">
            <label for="UnidadID">ID:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $UnidadID; ?>" name="UnidadID" id="UnidadID"  placeholder="ID">
        </div>
        
        <div class = "form-group">
            <label for="Unidad">Nombre de la Unidad:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $Unidad; ?>" name="Unidad" id="Unidad"  placeholder="Unidad">
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

<div class="col-md-7 text-align-center">
    
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>Unidad</th>
                <th>Unidad</th>
                <th>Curso</th>
                <th>Accion</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($ListaunidadCursa as $unidadCurso) {?>
            <tr>
              
                <td><?php echo $unidadCurso['id_unidad']; ?></td>
                <td><?php echo $unidadCurso['Unidad']; ?></td>
                <td><?php echo $unidadCurso['nombre_curso']; ?></td>
                <td>
                
                <form method="post">
                    <input type="hidden" name="UnidadID" id="UnidadID" value="<?php echo $unidadCurso['id_unidad']; ?>">
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



<?php include('./template/pie.php');?>