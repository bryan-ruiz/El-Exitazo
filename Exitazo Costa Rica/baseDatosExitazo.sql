/*
create database Exitazo
use Exitazo
select * from users
insert into users(name,type,email,password) values('Johanna','super','rbjoha@gmail.com','123')
drop table users
create table users(
	id int NOT NULL AUTO_INCREMENT,
    name varchar(100),
    type int,
    email varchar(100) unique,
    password varchar(100),
    primary key (id)    
);
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

insert into PRODUCTOS (codigoProducto varchar(50),
    descripcion, 
    precioCosto, 
    precioVenta,
    precioMayoreo,
    nombreDepartamento, 
    cantidadDeProduct, 
    cantMinimaProd)

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
