-- creacion de la estructura de la sede.
DROP TABLE IF EXISTS sede;
CREATE TABLE sede (
    id_sede int AUTO_INCREMENT NOT NULL,
    n_sede VARCHAR (50) NOT NULL,
    borrar int(2) NOT NULL,
    PRIMARY KEY(id_sede)
   
    
);
DROP TABLE IF EXISTS bloque;
CREATE TABLE bloque (
    id_bloque int AUTO_INCREMENT NOT NULL,
    n_bloque varchar (30) NOT NULL,
    id_sede int NOT NULL,
    borrar int NOT NULL,
    PRIMARY KEY (id_bloque)
);
DROP TABLE IF EXISTS piso;
CREATE TABLE piso (
    id_piso int AUTO_INCREMENT NOT NULL,
    n_piso varchar (30) NOT NULL,
    id_bloque int NOT NULL,
    borrar int NOT NULL,
    PRIMARY KEY(id_piso)
);
DROP TABLE IF EXISTS ambiente;
CREATE TABLE ambiente(
    id_ambiente int AUTO_INCREMENT NOT NULL,
    n_ambiente VARCHAR (50) NOT NULL,
    id_piso int NOT NULL,
    borrar int NOT NULL,
    PRIMARY KEY(id_ambiente)
);

DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario(
    id INT(11) NOT NULL AUTO_INCREMENT,
    clave VARCHAR(10) NOT NULL,
    correo VARCHAR(30) NOT NULL,
    nombre_usuario VARCHAR(20) NOT NULL,
    PRIMARY KEY(id)
);

DROP TABLE IF EXISTS cargue;
CREATE TABLE cargue (
    id_cargue int(11) NOT NULL AUTO_INCREMENT,
    TIPO_FORMACION varchar(20) DEFAULT NULL COLLATE utf8_unicode_ci,
    FICHA int(11) DEFAULT NULL,
    FASE_PROYECTO varchar(20) DEFAULT NULL COLLATE utf8_unicode_ci,
    PRODUCTO_FASE varchar(100) DEFAULT NULL COLLATE utf8_unicode_ci,
    ID_COMPETENCIA int(11) DEFAULT NULL,
    ID_rap int(11) DEFAULT NULL,
    FECHA_INICIO date DEFAULT NULL,
    FECHA_FIN date DEFAULT NULL,
    INSTRUCTOR varchar(50) DEFAULT NULL COLLATE utf8_unicode_ci,
    PERFIL_INSTRUCTOR varchar(50) DEFAULT NULL COLLATE utf8_unicode_ci,
    bloque varchar(50) DEFAULT NULL COLLATE utf8_unicode_ci,
    sede varchar(50) DEFAULT NULL COLLATE utf8_unicode_ci,
    piso varchar(50) DEFAULT NULL COLLATE utf8_unicode_ci,
    ambiente varchar(50) DEFAULT NULL COLLATE utf8_unicode_ci,
    HORA_NICIO time DEFAULT NULL,
    HORA_FIN time DEFAULT NULL,
    LUN varchar(20) DEFAULT NULL,
    MAR varchar(20) DEFAULT NULL,
    MIE varchar(20) DEFAULT NULL,
    JUE varchar(20) DEFAULT NULL,
    VIE varchar(20) DEFAULT NULL,
    SAB varchar(20) DEFAULT NULL,
    DOM varchar(20) DEFAULT NULL,
    PRIMARY KEY (id_cargue)
);
DROP TABLE IF EXISTS prog_comp;
CREATE TABLE prog_comp (
    id_competencia int(11) NOT NULL,
    ficha int(11) NOT NULL,
    PRIMARY KEY (id_competencia, ficha)
);

-- creacion de las relaciones de las tablas anteriores.
ALTER TABLE bloque
    ADD CONSTRAINT bloque FOREIGN KEY (id_sede) 
    REFERENCES sede (id_sede) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE piso
    ADD CONSTRAINT piso FOREIGN KEY (id_bloque) 
    REFERENCES bloque (id_bloque) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ambiente
    ADD CONSTRAINT ambiente FOREIGN KEY (id_piso) 
    REFERENCES piso (id_piso) ON DELETE CASCADE ON UPDATE CASCADE;

-- creacion de la estructura de los programas.
DROP TABLE IF EXISTS programas;
CREATE TABLE programas(
    ficha int(15) NOT NULL,
    n_programa VARCHAR (50) NOT NULL,
    cantidad_aprendizes int(5) NULL,
    id_nivel INT  NULL,
    borrar int (2) NULL,
    id_formacion int (50),
    PRIMARY KEY(ficha)
);

DROP TABLE IF EXISTS nivel;
CREATE TABLE nivel(
    id_nivel INT AUTO_INCREMENT NOT NULL,
    n_nivel varchar (30) NOT NULL,
    PRIMARY KEY(id_nivel)
);

-- creacion de las relaciones de las tablas de programas

ALTER TABLE programas
    ADD CONSTRAINT programas1 FOREIGN KEY (id_nivel) 
    REFERENCES nivel(id_nivel) ON DELETE CASCADE ON UPDATE CASCADE;
    

-- creacion de la estructura de instructores
DROP TABLE IF EXISTS instructores;
CREATE TABLE instructores(
    documento int (15) NOT NULL,
    n_instructor varchar (50) NOT NULL,
    borrar int(2) NULL,
    id_profesiones int (11) NULL,
    PRIMARY KEY(documento)
);

DROP TABLE IF EXISTS resultado_aprenizaje;
CREATE TABLE resultado_aprenizaje(
    id_competencia int(11) NOT NULL,
    id_resultado int(11) NOT NULL,
    resultado_aprenizaje varchar(500) NULL ,
    PRIMARY KEY (id_resultado)
    
);

-- creando la relacion entre los instructores y los programas
DROP TABLE IF EXISTS prog_inst;
create TABLE prog_inst(
    ficha int(15) NOT NULL,
    documento int(15) NOT NULL,
    PRIMARY KEY(ficha, documento)
);
-- creacion de la relacion del programa y de los instructores
ALTER TABLE prog_inst
    ADD CONSTRAINT prog_inst FOREIGN KEY (`documento`) 
    REFERENCES instructores (`documento`) ON DELETE CASCADE ON UPDATE CASCADE,   
    ADD CONSTRAINT prog_inst1 FOREIGN KEY (ficha) 
    REFERENCES programas (ficha) ON DELETE CASCADE ON UPDATE CASCADE;

-- creacion de la tabla de prestamo de ambientes
DROP TABLE IF EXISTS prestamo_ambientes;
CREATE TABLE prestamo_ambientes(
    id_prestamo int AUTO_INCREMENT;
    fecha_registro timestamp NOT NULL, 
    id_ambiente int(11)  NULL,
    fecha_inicio date NOT NULL,
    fecha_fin date NOT NULL,
    hora_inicio time NOT NULL,
    hora_fin time NOT NULL,
    ficha int(11) NOT NULL,
    documento int(15) NOT NULL,
    lunes int(2) NOT NULL,
    martes int(2) NOT NULL,
    miercoles int(2) NOT NULL,
    jueves int(2) NOT NULL,
    viernes int(2) NOT NULL,
    sabado int(2) NOT NULL,
    domingo int(2) NOT NULL,
    id_competencia int(11)  NULL,
    id_producto int(11)  NULL,
    id_resultado int(11)  NULL,
    id_fase int(11)  NULL,
    PRIMARY KEY(id_prestamo)
);


DROP TABLE IF EXISTS profesiones;
CREATE TABLE profesiones(
    n_profesiones varchar (50) NOT NULL,
    id_profesiones int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY key (id_profesiones)

);

DROP TABLE IF EXISTS tipo_formacion;
CREATE table tipo_formacion 

(
    
t_formacion varchar (50),
id_formacion int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (id_formacion)

);

DROP TABLE IF EXISTS fase;
CREATE TABLE fase (
    fase_proyecto varchar(70) NOT NULL,
    id_fase int(11) NOT NULL,
    PRIMARY KEY(id_fase)
);

DROP TABLE IF EXISTS producto_fase;
CREATE TABLE producto_fase (
    producto varchar(100) COLLATE utf8_unicode_ci NOT NULL,
    id_producto int(11) NOT NULL,
    PRIMARY KEY (id_producto)
);

CREATE TABLE competencicas (
    id_competencia int(11) NOT NULL,
    competencia varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY(id_competencia)
);

alter table instructores 
ADD CONSTRAINT instructores FOREIGN KEY (id_profesiones) 
REFERENCES profesiones (id_profesiones) ON DELETE CASCADE ON UPDATE CASCADE;

-- creacion de la relacion de la tabla prestamo_ambientes con la tabla ambiente
ALTER TABLE prestamo_ambientes
    ADD CONSTRAINT prestamo_4 FOREIGN KEY (id_ambiente) 
    REFERENCES ambiente (id_ambiente) ON DELETE CASCADE ON UPDATE CASCADE,
    -- creacion de la relacion de la tabla prestamo_ambientes con la tabla programa
    ADD CONSTRAINT prestamo_5 FOREIGN KEY (ficha) 
    REFERENCES programas (ficha) ON DELETE CASCADE ON UPDATE CASCADE,
    
 ADD CONSTRAINT prestamo_ambientes_ibfk_1 FOREIGN KEY (documento) 
 REFERENCES instructores (documento) ON DELETE CASCADE ON UPDATE CASCADE,


    ADD CONSTRAINT prestamo_ambientes_ibfk_4 FOREIGN KEY (id_resultado) 
    REFERENCES resultado_aprenizaje (id_resultado) ON DELETE CASCADE ON UPDATE CASCADE,

    ADD CONSTRAINT prestamo_ambientes_ibfk_5 FOREIGN KEY (id_producto) 
    REFERENCES producto_fase (id_producto) ON DELETE CASCADE ON UPDATE CASCADE,

        ADD CONSTRAINT prestamo_ambientes_ibfk_2 FOREIGN KEY (id_fase) 
    REFERENCES fase (id_fase) ON DELETE CASCADE ON UPDATE CASCADE,
    
     ADD CONSTRAINT prestamo_ambientes_ibfk_3 FOREIGN KEY (id_competencia) 
    REFERENCES competencicas (id_competencia) ON DELETE CASCADE ON UPDATE CASCADE;

alter table programas 
ADD CONSTRAINT programas FOREIGN KEY (t_formacion) 
REFERENCES tipo_formacion (t_formacion) ON DELETE CASCADE ON UPDATE CASCADE





    DELIMITER //
CREATE PROCEDURE disponibilidad2 (
        IN fecha DATE,
    IN fecha_f DATE,
    IN hi TIME,
    IN hf TIME,
    IN a INT,
    IN l INT(2),
    IN ma INT(2),
    IN mi INT(2),
    IN j INT(2),
    IN v INT(2),
    IN s INT(2),
    IN d INT(2)
) BEGIN
    SELECT * FROM prestamo_ambientes WHERE (
        (
            
            fecha BETWEEN fecha_inicio AND fecha_fin OR
            fecha_f BETWEEN fecha_inicio AND fecha_fin OR
            fecha_inicio BETWEEN fecha AND fecha_f)
        AND(
            hi BETWEEN hora_inicio AND hora_fin OR
            hf BETWEEN hora_inicio AND hora_fin OR
            hora_inicio BETWEEN hi AND hf)
        )
         AND a = id_ambiente
    AND (
        l = lunes
        AND ma = martes
        AND mi = miercoles
        AND j = jueves
        AND v = viernes
        AND s = domingo
        AND d = domingo
    );
        END //
DELIMITER ;

DELIMITER //
 CREATE TRIGGER  insertar
AFTER
INSERT
    ON cargue FOR EACH ROW
INSERT INTO
    prestamo_ambientes(
        fecha_registro,
        id_ambiente,
        fecha_inicio,
        fecha_fin,
        hora_inicio,
        hora_fin,
        ficha,
        documento,
        lunes,
        martes,
        miercoles,
        jueves,
        viernes,
        sabado,
        domingo,
        id_competencia,
        id_producto,
        id_resultado,
        id_fase
    )
VALUES
    (
        null,
        (
            SELECT
                id_ambiente
            FROM
                ambiente
                INNER JOIN piso ON piso.id_piso = ambiente.id_piso
                INNER JOIN bloque ON bloque.id_bloque = piso.id_bloque
                INNER JOIN sede ON sede.id_sede = bloque.id_sede
            WHERE
                n_ambiente = new.ambiente
                AND n_piso = new.piso
                AND n_bloque = new.bloque
                AND n_sede = new.sede
        ),
        new.FECHA_INICIO,
        new.FECHA_FIN,
        new.HORA_NICIO,
        new.HORA_FIN,
        new.FICHA,
        (
            SELECT
                documento
            FROM
                instructores
            WHERE
                n_instructor = new.INSTRUCTOR
        ),
        new.LUN,
        new.MAR,
        new.MIE,
        new.JUE,
        new.VIE,
        new.SAB,
        new.DOM,
        new.ID_COMPETENCIA,
        (
            SELECT
                id_producto
            FROM
                producto_fase
            WHERE
                producto = new.PRODUCTO_FASE
        ),
        new.ID_rap,
        (
            SELECT
                id_fase
            FROM
                fase
            WHERE
                fase_proyecto = new.FASE_PROYECTO
        )
    ) 
    
    //
    DELIMITER;



