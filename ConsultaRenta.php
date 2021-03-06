<?php
#region Variable de sesion
include("Conexion.php");
$con = conectar();
session_start();
if(isset($_POST["btnRegistrar"]))
{

  $Idrenta=($_POST["txtIdRenta"]);
  $IdUsuario=($_POST["txtUsuario"]);
  $IdCliente=($_POST["txtCliente"]);
  $NoSerie=($_POST["txtNoSerie"]);
  $FecInicio=  date("Y-m-d",strtotime($_POST["cmbFechaIni"]));                    
  $FecFinal= date("Y-m-d",strtotime($_POST["cmbFechaFin"]));  
  $FecSalida= date("Y-m-d",strtotime($_POST["cmbSalida"])); 
  $FecEntrada=date("Y-m-d",strtotime($_POST["cmbEntrada"])); 
  $Observaciones=" ";
  $IdEstatusRenta=($_POST["txtEstatus"]);


  $query = "call sp_rentas('nuevo',$Idrenta,$IdUsuario,$IdCliente,$NoSerie,'$FecInicio','$FecFinal','$FecSalida','$FecEntrada','$Observaciones',$IdEstatusRenta);"; 
  if(mysqli_query($con, $query))
  {
    echo "Registro agregado correctamente";
  } 
}
if(isset($_POST["btnModificar"]))
{

  $Idrenta=($_POST["txtIdRenta"]);
  $IdUsuario=($_POST["txtUsuario"]);
  $IdCliente=($_POST["txtCliente"]);
  $NoSerie=($_POST["txtNoSerie"]);
  $FecInicio=  date("Y-m-d",strtotime($_POST["cmbFechaIni"]));                    
  $FecFinal= date("Y-m-d",strtotime($_POST["cmbFechaFin"]));  
  $FecSalida= date("Y-m-d",strtotime($_POST["cmbSalida"])); 
  $FecEntrada=date("Y-m-d",strtotime($_POST["cmbEntrada"])); 
  $Observaciones=" ";
  $IdEstatusRenta=($_POST["txtEstatus"]);


  $query = "call sp_rentas('editar',$Idrenta,$IdUsuario,$IdCliente,$NoSerie,'$FecInicio','$FecFinal','$FecSalida','$FecEntrada','$Observaciones',$IdEstatusRenta);"; 
  if(mysqli_query($con, $query))
  {
    echo "Registro modificado correctamente";
  } 
}


if(isset($_POST["btnCancelar"]))
{

$idrenta=($_POST["txtIdRenta"]);
  $query = "call sp_rentas('borrar',$idrenta,1,1,1,'2020/02/02','2020/02/02','2020/02/02','2020/02/02','',1); "; 
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
    <!--#region NavBar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="Home.html">
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
          <li class="nav-item active">
            <a class="nav-link" href="ConsultaRenta.php" aria-disabled="true">Renta</a>
        </li>
            <li class="nav-item">
              <a class="nav-link" href="Venta.php" aria-disabled="true">Venta</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="Usuarios.php" aria-disabled="true">Usuarios</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <div class="col px-md-5">
              <div class="p-3">
                <button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="ddbsesion">
                  Perfil
                  </button>
                  <div class="dropdown-menu mr-sm-2" aria-labelledby="ddbsesion">
                      <a class="dropdown-item" href="CambiarContrasena.html">Cambiar Contraseña</a>
                      <a class="dropdown-item" href="Login.html">Cerrar Sesión</a>
                  </div>
              </div>
            </div>
          </form>
        </div>
    </nav>
    <!--#endregion NavBar-->

    <!--#region Form-->
        <div class="container">
                <form class="form-group" action="#" method="POST">
                        <div class="card">
                            <div class="card-header">
                              Consulta Rentas
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm">
                                  <label class="col-form-label" for="txtIdRenta">ID</label>
                                  <input class="form-control" type="text" name="txtIdRenta"/>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm">
                                  <label class="col-form-label" for="txtUsuario">Usuario</label>
                                  <input class="form-control" type="text" name="txtUsuario"/>
                                </div>
                              </div>
                            <div class="row">
                              <div class="col-sm">
                                <label class="col-form-label" for="txtCliente">Cliente</label>
                                <input class="form-control" type="text" name="txtCliente"/>
                              </div>
                            </div>
                            <br/>
                            <div class="row">
                              <div class="col-sm">
                                <label class="col-form-label" for="txtNoSerie">No Serie</label>
                                <input class="form-control" type="text" name="txtNoSerie"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm">
                                <label class="col-form-label" for="txtEstatus">Estatus</label>
                                <input class="form-control" type="text" name="txtEstatus"/>
                              </div>      
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm">
                                  <label class="form-label" for="cmbFechaIni">Fecha Inicio</label>
                                  <input class="form-control" type="date" name="cmbFechaIni"/>   
                                </div>
                                <div class="col-sm">
                                  <label class="form-label" for="cmbFechaFin">Fecha Fin</label>
                                  <input class="form-control" type="date" name="cmbFechaFin"/>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                              <div class="col-sm">
                                <label class="form-label" for="cmbSalida">Fecha Salida</label>
                                <input class="form-control" type="date" name="cmbSalida"/>
                              </div>
                              <div class="col-sm">
                                <label class="form-label" for="cmbEntrada">Fecha Entrada</label>
                                <input class="form-control" type="date" name="cmbEntrada"/>
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
                                <button type="submit" class="btn btn-danger" name="btnCancelar">Cancelar</button>
                              </div>
                              <div class="col-sm">
                                <button type="submit" class="btn btn-outline-warning" name="btnLimpiar">Limpiar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </form>
        </div>
    <!--#endregion Form-->
</body>
</html>
