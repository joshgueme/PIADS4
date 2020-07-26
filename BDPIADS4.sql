CREATE DATABASE IF NOT EXISTS BDPIADS4;

USE BDPIADS4;

CREATE TABLE IF NOT EXISTS rol(
	IdRol INT NOT NULL,
    DescRol VARCHAR(45),
    PRIMARY KEY(IdRol)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS estatusUsuario(
	IdEstatus INT NOT NULL,
    DescEstatus VARCHAR(45),
    PRIMARY KEY(IdEstatus)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS usuario(
	IdUsuario INT NOT NULL,
    Nombre VARCHAR(45),
    APaterno VARCHAR(45),
    AMaterno VARCHAR(45),
    Usuario VARCHAR(20),
    Contraseña VARCHAR(20),
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

CREATE TABLE IF NOT EXISTS estatusRenta(
	IdEstatusRenta INT NOT NULL,
    DescRenta VARCHAR(45),
    PRIMARY KEY(IdEstatusRenta)
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

CREATE TABLE IF NOT EXISTS estatusVenta(
	IdEstatusVenta INT NOT NULL,
    DescEstatus VARCHAR(45),
    PRIMARY KEY(IdEstatusVenta)
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

CREATE TABLE IF NOT EXISTS concepto(
	IdConcepto INT NOT NULL,
    DescConcepto VARCHAR(45),
    Monto DECIMAL(12,2),
    PRIMARY KEY(IdConcepto)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS venta_Detalle(
	IdVenta INT NOT NULL,
    IdConcepto INT NOT NULL,
    MONTO DECIMAL(12,2),
    
    #Constraints
	CONSTRAINT FK_VentaDetalle_Venta
    FOREIGN KEY(IdVenta)
    REFERENCES venta(IdVenta),
    
    CONSTRAINT FK_VentaDetalle_Concepto
    FOREIGN KEY(IdConcepto)
    REFERENCES concepto(IdConcepto)
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

#REGISTROS CATALOGOS
INSERT INTO estatusUsuario(IdEstatus,DescEstatus)
VALUES (1,'Activo');
INSERT INTO estatusUsuario(IdEstatus,DescEstatus)
VALUES (2,'Inactivo');

INSERT INTO rol(IdRol,DescRol)
VALUES (1,'Administrador');
INSERT INTO rol(IdRol,DescRol)
VALUES (2,'Empleado');

INSERT INTO usuario(IdUsuario,Nombre,APaterno,AMaterno,Usuario,Contraseña,IdRol,FecAlta,IdEstatus)
VALUES (1,'Joshua','Guevara','Mendoza','joshua01','00001',1,'2020-7-7',1);
INSERT INTO usuario(IdUsuario,Nombre,APaterno,AMaterno,Usuario,Contraseña,IdRol,FecAlta,IdEstatus)
VALUES (2,'Rodrigo','Trevino','Trevino','rodrigo02','00002',2,'2020-6-6',1);
INSERT INTO usuario(IdUsuario,Nombre,APaterno,AMaterno,Usuario,Contraseña,IdRol,FecAlta,IdEstatus)
VALUES (3,'Miguel','De la Torre','Cruz','miguel03','00003',2,'2020-5-5',1);
INSERT INTO usuario(IdUsuario,Nombre,APaterno,AMaterno,Usuario,Contraseña,IdRol,FecAlta,IdEstatus)
VALUES (4,'Carlos','Valadez','Martinez','carlos04','00004',2,'2020-3-3',1);

INSERT INTO fabricante(IdFabricante,DescFabricante)
VALUES (1,'Ford');
INSERT INTO fabricante(IdFabricante,DescFabricante)
VALUES (2,'Chevrolet');
INSERT INTO fabricante(IdFabricante,DescFabricante)
VALUES (3,'Nissan');

INSERT INTO modelo(IdModelo,Modelo,IdFabricante)
VALUES (1,'Figo',1);
INSERT INTO modelo(IdModelo,Modelo,IdFabricante)
VALUES (2,'Malibu',1);
INSERT INTO modelo(IdModelo,Modelo,IdFabricante)
VALUES (3,'Aveo',2);
INSERT INTO modelo(IdModelo,Modelo,IdFabricante)
VALUES (4,'Versa',3);
INSERT INTO modelo(IdModelo,Modelo,IdFabricante)
VALUES (5,'Altima',3);

INSERT INTO version(IdVersion,DescVersion,IdModelo)
VALUES (1,'Austero',1);
INSERT INTO version(IdVersion,DescVersion,IdModelo)
VALUES (2,'DeLujo',2);
INSERT INTO version(IdVersion,DescVersion,IdModelo)
VALUES (3,'Austero',3);
INSERT INTO version(IdVersion,DescVersion,IdModelo)
VALUES (4,'Equipado',4);
INSERT INTO version(IdVersion,DescVersion,IdModelo)
VALUES (5,'DeLujo',5);

INSERT INTO automovil(IdAutomovil,IdFabricante,IdModelo,IdVersion,FecRegistro,IdUsuario)
VALUES(1,1,1,1,'2020-1-1',2);
INSERT INTO automovil(IdAutomovil,IdFabricante,IdModelo,IdVersion,FecRegistro,IdUsuario)
VALUES(2,1,2,2,'2020-1-2',3);
INSERT INTO automovil(IdAutomovil,IdFabricante,IdModelo,IdVersion,FecRegistro,IdUsuario)
VALUES(3,2,3,3,'2020-1-3',4);
INSERT INTO automovil(IdAutomovil,IdFabricante,IdModelo,IdVersion,FecRegistro,IdUsuario)
VALUES(4,3,4,4,'2020-1-4',2);
INSERT INTO automovil(IdAutomovil,IdFabricante,IdModelo,IdVersion,FecRegistro,IdUsuario)
VALUES(5,3,5,5,'2020-1-5',3);

INSERT INTO color(IdColor,DescColor)
VALUES (1,'Blanco');
INSERT INTO color(IdColor,DescColor)
VALUES (2,'Negro');
INSERT INTO color(IdColor,DescColor)
VALUES (3,'Rojo');
INSERT INTO color(IdColor,DescColor)
VALUES (4,'Gris');
INSERT INTO color(IdColor,DescColor)
VALUES (5,'Azul');

INSERT INTO estatusAutomovil(IdEstatusAutomovil,DescEstatus)
VALUES (1,'Activo');
INSERT INTO estatusAutomovil(IdEstatusAutomovil,DescEstatus)
VALUES (2,'Inactivo');

INSERT INTO automovil_Detalle(IdAutomovil,NoSerie,Año,IdColor,Placa,Observaciones,IdEstatusAutomovil)
VALUES (1,0001,2018,1,'ASK1469','Sin Observaciones',1);
INSERT INTO automovil_Detalle(IdAutomovil,NoSerie,Año,IdColor,Placa,Observaciones,IdEstatusAutomovil)
VALUES (2,0002,2017,2,'JIR3584','Sin Observaciones',1);
INSERT INTO automovil_Detalle(IdAutomovil,NoSerie,Año,IdColor,Placa,Observaciones,IdEstatusAutomovil)
VALUES (3,0003,2019,3,'POE1463','Sin Observaciones',1);
INSERT INTO automovil_Detalle(IdAutomovil,NoSerie,Año,IdColor,Placa,Observaciones,IdEstatusAutomovil)
VALUES (4,0004,2019,4,'QYR5913','Sin Observaciones',1);
INSERT INTO automovil_Detalle(IdAutomovil,NoSerie,Año,IdColor,Placa,Observaciones,IdEstatusAutomovil)
VALUES (5,0005,2020,1,'ERP6667','Sin Observaciones',1);

INSERT INTO estatusRenta(IdEstatusRenta,DescRenta)
VALUES (1,'Activo');
INSERT INTO estatusRenta(IdEstatusRenta,DescRenta)
VALUES (2,'Terminado');
INSERT INTO estatusRenta(IdEstatusRenta,DescRenta)
VALUES (3,'Cancelado');

INSERT INTO estatusVenta(IdEstatusVenta,DescEstatus)
VALUES (1,'Pendiente');
INSERT INTO estatusVenta(IdEstatusVenta,DescEstatus)
VALUES (2,'Terminada');

INSERT INTO concepto(IdConcepto,DescConcepto,Monto)
VALUE (1,'Renta',0);
INSERT INTO concepto(IdConcepto,DescConcepto,Monto)
VALUE (2,'Daño a interiores',1000);
INSERT INTO concepto(IdConcepto,DescConcepto,Monto)
VALUE (3,'Daño a exteriores',1500);
INSERT INTO concepto(IdConcepto,DescConcepto,Monto)
VALUE (4,'Entrega Tarde',500);

INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (1,1,1,2000);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (2,1,2,3000);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (3,1,3,3500);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (4,1,4,2500);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (5,2,1,5000);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (6,2,2,6000);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (7,2,3,6500);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (8,2,4,5500);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (9,3,1,1800);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (10,3,2,2800);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (11,3,3,3200);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (12,3,4,2200);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (13,4,1,3000);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (14,4,2,4000);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (15,4,3,4500);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (16,4,4,3500);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (17,5,1,5500);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (18,5,2,6500);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (19,5,3,7000);
INSERT INTO automovil_Concepto(IdRegistro,IdAutomovil,IdConcepto,Monto)
VALUES (20,5,4,6000);

INSERT INTO cliente(idCliente,Nombre,APaterno,AMaterno,Telefono,Email,FecAlta)
VALUES (1,'Jaime','Rodriguez','Calderon',86354792,'jaimeelbronco@gmail.com','2020-7-16');
INSERT INTO cliente(idCliente,Nombre,APaterno,AMaterno,Telefono,Email,FecAlta)
VALUES (2,'Oscar','Perez','Montalvo',96547821,'oscarperez@gmail.com','2020-6-13');
INSERT INTO cliente(idCliente,Nombre,APaterno,AMaterno,Telefono,Email,FecAlta)
VALUES (3,'Amanda','Nigenda','Pastelito',15978645,'amandanigenda@gmail.com','2020-5-10');










