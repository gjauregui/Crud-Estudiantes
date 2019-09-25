create database Vet;

use database Vet;

create table Especie
(
    idespecie int primary key auto_increment not null,
    nombre varchar(255) not null
);    

create table Mascota
(
    idmascota int primary key auto_increment not null,
    idespecie int  not null,
    idcliente int not null,
    nombre varchar(255) not null,
    genero char(1)not null,
    raza    varchar(255) null,
    fnacimiento date null,
    estado boolean,
    foreign key (idespecie) references Especie(idespecie)
);



create table Cliente
(
    idcliente int primary key auto_increment  not null,
    nombre varchar(255) not null,
    genero  char(1) not null,
    dni varchar(255)     null,
    telefono varchar(255)null,
    fnacimiento date null,
    foreign key (idmascota) references Mascota(idmascota)
    
);



create table Usuario
(
    idusuario int primary key auto_increment not null,
    nombre  varchar(255) not null,
    cargo   varchar(255) not null,
    genero  char(1) not null,
    fnacimiento date null,
    estado  boolean
);



create table Servicio
(
    idserv int primary key auto_increment not null,
    idprecio   int not null,
    nombreServ  varchar(255) not null,
    fpublicacion date null, 
    foreign key (idprecio) references Precio(idprecio)
);

create table DetalleServicio
(
    iddetalle int primary key auto_increment not null,
    idusuario int not null,
    idcliente int not null,
    idserv int not null,
    fecha date not null, 
    foreign key (idusuario) references Usuario(idusuario),
    foreign key (idcliente) references Cliente(idcliente),
    foreign key (idserv) references Servicio(idserv)
);


create table Precio
(
    idprecio int primary key auto_increment not null,
    costo numeric(8,2) not null,
    tipomoneda varchar(50) not null
);

select * from Servicio;

insert into Especie (nombre) values ('Perro');
insert into Mascota (idespecie,nombre,genero,raza,fnacimiento,estado)values(1,'Rey','M','Salchicha','2019-07-01',1);
insert into Cliente (idmascota,nombre,genero,dni,telefono,fnacimiento)values(1,'Maick','M','12345678','9958465','1999-07-04');
insert into Precio (costo,tipomoneda) values(20.00,'Soles');
insert into Usuario (nombre,cargo,genero,fnacimiento,estado)values('Gabriel','Jefe','M','2019',1);
insert into Servicio (idprecio,nombreServ,fpublicacion) values(1,'Corte Pelo','2019-07-1');
insert into DetalleServicio (idusuario,idcliente,idserv,fecha)values(1,1,1,'2019-07-01');

