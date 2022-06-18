<?php

include './cab.php';
echo $header_html;
$host = "localhost";
$usuario = "trabajo_sin";
$clave = "trabajo_sin";
$bd = "sin_grupo_6";

$con = mysqli_connect($host, $usuario, $clave, $bd);
$sql = "select producto.idPRODUCTO, producto.nombre, producto.precio as 'precio', producto.color, tallas.talla, producto_tallas.stock, local.nombre as 'local' from producto
      join producto_tallas on producto_tallas.idPRODUCTO = producto.idPRODUCTO
      join tallas on tallas.idTALLAS = producto_tallas.idTALLAS
      join local_producto on local_producto.idPRODUCTO = producto.idPRODUCTO
      join local on local.idLOCAL = local_producto.idLOCAL
      ORDER BY local
      #order by idPRODUCTO";
$result = mysqli_query($con, $sql);
?>

 <div class="container-fluid p-5 bg-primary text-white text-center">
   <h1>Ingresar al sistema</h1>
   <p>Coloque su correo y contraseña para ingresar.</p>
 </div>
<form action="authenticate.php" method="post">
  <div class="container mt-5">
   <div class="row">
     <div class="col-sm-2">&nbsp;</div>
     <div class="col-sm-8">
       <h3>Credenciales</h3>
     </div>
   </div>
   <div class="row">
     <div class="col-sm-2">&nbsp;</div>
     <div class="col-sm-8">

       <div class="row">
         <div class="col-sm-2">email</div>
         <div class="col-sm-8">
           <input type="text" id="email" name="email" 
           pattern=".+@gmail\.com" required title="Ingresa un correo válido">
         </div>
       </div>
       <div class="row">
         <div class="col-sm-2">Contraseña</div>
         <div class="col-sm-8">
           <input type="password" id="password" name="password">
         </div>
       </div>
       <div class="row">
         <div class="col-sm-2">&nbsp;</div>
         <div class="col-sm-8">
           <input type="submit">
         </div>
       </div>
     </div>
   </div>
 </div>
</form>

<?php echo $footer_html; ?>