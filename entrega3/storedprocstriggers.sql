
delimiter//
create function NoOverlappingDates(in dataInicio date, in dataFim date)
    begin
        if exists (select * from Oferta
             where data_inicio <= dataFim
             and data_fim >= dataInicio) then
            call levanta_erro_datas_sobrepostas();
        end if;
    end //
delimiter;


delimiter //
create trigger ri_datas_ofertas_nao_sobrepostas_insert before insert on Ofertas 
    begin
    call NoOverlappingDates(new.data_inicio,new.data_fim);
    end //

create trigger ri_datas_ofertas_nao_sobrepostas_update before update on Ofertas
    begin 
    call NoOverlappingDates(new.data_inicio,new.data_fim);
    end //  
 delimiter;   


 delimiter//
 create function CompareTimestampWithDate(in dataPagamento date, in numeroReserva int)
    begin
        declare t_to_d date;

        select date(time_stamp) from Estado into t_to_d 
        where numero=numeroReserva;

        if(t_to_d => dataPagamento) then
        call levanta_erro_dataPagamento_menor_timeStampEstado();
        end if;
    end //
delimiter; 

delimiter//
create trigger ri_datas_pagamento_estado_insert before insert on Paga
    begin
    call CompareTimestampWithDate(new.data,new.numero);
    end//

create trigger ri_datas_pagamento_estado_update before update on Paga
    begin
    call CompareTimestampWithDate(new.data,new.numero);
    end//
delimiter;    


        


