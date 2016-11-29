/*
drop table Arrenda cascade;
drop table Aluga cascade;
drop table Alugavel cascade;
drop table Edificio cascade;
drop table Espaco cascade;
drop table Estado cascade;
drop table Fiscal cascade;
drop table Fiscaliza cascade;
drop table Oferta cascade;
drop table Paga cascade;
drop table Posto cascade;
drop table Reserva cascade;
drop table User cascade;
*/



create table User
	(nif integer(20) not null unique,
	 nome varchar(255) not null,
	 telefone integer(9) not null,
	 primary key(nif));


create table Fiscal
	(id integer(20) not null unique,
	 empresa varchar(255) not null,
	 primary key(id));

create table Edificio
	(morada varchar(255) not null,
	 primary key(morada));

create table Alugavel
	(morada varchar(255) not null,
	 codigo integer(20) not null,
	 foto 	varchar(255),
	 primary key(morada,codigo),	
	 foreign key(morada) references Edificio(morada) on delete cascade);

create table Arrenda
	(morada varchar(255) not null,
	 codigo integer(20) not null,
	 nif integer(20) not null,
	 primary key(morada,codigo),
	 foreign key(morada,codigo) references Alugavel(morada,codigo) on delete cascade,
	 foreign key(nif) references User(nif) on delete cascade);

create table Fiscaliza
	(id integer(20) not null,
	 morada varchar(255) not null,
	 codigo integer(20) not null,
	 primary key(id,morada,codigo),
	 foreign key(morada,codigo) references Arrenda(morada,codigo) on delete cascade,
	 foreign key(id) references Fiscal(id) on delete cascade);

create table Espaco
	(morada varchar(255) not null,
	 codigo integer(20) not null,
	 primary key(morada,codigo),
	 foreign key(morada,codigo) references Alugavel(morada,codigo) on delete cascade);

create table Posto
	(morada varchar(255) not null,
	 codigo integer(20) not null,
	 codigo_espaco integer(20) not null,
	 primary key(morada,codigo),
	 foreign key(morada,codigo) references Alugavel(morada,codigo) on delete cascade,
	 foreign key(morada,codigo_espaco) references Espaco(morada,codigo) on delete cascade);


create table Oferta
	(morada varchar(255) not null,
	 codigo integer(20) not null,
	 data_inicio date not null,
	 data_fim date not null,
	 tarifa varchar(255) not null,
	 primary key(morada,codigo,data_inicio),
	 foreign key(morada,codigo) references Alugavel(morada,codigo) on delete cascade);

create table Aluga
	(morada varchar(255) not null,
	 codigo integer(20) not null,
	 data_inicio date not null,
	 nif integer(20) not null,
	 numero integer(20) not null,
	 primary key(morada,codigo,data_inicio,nif,numero),
	 foreign key(morada,codigo,data_inicio) references Oferta(morada,codigo,data_inicio)  on delete cascade,
	 foreign key(nif) references User(nif) on delete cascade,
	 foreign key(numero) references Reserva(numero));

create table Paga
	(numero integer(20),
	 data date,
	 metodo varchar(255),
	 primary key(numero),
	 foreign key(numero) references Reserva(numero) on delete cascade);

create table Estado
	(numero integer(20),
	 time_stamp timestamp,
	 estado varchar(255),
	 primary key(numero,time_stamp),
	 foreign key(numero) references Reserva(numero) on delete cascade);	

create table Reserva
	(numero integer(20) not null unique,
	 primary key(numero));



	 		