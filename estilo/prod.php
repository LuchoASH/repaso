
<?php
include 'cab.php';
echo $header_html;

$host = "localhost";
$usuario = "trabajo_sin";
$clave = "trabajo_sin";
$bd = "sin_grupo_6";

$con = mysqli_connect($host, $usuario, $clave, $bd);
$sql = "select @i := @i + 1 as num, producto.idPRODUCTO, producto.nombre, producto.precio as 'precio', producto.color, tallas.talla, producto_tallas.stock, local.nombre as 'local' from producto
      cross join (select @i := 0) r
      join producto_tallas on producto_tallas.idPRODUCTO = producto.idPRODUCTO
      join tallas on tallas.idTALLAS = producto_tallas.idTALLAS
      join local_producto on local_producto.idPRODUCTO = producto.idPRODUCTO
      join local on local.idLOCAL = local_producto.idLOCAL
      ORDER BY rand()";
$result = mysqli_query($con, $sql);
?>

<div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Lista de Productos</h1>
    <p>En esta lista se muestran todos los productos que puedes adquirir</p>
</div>

<?php
    if(isset($_SESSION["alert"]))
    {
    echo '<div class="container mt-5">
        <div class="row">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-8">
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>'
            .$_SESSION["alert"].'
        </div>
        </div>
    </div>';
    unset($_SESSION["alert"]);
}

?>
<div class="container mt-5">
    <div class="row">
    <div class="col-sm-2">
        <a href="">Volver |</a>
        <a href="">Sesión |</a>
        <a href="">Carrito</a></div>
        <hr>
    <div class="col-sm-8">
        <h3>Productos</h3>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">
        <table class="table">
        <thead>
            <tr>
            <th>Lista</th>   
            <th>Nombre</th>
            <th>Precio</th>  
            <th>Color</th>
            <th>Foto</th>
            <th>Talla</th>
            <th>Local</th>
            <th>Stock</th>
            <th>Información</th>
            <th>Compra</th>
            <th>Lista</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $incre = 0;
        if($result){
        while($row = mysqli_fetch_array($result)){
            $incre += 1;
            $num = $row['num'];
            #echo $num." ";
            echo '<tr>';
            echo '<td>';
            echo  $incre;
            echo '</td>';
            echo '<td>';
            echo $row['nombre'];
            echo '</td>';
            echo '<td>';
            echo "S/. ".$row['precio'];
            echo '</td>';
            echo '<td>';
            echo $row['color'];
            echo '</td>';
            echo '<td>';
            echo '<img src="imagenes/'.$row['idPRODUCTO'].'.jpg" width="100" border="1" ">';
            echo '</td>';
            echo '<td>';
            echo $row['talla'];
            echo '</td>';
            echo '<td>';
            echo $row['local'];
            echo '</td>';
            echo '<td>';
            echo $row['stock']." unidades";
            echo '</td>';
            echo '<td>';
            echo '<a href="det.php?num='. $row["num"] .'" target="_blank">Ver detalle</a>&nbsp';
            echo '</td>';
            echo '<td>';
            echo '<a href="">Añadir al carrito</a>&nbsp;&nbsp;';
            echo '</td>';
            echo '<td>';
            echo $row['num'];
            echo '</td>';
        echo '</tr>';
        }
        }
        mysqli_close($con);
        ?>
        </tbody>
        </table>
    </div>
    </div>
</div>

<?php echo $footer_html; ?>