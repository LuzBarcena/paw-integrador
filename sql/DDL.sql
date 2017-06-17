--CREATE USER paobar PASSWORD 'jasluz';

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
	titulo VARCHAR(30) NOT NULL,
	descripcion VARCHAR(140) NOT NULL,
	foto VARCHAR(100) NOT NULL,
	info_contacto VARCHAR(70) NOT NULL,
	ultima_direccion VARCHAR(200) NOT NULL,
 
	PRIMARY KEY(id_perdido),
	CONSTRAINT FK_USUARIO FOREIGN KEY id_usuario REFERENCES USUARIO (id_usuario)
);
