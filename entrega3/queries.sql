
--Quais os espaços com postos que nunca foram alugados ?--
select P.morada, P.codigo_espaco
from posto P
where not exists(
        select A.morada, A.codigo
        from aluga A
        where P.morada=A.morada and P.codigo_espaco=A.codigo)
group by morada,codigo_espaco;

--Quais edifícios com um número de reservas superior à média?--
select morada, reservas_por_morada
from (select morada, count(numero) as reservas_por_morada 
      from reserva natural join aluga group by morada) as T1 
having reservas_por_morada > (select avg(T2.reservas_por_morada) 
                            from ( select morada, count(numero) as reservas_por_morada 
                                    from reserva natural join aluga 
                                    group by morada) as T2)
--or--

select morada, count(morada)
from reserva natural join aluga
group by `morada`
having count(morada) > (select count(numero)/count(distinct morada) from aluga natural join reserva);


--Quais utilizadores cujos alugáveis foram fiscalizados sempre pelo mesmo fiscal?--

select nome
from User natural join Aluga natural join Fiscaliza
group by nome
Having count(distinct id)=1;

--Qual o montante total realizado (pago) por cada espaço durante o ano de 2016?--

select morada,codigo,sum(tarifa*DATEDIFF(data_fim, data_inicio))
from oferta natural join aluga natural join paga
where data_inicio > "2015-12-31" and data_fim < "2017-01-01"
group by morada,codigo;

--Quais os espaços de trabalho cujos postos nele contidos foram todos alugados?--

select * 
from espaco natural join ( select morada, codigo_Espaco as codigo 
                            from posto P natural join estado E natural join aluga A 
                            where E.estado = "aceite") as T1
where not exists ( select * 
                  from espaco natural join ( select morada, codigo_Espaco as codigo 
                                            from posto P natural join estado E natural join aluga A 
                                            where E.estado <> "aceite") as T2);



