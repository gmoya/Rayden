
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- alumno
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `alumno`;


CREATE TABLE `alumno`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`legajo` INTEGER,
	`persona_id` INTEGER  NOT NULL,
	`beca` TINYINT default 0,
	`estado` INTEGER(1) default 0 NOT NULL,
	`created_at` DATETIME,
	`created_by_id` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`updated_by_id` INTEGER,
	`deleted_at` DATETIME,
	`deleted_by_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `alumno_FI_1` (`persona_id`),
	CONSTRAINT `alumno_FK_1`
		FOREIGN KEY (`persona_id`)
		REFERENCES `persona` (`id`),
	INDEX `alumno_FI_2` (`created_by_id`),
	CONSTRAINT `alumno_FK_2`
		FOREIGN KEY (`created_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `alumno_FI_3` (`updated_by_id`),
	CONSTRAINT `alumno_FK_3`
		FOREIGN KEY (`updated_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `alumno_FI_4` (`deleted_by_id`),
	CONSTRAINT `alumno_FK_4`
		FOREIGN KEY (`deleted_by_id`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- carrera
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `carrera`;


CREATE TABLE `carrera`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(100)  NOT NULL,
	`descripcion` TEXT  NOT NULL,
	`estado` INTEGER(1) default 0 NOT NULL,
	`observaciones` TEXT,
	`created_at` DATETIME,
	`created_by_id` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`updated_by_id` INTEGER,
	`deleted_at` DATETIME,
	`deleted_by_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `carrera_FI_1` (`created_by_id`),
	CONSTRAINT `carrera_FK_1`
		FOREIGN KEY (`created_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `carrera_FI_2` (`updated_by_id`),
	CONSTRAINT `carrera_FK_2`
		FOREIGN KEY (`updated_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `carrera_FI_3` (`deleted_by_id`),
	CONSTRAINT `carrera_FK_3`
		FOREIGN KEY (`deleted_by_id`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- dato_academico
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `dato_academico`;


CREATE TABLE `dato_academico`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`persona_id` INTEGER  NOT NULL,
	`tipo_titulo_id` INTEGER  NOT NULL,
	`titulo_obtenido` VARCHAR(200)  NOT NULL,
	`establecimiento` VARCHAR(200)  NOT NULL,
	`anio_titulo` INTEGER(4)  NOT NULL,
	`jurisdiccion` VARCHAR(100),
	`titulo_nacionalidad_id` INTEGER  NOT NULL,
	`estatal` TINYINT default 1 NOT NULL,
	`visado` TINYINT default 0,
	`fecha_visado` DATE,
	`observaciones` TEXT,
	`created_at` DATETIME,
	`created_by_id` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`updated_by_id` INTEGER,
	`deleted_at` DATETIME,
	`deleted_by_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `dato_academico_FI_1` (`persona_id`),
	CONSTRAINT `dato_academico_FK_1`
		FOREIGN KEY (`persona_id`)
		REFERENCES `persona` (`id`),
	INDEX `dato_academico_FI_2` (`tipo_titulo_id`),
	CONSTRAINT `dato_academico_FK_2`
		FOREIGN KEY (`tipo_titulo_id`)
		REFERENCES `tipo_titulo` (`id`),
	INDEX `dato_academico_FI_3` (`titulo_nacionalidad_id`),
	CONSTRAINT `dato_academico_FK_3`
		FOREIGN KEY (`titulo_nacionalidad_id`)
		REFERENCES `nacionalidad` (`id`),
	INDEX `dato_academico_FI_4` (`created_by_id`),
	CONSTRAINT `dato_academico_FK_4`
		FOREIGN KEY (`created_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `dato_academico_FI_5` (`updated_by_id`),
	CONSTRAINT `dato_academico_FK_5`
		FOREIGN KEY (`updated_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `dato_academico_FI_6` (`deleted_by_id`),
	CONSTRAINT `dato_academico_FK_6`
		FOREIGN KEY (`deleted_by_id`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- docente
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `docente`;


CREATE TABLE `docente`
(
	`legajo` INTEGER  NOT NULL,
	`estado` INTEGER(1) default 0 NOT NULL,
	`persona_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`created_by_id` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`updated_by_id` INTEGER,
	`deleted_at` DATETIME,
	`deleted_by_id` INTEGER,
	PRIMARY KEY (`legajo`),
	INDEX `docente_FI_1` (`persona_id`),
	CONSTRAINT `docente_FK_1`
		FOREIGN KEY (`persona_id`)
		REFERENCES `persona` (`id`),
	INDEX `docente_FI_2` (`created_by_id`),
	CONSTRAINT `docente_FK_2`
		FOREIGN KEY (`created_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `docente_FI_3` (`updated_by_id`),
	CONSTRAINT `docente_FK_3`
		FOREIGN KEY (`updated_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `docente_FI_4` (`deleted_by_id`),
	CONSTRAINT `docente_FK_4`
		FOREIGN KEY (`deleted_by_id`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- domicilio
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `domicilio`;


CREATE TABLE `domicilio`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`persona_id` INTEGER  NOT NULL,
	`provincia_id` INTEGER  NOT NULL,
	`localidad_id` INTEGER  NOT NULL,
	`telefono` VARCHAR(20),
	`calle` VARCHAR(70),
	`altura` VARCHAR(10),
	`piso` VARCHAR(10),
	`dpto` VARCHAR(5),
	`codigo_postal` VARCHAR(8),
	`escalera` VARCHAR(4),
	`torre` VARCHAR(100),
	`nudo` VARCHAR(100),
	`ala` VARCHAR(10),
	`parcela` VARCHAR(5),
	`entre_calles` VARCHAR(255),
	`created_at` DATETIME,
	`created_by_id` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`updated_by_id` INTEGER,
	`deleted_at` DATETIME,
	`deleted_by_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `domicilio_FI_1` (`persona_id`),
	CONSTRAINT `domicilio_FK_1`
		FOREIGN KEY (`persona_id`)
		REFERENCES `persona` (`id`),
	INDEX `domicilio_FI_2` (`provincia_id`),
	CONSTRAINT `domicilio_FK_2`
		FOREIGN KEY (`provincia_id`)
		REFERENCES `provincia` (`id`),
	INDEX `domicilio_FI_3` (`localidad_id`),
	CONSTRAINT `domicilio_FK_3`
		FOREIGN KEY (`localidad_id`)
		REFERENCES `localidad` (`id`),
	INDEX `domicilio_FI_4` (`created_by_id`),
	CONSTRAINT `domicilio_FK_4`
		FOREIGN KEY (`created_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `domicilio_FI_5` (`updated_by_id`),
	CONSTRAINT `domicilio_FK_5`
		FOREIGN KEY (`updated_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `domicilio_FI_6` (`deleted_by_id`),
	CONSTRAINT `domicilio_FK_6`
		FOREIGN KEY (`deleted_by_id`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- estado_civil
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `estado_civil`;


CREATE TABLE `estado_civil`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(10)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- empleo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `empleo`;


CREATE TABLE `empleo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`persona_id` INTEGER  NOT NULL,
	`tipo_empleo_id` INTEGER  NOT NULL,
	`cuit` INTEGER(11),
	`fecha_inicio` DATE  NOT NULL,
	`fecha_fin` DATE,
	`cargo` VARCHAR(50),
	`lugar_trabajo` VARCHAR(100),
	`telefono` VARCHAR(20),
	`created_at` DATETIME,
	`created_by_id` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`updated_by_id` INTEGER,
	`deleted_at` DATETIME,
	`deleted_by_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `empleo_FI_1` (`persona_id`),
	CONSTRAINT `empleo_FK_1`
		FOREIGN KEY (`persona_id`)
		REFERENCES `persona` (`id`),
	INDEX `empleo_FI_2` (`tipo_empleo_id`),
	CONSTRAINT `empleo_FK_2`
		FOREIGN KEY (`tipo_empleo_id`)
		REFERENCES `tipo_empleo` (`id`),
	INDEX `empleo_FI_3` (`created_by_id`),
	CONSTRAINT `empleo_FK_3`
		FOREIGN KEY (`created_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `empleo_FI_4` (`updated_by_id`),
	CONSTRAINT `empleo_FK_4`
		FOREIGN KEY (`updated_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `empleo_FI_5` (`deleted_by_id`),
	CONSTRAINT `empleo_FK_5`
		FOREIGN KEY (`deleted_by_id`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- localidad
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `localidad`;


CREATE TABLE `localidad`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(250)  NOT NULL,
	`cp` VARCHAR(8),
	`provincia_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `localidad_FI_1` (`provincia_id`),
	CONSTRAINT `localidad_FK_1`
		FOREIGN KEY (`provincia_id`)
		REFERENCES `provincia` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- materia
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `materia`;


CREATE TABLE `materia`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`carrera_id` INTEGER,
	`nombre` VARCHAR(50),
	`descripcion` VARCHAR(250),
	PRIMARY KEY (`id`),
	INDEX `materia_FI_1` (`carrera_id`),
	CONSTRAINT `materia_FK_1`
		FOREIGN KEY (`carrera_id`)
		REFERENCES `carrera` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- nacionalidad
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `nacionalidad`;


CREATE TABLE `nacionalidad`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(100),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- persona
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `persona`;


CREATE TABLE `persona`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(50),
	`apellido` VARCHAR(50),
	`tipo_documento_id` INTEGER,
	`nro_documento` INTEGER(14),
	`sexo_id` INTEGER,
	`celular` VARCHAR(20),
	`email` VARCHAR(50),
	`nacionalidad_id` INTEGER,
	`estado_civil_id` INTEGER,
	`fecha_nacimiento` DATE,
	`lugar_nacimiento` VARCHAR(50),
	`observaciones` TEXT,
	`created_at` DATETIME,
	`created_by_id` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`updated_by_id` INTEGER,
	`deleted_at` DATETIME,
	`deleted_by_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `persona_FI_1` (`tipo_documento_id`),
	CONSTRAINT `persona_FK_1`
		FOREIGN KEY (`tipo_documento_id`)
		REFERENCES `tipo_documento` (`id`),
	INDEX `persona_FI_2` (`sexo_id`),
	CONSTRAINT `persona_FK_2`
		FOREIGN KEY (`sexo_id`)
		REFERENCES `tipo_sexo` (`id`),
	INDEX `persona_FI_3` (`nacionalidad_id`),
	CONSTRAINT `persona_FK_3`
		FOREIGN KEY (`nacionalidad_id`)
		REFERENCES `nacionalidad` (`id`),
	INDEX `persona_FI_4` (`estado_civil_id`),
	CONSTRAINT `persona_FK_4`
		FOREIGN KEY (`estado_civil_id`)
		REFERENCES `estado_civil` (`id`),
	INDEX `persona_FI_5` (`created_by_id`),
	CONSTRAINT `persona_FK_5`
		FOREIGN KEY (`created_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `persona_FI_6` (`updated_by_id`),
	CONSTRAINT `persona_FK_6`
		FOREIGN KEY (`updated_by_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `persona_FI_7` (`deleted_by_id`),
	CONSTRAINT `persona_FK_7`
		FOREIGN KEY (`deleted_by_id`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- provincia
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `provincia`;


CREATE TABLE `provincia`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(50)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipo_documento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_documento`;


CREATE TABLE `tipo_documento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(5)  NOT NULL,
	`descripcion` VARCHAR(35)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipo_empleo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_empleo`;


CREATE TABLE `tipo_empleo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(100)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipo_sexo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_sexo`;


CREATE TABLE `tipo_sexo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(1)  NOT NULL,
	`descripcion` VARCHAR(10)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipo_titulo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_titulo`;


CREATE TABLE `tipo_titulo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(100)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
