#Creacion de base de datos
CREATE DATABASE IF NOT EXISTS BDPIADS4;

#Seleccion de base de datos
USE BDPIADS4;

#Creacion de tablas
CREATE TABLE IF NOT EXISTS usuario(
	IdUsuario INT NOT NULL,
    Nombre VARCHAR(45),
    APaterno VARCHAR(45),
    AMaterno VARCHAR(45),
    IdRol INT NOT NULL,
    FecAlta DATETIME,
    IdEstatus INT NOT NULL,
    PRIMARY KEY(IdUsuario),
    
    #Constraints
    CONSTRAINT FK_Usuario_Rol
    FOREIGN KEY(IdRol)
    REFERENCES rol(IdRol),
    
    CONSTRAINT FK_Usuario_Estatus
    FOREIGN KEY(IdEstatus)
    REFERENCES estatusUsuario(IdEstatus)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS estatusUsuario(
	IdEstatus INT NOT NULL,
    DescEstatus VARCHAR(45),
    PRIMARY KEY(IdEstatus)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS rol(
	IdRol INT NOT NULL,
    DescRol VARCHAR(45),
    PRIMARY KEY(IdRol)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS automovil(
	IdAutomovil INT NOT NULL,
    IdFabricante INT NOT NULL,
    IdModelo INT NOT NULL,
    IdVersion INT NOT NULL,
    FecRegistro DATETIME,
    IdUsuario INT NOT NULL,
    PRIMARY KEY(IdAutomovil),
    
    #Constraints
    CONSTRAINT FK_Automovil_Fabricante
    FOREIGN KEY(IdFabricante)
    REFERENCES fabricante(IdFabricante),
    
    CONSTRAINT FK_Automovil_Modelo
    FOREIGN KEY(IdModelo)
    REFERENCES modelo(IdModelo),
    
    CONSTRAINT FK_Automovil_Version
    FOREIGN KEY(IdVersion)
    REFERENCES version(IdVersion),
    
    CONSTRAINT FK_Automovil_Usuario
    FOREIGN KEY(IdUsuario)
    REFERENCES usuario(IdUsuario)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS fabricante(
	IdFabricante INT NOT NULL,
    DescFabricante VARCHAR(45),
    PRIMARY KEY(IdFabricante)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS modelo(
	IdModelo INT NOT NULL,
    Modelo VARCHAR(45),
    IdFabricante INT NOT NULL,
    PRIMARY KEY(IdModelo),
    
    #Constraints
    CONSTRAINT FK_Modelo_Fabricante
    FOREIGN KEY(IdFabricante)
    REFERENCES fabricante(IdFabricante)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS version(
	IdVersion INT NOT NULL,
    DescVersion VARCHAR(45),
    idModelo INT NOT NULL,
    PRIMARY KEY(IdVersion),
    
    #Constraints
    CONSTRAINT FK_Version_Modelo
    FOREIGN KEY(IdModelo)
    REFERENCES modelo(IdModelo)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS automovil_Detalle(
	IdAutomovil INT NOT NULL,
    NoSerie BIGINT NOT NULL,
    Año SMALLINT,
    IdColor INT NOT NULL,
    Placa VARCHAR(10),
    Observaciones VARCHAR(250),
    IdEstatusAutomovil INT NOT NULL,
    PRIMARY KEY(NoSerie),
    
    #Constraints
    CONSTRAINT FK_AutomovilDetalle_Automovil
    FOREIGN KEY(IdAutomovil)
    REFERENCES automovil(IdAutomovil),
    
    CONSTRAINT FK_AutomovilDetalle_Color
    FOREIGN KEY(IdColor)
    REFERENCES color(IdColor),
    
    CONSTRAINT FK_AutomovilDetalle_EstatusAutomovil
    FOREIGN KEY(IdEstatusAutomovil)
    REFERENCES estatusAutomovil(IdEstatusAutomovil)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS color(
	IdColor INT NOT NULL,
    DescColor VARCHAR(45),
    PRIMARY KEY(IdColor)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS estatusAutomovil(
	IdEstatusAutomovil INT NOT NULL,
    DescEstatus VARCHAR(45),
    PRIMARY KEY(IdEstatusAutomovil)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS cliente(
	IdCliente INT NOT NULL,
    Nombre VARCHAR(45),
    APaterno VARCHAR(45),
    AMaterno VARCHAR(45),
    Telefono VARCHAR(45),
    Email VARCHAR(45),
    FecAlta DATETIME,
    PRIMARY KEY(IdCliente)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS renta(
	IdRenta INT NOT NULL,
    IdUsuario INT NOT NULL,
    IdCliente INT NOT NULL,
	NoSerie BIGINT NOT NULL,
    FecInicio DATE,
    FecFinal DATE,
    FecSalida DATETIME,
    FecEntrada DATETIME,
    Observaciones VARCHAR(250),
    IdEstatusRenta INT NOT NULL,
    PRIMARY KEY(IdRenta),
    
    #Constraints
    CONSTRAINT FK_Renta_Usuario
    FOREIGN KEY(IdUsuario)
    REFERENCES usuario(IdUsuario),
    
    CONSTRAINT FK_Renta_Cliente
    FOREIGN KEY(IdCliente)
    REFERENCES cliente(IdCliente),
    
    CONSTRAINT FK_Renta_AutomovilDetalle
    FOREIGN KEY(NoSerie)
    REFERENCES automovil_Detalle(NoSerie),
    
    CONSTRAINT FK_Renta_EstatusRenta
    FOREIGN KEY(IdEstatusRenta)
    REFERENCES estatusRenta(IdEstatusRenta)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS estatusRenta(
	IdEstatusRenta INT NOT NULL,
    DescRenta VARCHAR(45),
    PRIMARY KEY(IdEstatusRenta)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS venta (
    IdVenta INT NOT NULL,
    IdRenta INT NOT NULL,
    IdUsuario INT NOT NULL,
    IVA DECIMAL(12 , 2 ),
    FecVenta DATETIME,
    IdEstatusVenta INT NOT NULL,
    PRIMARY KEY (IdVenta),
    
    #Constraints
    CONSTRAINT FK_Venta_Renta
    FOREIGN KEY(IdRenta)
    REFERENCES renta(IdRenta),
    
    CONSTRAINT FK_Venta_Usuario
    FOREIGN KEY(IdUsuario)
    REFERENCES renta(IdUsuario),
    
    CONSTRAINT FK_Venta_EstatusVenta
    FOREIGN KEY(IdEstatusVenta)
    REFERENCES estatusVenta(IdEstatusVenta)
)  ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS estatusventa(
	IdEstatusVenta INT NOT NULL,
    DescEstatus VARCHAR(45),
    PRIMARY KEY(IdEstatusVenta)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS venta_Detalle(
	IdVenta INT NOT NULL,
    IdConcepto INT NOT NULL,
    MONTO DECIMAL(12,2),
    PRIMARY KEY(IdVenta,IdConcepto),
    
    #Constraints
    CONSTRAINT FK_VentaDetalle_Venta
    FOREIGN KEY(IdVenta)
    REFERENCES venta(IdVenta),
    
    CONSTRAINT FK_VentaDetalle_Concepto
    FOREIGN KEY(IdConcepto)
    REFERENCES concepto(IdConcepto)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS concepto(
	IdConcepto INT NOT NULL,
    DescConcepto VARCHAR(45),
    PRIMARY KEY(IdConcepto)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS automovil_Concepto(
	IdRegistro INT NOT NULL,
    IdAutomovil INT NOT NULL,
    IdConcepto INT NOT NULL,
    Monto DECIMAL(12,2),
    PRIMARY KEY(IdRegistro),
    
    #Constraints
    CONSTRAINT FK_AutomovilConcepto_Automovil
    FOREIGN KEY(IdAutomovil)
    REFERENCES automovil(IdAutomovil),
    
    CONSTRAINT FK_AutomovilConcepto_Concepto
    FOREIGN KEY(IdConcepto)
    REFERENCES concepto(IdConcepto)
)ENGINE = INNODB;

