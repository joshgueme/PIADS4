<?php
#region Variable de sesion
include("Conexion.php");
$con = conectar();
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
mysqli_close($con);
$con = null;
#endregion Variable de sesion

if(isset($_POST["btnRegistrar"]))
{

  $varAIdAutomovil=($_POST["txtidauto"]);
  $varAIdFabricante=($_POST["txtMarca"]);
  $varAIdModelo=($_POST["txtModelo"]);
  $varAIdVersion=($_POST["txtVersion"]);
  $varAFecRegistro=($_POST["txtFechaReg"]);
  $varAIdUsuario=($_POST["txtUsuario"]);
  $varADNoSerie=($_POST["txtNoSerie"]);
  $varADAno=($_POST["txtAno"]);
  $varADIdColor=($_POST["txtColor"]);
  $varADPlaca=($_POST["txtPlaca"]);
  $varADObservaciones=($_POST["txtObservaciones"]);
  $varADIdEstatusAutomovil=1;
  $varACIdRegistro=1;
  $varACIdConcepto=1;
  $varACMonto=($_POST["txtPrecio"]);

  $query = "call sp_automovil('nuevo',$varAIdAutomovil,$varAIdFabricante,$varAIdModelo,$varAIdVersion,'$varAFecRegistro',$varAIdUsuario,$varADAno,$varADIdColor,'$varADPlaca','$varADObservaciones',$varADIdEstatusAutomovil,$varACIdConcepto,$varACMonto,0,0);"; 
  if(mysqli_query($con, $query))
  {
    echo "Registro agregado correctamente";
  } 
}

if(isset($_POST["btnModificar"]))
{

  $varAIdAutomovil=($_POST["txtidauto"]);
  $varAIdFabricante=($_POST["txtMarca"]);
  $varAIdModelo=($_POST["txtModelo"]);
  $varAIdVersion=($_POST["txtVersion"]);
  $varAFecRegistro=($_POST["txtFechaReg"]);
  $varAIdUsuario=($_POST["txtUsuario"]);
  $varADNoSerie=($_POST["txtNoSerie"]);
  $varADAno=($_POST["txtAno"]);
  $varADIdColor=($_POST["txtColor"]);
  $varADPlaca=($_POST["txtPlaca"]);
  $varADObservaciones=($_POST["txtObservaciones"]);
  $varADIdEstatusAutomovil=1;

  $varACIdRegistro=1;
  $varACIdConcepto=1;
  $varACMonto=($_POST["txtPrecio"]);

  $query = "call sp_automovil('editar',$varAIdAutomovil,$varAIdFabricante,$varAIdModelo,$varAIdVersion,'$varAFecRegistro',$varAIdUsuario,$varADAno,$varADIdColor,'$varADPlaca','$varADObservaciones',$varADIdEstatusAutomovil,$varACIdConcepto,$varACMonto,0,0);"; 
   if(mysqli_query($con, $query))
  {
    echo "Registro modificado correctamente";
  } 
}

if(isset($_POST["btnBaja"]))
{

  $varAIdAutomovil=($_POST["txtidauto"]);
  $varAIdFabricante=($_POST["txtMarca"]);
  $varAIdModelo=($_POST["txtModelo"]);
  $varAIdVersion=($_POST["txtVersion"]);
  $varAFecRegistro=($_POST["txtFechaReg"]);
  $varAIdUsuario=($_POST["txtUsuario"]);
  $varADNoSerie=($_POST["txtNoSerie"]);
  $varADAno=($_POST["txtAno"]);
  $varADIdColor=($_POST["txtColor"]);
  $varADPlaca=($_POST["txtPlaca"]);
  $varADObservaciones=($_POST["txtObservaciones"]);
  $varADIdEstatusAutomovil=1;
  $varACIdRegistro=1;
  $varACIdConcepto=1;
  $varACMonto=($_POST["txtPrecio"]);

  $query = "call sp_automovil('borrar', $varAIdAutomovil, 1, 1, 1, '2023/02/02', 1, 2020, 1, 'aojkwfdnawok', 'hlas', 1, 1, 681.54, 9, 23 );"; 
   if(mysqli_query($con, $query))
  {
    echo "Registro eliminado correctamente";
  } 
}




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
              <a class="nav-link active" href="ConsultaAuto.php" aria-disabled="true">Automovil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Clientes.php" aria-disabled="true">Clientes</a>
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
          <form class="form-group" action="#" method="POST">
              <div class="card">
                  <div class="card-header">
                    Consulta Autos
                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-sm">
                          <label class="col-form-label" for="txtidauto">Auto</label>
                          <input class="form-control" type="text" name="txtidauto"/>
                        </div>
                        <div class="col-sm">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <label class="col-form-label" for="txtModelo">Modelo</label>
                          <input class="form-control" type="text" name="txtModelo"/>
                        </div>
                        <div class="col-sm">
                          <label class="col-form-label" for="txtMarca">Marca</label>
                          <input class="form-control" type="text" name="txtMarca"/>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                        <div class="col-sm">
                          <label class="col-form-label" for="txtVersion">Version</label>
                          <input class="form-control" type="text" name="txtVersion"/>
                        </div>
                        <div class="col-sm">
                            <label class="form-label" for="txtFechaReg">Fecha Registro</label>
                            <input class="form-control" type="date" name="txtFechaReg"/>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                        <div class="col-sm">
                          <label class="col-form-label" for="txtUsuario">Usuario Alta</label>
                          <input class="form-control" type="text" name="txtUsuario"/>
                        </div>
                        <div class="col-sm">
                        </div>
                      </div>
                      <br/>
                      <h5>Detalle</h5>
                      <hr/>
                      <div class="row">
                        <div class="col-sm">
                            <label for="txtNoSerie">Numero de Serie</label>
                            <input class="form-control" type="text" name="txtNoSerie"/>
                        </div>
                        <div class="col-sm">
                          <label for="txtAno">Año</label>
                          <input class="form-control" type="number" name="txtAno"/>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                        <div class="col-sm">
                          <label class="col-form-label" for="txtColor">Color</label>
                          <input class="form-control" type="text" name="txtColor"/>
                        </div>
                        <div class="col-sm">
                          <label for="txtPlaca">Placa</label>
                          <input class="form-control" type="text" name="txtPlaca"/>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                        <div class="col-sm">
                          <label for="txtObservaciones">Observaciones</label>
                          <input class="form-control" type="text" name="txtObservaciones"/>
                        </div>
                      </div>
                      <br/>
                      <h5>Concepto</h5>
                      <hr/>
                      <div class="row">
                        <div class="col-sm">
                          <label for="txtPrecio">Precio por dia</label>
                          <input class="form-control" type="number" name="txtPrecio"/>
                        </div>
                        <div class="col-sm">
                        <br/>
                        <br/>
                          &nbsp; &nbsp; &nbsp;<input type="checkbox" class="form-check-input" name="chkDisp"/>
                          <label class="form-check-label" for="chkDisp">Auto Disponible</label>
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
                          <button type="submit" class="btn btn-warning" name="btnModificar">Modificar</button>
                        </div>
                        <div class="col-sm">
                          <button type="submit" class="btn btn-danger" name="btnBaja">Baja</button>
                        </div>
                        <div class="col-sm">
                          <button type="submit" class="btn btn-outline-warning" name="btnLimpiar">Limpiar</button>
                        </div>
                      </div>
                    </div>                  
                </div>
            </form>
          </div>
          <!--#endregion Controles-->
        </div>

</body>
</html>