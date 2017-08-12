USE [PlanSv]
GO
/****** Object:  Table [dbo].[EvaluacionFinalConsultoria]    Script Date: 03/01/2017 15:41:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EvaluacionFinalConsultoria](
	[CodigoEvalFinalConsultoria] [int] IDENTITY(1,1) NOT NULL,
	[CodigoContrato] [int] NULL,
	[CodigoParametrosCriterios] [int] NULL,
	[Puntaje] [float] NULL,
	[CodigoPersonal] [int] NULL,
	[fecha] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoEvalFinalConsultoria] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  StoredProcedure [dbo].[spInsertarEvalConsultoria]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
Create procedure [dbo].[spInsertarEvalConsultoria]
@CodigoContrato integer, 
@CodigoParametrosCriterios integer,
@puntaje float,
@CodigoPersonal integer
as
begin
insert into EvaluacionFinalConsultoria (CodigoContrato,CodigoParametrosCriterios,puntaje,CodigoPersonal) 
values (@CodigoContrato,@CodigoParametrosCriterios,@puntaje,@CodigoPersonal);
end;
GO
/****** Object:  Table [dbo].[EvaluacionFinalConsultores]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[EvaluacionFinalConsultores](
	[CodigoEvalFinalConsultores] [int] IDENTITY(1,1) NOT NULL,
	[CodigoConsultor] [int] NULL,
	[CodigoContrato] [int] NULL,
	[resultado] [varchar](20) NULL,
	[CodigoPersonal] [int] NULL,
	[fecha] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoEvalFinalConsultores] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  StoredProcedure [dbo].[spInsertarEvalConsultor]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/*procedimientos almacenados para las ofertas*/
Create procedure [dbo].[spInsertarEvalConsultor]
@CodigoConsultor integer, 
@CodigoContrato integer,
@resultado varchar(20),
@CodigoPersonal integer
as
begin
insert into EvaluacionFinalConsultores (CodigoConsultor,CodigoContrato,resultado,CodigoPersonal) 
values (@CodigoConsultor,@CodigoContrato,@resultado,@CodigoPersonal);
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_ModificarEvalConsultoria]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[sp_ModificarEvalConsultoria]
@CodigoEvalConsul integer,
@puntaje float
as
begin
update EvaluacionFinalConsultoria 
set Puntaje=@Puntaje
where CodigoEvalFinalConsultoria=@CodigoEvalConsul;
end;
GO
/****** Object:  Table [dbo].[Contrato]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Contrato](
	[CodigoContrato] [int] IDENTITY(1,1) NOT NULL,
	[CodigoEmpresa] [int] NULL,
	[Codigoconsultoria] [int] NULL,
	[FechaInicio] [date] NULL,
	[FechaFin] [date] NULL,
	[Estatus] [bit] NULL,
	[montoOfertado] [float] NULL,
	[explicacion] [varchar](200) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoContrato] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  StoredProcedure [dbo].[spInsertarContrato]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spInsertarContrato]
@CodigoEmpresa integer,
@CodigoConsultoria integer,
@FechaInicio date,
@FechaFin date,
@Estatus bit,
@mtoOfertado float

as 
begin

insert into Contrato
(
CodigoEmpresa,
CodigoConsultoria,
FechaInicio,
FechaFin,
Estatus,
montoOfertado
) 
values
(
@CodigoEmpresa,
@CodigoConsultoria,
@FechaInicio,
@FechaFin,
@Estatus,
@mtoOfertado
);
end;
GO
/****** Object:  StoredProcedure [dbo].[spActualizarContrato]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/*procedimiento almacenado para actualizar el persal*/
CREATE procedure [dbo].[spActualizarContrato]
@CodigoContrato integer,
@FechaInicio date,
@FechaFin date,
@Estatus bit,
@montoOfertado float,
@explicacion varchar(200)

as 
begin

update Contrato set
FechaInicio=@FechaInicio,
FechaFin=@FechaFin,
Estatus=@Estatus,
montoOfertado=@montoOfertado,
explicacion = @explicacion

where CodigoContrato=@CodigoContrato
end;
GO
/****** Object:  Table [dbo].[bitacora_contrato]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[bitacora_contrato](
	[idbitcontrato] [int] IDENTITY(1,1) NOT NULL,
	[CodigoContrato] [int] NULL,
	[FechaInicioA] [date] NULL,
	[FechaFinA] [date] NULL,
	[montoOfertadoA] [float] NULL,
	[FechaInicioN] [date] NULL,
	[FechaFinN] [date] NULL,
	[montoOfertadoN] [float] NULL,
	[Descripcion] [varchar](200) NULL,
	[fechaModificacion] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[idbitcontrato] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Trigger [bitacoracontrato]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[bitacoracontrato]
ON [dbo].[Contrato]  
FOR UPDATE  
AS  
BEGIN  
    INSERT INTO bitacora_contrato(CodigoContrato, FechaInicioA, FechaFinA, montoOfertadoA, FechaInicioN, FechaFinN, montoOfertadoN, Descripcion)  
        SELECT i.CodigoContrato, d.FechaInicio, d.FechaFin, d.montoOfertado, i.FechaInicio, i.FechaFin, i.montoOfertado, i.explicacion 
       FROM INSERTED i
        INNER JOIN DELETED d
         ON i.CodigoContrato = d.CodigoContrato         
END
GO
/****** Object:  Table [dbo].[Consultores]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Consultores](
	[CodigoConsultor] [int] IDENTITY(1,1) NOT NULL,
	[CodigoEmpresa] [int] NULL,
	[NombresConsultor] [varchar](100) NULL,
	[ApellidosConsultor] [varchar](100) NULL,
	[DireccionConsultor] [varchar](100) NULL,
	[NitC] [varchar](50) NULL,
	[DuiC] [varchar](15) NULL,
	[CodigoPais] [int] NULL,
	[CodigoMunicipio] [int] NULL,
	[Nacionalidad] [varchar](50) NULL,
	[TelefonoC] [varchar](10) NULL,
	[Correo] [varchar](50) NULL,
	[EstadoC] [bit] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoConsultor] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Accesos]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Accesos](
	[CodigoAcceso] [int] IDENTITY(1,1) NOT NULL,
	[TituloAcceso] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoAcceso] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AreaEspecializacion]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[AreaEspecializacion](
	[CodigoArea] [int] IDENTITY(1,1) NOT NULL,
	[AreaEspecializacion] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoArea] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Departamentos]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Departamentos](
	[CodigoDepartamento] [int] IDENTITY(1,1) NOT NULL,
	[NombreDepartamento] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoDepartamento] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Criterios]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Criterios](
	[CodigoCriterio] [int] IDENTITY(1,1) NOT NULL,
	[Criterio] [varchar](60) NULL,
	[TipoCriterio] [varchar](50) NULL,
	[Ponderacion] [float] NULL,
	[EstadoC] [bit] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoCriterio] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[DetalleEIConsultoria]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DetalleEIConsultoria](
	[CodigoDEIConsultoria] [int] IDENTITY(1,1) NOT NULL,
	[CodigoEvalInicialConsultoria] [int] NULL,
	[CodigoPersonal] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoDEIConsultoria] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Paises]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Paises](
	[CodigoPais] [int] IDENTITY(1,1) NOT NULL,
	[iso] [char](2) NULL,
	[nombre] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoPais] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[iso] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Oficinas]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Oficinas](
	[CodigoOficina] [int] IDENTITY(1,1) NOT NULL,
	[NombreOficina] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoOficina] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Ofertas]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Ofertas](
	[CodigoOferta] [int] IDENTITY(1,1) NOT NULL,
	[Codigoconsultoria] [int] NULL,
	[NombreEmpresa] [varchar](100) NULL,
	[Nit] [varchar](50) NULL,
	[Telefono] [varchar](20) NULL,
	[Correo] [varchar](100) NULL,
	[Monto] [float] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoOferta] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[usuarios]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[usuarios](
	[idUsuario] [int] IDENTITY(1,1) NOT NULL,
	[usuario] [varchar](50) NULL,
	[contrasenia] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[idUsuario] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[SubArea]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[SubArea](
	[CodigoSubArea] [int] IDENTITY(1,1) NOT NULL,
	[CodigoArea] [int] NULL,
	[SubArea] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoSubArea] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  StoredProcedure [dbo].[spModificarOfertas]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
Create procedure [dbo].[spModificarOfertas]
@CodigoOferta integer,
@Monto varchar(100)
as
begin
update Ofertas set Monto=@Monto
where CodigoOferta=@CodigoOferta;
end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarOfertas]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/*procedimientos almacenados para las ofertas*/
CREATE procedure [dbo].[spInsertarOfertas]
@CodigoConsultoria integer, 
@NombreEmpresa varchar(100),
@Nit varchar(50),
@Telefo varchar(20),
@Correo varchar(100)
as
begin
insert into Ofertas (CodigoConsultoria,NombreEmpresa,Nit,Telefono,Correo) 
values (@CodigoConsultoria,@NombreEmpresa,@Nit,@Telefo,@Correo);
end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarCriterios]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spInsertarCriterios]
@Criterio varchar(60), @TipoCriterio varchar(50), @Pderaci float, @estadoc bit
as
begin
insert into Criterios (Criterio,TipoCriterio,Ponderacion, EstadoC)values(@Criterio,@TipoCriterio,@Pderaci, @estadoc);
end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarConsultores]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/*procedimientos almacenados para csultores*/
CREATE procedure [dbo].[spInsertarConsultores]
@CodigoEmpresa integer,
@NombresCsultor varchar(100),
@ApellidosCsultor varchar(100),
@DirecciCsultor varchar(100),
@Nit varchar(50), 
@Dui varchar(15),
@CodigoPais integer,
@CodigoMunicipio integer,
@Nacialidad varchar(50),
@Telefo varchar(10),
@Correo varchar(50),
@Estado bit

as 
begin

insert into Consultores
(

CodigoEmpresa,
NombresConsultor,
ApellidosConsultor,
DireccionConsultor,
NitC, 
DuiC,
CodigoPais,
CodigoMunicipio,
Nacionalidad,
TelefonoC,
Correo,
EstadoC
)
values
(
@CodigoEmpresa,
@NombresCsultor,
@ApellidosCsultor,
@DirecciCsultor,
@Nit, 
@Dui,
@CodigoPais,
@CodigoMunicipio,
@Nacialidad,
@Telefo,
@Correo,
@Estado
);

end;
GO
/****** Object:  StoredProcedure [dbo].[spEliminarOfertas]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spEliminarOfertas]
@CodigoOferta integer
as
begin
delete from Ofertas where CodigoOferta=@CodigoOferta;
end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarAreas]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spInsertarAreas]
@AreaEspecializacion varchar(100)
as
begin
 insert into AreaEspecializacion (AreaEspecializacion)values(@AreaEspecializacion);
end;
GO
/****** Object:  StoredProcedure [dbo].[spActualizarAreas]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spActualizarAreas]
@CodigoArea integer,
@AreaEspecializacion varchar(100)
as
begin
update AreaEspecializacion set AreaEspecializacion=@AreaEspecializacion 
where CodigoArea=@CodigoArea;
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_registrarOficinas]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE proc [dbo].[sp_registrarOficinas]
@nombof varchar(50)
as 
begin
insert into Oficinas (NombreOficina) values(@nombof)
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_registrarAccesos]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create proc [dbo].[sp_registrarAccesos]
@titac varchar(50)
as 
begin
insert into Accesos (TituloAcceso) values(@titac)
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_actualizarConsultor]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/*procedimientos almacenados para csultores*/
create procedure [dbo].[sp_actualizarConsultor]
@CodigoConsultor integer,
@NombresCsultor varchar(100),
@ApellidosCsultor varchar(100),
@DirecciCsultor varchar(100),
@Nit varchar(50), 
@Dui varchar(15),
@CodigoPais integer,
@CodigoMunicipio integer,
@Nacialidad varchar(50),
@Telefo varchar(10),
@Correo varchar(50),
@EstadoC bit

as 
begin

update  Consultores
set
NombresConsultor=@NombresCsultor,
ApellidosConsultor=@ApellidosCsultor,
DireccionConsultor=@DirecciCsultor,
NitC=@Nit, 
DuiC=@Dui,
CodigoPais=@CodigoPais,
CodigoMunicipio=@CodigoMunicipio,
Nacionalidad=@Nacialidad,
TelefonoC=@Telefo,
Correo=@Correo,
EstadoC=@EstadoC

where CodigoConsultor=@CodigoConsultor

end;
GO
/****** Object:  StoredProcedure [dbo].[sp_actualizarAccesos]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
Create procedure [dbo].[sp_actualizarAccesos]
@CodigoAcceso integer,
@TituloAcc varchar(100)
as
begin
update Accesos set TituloAcceso=@TituloAcc
where CodigoAcceso=@CodigoAcceso;
end;
GO
/****** Object:  StoredProcedure [dbo].[spActualizarCriterios]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spActualizarCriterios]
@CodigoConriterio integer, @Criterio varchar(60), @Pderaci float, @estadoc bit
as
begin
update Criterios set Criterio=@Criterio, Ponderacion=@Pderaci, EstadoC=@estadoc where CodigoCriterio=@CodigoConriterio;
end;

--exec spActualizarCriterios 1, 'Nivel Educativo', 70, 'true';
GO
/****** Object:  StoredProcedure [dbo].[spActualizarOfertas]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spActualizarOfertas]
@CodigoOferta integer,
@CodigoConsultoria integer, 
@NombreEmpresa varchar(100),
@Nit varchar(50),
@Telefono varchar(20),
@Correo varchar(100)
as
begin
update Ofertas set CodigoConsultoria=@CodigoConsultoria, NombreEmpresa=@NombreEmpresa,
Nit=@Nit, Telefono=@Telefono, Correo=@Correo where CodigoOferta=@CodigoOferta; 
end;
GO
/****** Object:  StoredProcedure [dbo].[spEliminarCriterios]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spEliminarCriterios]
@CodigoCriterio integer
as
begin
delete from Criterios where CodigoCriterio=@CodigoCriterio;
end;
GO
/****** Object:  StoredProcedure [dbo].[spEliminarConsultor]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spEliminarConsultor]
@CodigoConsultor integer
as
begin
delete from Consultores where CodigoConsultor=@CodigoConsultor;
end;
GO
/****** Object:  StoredProcedure [dbo].[spEliminarAreas]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spEliminarAreas]
@CodigoArea integer
as
begin
delete from  AreaEspecializacion where CodigoArea=@CodigoArea;
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_actualizarOficinas]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[sp_actualizarOficinas]
@CodigoOficina integer,
@nombof varchar(50)
as
begin
update Oficinas set NombreOficina=@nombof where CodigoOficina=@CodigoOficina
end
GO
/****** Object:  StoredProcedure [dbo].[sp_actualizarEmpConsultor]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[sp_actualizarEmpConsultor]
@CodigoConsultor integer,
@CodigoEmpresa integer

as 
begin

update  Consultores
set
CodigoEmpresa=@CodigoEmpresa

where CodigoConsultor=@CodigoConsultor

end;
GO
/****** Object:  StoredProcedure [dbo].[sp_eliminarOficinas]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create proc [dbo].[sp_eliminarOficinas]
@codof integer
as 
begin
delete from Oficinas where CodigoOficina=@codof
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_eliminarAccesos]    Script Date: 03/01/2017 15:41:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create proc [dbo].[sp_eliminarAccesos]
@codacs integer
as 
begin
delete from Accesos where CodigoAcceso=@codacs
end;
GO
/****** Object:  Table [dbo].[Personal]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Personal](
	[CodigoPersonal] [int] IDENTITY(1,1) NOT NULL,
	[Nombres] [varchar](50) NULL,
	[Apellidos] [varchar](50) NULL,
	[email] [varchar](50) NULL,
	[Estado] [bit] NULL,
	[CodigoOficina] [int] NULL,
	[Username] [varchar](50) NULL,
	[password] [varchar](50) NULL,
	[CodigoAcceso] [int] NULL,
	[Car] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoPersonal] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ParametrosCriterios]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ParametrosCriterios](
	[CodigoParametrosCriterios] [int] IDENTITY(1,1) NOT NULL,
	[CodigoCriterio] [int] NULL,
	[Parametro] [varchar](60) NULL,
	[Ponderacion] [float] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoParametrosCriterios] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  StoredProcedure [dbo].[promedioConsultoria]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[promedioConsultoria]
@Contrato int
AS
BEGIN
DECLARE @suma float;
DECLARE @num float;

SET @suma = 0.0;

DECLARE ProdInfo CURSOR FOR SELECT 
((sum(Puntaje) /Count(*))*(Select Ponderacion from ParametrosCriterios  where CodigoParametrosCriterios =  e.CodigoParametrosCriterios )) as prom
FROM EvaluacionFinalConsultoria e 
join ParametrosCriterios p  ON e.CodigoParametrosCriterios = p.CodigoParametrosCriterios
where CodigoContrato = @Contrato
Group by e.CodigoParametrosCriterios;

OPEN ProdInfo

FETCH NEXT FROM ProdInfo INTO @num
WHILE @@fetch_status = 0
	BEGIN
		--print @num;
	    set @suma = @suma + @num;
	    FETCH NEXT FROM ProdInfo INTO @num
	END
	SELECT @suma as suma;
	CLOSE ProdInfo;
	DEALLOCATE ProdInfo
END
GO
/****** Object:  Table [dbo].[Municipios]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Municipios](
	[CodigoMunicipio] [int] IDENTITY(1,1) NOT NULL,
	[NombreMunicipio] [varchar](50) NULL,
	[CodigoDepartamento] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoMunicipio] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[DetalleAreasPersonal]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DetalleAreasPersonal](
	[CodigoDetalleAreasPersonal] [int] IDENTITY(1,1) NOT NULL,
	[CodigoPersonal] [int] NULL,
	[CodigoSubArea] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoDetalleAreasPersonal] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Consultoria]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Consultoria](
	[Codigoconsultoria] [int] IDENTITY(1,1) NOT NULL,
	[NombreConsultoria] [varchar](200) NULL,
	[CodigoPersonal] [int] NULL,
	[FechaInicio] [date] NULL,
	[FechaFinal] [date] NULL,
	[FechaRegistro] [datetime] NULL,
	[Presupuesto] [decimal](16, 2) NULL,
	[FormaPa] [varchar](50) NULL,
	[TDR] [varchar](200) NULL,
	[TipoConsultoria] [varchar](50) NULL,
	[NivelAlcance] [varchar](50) NULL,
	[Estado] [bit] NULL,
PRIMARY KEY CLUSTERED 
(
	[Codigoconsultoria] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Trigger [actualizarcontra]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create trigger [dbo].[actualizarcontra]
on [dbo].[Personal]
for insert
as
update Personal set password=hashbytes('md5',p.password) from Personal, inserted p where Personal.CodigoPersonal=p.CodigoPersonal
GO
/****** Object:  Table [dbo].[EmpresaPersona]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[EmpresaPersona](
	[CodigoEmpresa] [int] IDENTITY(1,1) NOT NULL,
	[NombreEmpresa] [varchar](100) NULL,
	[Direccion] [varchar](150) NULL,
	[Nit] [varchar](20) NULL,
	[Dui] [varchar](20) NULL,
	[Tipo] [varchar](15) NULL,
	[Estado] [bit] NULL,
	[RegistroIva] [varchar](15) NULL,
	[NombresRepresentante] [varchar](50) NULL,
	[ApellidosRepresentante] [varchar](50) NULL,
	[Telefono] [varchar](100) NULL,
	[celular] [varchar](20) NULL,
	[paginaWeb] [varchar](200) NULL,
	[Email] [varchar](80) NULL,
	[CodigoMunicipio] [int] NULL,
	[CodigoPais] [int] NULL,
	[FechaRegistro] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoEmpresa] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  StoredProcedure [dbo].[sp_login]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[sp_login]
@user varchar(100),
@pass varchar(100)
as
begin
Select * from Personal p join Accesos a on p.CodigoAcceso = a.CodigoAcceso where  p.Username = @user and p.password = HashBytes('md5',@pass) ;
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_InsertarPersonal]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[sp_InsertarPersonal]
@Nombres varchar(50),
@Apellidos varchar(50),
@email varchar(50),
@Estado bit,
@CodigoOficina integer,
@Username varchar(50),
@password varchar(50),
@CodigoAcceso integer,
@Car varchar(100)

as 
begin

insert into Personal(Nombres, Apellidos, email, Estado, CodigoOficina, Username, password, CodigoAcceso, Car) 
values(@Nombres, @Apellidos, @email, @Estado, @CodigoOficina, @Username, HashBytes('md5',@password), @CodigoAcceso, @Car);

end;
GO
/****** Object:  StoredProcedure [dbo].[spActualizarSubAreas]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spActualizarSubAreas]
@CodigoSubArea integer, @CodigoArea integer, @SubArea varchar(100)
as
begin
update SubArea set CodigoArea=@CodigoArea, SubArea=@SubArea  where CodigoSubArea=@CodigoSubArea;
end;
GO
/****** Object:  StoredProcedure [dbo].[spActualizarPersonal]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spActualizarPersonal]
@CodigoPersal integer,
@Nombres varchar(50),
@Apellidos varchar(50),
@email varchar(50),
@Estado bit,
@CodigoOficina integer,
@Username varchar(50),
@password varchar(50),
@CodigoAcceso integer,
@Car varchar(100)

as 
begin

update Personal set
Nombres=@Nombres, 
Apellidos=@Apellidos,
email=@email,
Estado=@Estado,
CodigoOficina=@CodigoOficina,
Username=@Username,
password=HashBytes('md5',@Password),
CodigoAcceso=@CodigoAcceso,
Car=@Car

where CodigoPersonal=@CodigoPersal
end;
GO
/****** Object:  StoredProcedure [dbo].[spActualizarParametros]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spActualizarParametros]
@CodigoParametrosCriterios integer,
@Parametro varchar(60), 
@Ponderacion float
as
begin
update ParametrosCriterios set Parametro=@Parametro, Ponderacion=@Ponderacion
where CodigoParametrosCriterios=@CodigoParametrosCriterios;
end;
GO
/****** Object:  StoredProcedure [dbo].[spActualizarEstadoPersonal]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spActualizarEstadoPersonal]
@CodigoPersal integer,
@Estado bit

as 
begin

update Personal set
Estado=@Estado

where CodigoPersonal=@CodigoPersal
end;
GO
/****** Object:  StoredProcedure [dbo].[spEliminarSubAreas]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spEliminarSubAreas]
@CodigoSubArea integer
as
begin
delete from SubArea where CodigoSubArea=@CodigoSubArea;
end;
GO
/****** Object:  StoredProcedure [dbo].[spEliminarPersonal]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spEliminarPersonal]
@CodigoPersonal integer
as
begin
delete from Personal where CodigoPersonal=@CodigoPersonal;
end;
GO
/****** Object:  StoredProcedure [dbo].[spEliminarParametros]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spEliminarParametros]
@CodigoParametrosCriterios integer
as
begin
delete from ParametrosCriterios where CodigoParametrosCriterios=@CodigoParametrosCriterios;
end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarParametros]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spInsertarParametros]
@CodigoConriterio integer, @Parametro varchar(60), @Pderaci float
as
begin
insert into ParametrosCriterios(CodigoCriterio,Parametro,Ponderacion)
values(@CodigoConriterio,@Parametro,@Pderaci);
end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarSubAreas]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spInsertarSubAreas]
@CodigoArea integer, @SubArea varchar(100)
as
begin
 insert into SubArea (CodigoArea,SubArea)values(@CodigoArea,@SubArea);
end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarPersonal]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spInsertarPersonal]
@Nombres varchar(50),
@Apellidos varchar(50),
@Email varchar(50),
@Estado bit,
@CodigoOficina integer,
@Username varchar(50),
@Password varchar(50),
@CodigoAcceso integer,
@Car varchar(100)

as 
begin

insert into Personal
(Nombres,
Apellidos,
email,
Estado,
CodigoOficina,
Username,
password,
CodigoAcceso,
Car
) 
values
(
@Nombres,
@Apellidos,
@Email,
@Estado,
@CodigoOficina,
@Username,
HashBytes('md5',@Password),
@CodigoAcceso,
@Car
);
end;
GO
/****** Object:  StoredProcedure [dbo].[spModificarAcceso]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spModificarAcceso]
@CodigoPersonal integer
as
begin

update Personal set CodigoAcceso = 3, Car = 'Evaluador' where CodigoPersonal = @CodigoPersonal

end
GO
/****** Object:  Table [dbo].[ZonaTrabajo]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ZonaTrabajo](
	[CodigoZona] [int] IDENTITY(1,1) NOT NULL,
	[Codigoconsultoria] [int] NULL,
	[CodigoMunicipio] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoZona] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  StoredProcedure [dbo].[spModificarEstadoConsultoria]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spModificarEstadoConsultoria]
@CodigoConsultoria integer

as 
begin

update  Consultoria
set
Estado=0

where Codigoconsultoria=@CodigoConsultoria

end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarEmpresa]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spInsertarEmpresa]
@NombreEmpresa varchar(100),
@Direcci varchar(150),
@Nit varchar(20),
@Dui varchar(20),
@Tipo varchar(15), /*persa o empresa*/
@Estado bit,
@RegistroIva varchar(15),
@NombresRepresentante varchar(50),
@ApellidosRepresentante varchar(50),
@Telefo varchar(12),
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
@Direcci,
@Nit,
@Dui,
@Tipo, /*persa o empresa*/
@Estado,
@RegistroIva,
@NombresRepresentante,
@ApellidosRepresentante,
@Telefo,
@celular,
@paginaWeb,
@Email,
@CodigoMunicipio,
@CodigoPais
);
end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarDPersonal]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spInsertarDPersonal]
@CodigoPersal integer, @CodigoSubArea integer
as
begin
insert into  DetalleAreasPersonal (CodigoPersonal,CodigoSubArea) values(@CodigoPersal,@CodigoSubArea);
end;
GO
/****** Object:  StoredProcedure [dbo].[spEliminarEmpresa]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spEliminarEmpresa]
@CodigoEmpresa integer
as
begin
delete from EmpresaPersona where CodigoEmpresa=@CodigoEmpresa;
end;
GO
/****** Object:  StoredProcedure [dbo].[spEliminarDPersonal]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spEliminarDPersonal]
@CodigoDetalleAreasPersonal integer
as
begin
delete from DetalleAreasPersonal where CodigoDetalleAreasPersonal=@CodigoDetalleAreasPersonal;
end;
GO
/****** Object:  StoredProcedure [dbo].[spActualizarEmpresa]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spActualizarEmpresa]
@CodigoEmpresa integer,
@NombreEmpresa varchar(100),
@Direccion varchar(150),
@Nit varchar(20),
@Dui varchar(20),
@Tipo varchar(15), /*persa o empresa*/
@NombresRepresentante varchar(50),
@ApellidosRepresentante varchar(50),
@Telefono varchar(12),
@celular varchar(20),
@Email varchar(80),
@paginaWeb varchar(200),
@CodigoPais integer,
@CodigoMunicipio integer,
@RegistroIva varchar(15),
@Estado bit
as
begin
update EmpresaPersona
 set
NombreEmpresa=@NombreEmpresa,
 Direccion=@Direccion,
 Nit=@Nit,
 Dui=@Dui,
 Tipo=@Tipo,
 NombresRepresentante=@NombresRepresentante,
 ApellidosRepresentante=@ApellidosRepresentante,
 Telefono=@Telefono,
 celular=@celular,
 Email=@Email,
 paginaWeb=@paginaWeb,
 CodigoPais=@CodigoPais,
 CodigoMunicipio=@CodigoMunicipio,
 RegistroIva=@RegistroIva,
 Estado=@Estado
 
 where CodigoEmpresa=@CodigoEmpresa;
end;
GO
/****** Object:  StoredProcedure [dbo].[spActualizarDPersonal]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spActualizarDPersonal]
@CodigoSubArea integer,
@CodigoDetalleAreasPersonal integer
as
begin
update DetalleAreasPersonal set CodigoSubArea=@CodigoSubArea where CodigoDetalleAreasPersonal=@CodigoDetalleAreasPersonal;
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_actualizarConsultorianotdr]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[sp_actualizarConsultorianotdr]
@Codigoconsultoria integer,
@NombreConsultoria varchar(200),
@TipoConsultoria varchar(50),
@NivelAlc varchar(50),
@FechaInicio date,
@FechaFinal date,
@Presupuesto float,
@FormaPago varchar(50),
@EstadoCo bit

as 
begin

update  Consultoria
set
NombreConsultoria=@NombreConsultoria,
TipoConsultoria=@TipoConsultoria,
NivelAlcance=@NivelAlc,
FechaInicio=@FechaInicio,
FechaFinal=@FechaFinal,
Presupuesto=@Presupuesto,
FormaPa=@FormaPago,
Estado=@EstadoCo 

where Codigoconsultoria=@Codigoconsultoria

end;
GO
/****** Object:  StoredProcedure [dbo].[sp_actualizarConsultoria]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[sp_actualizarConsultoria]
@Codigoconsultoria integer,
@NombreConsultoria varchar(200),
@TipoConsultoria varchar(50),
@NivelAlc varchar(50),
@FechaInicio date,
@FechaFinal date,
@Tdr varchar(200),
@Presupuesto float,
@FormaPago varchar(50),
@EstadoCo bit

as 
begin

update  Consultoria
set
NombreConsultoria=@NombreConsultoria,
TipoConsultoria=@TipoConsultoria,
NivelAlcance=@NivelAlc,
FechaInicio=@FechaInicio,
FechaFinal=@FechaFinal,
TDR=@Tdr,
Presupuesto=@Presupuesto,
FormaPa=@FormaPago,
Estado=@EstadoCo 

where Codigoconsultoria=@Codigoconsultoria

end;
GO
/****** Object:  Table [dbo].[detalleEmpresa]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[detalleEmpresa](
	[CodigoDetalleEmpresa] [int] IDENTITY(1,1) NOT NULL,
	[CodigoEmpresa] [int] NULL,
	[CodigoSubArea] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoDetalleEmpresa] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[comentarios]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[comentarios](
	[codigoComentario] [int] IDENTITY(1,1) NOT NULL,
	[comentario] [varchar](600) NULL,
	[tipo] [varchar](100) NULL,
	[Codigoconsultoria] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[codigoComentario] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BitacoraProductoViejo]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[BitacoraProductoViejo](
	[CodigoBitacoraV] [int] IDENTITY(1,1) NOT NULL,
	[Codigoconsultoria] [int] NULL,
	[Producto] [varchar](200) NULL,
	[Desembolso] [float] NULL,
	[RecibiConforme] [date] NULL,
	[pagado] [date] NULL,
	[MontoPagado] [float] NULL,
	[fechaPlanificada] [date] NULL,
	[comentarios] [varchar](500) NULL,
	[explicacion] [varchar](500) NULL,
	[fechaModificacion] [datetime] NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BitacoraProductoNuevo]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[BitacoraProductoNuevo](
	[CodigoBitacora] [int] IDENTITY(1,1) NOT NULL,
	[Codigoconsultoria] [int] NULL,
	[Producto] [varchar](200) NULL,
	[Desembolso] [float] NULL,
	[RecibiConforme] [date] NULL,
	[pagado] [date] NULL,
	[MontoPagado] [float] NULL,
	[fechaPlanificada] [date] NULL,
	[comentarios] [varchar](500) NULL,
	[explicacion] [varchar](500) NULL,
	[fechaModificacion] [datetime] NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[DetalleConsultoriaPep]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[DetalleConsultoriaPep](
	[DetalleConsultoriaPep] [int] IDENTITY(1,1) NOT NULL,
	[CodigoConsultoria] [int] NULL,
	[ElementoPep] [varchar](200) NULL,
PRIMARY KEY CLUSTERED 
(
	[DetalleConsultoriaPep] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[DetalleConsultoria]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DetalleConsultoria](
	[CodigoDetalleConsultoria] [int] IDENTITY(1,1) NOT NULL,
	[Codigoconsultoria] [int] NULL,
	[CodigoSubArea] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoDetalleConsultoria] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Asignacion]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Asignacion](
	[CodigoAsignacion] [int] IDENTITY(1,1) NOT NULL,
	[CodigoPersonal] [int] NULL,
	[CodigoConsultoria] [int] NULL,
	[funcion] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoAsignacion] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[EvaluacionOfertas]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EvaluacionOfertas](
	[CodigoEvalInicialConsultoria] [int] IDENTITY(1,1) NOT NULL,
	[CodigoOferta] [int] NULL,
	[CodigoParametrosCriterios] [int] NULL,
	[Puntaje] [float] NULL,
	[fecha] [date] NULL,
	[CodigoAsignacion] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoEvalInicialConsultoria] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Producto]    Script Date: 03/01/2017 15:41:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Producto](
	[CodigoProducto] [int] IDENTITY(1,1) NOT NULL,
	[Codigoconsultoria] [int] NULL,
	[Producto] [varchar](200) NULL,
	[Desembolso] [float] NULL,
	[RecibiConforme] [date] NULL,
	[pagado] [date] NULL,
	[MontoPagado] [float] NULL,
	[fechaPlanificada] [date] NULL,
	[comentarios] [varchar](500) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoProducto] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  StoredProcedure [dbo].[sp_InsertarComentario]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[sp_InsertarComentario]
@comentario varchar(600), @tipo varchar(100), @Codigoconsultoria int
as
begin
insert into comentarios (comentario,tipo,Codigoconsultoria)values(@comentario,@tipo,@Codigoconsultoria);
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_actualizarPep]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
Create procedure [dbo].[sp_actualizarPep]
@DetalleConsultoriaPep integer,
@ElementoPep varchar (200)


as 
begin

update  DetalleConsultoriaPep set
ElementoPep=@ElementoPep

where DetalleConsultoriaPep=@DetalleConsultoriaPep

end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarAsignacion]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spInsertarAsignacion]
@CodigoPersal integer,
@CodigoConsultoria integer
as 
begin

insert into Asignacion(CodigoPersonal, CodigoConsultoria)
values(@CodigoPersal, @CodigoConsultoria);
end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarDetalleEmpresa]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spInsertarDetalleEmpresa]
@CodigoEmpresa integer,
@CodigoSubArea integer
as
begin

insert into detalleEmpresa(CodigoEmpresa, CodigoSubArea)values(@CodigoEmpresa,@CodigoSubArea );
end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarDConsultoria]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spInsertarDConsultoria]
@CodigoConsultoria integer,
@CodigoSubArea integer
as
begin

insert into DetalleConsultoria(CodigoConsultoria, CodigoSubArea)values(@CodigoConsultoria, @CodigoSubArea );

end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarZona]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spInsertarZona]
@CodigoConsultoria integer,
@CodigoMunicipio integer
as
begin

insert into ZonaTrabajo(CodigoConsultoria, CodigoMunicipio)
values(@CodigoConsultoria,@CodigoMunicipio);

end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarPep]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spInsertarPep]
@CodigoConsultoria integer,
@ElementoPep varchar(200)
as
begin

insert into DetalleConsultoriaPep(CodigoConsultoria, ElementoPep)values(@CodigoConsultoria, @ElementoPep);
end;
GO
/****** Object:  Trigger [trbitacoraproductoviejo]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[trbitacoraproductoviejo]
ON [dbo].[Producto]  
FOR DELETE  
AS  
BEGIN  
    INSERT INTO BitacoraProductoviejo(Codigoconsultoria, Producto, Desembolso, RecibiConforme, pagado, MontoPagado, fechaPlanificada, comentarios, explicacion)  
        SELECT   d.Codigoconsultoria, d.Producto, d.Desembolso, d.RecibiConforme, d.pagado, d.MontoPagado, d.fechaPlanificada, d.comentarios, 'se elimino el producto'
      /* FROM INSERTED i
        INNER JOIN DELETED d
         ON i.Codigoconsultoria = d.Codigoconsultoria */
        FROM DELETED d
         -- ON i.Codigoconsultoria = d.Codigoconsultoria         
END
GO
/****** Object:  Trigger [trbitacoraproductonuevo]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[trbitacoraproductonuevo]
ON [dbo].[Producto]  
FOR INSERT  
AS  
BEGIN  
    INSERT INTO BitacoraProductoNuevo(Codigoconsultoria, Producto, Desembolso, RecibiConforme, pagado, MontoPagado, fechaPlanificada, comentarios, explicacion)  
        SELECT   i.Codigoconsultoria, i.Producto, i.Desembolso, i.RecibiConforme, i.pagado, i.MontoPagado, i.fechaPlanificada, i.comentarios, 'se registro un nuevo producto'
       FROM INSERTED i       
END
GO
/****** Object:  Trigger [trbitacoraproducto]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[trbitacoraproducto]
ON [dbo].[Producto]  
FOR UPDATE  
AS  
BEGIN  
    INSERT INTO BitacoraProducto(CodigoProducto, Codigoconsultoria, ProductoA, DesembolsoA, RecibiConformeA, pagadoA, MontoPagadoA, fechaPlanificadaA, comentariosA, ProductoN, DesembolsoN, RecibiConformeN, pagadoN, MontoPagadoN, fechaPlanificadaN, comentariosN)  
        SELECT i.CodigoProducto, i.Codigoconsultoria, d.Producto, d.Desembolso, d.RecibiConforme, d.pagado, d.MontoPagado, d.fechaPlanificada, d.comentarios, i.Producto, i.Desembolso, i.RecibiConforme, i.pagado, i.MontoPagado, i.fechaPlanificada, i.comentarios
       FROM INSERTED i
        INNER JOIN DELETED d
         ON i.CodigoProducto = d.CodigoProducto         
END
GO
/****** Object:  StoredProcedure [dbo].[spModificarProucto]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spModificarProucto]
@CodigoProducto integer,
@RecibiConforme date,
@pagado date,
@MontoPagado float,
@comentarios varchar(500)
as
begin

update Producto  set RecibiConforme = @RecibiConforme, pagado = @Pagado, MontoPagado = @MontoPagado, comentarios = @comentarios
where CodigoProducto=@CodigoProducto

end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarProductoInicio]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spInsertarProductoInicio]
@CodigoConsultoria integer,
@Producto varchar(200),
@Desembolso float,
@fechaPlanificada date
as
begin

insert into Producto(CodigoConsultoria, Producto, Desembolso, fechaPlanificada, RecibiConforme, pagado )
values(@CodigoConsultoria, @Producto, @Desembolso, @fechaPlanificada, '1900-01-01', '1900-01-01'  );

end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarProductoAdmin]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[spInsertarProductoAdmin]
@CodigoConsultoria integer,
@Producto varchar(200),
@Desembolso float,
@RecibiConforme date,
@pagado date,
@MontoPagado float,
@fechaPlanificada date,
@comentarios varchar(500)
as
begin

insert into Producto(CodigoConsultoria, Producto, Desembolso, RecibiConforme, pagado, MontoPagado, fechaPlanificada, comentarios)
values(@CodigoConsultoria, @Producto, @Desembolso, @RecibiConforme, @pagado, @MontoPagado,  @fechaPlanificada, @comentarios);

end;
GO
/****** Object:  StoredProcedure [dbo].[spInsertarEvalOfertas]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[spInsertarEvalOfertas]
@CodigoOferta integer,
@CodigoParametrosCriterios integer,
@Puntaje integer,
@CodigoAsignacion integer
as 
begin

insert into EvaluacionOfertas(CodigoOferta, CodigoParametrosCriterios, Puntaje, CodigoAsignacion)
values(@CodigoOferta, @CodigoParametrosCriterios, @Puntaje, @CodigoAsignacion);
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_ModificarEvalOfertas]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[sp_ModificarEvalOfertas]
@CodigoEvaOf integer,
@Puntaje float
as
begin
update EvaluacionOfertas set Puntaje=@Puntaje
where CodigoEvalInicialConsultoria=@CodigoEvaOf;
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_ActualizarProductos]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[sp_ActualizarProductos]
@CodigoProducto integer,
@Producto varchar(200),
@Desembolso float,
@Recibi date,
@pagado date,
@MontoP float,
@fechapla date,
@comentario varchar(500)
as
begin
update Producto set 
Producto=@Producto,
Desembolso=@Desembolso,
RecibiConforme=@Recibi,
pagado=@pagado,
MontoPagado=@MontoP,
fechaPlanificada=@fechapla,
comentarios=@comentario
where CodigoProducto=@CodigoProducto;
end;
GO
/****** Object:  StoredProcedure [dbo].[sp_ActualizarProductoAdmin]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[sp_ActualizarProductoAdmin]
@CodigoProducto integer,
@Producto varchar(200),
@RecibiConforme date,
@Pagado date,
@fechaPlanificada date,
@comentarios varchar (500)

as 
begin

update  Producto set
Producto=@Producto,
RecibiConforme=@RecibiConforme,
pagado=@Pagado,
fechaPlanificada=@fechaPlanificada, 
comentarios=@comentarios

where CodigoProducto=@CodigoProducto

end;
GO
/****** Object:  StoredProcedure [dbo].[sp_actualizarProducto]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
Create procedure [dbo].[sp_actualizarProducto]
@CodigoProducto integer,
@CodigoConsultoria integer,
@Producto varchar(200),
@MontoPagado float,
@fechaPlanificada date,
@comentarios varchar (500)

as 
begin

update  Producto set
Producto=@Producto,
MontoPagado=@MontoPagado,
fechaPlanificada=@fechaPlanificada,
comentarios=@comentarios 

where CodigoProducto=@CodigoProducto

end;
GO
/****** Object:  StoredProcedure [dbo].[promedio]    Script Date: 03/01/2017 15:41:56 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[promedio]
@codigoOferta int,
@codigoConsultoria int
AS
BEGIN
DECLARE @suma float;
DECLARE @num float;

SET @suma = 0.0;

DECLARE ProdInfo CURSOR FOR SELECT ((sum(Puntaje) /Count(*))*(Select Ponderacion from ParametrosCriterios where CodigoParametrosCriterios =  e.CodigoParametrosCriterios )) as prom
FROM EvaluacionOfertas e 
JOIN Ofertas o ON e.CodigoOferta = o.CodigoOferta
where o.CodigoOferta=@codigoOferta and o.CodigoConsultoria = @codigoConsultoria
Group by CodigoParametrosCriterios,o.CodigoOferta ;

OPEN ProdInfo

FETCH NEXT FROM ProdInfo INTO @num
WHILE @@fetch_status = 0
	BEGIN
		--print @num;
	    set @suma = @suma + @num;
		
	    FETCH NEXT FROM ProdInfo INTO @num
	END
	SELECT @suma as suma;
	CLOSE ProdInfo;
	DEALLOCATE ProdInfo

	
END
GO
/****** Object:  Default [DF__Evaluacio__fecha__31B762FC]    Script Date: 03/01/2017 15:41:53 ******/
ALTER TABLE [dbo].[EvaluacionFinalConsultoria] ADD  DEFAULT (getdate()) FOR [fecha]
GO
/****** Object:  Default [DF__Evaluacio__fecha__32AB8735]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[EvaluacionFinalConsultores] ADD  DEFAULT (getdate()) FOR [fecha]
GO
/****** Object:  Default [DF__bitacora___fecha__339FAB6E]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[bitacora_contrato] ADD  DEFAULT (getdate()) FOR [fechaModificacion]
GO
/****** Object:  Default [DF__Paises__iso__3493CFA7]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[Paises] ADD  DEFAULT (NULL) FOR [iso]
GO
/****** Object:  Default [DF__Paises__nombre__3587F3E0]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[Paises] ADD  DEFAULT (NULL) FOR [nombre]
GO
/****** Object:  Default [DF__usuarios__usuari__367C1819]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[usuarios] ADD  DEFAULT (NULL) FOR [usuario]
GO
/****** Object:  Default [DF__usuarios__contra__37703C52]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[usuarios] ADD  DEFAULT (NULL) FOR [contrasenia]
GO
/****** Object:  Default [DF__Consultor__Fecha__3864608B]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[Consultoria] ADD  DEFAULT (getdate()) FOR [FechaRegistro]
GO
/****** Object:  Default [DF__EmpresaPe__Fecha__395884C4]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[EmpresaPersona] ADD  DEFAULT (getdate()) FOR [FechaRegistro]
GO
/****** Object:  Default [DF__BitacoraP__fecha__3A4CA8FD]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[BitacoraProductoViejo] ADD  DEFAULT (getdate()) FOR [fechaModificacion]
GO
/****** Object:  Default [DF__BitacoraP__fecha__3B40CD36]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[BitacoraProductoNuevo] ADD  DEFAULT (getdate()) FOR [fechaModificacion]
GO
/****** Object:  Default [DF__Evaluacio__fecha__3C34F16F]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[EvaluacionOfertas] ADD  DEFAULT (getdate()) FOR [fecha]
GO
/****** Object:  ForeignKey [fk_evfinal_contrato]    Script Date: 03/01/2017 15:41:53 ******/
ALTER TABLE [dbo].[EvaluacionFinalConsultoria]  WITH CHECK ADD  CONSTRAINT [fk_evfinal_contrato] FOREIGN KEY([CodigoContrato])
REFERENCES [dbo].[Contrato] ([CodigoContrato])
GO
ALTER TABLE [dbo].[EvaluacionFinalConsultoria] CHECK CONSTRAINT [fk_evfinal_contrato]
GO
/****** Object:  ForeignKey [fk_evfinal_parametro]    Script Date: 03/01/2017 15:41:53 ******/
ALTER TABLE [dbo].[EvaluacionFinalConsultoria]  WITH CHECK ADD  CONSTRAINT [fk_evfinal_parametro] FOREIGN KEY([CodigoParametrosCriterios])
REFERENCES [dbo].[ParametrosCriterios] ([CodigoParametrosCriterios])
GO
ALTER TABLE [dbo].[EvaluacionFinalConsultoria] CHECK CONSTRAINT [fk_evfinal_parametro]
GO
/****** Object:  ForeignKey [fk_evfinal_personal]    Script Date: 03/01/2017 15:41:53 ******/
ALTER TABLE [dbo].[EvaluacionFinalConsultoria]  WITH CHECK ADD  CONSTRAINT [fk_evfinal_personal] FOREIGN KEY([CodigoPersonal])
REFERENCES [dbo].[Personal] ([CodigoPersonal])
GO
ALTER TABLE [dbo].[EvaluacionFinalConsultoria] CHECK CONSTRAINT [fk_evfinal_personal]
GO
/****** Object:  ForeignKey [fk_evfinalconsultores_consultor]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[EvaluacionFinalConsultores]  WITH CHECK ADD  CONSTRAINT [fk_evfinalconsultores_consultor] FOREIGN KEY([CodigoConsultor])
REFERENCES [dbo].[Consultores] ([CodigoConsultor])
GO
ALTER TABLE [dbo].[EvaluacionFinalConsultores] CHECK CONSTRAINT [fk_evfinalconsultores_consultor]
GO
/****** Object:  ForeignKey [fk_evfinalconsultores_contrato]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[EvaluacionFinalConsultores]  WITH CHECK ADD  CONSTRAINT [fk_evfinalconsultores_contrato] FOREIGN KEY([CodigoContrato])
REFERENCES [dbo].[Contrato] ([CodigoContrato])
GO
ALTER TABLE [dbo].[EvaluacionFinalConsultores] CHECK CONSTRAINT [fk_evfinalconsultores_contrato]
GO
/****** Object:  ForeignKey [fk_evfinalconsultores_personal]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[EvaluacionFinalConsultores]  WITH CHECK ADD  CONSTRAINT [fk_evfinalconsultores_personal] FOREIGN KEY([CodigoPersonal])
REFERENCES [dbo].[Personal] ([CodigoPersonal])
GO
ALTER TABLE [dbo].[EvaluacionFinalConsultores] CHECK CONSTRAINT [fk_evfinalconsultores_personal]
GO
/****** Object:  ForeignKey [fk_contrato_consultoria]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[Contrato]  WITH CHECK ADD  CONSTRAINT [fk_contrato_consultoria] FOREIGN KEY([Codigoconsultoria])
REFERENCES [dbo].[Consultoria] ([Codigoconsultoria])
GO
ALTER TABLE [dbo].[Contrato] CHECK CONSTRAINT [fk_contrato_consultoria]
GO
/****** Object:  ForeignKey [fk_contrato_empresa]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[Contrato]  WITH CHECK ADD  CONSTRAINT [fk_contrato_empresa] FOREIGN KEY([CodigoEmpresa])
REFERENCES [dbo].[EmpresaPersona] ([CodigoEmpresa])
GO
ALTER TABLE [dbo].[Contrato] CHECK CONSTRAINT [fk_contrato_empresa]
GO
/****** Object:  ForeignKey [fk_contrato_bitacora]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[bitacora_contrato]  WITH CHECK ADD  CONSTRAINT [fk_contrato_bitacora] FOREIGN KEY([CodigoContrato])
REFERENCES [dbo].[Contrato] ([CodigoContrato])
GO
ALTER TABLE [dbo].[bitacora_contrato] CHECK CONSTRAINT [fk_contrato_bitacora]
GO
/****** Object:  ForeignKey [fk_subarea_area]    Script Date: 03/01/2017 15:41:54 ******/
ALTER TABLE [dbo].[SubArea]  WITH CHECK ADD  CONSTRAINT [fk_subarea_area] FOREIGN KEY([CodigoArea])
REFERENCES [dbo].[AreaEspecializacion] ([CodigoArea])
GO
ALTER TABLE [dbo].[SubArea] CHECK CONSTRAINT [fk_subarea_area]
GO
/****** Object:  ForeignKey [fk_personal_acceso]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[Personal]  WITH CHECK ADD  CONSTRAINT [fk_personal_acceso] FOREIGN KEY([CodigoAcceso])
REFERENCES [dbo].[Accesos] ([CodigoAcceso])
GO
ALTER TABLE [dbo].[Personal] CHECK CONSTRAINT [fk_personal_acceso]
GO
/****** Object:  ForeignKey [fk_personal_oficina]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[Personal]  WITH CHECK ADD  CONSTRAINT [fk_personal_oficina] FOREIGN KEY([CodigoOficina])
REFERENCES [dbo].[Oficinas] ([CodigoOficina])
GO
ALTER TABLE [dbo].[Personal] CHECK CONSTRAINT [fk_personal_oficina]
GO
/****** Object:  ForeignKey [fk_parametros_criterios]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[ParametrosCriterios]  WITH CHECK ADD  CONSTRAINT [fk_parametros_criterios] FOREIGN KEY([CodigoCriterio])
REFERENCES [dbo].[Criterios] ([CodigoCriterio])
GO
ALTER TABLE [dbo].[ParametrosCriterios] CHECK CONSTRAINT [fk_parametros_criterios]
GO
/****** Object:  ForeignKey [fk_municipio_departamento]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[Municipios]  WITH CHECK ADD  CONSTRAINT [fk_municipio_departamento] FOREIGN KEY([CodigoDepartamento])
REFERENCES [dbo].[Departamentos] ([CodigoDepartamento])
GO
ALTER TABLE [dbo].[Municipios] CHECK CONSTRAINT [fk_municipio_departamento]
GO
/****** Object:  ForeignKey [fk_detalle_personal]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[DetalleAreasPersonal]  WITH CHECK ADD  CONSTRAINT [fk_detalle_personal] FOREIGN KEY([CodigoPersonal])
REFERENCES [dbo].[Personal] ([CodigoPersonal])
GO
ALTER TABLE [dbo].[DetalleAreasPersonal] CHECK CONSTRAINT [fk_detalle_personal]
GO
/****** Object:  ForeignKey [fk_detallePersonal_subarea]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[DetalleAreasPersonal]  WITH CHECK ADD  CONSTRAINT [fk_detallePersonal_subarea] FOREIGN KEY([CodigoSubArea])
REFERENCES [dbo].[SubArea] ([CodigoSubArea])
GO
ALTER TABLE [dbo].[DetalleAreasPersonal] CHECK CONSTRAINT [fk_detallePersonal_subarea]
GO
/****** Object:  ForeignKey [fk_consultoria_persona]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[Consultoria]  WITH CHECK ADD  CONSTRAINT [fk_consultoria_persona] FOREIGN KEY([CodigoPersonal])
REFERENCES [dbo].[Personal] ([CodigoPersonal])
GO
ALTER TABLE [dbo].[Consultoria] CHECK CONSTRAINT [fk_consultoria_persona]
GO
/****** Object:  ForeignKey [fk_empresa_municipio]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[EmpresaPersona]  WITH CHECK ADD  CONSTRAINT [fk_empresa_municipio] FOREIGN KEY([CodigoMunicipio])
REFERENCES [dbo].[Municipios] ([CodigoMunicipio])
GO
ALTER TABLE [dbo].[EmpresaPersona] CHECK CONSTRAINT [fk_empresa_municipio]
GO
/****** Object:  ForeignKey [fk_empresa_pais]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[EmpresaPersona]  WITH CHECK ADD  CONSTRAINT [fk_empresa_pais] FOREIGN KEY([CodigoPais])
REFERENCES [dbo].[Paises] ([CodigoPais])
GO
ALTER TABLE [dbo].[EmpresaPersona] CHECK CONSTRAINT [fk_empresa_pais]
GO
/****** Object:  ForeignKey [fk_zona_consultoria]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[ZonaTrabajo]  WITH CHECK ADD  CONSTRAINT [fk_zona_consultoria] FOREIGN KEY([Codigoconsultoria])
REFERENCES [dbo].[Consultoria] ([Codigoconsultoria])
GO
ALTER TABLE [dbo].[ZonaTrabajo] CHECK CONSTRAINT [fk_zona_consultoria]
GO
/****** Object:  ForeignKey [fk_zona_municipio]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[ZonaTrabajo]  WITH CHECK ADD  CONSTRAINT [fk_zona_municipio] FOREIGN KEY([CodigoMunicipio])
REFERENCES [dbo].[Municipios] ([CodigoMunicipio])
GO
ALTER TABLE [dbo].[ZonaTrabajo] CHECK CONSTRAINT [fk_zona_municipio]
GO
/****** Object:  ForeignKey [fk_detalle_empresa]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[detalleEmpresa]  WITH CHECK ADD  CONSTRAINT [fk_detalle_empresa] FOREIGN KEY([CodigoEmpresa])
REFERENCES [dbo].[EmpresaPersona] ([CodigoEmpresa])
GO
ALTER TABLE [dbo].[detalleEmpresa] CHECK CONSTRAINT [fk_detalle_empresa]
GO
/****** Object:  ForeignKey [fk_detalleEmpresa_subarea]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[detalleEmpresa]  WITH CHECK ADD  CONSTRAINT [fk_detalleEmpresa_subarea] FOREIGN KEY([CodigoSubArea])
REFERENCES [dbo].[SubArea] ([CodigoSubArea])
GO
ALTER TABLE [dbo].[detalleEmpresa] CHECK CONSTRAINT [fk_detalleEmpresa_subarea]
GO
/****** Object:  ForeignKey [fk_comentario_consultoria]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[comentarios]  WITH CHECK ADD  CONSTRAINT [fk_comentario_consultoria] FOREIGN KEY([Codigoconsultoria])
REFERENCES [dbo].[Consultoria] ([Codigoconsultoria])
GO
ALTER TABLE [dbo].[comentarios] CHECK CONSTRAINT [fk_comentario_consultoria]
GO
/****** Object:  ForeignKey [fk_bitacora_producto_viejo]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[BitacoraProductoViejo]  WITH CHECK ADD  CONSTRAINT [fk_bitacora_producto_viejo] FOREIGN KEY([Codigoconsultoria])
REFERENCES [dbo].[Consultoria] ([Codigoconsultoria])
GO
ALTER TABLE [dbo].[BitacoraProductoViejo] CHECK CONSTRAINT [fk_bitacora_producto_viejo]
GO
/****** Object:  ForeignKey [fk_bitacora_producto_nuevocon]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[BitacoraProductoNuevo]  WITH CHECK ADD  CONSTRAINT [fk_bitacora_producto_nuevocon] FOREIGN KEY([Codigoconsultoria])
REFERENCES [dbo].[Consultoria] ([Codigoconsultoria])
GO
ALTER TABLE [dbo].[BitacoraProductoNuevo] CHECK CONSTRAINT [fk_bitacora_producto_nuevocon]
GO
/****** Object:  ForeignKey [fk_pep_consultorias]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[DetalleConsultoriaPep]  WITH CHECK ADD  CONSTRAINT [fk_pep_consultorias] FOREIGN KEY([CodigoConsultoria])
REFERENCES [dbo].[Consultoria] ([Codigoconsultoria])
GO
ALTER TABLE [dbo].[DetalleConsultoriaPep] CHECK CONSTRAINT [fk_pep_consultorias]
GO
/****** Object:  ForeignKey [fk_area_consultoria]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[DetalleConsultoria]  WITH CHECK ADD  CONSTRAINT [fk_area_consultoria] FOREIGN KEY([Codigoconsultoria])
REFERENCES [dbo].[Consultoria] ([Codigoconsultoria])
GO
ALTER TABLE [dbo].[DetalleConsultoria] CHECK CONSTRAINT [fk_area_consultoria]
GO
/****** Object:  ForeignKey [fk_asig_consultoria]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[Asignacion]  WITH CHECK ADD  CONSTRAINT [fk_asig_consultoria] FOREIGN KEY([CodigoConsultoria])
REFERENCES [dbo].[Consultoria] ([Codigoconsultoria])
GO
ALTER TABLE [dbo].[Asignacion] CHECK CONSTRAINT [fk_asig_consultoria]
GO
/****** Object:  ForeignKey [fk_personal_consul_asigna]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[Asignacion]  WITH CHECK ADD  CONSTRAINT [fk_personal_consul_asigna] FOREIGN KEY([CodigoPersonal])
REFERENCES [dbo].[Personal] ([CodigoPersonal])
GO
ALTER TABLE [dbo].[Asignacion] CHECK CONSTRAINT [fk_personal_consul_asigna]
GO
/****** Object:  ForeignKey [fk_eval_ofertas_asigna]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[EvaluacionOfertas]  WITH CHECK ADD  CONSTRAINT [fk_eval_ofertas_asigna] FOREIGN KEY([CodigoAsignacion])
REFERENCES [dbo].[Asignacion] ([CodigoAsignacion])
GO
ALTER TABLE [dbo].[EvaluacionOfertas] CHECK CONSTRAINT [fk_eval_ofertas_asigna]
GO
/****** Object:  ForeignKey [fk_evaloferta_oferta]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[EvaluacionOfertas]  WITH CHECK ADD  CONSTRAINT [fk_evaloferta_oferta] FOREIGN KEY([CodigoOferta])
REFERENCES [dbo].[Ofertas] ([CodigoOferta])
GO
ALTER TABLE [dbo].[EvaluacionOfertas] CHECK CONSTRAINT [fk_evaloferta_oferta]
GO
/****** Object:  ForeignKey [fk_evaloferta_parametro]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[EvaluacionOfertas]  WITH CHECK ADD  CONSTRAINT [fk_evaloferta_parametro] FOREIGN KEY([CodigoParametrosCriterios])
REFERENCES [dbo].[ParametrosCriterios] ([CodigoParametrosCriterios])
GO
ALTER TABLE [dbo].[EvaluacionOfertas] CHECK CONSTRAINT [fk_evaloferta_parametro]
GO
/****** Object:  ForeignKey [fk_producto_consultoria]    Script Date: 03/01/2017 15:41:55 ******/
ALTER TABLE [dbo].[Producto]  WITH CHECK ADD  CONSTRAINT [fk_producto_consultoria] FOREIGN KEY([Codigoconsultoria])
REFERENCES [dbo].[Consultoria] ([Codigoconsultoria])
GO
ALTER TABLE [dbo].[Producto] CHECK CONSTRAINT [fk_producto_consultoria]
GO
