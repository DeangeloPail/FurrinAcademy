<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">



   <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/ISOTIPO.png" />
    <title>Admisnitrar Cursos|FurrinAcademy</title>
 <body class="body"  style="background-image: url('images/contenidos.jpg');background-image: no-repeat;
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
  $ContenidoID=(isset($_POST['ContenidoID']))?$_POST['ContenidoID']:"";
  $Contenido=(isset($_POST['Contenido']))?$_POST['Contenido']:"";
  $unidad_curso=(isset($_POST['unidad_curso']))?$_POST['unidad_curso']:"";
  
  //post datos aciones-botones
  $Accion=(isset($_POST['Accion']))?$_POST['Accion']:"";
  //agrego coneccion con la base de datos
  include("./config/db.php");
  //mostrando Usuario
  $sentenciaSQL=$conexionJF->prepare("SELECT `id_contenido`,`Contenido`,unidad_curso.Unidad,curso.nombre_curso 
  FROM `contenidos_unidad_curso` INNER JOIN unidad_curso ON contenidos_unidad_curso.unidad_curso=unidad_curso.id_unidad 
  INNER JOIN curso ON unidad_curso.codigo_curso=curso.codigo_curso;");
  $sentenciaSQL->execute();
  $ListaContenido=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  //mostrando Tipos de Usuario para usar en el select
  $sentenciaSQL=$conexionJF->prepare("SELECT `id_unidad`,`Unidad` FROM`unidad_curso`;");
  $sentenciaSQL->execute();
  $Listaunidad_curso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

 
      switch($Accion){
        case"Agregar";
        
        
        $sentenciaSQL=$conexionJF->prepare("INSERT INTO `contenidos_unidad_curso` (`id_contenido`, `Contenido`, `unidad_curso`) 
        VALUES (:ContenidoID, :Contenido, :unidad_curso)");
        $sentenciaSQL->bindParam(':ContenidoID',$ContenidoID);
        $sentenciaSQL->bindParam(':Contenido',$Contenido);
        $sentenciaSQL->bindParam(':unidad_curso',$unidad_curso);
        $sentenciaSQL->execute();
        header("location: Conteaccion.php");
        
        break;

        case"Editar";
        $sentenciaSQL=$conexionJF->prepare("UPDATE contenidos_unidad_curso 
        SET Contenido=:Contenido,unidad_curso=:unidad_curso WHERE id_Contenido=:ContenidoID" );
        $sentenciaSQL->bindParam(':ContenidoID',$ContenidoID);
        $sentenciaSQL->bindParam(':Contenido',$Contenido);
        $sentenciaSQL->bindParam(':unidad_curso',$unidad_curso);
        $sentenciaSQL->execute();
        header("location: Conteaccion.php");
        
        break;

        case"Eliminar";
        $sentenciaSQL=$conexionJF->prepare("DELETE FROM contenidos_unidad_curso WHERE id_contenido = :ContenidoID" );
        $sentenciaSQL->bindParam(':ContenidoID',$ContenidoID);
        $sentenciaSQL->execute();
        header("location: Conteaccion.php");
        break;

        case"Cancelar";
        header("location: Conteaccion.php");
        break;

        case"Seleccionar":
            $sentenciaSQL=$conexionJF->prepare("SELECT * FROM contenidos_unidad_curso WHERE id_Contenido = :ContenidoID" );
            $sentenciaSQL->bindParam(':ContenidoID',$ContenidoID);
            $sentenciaSQL->execute();
            
            $dataunidad_curso=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
            $ContenidoID=$dataunidad_curso['id_contenido'];
            $Contenido=$dataunidad_curso['Contenido'];
            $unidad_curso=$dataunidad_curso['unidad_curso'];
        break;
      }
      
?>
<div class="col-md-5">
    <form id="formulario" method="POST" enctype="multipart/form-data" class="row g-3" >

        <div class = "form-group">
            <label for="ContenidoID">ID:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $ContenidoID; ?>" name="ContenidoID" id="ContenidoID"  placeholder="ID">
        </div>
        
        <div class = "form-group">
            <label for="Contenido">Contenido:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $Contenido; ?>" name="Contenido" id="Contenido"  placeholder="Contenido">
        </div>

        
        <div class = "form-group">
            <label for="unidad_curso" >unidad_curso:</label>
            <select class="form-control my-3" name="unidad_curso" id="unidad_curso">
                <option selected disabled>Seleccione unidad_curso...</option>
                <?php foreach($Listaunidad_curso as $unidad_curso){?>
                    <option value="<?php echo $unidad_curso['id_unidad'];?>"><?php echo $unidad_curso['Unidad'];?></option>
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
                <th>Codigo</th>
                <th>Contenido</th>
                <th>Unidad</th>
                <th>Curso</th>
                <th>Accion</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($ListaContenido as $contenidido) {?>
            <tr>
                <td><?php echo $contenidido['id_contenido']; ?></td>
                <td><?php echo $contenidido['Contenido']; ?></td>
                <td><?php echo $contenidido['Unidad']; ?></td>
                <td><?php echo $contenidido['nombre_curso']; ?></td>
                <td>
                
                <form method="post">
                    <input type="hidden" name="ContenidoID" id="ContenidoID" value="<?php echo $contenidido['id_contenido']; ?>">
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