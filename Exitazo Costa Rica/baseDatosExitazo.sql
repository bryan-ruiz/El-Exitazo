/*
create database Exitazo
use Exitazo
drop table users
*/

					/**************		TABLAS		***********************/

select * from productos;

create table HISTORIAL(
	id int NOT NULL AUTO_INCREMENT,
    fecha date,
    monto int,
    tipoPago varchar(10),
    primary key(id)
);

create table LOCALES(	
	nombreLocal varchar(100),
    idInventario int,    
    primary key(nombreLocal)
);

create table DEPARTAMENTOS(
	nombreDepartamento varchar(100),
    primary key (nombreDepartamento)
);

create table PRODUCTOS(
	codigoProducto varchar(50),
    descripcion varchar(400), 
    precioCosto int, 
    precioVenta int,
    precioMayoreo int,
    nombreDepartamento varchar(100), 
    cantidadDeProduct int, 
    cantMinimaProd int, 
    primary key (codigoProducto),
    FOREIGN KEY (nombreDepartamento)
        REFERENCES DEPARTAMENTOS(nombreDepartamento)
        ON DELETE CASCADE ON UPDATE CASCADE
);



create table PROMOCIONES(
	id int NOT NULL AUTO_INCREMENT,
	nombrePromocion varchar(100),
    codigoProducto varchar(50),
    cantidadProdMinimo int,
    cantidadProdMax int,
    precioUnit int,
    primary key (id),
    FOREIGN KEY (codigoProducto)
        REFERENCES PRODUCTOS(codigoProducto)
        ON DELETE CASCADE ON UPDATE CASCADE
);

create table MOVIMIENTOS_PRODUCTOS(
	id int NOT NULL AUTO_INCREMENT,
    codigoProducto varchar(50),
    tipoMovimientoProd	varchar(50),
    fechaMovimiento date,
    hora varchar(10),
    cantidad int,
    cajero varchar(100),
    primary key (id),
    FOREIGN KEY (codigoProducto)
        REFERENCES PRODUCTOS(codigoProducto)
        ON DELETE CASCADE ON UPDATE CASCADE
);

create table INVENTARIO(
	idInventario int NOT NULL AUTO_INCREMENT,
    codigoProducto varchar(50),
    nombreLocal varchar(100),
    primary key (idInventario)
);

create table CLIENTES(
	numeroPersona int NOT NULL AUTO_INCREMENT,
    nombrePersona varchar(100),
    direccion varchar(400),
    telefono varchar(15),
    limiteDeCredito int,
    saldoActual int,
    primary key (numeroPersona)
);


update CLIENTES set saldoActual= 30000 where numeroPersona = 1



create table ABONOS(
	id int NOT NULL AUTO_INCREMENT,
    fechaAbono date,
    monto int,
    numeroPersona int,    
    primary key (id),
    FOREIGN KEY (numeroPersona)
        REFERENCES CLIENTES(numeroPersona)
        ON DELETE CASCADE ON UPDATE CASCADE
);



create table MOVIMIENTOS_CAJAS(
	id int NOT NULL AUTO_INCREMENT,
    tipo varchar(20),
    motivo varchar(300),
    montoDinero int,
    fecha date,
    primary key (id)
);



/*                             INSERCIONES            */



insert into DEPARTAMENTOS(nombreDepartamento)values('zapatos'),('ropa'),('cuero'),('fajas'),('bolsos');


insert into PRODUCTOS (codigoProducto,descripcion, precioCosto,precioVenta,precioMayoreo,
						nombreDepartamento, cantidadDeProduct, cantMinimaProd)
                        values('COD-S01','Sandalias de cuero', 2000, 5000,2800,
						'zapatos', 20, 1),                        
                        ('COD-S02','Sandalias de plástico', 800, 2500,1200,
						'zapatos', 40, 1);

insert into CLIENTES(nombrePersona,direccion,telefono,limiteDeCredito,saldoActual)
values('Johanna','San José, Costa Rica', '85656547', 50000,2000),
('Adriana','San José, Costa Rica', '84578547', 30000,2000),
('Bryan','San Carlos, Costa Rica', '82357807', 20000,0),
('Aaron','San José, Costa Rica', '81346560', 10000,0),
('Sofia','Heredia, Costa Rica', '81646444', 15000,7800);


insert into MOVIMIENTOS_CAJAS(tipo, motivo, montoDinero,fecha)values('entrada','venta de zapatos de cuero',20000,
'2018-02-19'),('entrada','venta de camisas',47800,'2018-03-13'),('salida','pago de luz',44000,'2018-03-03'),
('salida','pago de agua',20000,'2018-02-05');
