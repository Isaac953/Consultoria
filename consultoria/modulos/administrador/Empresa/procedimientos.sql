ALTER procedure [dbo].[spInsertarConsultores]
@CodigoEmpresa integer,
@NombresConsultor varchar(100),
@ApellidosConsultor varchar(100),
@DireccionConsultor varchar(100),
@Nit varchar(50), 
@Dui varchar(15),
@CodigoPais integer,
@CodigoMunicipio integer,
@Nacionalidad varchar(50),
@Telefono varchar(10),
@Correo varchar(50)

as 
begin

insert into Consultores
(

CodigoEmpresa,
NombresConsultor,
ApellidosConsultor,
DireccionConsultor,
Nit, 
Dui,
CodigoPais,
CodigoMunicipio,
Nacionalidad,
Telefono,
Correo
)
values
(
@CodigoEmpresa,
@NombresConsultor,
@ApellidosConsultor,
@DireccionConsultor,
@Nit, 
@Dui,
@CodigoPais,
@CodigoMunicipio,
@Nacionalidad,
@Telefono,
@Correo
);

end


create procedure spInsertarDetalleEmpresa
@CodigoEmpresa integer,
@CodigoSubArea integer
as
begin

insert into detalleEmpresa(CodigoEmpresa, CodigoSubArea)values(@CodigoEmpresa,@CodigoSubArea );
end



ALTER procedure [dbo].[spInsertarEmpresa]
@NombreEmpresa varchar(100),
@Direccion varchar(150),
@Nit varchar(20),
@Dui varchar(20),
@Tipo varchar(15), /*persona o empresa*/
@Estado bit,
@RegistroIva varchar(15),
@NombresRepresentante varchar(50),
@ApellidosRepresentante varchar(50),
@Telefono varchar(12),
@celular varchar(20),
@paginaWeb varchar(200),
@Email varchar(80),
@CodigoMunicipio integer,
@CodigoPais integer
as
begin
insert into EmpresaPersona
(NombreEmpresa,Direccion,Nit,Dui,Tipo,Estado,RegistroIva,NombresRepresentante,ApellidosRepresentante,Telefono,celular,paginaWeb,Email,CodigoMunicipio,CodigoPais)
values
(@NombreEmpresa,
@Direccion,
@Nit,
@Dui,
@Tipo, /*persona o empresa*/
@Estado,
@RegistroIva,
@NombresRepresentante,
@ApellidosRepresentante,
@Telefono,
@celular,
@paginaWeb,
@Email,
@CodigoMunicipio,
@CodigoPais
);
end