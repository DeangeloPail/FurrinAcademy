<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">


   <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/ISOTIPO.png" />
    <title>Admisnitrar Cursos|FurrinAcademy</title>
 <body class="body"  style="background-image: url('images/cursos.jpg');background-image: no-repeat;
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
   $CodigoCurso=(isset($_POST['CodigoCurso']))?$_POST['CodigoCurso']:"";
   $NombreCurso=(isset($_POST['NombreCurso']))?$_POST['NombreCurso']:"";
   $Duracion=(isset($_POST['Duracion']))?$_POST['Duracion']:"";
   $AreaCurso=(isset($_POST['AreaCurso']))?$_POST['AreaCurso']:"";
   $TipoCurso=(isset($_POST['TipoCurso']))?$_POST['TipoCurso']:"";
   $CodigoUsuario=(isset($_POST['CodigoUsuario']))?$_POST['CodigoUsuario']:"";
   
   //post datos aciones-botones
   $Accion=(isset($_POST['Accion']))?$_POST['Accion']:"";
   //agrego coneccion con la base de datos
   include("./config/db.php");
   //mostrando Usuario
   $sentenciaSQL=$conexionJF->prepare("SELECT codigo_curso, nombre_curso, Duracion, area_curso.Area, tipo_curso.tipocurso, usuario.nombre_usuario FROM `curso` INNER JOIN area_curso ON curso.area_curso=area_curso.id_area INNER JOIN tipo_curso ON curso.tipo_curso=tipo_curso.Tipocurso_id INNER JOIN usuario ON curso.codigo_usuario=usuario.codigo_usuario");
   $sentenciaSQL->execute();
   $listaCurso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
   //mostrando Tipos de Usuario para usar en el select
   $sentenciaSQL=$conexionJF->prepare("SELECT nombre_usuario, codigo_usuario FROM `usuario` WHERE tipodeusuario= 1");
   $sentenciaSQL->execute();
   $listaTpUsuario=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

   $sentenciaSQL=$conexionJF->prepare("SELECT * FROM `area_curso`");
   $sentenciaSQL->execute();
   $listaTpAreaCurso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

   $sentenciaSQL=$conexionJF->prepare("SELECT * FROM `tipo_curso`");
   $sentenciaSQL->execute();
   $listaTpCurso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

 
      switch($Accion){
        case"Agregar";
        
        
        $sentenciaSQL=$conexionJF->prepare("INSERT INTO `curso` (`codigo_curso`, `nombre_curso`, `Duracion`, 
        `area_curso`, `tipo_curso`, `codigo_usuario`) 
        VALUES (:CodigoCurso, :NombreCurso, :Duracion, :AreaCurso, :TipoCurso, :CodigoUsuario);");
        $sentenciaSQL->bindParam(':CodigoCurso',$CodigoCurso);
        $sentenciaSQL->bindParam(':NombreCurso',$NombreCurso);
        $sentenciaSQL->bindParam(':Duracion',$Duracion);
        $sentenciaSQL->bindParam(':AreaCurso',$AreaCurso);
        $sentenciaSQL->bindParam(':TipoCurso',$TipoCurso);
        $sentenciaSQL->bindParam(':CodigoUsuario',$CodigoUsuario);
        $sentenciaSQL->execute();
        header("location:Cursoaccion.php");
        
        break;

        case"Editar";
        $sentenciaSQL=$conexionJF->prepare("UPDATE curso 
        SET nombre_curso=:NombreCurso, Duracion=:Duracion,
        area_curso=:AreaCurso, tipo_curso=:TipoCurso, codigo_usuario=:CodigoUsuario
        WHERE codigo_curso=:CodigoCurso" );
        $sentenciaSQL->bindParam(':CodigoCurso',$CodigoCurso);
        $sentenciaSQL->bindParam(':NombreCurso',$NombreCurso);
        $sentenciaSQL->bindParam(':Duracion',$Duracion);
        $sentenciaSQL->bindParam(':AreaCurso',$AreaCurso);
        $sentenciaSQL->bindParam(':TipoCurso',$TipoCurso);
        $sentenciaSQL->bindParam(':CodigoUsuario',$CodigoUsuario);
        $sentenciaSQL->execute();
        header("location:Cursoaccion.php");
        
        break;

        case"Eliminar";
        $sentenciaSQL=$conexionJF->prepare("DELETE FROM curso WHERE codigo_curso = :CodigoCurso" );
        $sentenciaSQL->bindParam(':CodigoCurso',$CodigoCurso);
        $sentenciaSQL->execute();
        header("location:Cursoaccion.php");
        break;

        case"Cancelar";
        header("location:Cursoaccion.php");
        break;

        case"Seleccionar":
            $sentenciaSQL=$conexionJF->prepare("SELECT * FROM curso WHERE codigo_curso = :CodigoCurso" );
            $sentenciaSQL->bindParam(':CodigoCurso',$CodigoCurso);
            $sentenciaSQL->execute();
            
            $dataEstudiante=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            $CodigoCurso=$dataEstudiante['codigo_curso'];
            $NombreCurso=$dataEstudiante['nombre_curso'];
            $Duracion=$dataEstudiante['Duracion'];
            $AreaCurso=$dataEstudiante['area_curso'];
            $TipoCurso=$dataEstudiante['tipo_curso'];
            $CodigoUsuario=$dataEstudiante['codigo_usuario '];
    
            
        break;
      }
      
?>
<div class="col-md-5" style= "width: 25.6pc;     ">
    <form id="formulario" method="POST" enctype="multipart/form-data" class="row g-3" >

        <div class = "form-group">
            <label for="CodigoCurso">Codigo Curso:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $CodigoCurso; ?>" name="CodigoCurso" id="CodigoCurso"  placeholder="">
        </div>
        
        <div class = "form-group">
            <label for="NombreCurso">Nombre Curso:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $NombreCurso; ?>" name="NombreCurso" id="NombreCurso"  placeholder="">
        </div>

        <div class = "form-group">
            <label for="Duracion">Duracion:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $Duracion; ?>" name="Duracion" id="Duracion"  placeholder="">
        </div>


        <div class = "form-group">
            <label for="AreaCurso" >Area Curso :</label>
            <select class="form-control my-3" name="AreaCurso" id="AreaCurso">
                <option selected disabled>Seleccione Area del Curso...</option>
                <?php foreach($listaTpAreaCurso as $TPAreaCurso){?>
                    <option value="<?php echo $TPAreaCurso['id_area'];?>"><?php echo $TPAreaCurso['Area'];?></option>
                <?php }?>
            </select>
        </div>

        <div class = "form-group">
            <label for="TipoCurso" >Tipo Curso:</label>
            <select class="form-control my-3" name="TipoCurso" id="TipoCurso">
                <option selected disabled>Seleccione Tipo de Curso...</option>
                <?php foreach($listaTpCurso as $Curso){?>
                    <option value="<?php echo $Curso['Tipocurso_id'];?>"><?php echo $Curso['tipocurso'];?></option>
                <?php }?>
            </select>
        </div>
        
        <div class = "form-group">
            <label for="CodigoUsuario" >Creador:</label>
            <select class="form-control my-3" name="CodigoUsuario" id="CodigoUsuario">
                <option selected disabled>Seleccione Creador...</option>
                <?php foreach($listaTpUsuario as $TpUsuario){?>
                    <option value="<?php echo $TpUsuario['codigo_usuario'];?>"><?php echo $TpUsuario['nombre_usuario'];?></option>
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

<div class="col-md-7" >
    
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>Codigo </th>
                <th>Nombre </th>
                <th>Duracion</th>
                <th>Area</th>
                <th>Tipo </th>
                <th>Creador</th>
                <th>Accion</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaCurso as $curso) {?>
            <tr>

                <td><?php echo $curso['codigo_curso']; ?></td>
                <td><?php echo $curso['nombre_curso']; ?></td>
                <td><?php echo $curso['Duracion']; ?></td>
                <td><?php echo $curso['Area']; ?></td>
                <td><?php echo $curso['tipocurso']; ?></td>
                <td><?php echo $curso['nombre_usuario']; ?></td>
                
                
                <td>
                
                <form method="post">
                    <input type="hidden" name="CodigoCurso" id="CodigoCurso" value="<?php echo $curso['codigo_curso']; ?>">
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
