drop database if exists historial;
create schema historial;
use historial;

CREATE TABLE IF NOT EXISTS historial (id int auto_increment primary key, busqueda varchar(30) not null, fecha datetime not null);

select * from historial;
