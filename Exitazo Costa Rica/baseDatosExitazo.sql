/*
create database Exitazo
use Exitazo
select * from users
insert into users(name,type,email,password) values('Johanna','super','rbjoha@gmail.com','123')
drop table users
*/


					/**************		TABLAS		***********************/



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

/*                             INERCIONES            */

insert into DEPARTAMENTOS(nombreDepartamento)values('zapatos');
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


