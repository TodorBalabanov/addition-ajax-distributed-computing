drop database distajax;

create database distajax;

use distajax

create table sums(id int not null auto_increment primary key, status int, a int, b int, c int);

insert into sums (id, status, a, b, c) values (0, 0, 0, 0, 0);
