#REGISTROS CATALOGOS
INSERT INTO estatusUsuario(IdEstatus,DescEstatus)
VALUES (1,'Activo');
INSERT INTO estatusUsuario(IdEstatus,DescEstatus)
VALUES (2,'Inactivo');

INSERT INTO rol(IdRol,DescRol)
VALUES (1,'Administrador');
INSERT INTO rol(IdRol,DescRol)
VALUES (2,'Empleado');

INSERT INTO usuario(IdUsuario,Nombre,APaterno,AMaterno,IdRol,FecAlta,IdEstatus)
VALUES (1,'Joshua','Guevara','Mendoza',1,'2020-7-7',1);
INSERT INTO usuario(IdUsuario,Nombre,APaterno,AMaterno,IdRol,FecAlta,IdEstatus)
VALUES (2,'Rodrigo','Trevino','Trevino',2,'2020-6-6',1);
INSERT INTO usuario(IdUsuario,Nombre,APaterno,AMaterno,IdRol,FecAlta,IdEstatus)
VALUES (3,'Miguel','De la Torre','Cruz',2,'2020-5-5',1);
INSERT INTO usuario(IdUsuario,Nombre,APaterno,AMaterno,IdRol,FecAlta,IdEstatus)
VALUES (4,'Rodrigo','Trevino','Trevino',2,'2020-4-4',1);
INSERT INTO usuario(IdUsuario,Nombre,APaterno,AMaterno,IdRol,FecAlta,IdEstatus)
VALUES (5,'Carlos','Valadez','Martinez',2,'2020-3-3',1);

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

INSERT INTO automovil_Detalle(IdAutomovil,NoSerie,Ano,IdColor,Placa,Observaciones,IdEstatusAutomovil)
VALUES (1,0001,2018,1,'ASK1469','Sin Observaciones',1);
INSERT INTO automovil_Detalle(IdAutomovil,NoSerie,Ano,IdColor,Placa,Observaciones,IdEstatusAutomovil)
VALUES (2,0002,2017,2,'JIR3584','Sin Observaciones',1);
INSERT INTO automovil_Detalle(IdAutomovil,NoSerie,Ano,IdColor,Placa,Observaciones,IdEstatusAutomovil)
VALUES (3,0003,2019,3,'POE1463','Sin Observaciones',1);
INSERT INTO automovil_Detalle(IdAutomovil,NoSerie,Ano,IdColor,Placa,Observaciones,IdEstatusAutomovil)
VALUES (4,0004,2019,4,'QYR5913','Sin Observaciones',1);
INSERT INTO automovil_Detalle(IdAutomovil,NoSerie,Ano,IdColor,Placa,Observaciones,IdEstatusAutomovil)
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
VALUES (1,'Jaime','Rodriguez','Calderon',86354792,'jaimeelbronco@gmail.com');
INSERT INTO cliente(idCliente,Nombre,APaterno,AMaterno,Telefono,Email,FecAlta)
VALUES (2,'Oscar','Perez','Montalvo',96547821,'oscarperez@gmail.com');
INSERT INTO cliente(idCliente,Nombre,APaterno,AMaterno,Telefono,Email,FecAlta)
VALUES (3,'Amanda','Nigenda','Pastelito',15978645,'amandanigenda@gmail.com');
