<?php
#region Variable de sesion
include("Conexion.php");
$con = conectar();
$tabla = "<tr><td>Sin Registros</td></tr>";
$cmbrenta = null;
$cmbusuario = null;
$cmbconcepto = null;


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
mysqli_close($con);
$con = null;
#endregion Variable de sesion

#region combos
  //renta
  $con = conectar();
	$query = "select IdRenta from renta;";
	$res = mysqli_query($con, $query);
	while ($reg = mysqli_fetch_array($res)) 
	 {
    $cmbrenta = $cmbrenta . '<option value = ' . $reg['IdRenta'] . '>'. 
    $reg['IdRenta'] . 
    '</option>';
   }
   mysqli_close($con);
   $con = null;

   //usuario
   $con = conectar();
   $query = "select IdUsuario, Usuario from usuario;";
   $res = mysqli_query($con, $query);
   while ($reg = mysqli_fetch_array($res)) 
    {
     $cmbusuario = $cmbusuario . '<option value = ' . $reg['IdUsuario'] . '>'. 
     $reg['Usuario'] . 
     '</option>';
    }
    mysqli_close($con);
    $con = null;

    //concepto
    $con = conectar();
    $query = "select IdConcepto, DescConcepto, Monto from concepto;";
    $res = mysqli_query($con, $query);
    while ($reg = mysqli_fetch_array($res)) 
     {
      $cmbconcepto = $cmbconcepto . '<option value = ' . $reg['IdConcepto'] . '>'. 
      $reg['DescConcepto'] . 
      '</option>';
     }
     mysqli_close($con);
     $con = null;


#endregion combos

#region Funcion ventana
$opc = "";
if(isset($_POST["btnBuscar"]))
{
  $con = conectar();
  $opc = "buscar";
  $IdVenta = $_POST['txtNoVenta'];
  if($IdVenta == null)
  {
    $IdVenta = 0;
  }
  $IdRenta = 0;
  $IdUsuario = 0;
  $Iva = 0;
  $FechaVenta = null;
  $Estatus = 0;
  $IdVentaDetalle = 0;
  $IdConcepto = 0;
  $Monto = 0;
	$query = "call sp_venta('$opc',$IdVenta,$IdRenta,$IdUsuario,$Iva,'$FechaVenta',$Estatus,$IdVentaDetalle,$IdConcepto,$Monto);"; 
  
  $Resultado = mysqli_query($con,$query);
  $reg = mysqli_fetch_array($Resultado); 
	if (mysqli_num_rows($Resultado) < 1)
	{
    $tabla = "<tr><td>Sin Registros</td></tr>";
  }
  else
  {
    $tabla = null;
    for ($i=0; $i <= $reg; $i++)
          { 
            $tabla = $tabla . '
            <tr>
            <td>'.$reg['Idusuario'].'</td>
            <td>'.$reg['Nombre'].'</td>
            <td>'.$reg['APaterno'].'</td>
            <td>'.$reg['AMaterno'].'</td>
            <td>'.$reg['Usuario'].'</td>
            <td>'.$reg['Contrasena'].'</td>
            <td>'.$reg['IdRol'].'</td>
            <td>'.$reg['Rol'].'</td>
            <td>'.$reg['FecAlta'].'</td>
            <td>'.$reg['IdEstatus'].'</td>
            <td>'.$reg['Estatus'].'</td>
            </tr>
            ';
            $reg = mysqli_fetch_array($Resultado); 
        }
  }
  //mysqli_free_result($res);
  mysqli_close($con);
  $con = null;
}

if(isset($_POST["btnRegistrar"]))
{
  $opc = "buscar";
  $IdVenta = $_POST['txtNoVenta'];
  $IdRenta = 0;
  $IdUsuario = 0;
  $Iva = 0;
  $FechaVenta = null;
  $Estatus = 0;
  $IdVentaDetalle = 0;
  $IdConcepto = 0;
  $Monto = 0;
}

if(isset($_POST["btnPagar"]))
{
  $opc = "buscar";
  $IdVenta = $_POST['txtNoVenta'];
  $IdRenta = 0;
  $IdUsuario = 0;
  $Iva = 0;
  $FechaVenta = null;
  $Estatus = 0;
  $IdVentaDetalle = 0;
  $IdConcepto = 0;
  $Monto = 0;
}

if(isset($_POST["btnLimpiar"]))
{

}

#endregion Funcion ventana

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
        <img src="Imagenes/MtyRent.png" width="30" height="30" loading="lazy">
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
            <li class="nav-item active">
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
        <!--#endregion Controles-->
        <div class="container">
          <form class="form-group" action="Venta.php" method="POST">
                <div class="card">
                  <div class="card-header">
                    Consulta Ventas
                  </div>
                  <div class="card-body"> 
                    <div class="row">
                    <div class="col-sm">
                    <label class="col-form-label" for="txtNoVenta">No. Venta</label>
                    <input class="form-control" type="number" name="txtNoVenta"/>
                    </div>
                    <div class="col-sm">
                    </div>    
                  </div>
                  <br/>
                  <div class="row">
                        <div class="col-sm">
                            <label for="cmbRenta">Renta</label>
                            <select class="form-control" name="cmbRenta">
                            <?php echo $cmbrenta?>
                              </select>
                        </div>
                        <div class="col-sm">
                            <label for="cmbUsuario">Usuario</label>
                            <select class="form-control" name="cmbUsuario">
                              <?php echo $cmbusuario?>
                              </select>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                            <div class="col-sm">
                                <label for="cmbConcepto">Concepto</label>
                                <select class="form-control" name="cmbConcepto">
                                <?php echo $cmbconcepto?>
                                  </select>
                            </div>
                            <div class="col-sm">
                              <br/>
                              &nbsp; &nbsp; &nbsp;<input type="checkbox" class="form-check-input" name="chkAct"/>
                              <label class="form-check-label" for="chkAct">Activa</label>
                            </div>
                    </div>
                      <br/>
                    <div class="row">
                      <div class="col-sm">
                        <button type="submit" class="btn btn-primary" name="btnBuscar">Buscar</button>
                      </div>
                      <div class="col-sm">
                        <button type="submit" class="btn btn-success" name="btnRegistrar">Registrar</button>
                      </div>
                      <div class="col-sm">
                        <button type="submit" class="btn btn-warning" name="btnPagar">Pagar</button>
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
                      <td>Id Venta</td>
                      <td>Id Renta</td>
                      <td>Usuario</td>
                      <td>Concepto</td>
                      <td>Monto</td>
                      <td>Activo</td>
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


</body>
</html>