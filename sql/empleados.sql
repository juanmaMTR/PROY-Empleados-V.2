--Crear la base de datos BDEmpleados
--CREATE DATABASE BDEmpleados;

--Crear la tabla Empleados
CREATE TABLE Empleados (
    IdEmpleado tinyint UNSIGNED primary key AUTO_INCREMENT NOT NULL,
    DNI char(9) not null unique,
    Nombre varchar(20) not null,
    Correo varchar(60) null,
    Telefono varchar(22) not null
);