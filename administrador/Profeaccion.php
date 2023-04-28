<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">


   <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/ISOTIPO.png" />
    <title>Admisnitrar Docentes|FurrinAcademy</title>
    <body class="body"  style="background-image: url('images/docente.jpg');background-image: no-repeat; background-image: fixed; background-image: center;-webkit-background-size: cover;-moz-background-size: cover; -o-background-size: cover; background-size: cover;">

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
   $CodigoProfesor=(isset($_POST['CodigoProfesor']))?$_POST['CodigoProfesor']:"";
   $NombreProfesor=(isset($_POST['NombreProfesor']))?$_POST['NombreProfesor']:"";
   $Direccion=(isset($_POST['Direccion']))?$_POST['Direccion']:"";
   $CodigoUsuario=(isset($_POST['CodigoUsuario']))?$_POST['CodigoUsuario']:"";
   
   //post datos aciones-botones
   $Accion=(isset($_POST['Accion']))?$_POST['Accion']:"";
   //agrego coneccion con la base de datos
   include("./config/db.php");
   //mostrando Usuario
   $sentenciaSQL=$conexionJF->prepare("SELECT codigo_profesor,`Nombre_profe`,
   `Direccion`,usuario.nombre_usuario FROM profesores 
   INNER JOIN usuario ON usuario.codigo_usuario=codigo_usuarioo");
   $sentenciaSQL->execute();
   $listaprofesores=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
   //mostrando Tipos de Usuario para usar en el select
   $sentenciaSQL=$conexionJF->prepare("SELECT nombre_usuario, codigo_usuario FROM `usuario` WHERE tipodeusuario= 2");
   $sentenciaSQL->execute();
   $listaTpUsuario=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

 
      switch($Accion){
        case"Agregar";
        
        
        $sentenciaSQL=$conexionJF->prepare("INSERT INTO `profesores` 
        (`codigo_profesor`, `Nombre_profe`, `Direccion`, `codigo_usuarioo`)
        VALUES (:CodigoProfesor, :NombreProfesor, :Direccion, :CodigoUsuario);");
        $sentenciaSQL->bindParam(':CodigoProfesor',$CodigoProfesor);
        $sentenciaSQL->bindParam(':NombreProfesor',$NombreProfesor);
        $sentenciaSQL->bindParam(':Direccion',$Direccion);
        $sentenciaSQL->bindParam(':CodigoUsuario',$CodigoUsuario);
        $sentenciaSQL->execute();
        header("location: ./Profeaccion.php");
        
        break;

        case"Editar";
        $sentenciaSQL=$conexionJF->prepare("UPDATE profesores 
        SET Nombre_profe=:NombreProfesor,Direccion=:Direccion,codigo_usuarioo=:CodigoUsuario 
        WHERE codigo_profesor=:CodigoProfesor" );
        $sentenciaSQL->bindParam(':CodigoProfesor',$CodigoProfesor);
        $sentenciaSQL->bindParam(':NombreProfesor',$NombreProfesor);
        $sentenciaSQL->bindParam(':Direccion',$Direccion);
        $sentenciaSQL->bindParam(':CodigoUsuario',$CodigoUsuario);
        $sentenciaSQL->execute();
        header("location: ./Profeaccion.php");
        
        break;

        case"Eliminar";
        $sentenciaSQL=$conexionJF->prepare("DELETE FROM profesores WHERE codigo_profesor = :CodigoProfesor" );
        $sentenciaSQL->bindParam(':CodigoProfesor',$CodigoProfesor);
        $sentenciaSQL->execute();
        header("location: ./Profeaccion.php");
        break;

        case"Cancelar";
        header("location: ./Profeaccion.php");
        break;

        case"Seleccionar":
            $sentenciaSQL=$conexionJF->prepare("SELECT * FROM profesores WHERE codigo_profesor = :codId" );
            $sentenciaSQL->bindParam(':codId',$CodigoProfesor);
            $sentenciaSQL->execute();
            
            $dataprofesor=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
            $CodigoProfesor=$dataprofesor['codigo_profesor'];
            $NombreProfesor=$dataprofesor['Nombre_profe'];
            $Direccion=$dataprofesor['Direccion'];
            $CodigoUsuario=$dataprofesor['codigo_usuarioo'];
        break;
      }
      
?>
<div class="col-md-5 "     >
    <form id="formulario" method="POST" enctype="multipart/form-data" class="row g-3" >

        <div class = "form-group">
            <label for="CodigoProfesor">Codigo profesor:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $CodigoProfesor; ?>" name="CodigoProfesor" id="CodigoProfesor"  placeholder="">
        </div>
        
        <div class = "form-group">
            <label for="NombreProfesor">Nombre Profesor:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $NombreProfesor; ?>" name="NombreProfesor" id="NombreProfesor"  placeholder="">
        </div>

        <div class = "form-group">
            <label for="Direccion">Direccion:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $Direccion; ?>" name="Direccion" id="Direccion"  placeholder="Constraseña">
        </div>
        
        <div class = "form-group">
            <label for="CodigoUsuario" >CodigoUsuario:</label>
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

<div class="col-md-7 table-responsive" >
    
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>Codigo de Profesor</th>
                <th>Nombre del Docente</th>
                <th>Direccion</th>
                <th>Nombre de Usuario</th>
                <th>Accion</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaprofesores as $profesor) {?>
            <tr>

                <td><?php echo $profesor['codigo_profesor']; ?></td>
                <td><?php echo $profesor['Nombre_profe']; ?></td>
                <td><?php echo $profesor['Direccion']; ?></td>
                <td><?php echo $profesor['nombre_usuario']; ?></td>
                
                <td>
                
                <form method="post">
                    <input type="hidden" name="CodigoProfesor" id="CodigoProfesor" value="<?php echo $profesor['codigo_profesor']; ?>">
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
