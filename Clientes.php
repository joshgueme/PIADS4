<?php
#region Variable de sesion
include("Conexion.php");
session_start();
$tabla = "<tr><td>Sin Registros</td></tr>";
$con = conectar();
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
echo $activo;
mysqli_close($con);
$con = null;
#endregion Variable de sesion

#region Funcion Ventana
$opc = "";
$alerta = null;
if(isset($_POST['btnBuscar']))
{
  $con = conectar();
  $opc = "buscar";
  $idcliente = ($_POST['txtIdCliente']);
  if($idcliente == null)
  {
    $idcliente = 0;
  }
  $nombre = 0;
  $apaterno = 0;
  $amaterno = 0;
  $tel = 0;
  $email = 0;
  $fecalta = 0;
  $query = "CALL sp_clientes('$opc',$idcliente,'$nombre','$apaterno','$amaterno',$tel,'$email','$fecalta')";
  $res = mysqli_query($con,$query);
  $reg = mysqli_fetch_array($res);
  if(mysqli_num_rows($res) < 1){
    $tabla = "<tr><td>Sin Registros</td></tr>";
  }
  else
  {
    $tabla = null;
    for ($i=0; $i <= $reg; $i++)
          { 
            $tabla = $tabla . '
            <tr>
            <td>'.$reg['IdCliente'].'</td>
            <td>'.$reg['Nombre'].'</td>
            <td>'.$reg['APaterno'].'</td>
            <td>'.$reg['AMaterno'].'</td>
            <td>'.$reg['Telefono'].'</td>
            <td>'.$reg['Email'].'</td>
            <td>'.$reg['FecAlta'].'</td>
            </tr>
            ';
            $reg = mysqli_fetch_array($res); 
        }
  }
  mysqli_close($con);
  $con = null;
}
if(isset($_POST['btnRegistrar']))
{
  $con = conectar();
  $opc = "nuevo";
  $idcliente = ($_POST['txtIdCliente']);
  $nombre = ($_POST['txtNombre']);
  $apaterno = ($_POST['txtApPat']);
  $amaterno = ($_POST['txtApMat']);
  $tel = ($_POST['txtTel']);
  $email = ($_POST['txtEmail']);
  $fecalta = ($_POST['txtFechaAlta']);

  $query = "CALL sp_clientes('$opc',$idcliente,'$nombre','$apaterno','$amaterno',$tel,'$email','$fecalta')";
  if(mysqli_query($con,$query)){
    $alerta = '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Cliente Registrado.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   
          </div>';
  }
  mysqli_close($con);
  $con = null;
}
if(isset($_POST['btnModificar']))
{
  $con = conectar();
  $opc = "editar";
  $idcliente = $_POST['txtIdCliente'];
  $nombre = $_POST['txtNombre'];
  $apaterno = $_POST['txtApPat'];
  $amaterno = $_POST['txtApMat'];
  $tel = $_POST['txtTel'];
  $email = $_POST['txtEmail'];
  $fecalta = $_POST['txtFechaAlta'];

  $query = "CALL sp_clientes('$opc',$idcliente,'$nombre','$apaterno','$amaterno',$tel,'$email','$fecalta')";
  if(mysqli_query($con,$query)){
    $alerta = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Cliente Modificado.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   
          </div>';
  }
  mysqli_close($con);
  $con = null;
}
if(isset($_POST['btnBaja']))
{
  $con = conectar();
  $opc = "borrar";
  $idcliente = $_POST['txtIdCliente'];
  $nombre = 0;
  $apaterno = 0;
  $amaterno = 0;
  $tel = 0;
  $email = 0;
  $fecalta = 0;

  $query = "CALL sp_clientes('$opc',$idcliente,'$nombre','$apaterno','$amaterno',$tel,'$email','$fecalta')";
  if(mysqli_query($con,$query)){
    $alerta = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Cliente dado de baja.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   
          </div>';
  }
  mysqli_close($con);
  $con = null;
}
if(isset($_POST['btnLimpiar']))
{

}
#endregion Funcion Ventana
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
              <a class="nav-link active" href="Clientes.php" aria-disabled="true">Clientes</a>
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
              <a class="nav-link" aria-disabled="true"><?php echo "Bienvenido: " . $_SESSION['usuario']?></a>
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
          <!--#endregion Controles-->
          <div class="container">
            <form class="form-group" action="Clientes.php" method="POST">
                <div class="card">
                    <div class="card-header">
                      Clientes
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm">
                        <label class="col-form-label" for="txtIdCliente">ID Cliente</label>
                        <input class="form-control" type="text" name="txtIdCliente"/>
                        </div>
                        <div class="col-sm"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label class="col-form-label" for="txtNombre">Nombre</label>
                                <input class="form-control" type="text" name="txtNombre"/>
                            </div>
                            <div class="col-sm">
                                <label class="col-form-label" for="txtApPat">Apellido Paterno</label>
                                <input class="form-control" type="text" name="txtApPat"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label class="col-form-label" for="txtApMat">Apellido Materno</label>
                                <input class="form-control" type="text" name="txtApMat"/>
                            </div>
                            <div class="col-sm">
                                <label class="col-form-label" for="txtTel">Telefono</label>
                                <input class="form-control" type="tel" name="txtTel"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label class="col-form-label" for="txtEmail">Email</label>
                                <input class="form-control" type="email" name="txtEmail"/>
                            </div>
                            <div class="col-sm">
                                <label class="col-form-label" for="txtFechaAlta">Fecha Alta</label>
                                <input class="form-control" type="date" name="txtFechaAlta"/>
                            </div>
                        </div>
                        <br/>
                          <?php echo $alerta;?>
                        <br/>
                        <div class="row">
                            <div class="col-sm">
                              <button type="submit" class="btn btn-primary" name="btnBuscar">Buscar</button>
                            </div>
                            <div class="col-sm">
                              <button type="submit" class="btn btn-success" name="btnRegistrar">Registrar</button>
                            </div>
                            <div class="col-sm">
                              <button type="submit" class="btn btn-warning" name="btnModificar">Modificar</button>
                            </div>
                            <div class="col-sm">
                              <button type="submit" class="btn btn-danger" name="btnBaja">Baja</button>
                            </div>
                            <div class="col-sm">
                              <button type="submit" class="btn btn-outline-warning" name="btnLimpiar">Limpiar</button>
                            </div>
                          </div>
                          <br/>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                              <tr>
                              <td>Id Cliente</td>
                              <td>Nombre</td>
                              <td>Apellido Paterno</td>
                              <td>Apellido Materno</td>
                              <td>Telefono</td>
                              <td>Email</td>
                              <td>Fecha Alta</td>
                              </tr>
                              </thead>
                              <tbody>
                              <?php echo $tabla;?>
                              </tbody>
                              </div>
                      </div>
                      </div>
            </form>
          </div>
          <!--#endregion Controles-->
        </div>
</body>
</html>