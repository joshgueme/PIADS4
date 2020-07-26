<?php
include("Conexion.php");
$res =  null;
$query = null;
if(isset($_POST["btnEntrar"]))
{
  $con = conectar();
  $usuario = $_POST["txtCuenta"];
  $contra = $_POST["txtContra"];
  $query = "select 1 from Usuario where usuario = '" . $usuario . "' and Contraseña = '" . $contra."'";
  $res = mysqli_query($con,$query);
  echo $res;
  if($res == true)
  {
    header('Location: Home.php');
  }
  else
  {
    $res = 'show';
  }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MtyRent</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>
<body>
    <!--Links de JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>    
    
    <!--#Region Banner-->
    
    <center>
      
    <div id="carouselAutos" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="carousel-item active bg-dark" data-interval="3000">
          <img src="Imagenes\Focus.jpg" width="680" height="290">
        </div>
        <div class="carousel-item bg-dark"  data-interval="3000">
          <img src="Imagenes\Golf.jpg" width="680" height="290">
        </div>
        <div class="carousel-item bg-dark" data-interval="3000">
          <img src="Imagenes\Lancer.jpg" width="680" height="290">
        </div>
        <div class="carousel-item bg-dark" data-interval="3000">
          <img src="Imagenes\Nversa.jpg" width="680" height="290">
        </div>
      </div>
    </div>
  </center>
  <br/>
    <!-- #endregion Banner-->
    <center>
      <h1>MTYRent S.A de C.V. </h1>
    </center>

   <!-- #region Controles--> 
   <div class="container">
    <form action="Login.php" method="POST">
      <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
          <label for="txtCuenta">Cuenta</label>
          <input type="text" class="form-control" name="txtCuenta">
        </div>
        <div class="col-sm"></div>
      </div>
      <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
        <label for="txtContra">Contraseña</label>
        <input type="password" class="form-control" name="txtContra">
        </div>
        <div class="col-sm"></div>
      </div>
      <br/>
      <div class="row">
        <div class="col-sm"></div>
        <center>
          <div class="col-sm">
            <button type="submit" class="btn btn-primary" name="btnEntrar">Entrar</button>
          </div>
        </center>
        <div class="col-sm"></div>
      </div>
      <br/>
      <div class="alert alert-danger alert-dismissible fade <?php echo $res?>" role="alert">
          Usuario/Contraseña incorrectos.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>

    </form>
  </div>
  <!-- #endregion Controles-->
</body>
</html>