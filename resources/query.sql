CREATE PROCEDURE obtenerGananciaPorProducto(IN fechaInicio VARCHAR(100),in fechaFin varchar(100))
begin
    declare anioInicio varchar(10);
    declare anioFin varchar(10);
   	declare mesInicio varchar(10);
   	declare mesFin varchar(10);
   
    select 
    	extract(year from timestamp(fechaInicio)),
    	extract(year from timestamp(fechaFin)),
    	extract(month from timestamp(fechaInicio)),
    	extract(month from timestamp(fechaFin))
    into 
    	anioInicio,
    	anioFin,
    	mesInicio,
    	mesFin;
	
	select distinct p.titulo as Producto,
	   ds.precio_compra, 
	   ds.precio_venta, 
	   ds.precio_venta - ds.precio_compra as ganancia,
	   date(ds.created_at) as Dia,
	   extract(month from ds.created_at) as Mes,
	   extract(year from ds.created_at) as Anio
	from detalle_salidas ds 
	join productos p on ds.fkproducto = p.id
	where extract(month from ds.created_at) between ifnull(mesInicio,extract(month from NOW())) and ifnull(mesFin,extract(month from NOW()))
	and extract(year from ds.created_at) between ifnull(anioInicio,extract(YEAR from NOW())) and ifnull(anioFin,extract(YEAR from NOW()))
	group by fkproducto,  date(ds.created_at),extract(month from ds.created_at),extract(year from ds.created_at);
	
END


