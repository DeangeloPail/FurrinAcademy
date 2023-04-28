
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">


   <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/ISOTIPO.png" />
    <title>Admisnitrar Usuarios|FurrinAcademy</title>
    <body class="body"  style="background-image: url('images/usuarios.jpg');background-image: no-repeat; background-image: fixed; background-image: center;-webkit-background-size: cover;-moz-background-size: cover-o-background-size: cover; background-size: cover;">
    


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
  $UsuarioID=(isset($_POST['UsuarioID']))?$_POST['UsuarioID']:"";
  $NombreUsuario=(isset($_POST['NombreUsuario']))?$_POST['NombreUsuario']:"";
  $Constrasena=(isset($_POST['Constrasena']))?$_POST['Constrasena']:"";
  $TipUsuario=(isset($_POST['TipUsuario']))?$_POST['TipUsuario']:"";
  
  //post datos aciones-botones
  $Accion=(isset($_POST['Accion']))?$_POST['Accion']:"";
  //agrego coneccion con la base de datos
  include("./config/db.php");
  //mostrando Usuario
  $sentenciaSQL=$conexionJF->prepare("SELECT codigo_usuario, tipo_de_usuario.Tipodeusuario,`nombre_usuario`,`contrasena`
  FROM usuario INNER JOIN tipo_de_usuario ON usuario.tipodeusuario=tipo_de_usuario.codigo_tusuario");
  $sentenciaSQL->execute();
  $listaUsuario=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  //mostrando Tipos de Usuario para usar en el select
  $sentenciaSQL=$conexionJF->prepare("SELECT * FROM `tipo_de_usuario`");
  $sentenciaSQL->execute();
  $listaTpUsuario=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

 
      switch($Accion){
        case"Agregar";
        
        
        $sentenciaSQL=$conexionJF->prepare("INSERT INTO `usuario` (`codigo_usuario`, `nombre_usuario`, `contrasena`, `tipodeusuario`)
        VALUES (NULL, :usuario, :constrasena, :tipUsuario);");
        $sentenciaSQL->bindParam(':usuario',$NombreUsuario);
        $sentenciaSQL->bindParam(':constrasena',$Constrasena);
        $sentenciaSQL->bindParam(':tipUsuario',$TipUsuario);
        $sentenciaSQL->execute();
        header("location:./Useraccion.php");
        
        break;

        case"Editar";
        $sentenciaSQL=$conexionJF->prepare("UPDATE usuario 
        SET nombre_usuario=:usuario,contrasena=:constrasena,tipodeusuario=:tipUsuario WHERE codigo_usuario=:codId" );
        $sentenciaSQL->bindParam(':usuario',$NombreUsuario);
        $sentenciaSQL->bindParam(':constrasena',$Constrasena);
        $sentenciaSQL->bindParam(':tipUsuario',$TipUsuario);
        $sentenciaSQL->bindParam(':codId',$UsuarioID);
        $sentenciaSQL->execute();
        header("location:./Useraccion.php");
        
        break;

        case"Eliminar";
        $sentenciaSQL=$conexionJF->prepare("DELETE FROM usuario WHERE codigo_usuario = :codId" );
        $sentenciaSQL->bindParam(':codId',$UsuarioID);
        $sentenciaSQL->execute();
        header("location:./Useraccion.php");
        break;

        case"Cancelar";
        header("location:./Useraccion.php");
        break;

        case"Seleccionar":
            $sentenciaSQL=$conexionJF->prepare("SELECT * FROM usuario WHERE codigo_usuario = :codId" );
            $sentenciaSQL->bindParam(':codId',$UsuarioID);
            $sentenciaSQL->execute();
            
            $dataUsuario=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
            $NombreUsuario=$dataUsuario['nombre_usuario'];
            $Constrasena=$dataUsuario['contrasena'];
            $TipUsuario=$dataUsuario['tipodeusuario'];
        break;
      }
      
?>


 <div class="col-md-5">
    <form id="formulario" method="POST" enctype="multipart/form-data" class="row g-3"     >

        <div class = "form-group">
            <input type="hidden" required readonly class="form-control" value="<?php echo $UsuarioID; ?>" 
            name="UsuarioID" id="UsuarioID"  placeholder="ID">
        </div>
        
        <div class = "form-group">
            <label for="NombreUsuario">Nombre de Usuario:</label>
            <input type="text" class="form-control mt-3" 
            value="<?php echo $NombreUsuario; ?>" name="NombreUsuario" id="NombreUsuario"  placeholder="Nombre de Usuario">
        </div>

        <div class = "form-group">
            <label for="Constrasena">Constrasena:</label>
            <input type="password" class="form-control mt-3" 
            value="<?php echo $Constrasena; ?>" name="Constrasena" id="Constrasena"  placeholder="Constrasena">
        </div>
        
        <div class = "form-group">
            <label for="TipUsuario" >Tipo Usuario:</label>
            <select class="form-control my-3" name="TipUsuario" id="TipUsuario">
                <option selected disabled>Seleccione Tipo Usuario...</option>
                <?php foreach($listaTpUsuario as $TpUsuario){?>
                    <option value="<?php echo $TpUsuario['codigo_tusuario'];?>"><?php echo $TpUsuario['Tipodeusuario'];?></option>
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

<div class="col-md-7"   >
    
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Constrasena</th>
                <th>Tipo Usuario</th>
                <th>Accion</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaUsuario as $Usuario) {?>
            <tr>
                <td><?php echo $Usuario['nombre_usuario']; ?></td>
                <td><?php echo $Usuario['contrasena']; ?></td>
                <td><?php echo $Usuario['Tipodeusuario']; ?></td>
                <td>
                
                <form method="post">
                    <input type="hidden" name="UsuarioID" id="UsuarioID" value="<?php echo $Usuario['codigo_usuario']; ?>">
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