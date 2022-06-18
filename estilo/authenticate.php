<?php

include './cab.php';
echo $header_html;
$host = "localhost";
$usuario = "trabajo_sin";
$clave = "trabajo_sin";
$bd = "sin_grupo_6";
$con = mysqli_connect($host, $usuario, $clave, $bd);
$sql = "SELECT lower(email) as email , contraseña as contra 
        FROM cliente where email ='".$_POST['email']."' and contra = md5('".$_POST['password']."')";
$result = mysqli_query($con, $sql);



echo "Xd";

echo $footer_html; ?>