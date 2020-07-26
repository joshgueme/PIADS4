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
            <li class="nav-item active">
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
                      <a class="dropdown-item" href="CambiarContrasena.php">Cambiar Contraseña</a>
                      <a class="dropdown-item" href="Login.php">Cerrar Sesión</a>
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
                            <label for="cmbMarca">Marca</label>
                            <select class="form-control" name="cmbMarca">
                                <option>Ford</option>
                                <option>Volkswagen</option>
                                <option>Nissan</option>
                              </select>
                        </div>
                        <div class="col-sm">
                            <label for="cmbModelo">Modelo</label>
                            <select class="form-control" name="cmbModelo">
                                <option>Modelo 1</option>
                                <option>Modelo 2</option>
                                <option>Modelo 3</option>
                              </select>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                            <div class="col-sm">
                                <label for="cmbVersion">Version</label>
                                <select class="form-control" name="cmbVersion">
                                    <option>Estandar</option>
                                    <option>Deportiva</option>
                                    <option>Lujo</option>
                                  </select>
                            </div>
                            <div class="col-sm">
                              <label class="form-label" for="txtFechaReg">Fecha Registro</label>
                                <input class="form-control" type="date" name="txtFechaReg"/>
                            </div>
                    </div>
                    <br/>
                    <div class="row">
                      <div class="col-sm">
                          <label for="cmbUsuario">Usuario alta</label>
                          <select class="form-control" name="cmbUsuario">
                              <option>Hugo</option>
                              <option>Paco</option>
                              <option>Luis</option>
                            </select>
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
                        <input class="form-control" type="date" name="txtAno"/>
                      </div>
                    </div>
                    <br/>
                    <div class="row">
                      <div class="col-sm">
                        <label for="cmbColor">Color</label>
                        <select class="form-control" name="cmbColor">
                            <option>Azul</option>
                            <option>Rojo</option>
                            <option>Gris</option>
                          </select>
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