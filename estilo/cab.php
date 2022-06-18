<?php
session_start();
$header_html = '<html>
    <head>
        <title>Tiendita del grupo 6 &#128077</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>';
    if(isset($_SESSION["user_connected_id"])){
        $host = "localhost";
        $usuario = "trabajo_sin";
        $clave = "trabajo_sin";
        $bd = "sin_grupo_6";
        $con = mysqli_connect($host, $usuario, $clave, $bd);
        $sql = "SELECT * FROM users where id = '".$_SESSION["user_connected_id"]."'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_array($result);
        echo "Bienvenido:  ". $user['nombre'];
        echo "&nbsp; ";
      #echo "<a href='http://localhost/www/logout.php'>Cerrar sesión</a>";
    }#else{
#      echo "<a href='http://localhost/www/login.php'>Ingresar</a>";
#    }

#    if(isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0){
#      echo "&nbsp; | &nbsp; <a href='http://localhost/mi_parte/cart.php'><span class='badge bg-secondary'>".count($_SESSION["cart"])."</span>&nbsp;Ir al carrito</a>";
#    }
$footer_html ='</body>
<footer class="bg-light text-center text-lg-start">

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Derechos de autor:
    <a class="text-dark" href="https://youtu.be/B2s61aa0AZA?t=8" target="blank">Equipo 6 SIN</a>
  </div>
  <!-- Copyright -->
</footer>
  </html>';
?>