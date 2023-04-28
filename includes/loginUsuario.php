<?php

if(!empty($_POST)) {
    if(empty($_POST['login']) || empty($_POST['pass'])) {
        echo '<div class="alert-danger"><button type="class="close" data-dismiss="aler"></button>Debe rellenar todos los campos</div>';
    } else {
        require_once 'Conexion.php';
        $login = $_POST ['login'];
        $pass = $_POST ['pass'];

        $sql = 'SELECT * FROM usuario as u INNER JOIN tipousuario as ON u.Codigo_tusuario WHERE u.usuario = ?';
        $query = $pdo->prepare($sql);
        $query->execute(array($login));
        $reuslt = $query->fetch(PDO ::FETCH_ASSOC);

        if($query->rewCount() > 0) {
            if(password_verify($pass, $reuslt['contraseña'])) {
                $_SESSION['active'] = true;
                $_SESSION['id_usuario'] = $reuslt['codigo_usuario'];
                $_SESSION['nombreusuario'] = $reuslt['nombre_usuario'];
                $_SESSION['tipodeusuario'] = $reuslt['Codigo_tusuario'];
                $_SESSION['nombretipo'] = $reuslt['tipodeusuario'];

                echo '<div class="alert-success"><button type="class="close" data-dismiss="aler"></button>Redirecting</div>';
            }
        }echo '<div class="alert-danger"><button type="class="close" data-dismiss="aler"></button>Usurio o clave erronea</div>';
    }
}

?>