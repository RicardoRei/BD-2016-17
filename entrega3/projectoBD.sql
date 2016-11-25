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
	 foreign key(morada,codigo) references Alugavel(morada,codigo) on delete cascade),
	 foreign key(morada,codigo_espaco) references Espaco(morada,codigo) on delete cascade)
	;


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
	 foreign key(morada,codigo,data_inicio) references Oferta(morada,codigo,data_inicio) 
	 on delete cascade,
	 foreign key(nif) references User(nif)
	 on delete cascade,
	 foreign key(numero) references Reserva(numero));

create table Paga
	(numero integer(20),
	 data date,
	 metodo varchar(255),
	 primary key(numero),
	 foreign key(numero) references Reserva(numero)
	 on delete cascade);

create table Estado
	(numero integer(20),
	 time_stamp timestamp,
	 estado varchar(255),
	 primary key(numero,time_stamp),
	 foreign key(numero) references Reserva(numero)
	 on delete cascade);	

create table Reserva
	(numero integer(20) not null unique,
	 primary key(numero));

/* populate relations */
insert into User values (454545, 'Margarida', 915379848);
insert into User values (454547, 'Maria', 915379842);
insert into User values (454549, 'Miguel', 915379841);

insert into Fiscal values (5, 'EmpresaA');
insert into Fiscal values (2, 'EmpresaB');

insert into Edificio values ('Rua das Laranjas');
insert into Edificio values ('Rua dos Limoes');
insert into Edificio values ('Rua das Peras');

insert into Alugavel values ('Rua das Laranjas',1,'.');
insert into Alugavel values ('Rua dos Limoes',4,'.');
insert into Alugavel values ('Rua das Laranjas',2,'.');
insert into Alugavel values ('Rua das Peras',1,'.');
insert into Alugavel values ('Rua das Laranjas',3,'.');


insert into Arrenda values ('Rua das Laranjas',1,454545);
insert into Arrenda values ('Rua das Peras',1, 454547);

insert into Fiscaliza values (5,'Rua das Laranjas',1);
insert into Fiscaliza values (2,'Rua das Peras',1);

insert into Espaco values ('Rua das Laranjas',1);
insert into Espaco values ('Rua dos Limoes',4);
insert into Espaco values ('Rua das Laranjas',2);
insert into Espaco values ('Rua das Peras',1);	
insert into Espaco values ('Rua das Laranjas',3);

insert into Posto values ('Rua das Peras',1,1);
insert into Posto values ('Rua das Laranjas',1,1);

insert into Oferta values ('Rua das Laranjas',1,'1995-05-04','1995-06-04', 'mensal');
insert into Oferta values ('Rua das Peras',1,'1995-05-04','1995-06-04', 'mensal');

insert into Aluga values ('Rua das Laranjas',1,'1995-05-04','454549',1);
insert into Aluga values ('Rua das Peras',1,'1995-05-04','454549',2);

insert into Reserva values (1);
insert into Reserva values (2);

insert into Estado values (1,'1995-05-04 10:10:10', 'aceite');
insert into Estado values (2,'1995-05-04 12:10:10', 'aceite');
insert into Estado values (2,'1995-05-04 12:30:10', 'cancelado');

insert into Paga values (1,'1995-05-04','dinheiro');
insert into Paga values (2,'1995-05-04','visa');
	 		