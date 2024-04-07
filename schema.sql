create table imagenes{
	id int not null auto_increment primary key,
	uuid char(30) unique,
	name char(100),
	details char(250),
	location char(250),
	updated date not null
}