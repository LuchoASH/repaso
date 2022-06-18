<?php
include 'cab.php';
echo $header_html;


$ident = $_GET['num'];
#echo $ident; ?>
<div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Detalles</h1>
    <p>Aquí se muestran más detalles del producto seleccionado</p>
</div>

<div class="container mt-5">
    <div class="row">
    <div class="col-sm-2">
        <a href="productos.php">Volver |</a>
        <a href="">Sesión |</a>
        <a href="">Carrito</a></div>
        <hr>
<div class="container">
      <div class="row">
        <div class="col-6">
                  <?php

              $con = mysqli_connect("localhost", "trabajo_sin", "trabajo_sin", "sin_grupo_6");
              if (!$con) {
                echo "Error: No se pudo conectar a MySQL.";
              exit;}

              $sql = "select @i := @i + 1 as num,producto.descripcion, producto.idPRODUCTO, producto.nombre, producto.precio as 'precio', producto.color, tallas.talla, producto_tallas.stock, local.nombre as 'local' from producto
      cross join (select @i := 0) r
      join producto_tallas on producto_tallas.idPRODUCTO = producto.idPRODUCTO
      join tallas on tallas.idTALLAS = producto_tallas.idTALLAS
      join local_producto on local_producto.idPRODUCTO = producto.idPRODUCTO
      join local on local.idLOCAL = local_producto.idLOCAL
      ORDER BY local";
              $result = mysqli_query($con, $sql);?>

              <table class="table">
            <thead class="thead-dark" >
              <tr>
                <th scape="col">Nombre</th>
                <th scape="col">Precio</th> 
                <th scape="col">Talla</th>  
                <th scape="col">Color</th>
                <th scape="col">Carrito</th>
              </tr>
            </thead>
            <tbody id="datos">
            <?php
              foreach ($result as $row){  
                if ($row['num'] == $ident){
                    $nuevoid = $row['idPRODUCTO'];
                    $nuevonomb = $row['nombre'];?>
              <tr>
                <td><?php echo $row['nombre'];?></td>
                <td><?php echo "S/. ".$row['precio'];?></td>
                <td><?php echo $row['talla'];?></td>
                <td><?php echo $row['color'];?></td>
                <td><a href="">Añadir al carrito</a></td>
            </tr> 
            <h5>Breve descripción</h5>
            <p><?php echo $row['descripcion'];?></p>
            <hr style="height:1px">
            <h5>Ubicación</h5>
            <p><?php echo "Este producto puede ser recogido en nuestra tienda de ".$row['local'];?></p>
            <hr style="height:1px">
            </tbody>
            <?php
              }
          }
            ?>
          </table>
        </div>
        <div class="col-5">
          <h2><?php echo $nuevonomb;?></h2>
          <div class="row mt-2">
          <div class="col-1">
            </div>
            </div>
            <div class="align-middle">
                <img src="<?php echo "imagenes/".$nuevoid.".jpg";?>" height="250" border="3">
            </div>
            </div>
                  </div>
            </div>
            </div>
        </div>
      </div>
    </div>
<br>
<?php echo $footer_html; ?>