<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

   <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/ISOTIPO.png" />
    <title>Admisnitrar Alumnos|FurrinAcademy</title>
    <body class="body"  style="background-image: url('images/estudiante.jpg');background-image: no-repeat;
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
   $CodigoEstudia=(isset($_POST['CodigoEstudia']))?$_POST['CodigoEstudia']:"";
   $NombreEstudia=(isset($_POST['NombreEstudia']))?$_POST['NombreEstudia']:"";
   $ApellidoEstudia=(isset($_POST['ApellidoEstudia']))?$_POST['ApellidoEstudia']:"";
   $Direccion=(isset($_POST['Direccion']))?$_POST['Direccion']:"";
   $Telefono=(isset($_POST['Telefono']))?$_POST['Telefono']:"";
   $CodigoUsuario=(isset($_POST['CodigoUsuario']))?$_POST['CodigoUsuario']:"";
   
   //post datos aciones-botones
   $Accion=(isset($_POST['Accion']))?$_POST['Accion']:"";
   //agrego coneccion con la base de datos
   include("./config/db.php");
   //mostrando Usuario
   $sentenciaSQL=$conexionJF->prepare("SELECT `Codigo_estudiante`,`Nombre_estudiante`,`Apellido_estudiante`,
   `Direccion`,`Telefono`,usuario.nombre_usuario FROM `estudiante`
   INNER JOIN usuario on estudiante.codigo_usuario=usuario.codigo_usuario");
   $sentenciaSQL->execute();
   $listaEstudiante=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
   //mostrando Tipos de Usuario para usar en el select
   $sentenciaSQL=$conexionJF->prepare("SELECT nombre_usuario, codigo_usuario FROM `usuario` WHERE tipodeusuario= 'Est'");
   $sentenciaSQL->execute();
   $listaTpUsuario=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

 
      switch($Accion){
        case"Agregar";
        
        
        $sentenciaSQL=$conexionJF->prepare("INSERT INTO `estudiante` 
        (`Codigo_estudiante`, `Nombre_estudiante`, `Apellido_estudiante`, `Direccion`, `Telefono`, `codigo_usuario`)
        VALUES (:CodigoEstudia, :NombreEstudia, :ApellidoEstudia, :Direccion, :Telefono, :CodigoUsuario );");
        $sentenciaSQL->bindParam(':CodigoEstudia',$CodigoEstudia);
        $sentenciaSQL->bindParam(':NombreEstudia',$NombreEstudia);
        $sentenciaSQL->bindParam(':ApellidoEstudia',$ApellidoEstudia);
        $sentenciaSQL->bindParam(':Direccion',$Direccion);
        $sentenciaSQL->bindParam(':Telefono',$Telefono);
        $sentenciaSQL->bindParam(':CodigoUsuario',$CodigoUsuario);
        $sentenciaSQL->execute();
        header("location: ./Estuaccion.php");
        
        break;

        case"Editar";
        $sentenciaSQL=$conexionJF->prepare("UPDATE estudiante 
        SET Nombre_estudiante=:NombreEstudia, Apellido_estudiante=:ApellidoEstudia,
        Direccion=:Direccion, Telefono=:Telefono, codigo_usuario=:CodigoUsuario
        WHERE Codigo_estudiante=:CodigoEstudia" );
        $sentenciaSQL->bindParam(':CodigoEstudia',$CodigoEstudia);
        $sentenciaSQL->bindParam(':NombreEstudia',$NombreEstudia);
        $sentenciaSQL->bindParam(':ApellidoEstudia',$ApellidoEstudia);
        $sentenciaSQL->bindParam(':Direccion',$Direccion);
        $sentenciaSQL->bindParam(':Telefono',$Telefono);
        $sentenciaSQL->bindParam(':CodigoUsuario',$CodigoUsuario);
        $sentenciaSQL->execute();
        header("location: ./Estuaccion.php");
        
        break;

        case"Eliminar";
        $sentenciaSQL=$conexionJF->prepare("DELETE FROM estudiante WHERE Codigo_estudiante = :CodigoEstudia" );
        $sentenciaSQL->bindParam(':CodigoEstudia',$CodigoEstudia);
        $sentenciaSQL->execute();
        header("location: ./Estuaccion.php");
        break;

        case"Cancelar";
        header("location: ./Estuaccion.php");
        break;

        case"Seleccionar":
            $sentenciaSQL=$conexionJF->prepare("SELECT * FROM estudiante WHERE Codigo_estudiante = :CodigoEstudia" );
            $sentenciaSQL->bindParam(':CodigoEstudia',$CodigoEstudia);
            $sentenciaSQL->execute();
            
            $dataEstudiante=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            $CodigoEstudia=$dataEstudiante['Codigo_estudiante'];
            $NombreEstudia=$dataEstudiante['Nombre_estudiante'];
            $ApellidoEstudia=$dataEstudiante['Apellido_estudiante'];
            $Direccion=$dataEstudiante['Direccion'];
            $Telefono=$dataEstudiante['Telefono'];
            $CodigoUsuario=$dataEstudiante['codigo_usuario '];
    
            
        break;
      }
        
?>



<div class="col-md-4">
    <form id="formulario" method="POST" enctype="multipart/form-data" class="row g-3" >

        <div class = "form-group">
            <label for="CodigoEstudia">Codigo:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $CodigoEstudia; ?>" name="CodigoEstudia" id="CodigoEstudia"  placeholder="">
        </div>
        
        <div class = "form-group">
            <label for="NombreEstudia">Nombres:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $NombreEstudia; ?>" name="NombreEstudia" id="NombreEstudia"  placeholder="">
        </div>

        <div class = "form-group">
            <label for="ApellidoEstudia">Apellidos:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $ApellidoEstudia; ?>" name="ApellidoEstudia" id="ApellidoEstudia"  placeholder="">
        </div>


        <div class = "form-group">
            <label for="Direccion">Dirección:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $Direccion; ?>" name="Direccion" id="Direccion"  placeholder="">
        </div>

        <div class = "form-group">
            <label for="Telefono">Teléfono:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $Telefono; ?>" name="Telefono" id="Telefono"  placeholder="">
        </div>
        
        <div class = "form-group">
            <label for="CodigoUsuario" >Usuario:</label>
            <select class="form-control my-3" name="CodigoUsuario" id="CodigoUsuario">
                <option selected disabled>Seleccione Tipo Usuario...</option>
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

<div class="col-md-7">
    
    <table class="table table-bordered table-responsive" id="example" >
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Usuario</th>
                <th>Accion</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaEstudiante as $estudiante) {?>
            <tr>

                <td><?php echo $estudiante['Codigo_estudiante']; ?></td>
                <td><?php echo $estudiante['Nombre_estudiante']; ?></td>
                <td><?php echo $estudiante['Apellido_estudiante']; ?></td>
                <td><?php echo $estudiante['Direccion']; ?></td>
                <td><?php echo $estudiante['Telefono']; ?></td>
                <td><?php echo $estudiante['nombre_usuario']; ?></td>
                
                
                <td>
                
                <form method="post">
                    <input type="hidden" name="CodigoEstudia" id="CodigoEstudia" value="<?php echo $estudiante['Codigo_estudiante']; ?>">
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
