<?php
$conexionjf=new mysqli("localhost","root","","proyectofabian");
if($conexionjf->connect_errno){
    echo "error" . $conexionjf->connect_errno;
}

$conexionjf->set_charset("utf8");


              

?>