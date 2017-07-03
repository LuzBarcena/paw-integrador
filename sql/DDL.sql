--CREATE USER paobar PASSWORD 'jasluz';

--ORDEN DE DROPS
--DROP TABLE PERRO_REFERENCIA;
--DROP TABLE PERRO;
--DROP TABLE RAZA;
--DROP TABLE REFERENCIA;
--DROP TABLE PERDIDO;

--ORDEN DE OWNER
--ALTER TABLE USUARIO OWNER TO PAOBAR;
--ALTER TABLE PERRO_REFERENCIA OWNER TO PAOBAR;
--ALTER TABLE PERRO OWNER TO PAOBAR;
--ALTER TABLE RAZA OWNER TO PAOBAR;
--ALTER TABLE REFERENCIA OWNER TO PAOBAR;
--ALTER TABLE PERDIDO OWNER TO PAOBAR;

CREATE TYPE ESTADO_PERDIDO AS ENUM ('perdido','encontrado');
CREATE TYPE SEXO_PERRO AS ENUM ('macho','hembra', 'desconocido');
CREATE TYPE EDAD_PERRO AS ENUM ('cachorro', 'adulto_joven', 'adulto', 'viejito');
CREATE TYPE TAMANIO_PERRO AS ENUM ('chico','mediano','grande');

CREATE TABLE usuario (
	id_usuario serial NOT NULL,
	nombre character varying(50) NOT NULL,
	apellido character varying(50) NOT NULL,
	fecha_de_nacimiento date NOT NULL,
	nombre_usuario character varying(30) NOT NULL,
	email character varying(50) NOT NULL,
	contrasenia character varying(80) NOT NULL,
	perfil character varying(15) NOT NULL,
	
	CONSTRAINT pk_id_usuario PRIMARY KEY (id_usuario),
	CONSTRAINT unique_mail UNIQUE (email),
	CONSTRAINT unique_nombre_usuario UNIQUE (nombre_usuario)
)

CREATE TABLE PERDIDO (
	id_perdido SERIAL NOT NULL,
	id_usuario INTEGER NOT NULL,
	fecha_desaparicion DATE,
	fecha_alta DATE NOT NULL, 
	titulo VARCHAR(50) NOT NULL,
	descripcion VARCHAR(250) NOT NULL,
	foto VARCHAR(150) NOT NULL,
	estado ESTADO_PERDIDO NOT NULL, --PERDIDO, ENCONTRADO
	sexo SEXO_PERRO, --MACHO, HEMBRA, DESCONOCIDO
	nombre varchar(50),
	--info_contacto VARCHAR(100) NOT NULL,
	direccion VARCHAR(200), 
	lat NUMERIC NOT NULL,
	lng NUMERIC NOT NULL,
 
	PRIMARY KEY(id_perdido),
	CONSTRAINT FK_USUARIO_PERDIDO FOREIGN KEY (id_usuario) REFERENCES USUARIO (id_usuario)
);

CREATE TABLE REFERENCIA (
	id_referencia SERIAL NOT NULL PRIMARY KEY,
	nombre VARCHAR(30),
	imagen VARCHAR(30)
);

CREATE TABLE RAZA (
	id_raza SERIAL NOT NULL PRIMARY KEY,
	nombre VARCHAR(30)
);

CREATE TABLE PERRO (
	id_perro SERIAL NOT NULL PRIMARY KEY,
	foto VARCHAR(150) NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	edad EDAD_PERRO,
	sexo SEXO_PERRO,
	particularidad VARCHAR(200),
	tamanio TAMANIO_PERRO NOT NULL,
	peso FLOAT,
	id_raza INTEGER NOT NULL,
	id_adoptante INTEGER,
	id_apadrinante INTEGER,

	CONSTRAINT FK_APADRINANTE FOREIGN KEY (id_apadrinante) REFERENCES USUARIO (id_usuario),
	CONSTRAINT FK_ADOPTANTE FOREIGN KEY (id_adoptante) REFERENCES USUARIO (id_usuario),
	CONSTRAINT FK_RAZA_PERRO FOREIGN KEY (id_raza) REFERENCES RAZA (id_raza)
);

CREATE TABLE PERRO_REFERENCIA (
	id_perro INTEGER NOT NULL,
	id_referencia INTEGER NOT NULL,
	CONSTRAINT pk_perro_referencia PRIMARY KEY (id_perro, id_referencia),
	CONSTRAINT FK_PERRO FOREIGN KEY (id_perro) REFERENCES perro (id_perro),
	CONSTRAINT FK_REFERENCIA FOREIGN KEY (id_referencia) REFERENCES referencia (id_referencia)
);
