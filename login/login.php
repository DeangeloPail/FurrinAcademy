<?php
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FurrinAcademy|Login Administracion</title>

     <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/ISOTIPO.png" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../css/estiloslogin1.css">
    <nav class="navbar bg-body-tertiary">
  <div class="container-fluid"  style="
    background-color: rgb(182 192 203 / 50%);
">
    <a class="navbar-brand" href="../index.html">
      <img src="../assets/FURRIN.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top" style="height: 5pc;width: 5pc;margin-left: 2pc;">
      
    </a>
  </div>
</nav>
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>Elige tu Usuario o Inicia Sesion</h3>

                        <button id="btn__iniciar-sesion">Regresar</button>
                    </div>
                    <div class="caja__trasera-register">
                    <IMG SRC="../assets/FURRIN.png" style="height: 7pc; margin-left: 8pc;">
                        <button href="" style="margin-left: 6pc">Excelencia Educativa</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form method="post" action="config/controladores.php" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        
                        <input type="text" name="usuario" autocomplete="off" id="usuario" placeholder="Nombre de Usuario">
                        <input type="password" name="contrasena" autocomplete="off" id="contrasena" placeholder="Contraseña">
                        <button name="btmlogin" type="submit" value="iniciar sesion">Entrar</button>
                    </form>

                    

        </main>

        <script src="../js/scriptlogin.js"></script>
</body>
</html>