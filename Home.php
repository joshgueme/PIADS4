<?php
#region Variable de sesion
include("Conexion.php");
$con = conectar();

session_start();
$varsesion = $_SESSION['usuario'];

$query = "call sp_sesion ('$varsesion');";
$res = mysqli_query($con,$query);

if (mysqli_num_rows($res) > 0)
{
  $reg = mysqli_fetch_array($res);
}
if($reg['IdRol'] == '1'){
  $activo = null; 
}
else if($reg['IdRol'] == '2')
{
  $activo = "disabled";
}
#endregion Variable de sesion
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>MtyRent</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <!--Links de JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>    
    <!--#endregion NavBar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="Home.php">
        <img src="Imagenes/MtyRent.png" width="30" height="30" alt="" loading="lazy">
        Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="ConsultaAuto.php" aria-disabled="true">Automovil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Clientes.php" aria-disabled="true">Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ConsultaRenta.php" aria-disabled="true">Renta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Venta.php" aria-disabled="true">Venta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $activo?>"  href="Usuarios.php" aria-disabled="true">Usuarios</a>
            </li>

          </ul>

          <form class="form-inline my-2 my-lg-0">
            <div class="col px-md-5">
              <div class="p-3">
              <a class="nav-link" aria-disabled="true"><?php echo "Bienvenido: " . $_SESSION['usuario'] ?></a>
              </div>
            </div>
          </form>

          <form class="form-inline my-2 my-lg-0">
            <div class="col px-md-5">
              <div class="p-3">
                <button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="ddbsesion">
                  Perfil
                  </button>
                  <div class="dropdown-menu mr-sm-2" aria-labelledby="ddbsesion">
                      <a class="dropdown-item" href="CambiarContrasena.php">Cambiar Contraseña</a>
                      <a class="dropdown-item" href="CerrarSesion.php">Cerrar Sesión</a>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </nav>
      <!--#endregion NavBar-->
<br/>
</body>
</html>