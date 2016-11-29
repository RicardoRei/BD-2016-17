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
insert into Posto values ('Rua dos Limoes',4,4);
insert into Posto values ('Rua das Laranjas',2,2);

insert into Oferta values ('Rua das Laranjas',1,'2016-11-04','2016-12-04', 'mensal');
insert into Oferta values ('Rua das Peras',1,'2016-11-10','2016-11-17', 'semanal');
insert into Oferta values ('Rua dos Limoes',4,'2016-11-10','2016-12-10','mensal');

insert into Aluga values ('Rua das Laranjas',1,'2016-11-04','454549',1);
insert into Aluga values ('Rua dos Limoes',4,'2016-11-10','454545',2);

insert into Reserva values (1);
insert into Reserva values (2);

insert into Estado values (1,'2016-11-04 19:36:13', 'aceite');
insert into Estado values (2,'2016-11-12 19:36:15', 'paga');

insert into Paga values (2,'2016-11-12','XYXYXY');

