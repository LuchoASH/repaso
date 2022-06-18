<!doctype html>
<html lang="es">
  <head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Expe</title>
  </head>
  <body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Lista de Productos</h1>
    <p>En esta lista se muestran todos los productos que puedes adquirir</p>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Grupo 6</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Pagina de inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Carrito</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Iniciar sesión</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="row">
        <div class="col-6">
                  <?php
              session_start();

              $con = mysqli_connect("localhost", "trabajo_sin", "trabajo_sin", "sin_grupo_6");
              if (!$con) {
                echo "Error: No se pudo conectar a MySQL.";
              exit;}

              $sql = "SELECT * FROM producto";
              $result = mysqli_query($con, $sql);?>

              <table class="table">
            <thead class="thead-dark" >
              <tr>
                <th scape="col">Lista</th>   
                <th scape="col">Nombre</th>
                <th scape="col">Precio</th>  
                <th scape="col">Color</th>
                <th scape="col">Foto</th>
                <th scape="col">Información</th>
              </tr>
            </thead>
            <tbody id="datos">
            <?php
              foreach ($result as $row){  ?>
              <tr>
                <td class="align-middle"><?php echo $row['idPRODUCTO'];?></td>
                <td class="align-middle"><?php echo $row['nombre'];?></td>
                <td class="align-middle"><?php echo "S/. ".$row['precio'];?></td>
                <td class="align-middle"><?php echo $row['color'];?></td>
                <td><img src="<?php echo "prendas/".$row['idPRODUCTO'].".png";?>" width="100"></td>
                <td class="align-middle"> <a href=""><?php echo "Ver detalle de ".$row['nombre'];?></td></a>
              </tr> 
            </tbody>
            <?php
              }
            ?>
          </table>
        </div>
        <div class="col-6">
          <h1>Seleccione metodo de pago</h1>
          <div class="row mt-3">
          <div class="col-2">
            </div>
             <div class="col-8">
                <form>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Tarjeta Débito/Crédito
                    </label>
                  </div>
                  <div class="card mt-3">
                    <div class="card-body">
                            <div class="form-group">
                          <label for="exampleInputEmail1">Número de tarjeta</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu número de tarjeta">
                          <small id="emailHelp" class="form-text text-muted">Tus datos están seguros</small>
                        </div>
                        <div class="row">
                          
                          <div class= "col-7">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Fecha de vencimento</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="MM/YY">
                            </div>
                          </div>
                          <div class= "col-5">
                            <div class="form-group">
                              <label for="exampleInputPassword1">CVV</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="CVV">
                            </div>
                          </div>
                      </div>
                       
                    </div>
                  </div>
                <div class="mt-3 form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                    Pago a contra entrega
                  </label>
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Pagar</button>
                </form>
            </div>
            </div>
        </div>
      </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>