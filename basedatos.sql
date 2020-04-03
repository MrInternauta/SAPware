-- -----------------------------------------------------
-- Schema sapware
-- -----------------------------------------------------
-- DROP DATABASE sapware;
-- -----------------------------------------------------
-- Schema sapware
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `sapware` DEFAULT CHARACTER SET utf8 ;
USE `sapware` ;

-- -----------------------------------------------------
-- Table `sapware`.`usuario`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `correo` (`correo` ASC));

-- -----------------------------------------------------
-- Table `sapware`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sapware`.`rol` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

-- -----------------------------------------------------
-- Table `sapware`.`Proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sapware`.`Proyecto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `img` VARCHAR(100) NULL,
  `color` VARCHAR(45) NULL,
  `estado` FLOAT NOT NULL,
  `privacidad` TINYINT NOT NULL DEFAULT 0,
  `fecha_inicio` DATETIME NOT NULL,
  PRIMARY KEY (`id`));

-- -----------------------------------------------------
-- Table `sapware`.`actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sapware`.`actividad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `dias` VARCHAR(45) NULL,
  `nivel` VARCHAR(45) NULL,
  `dependencia` VARCHAR(45) NULL,
  `proceso` VARCHAR(45) NULL,
  `Proyecto_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_actividad_Proyecto1_idx` (`Proyecto_id` ASC),
  CONSTRAINT `fk_actividad_Proyecto1`
    FOREIGN KEY (`Proyecto_id`)
    REFERENCES `sapware`.`Proyecto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table `sapware`.`participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sapware`.`participante` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `rol_id` INT NOT NULL,
  `Proyecto_id` INT NOT NULL,
  `actividad_id` INT NOT NULL,
  INDEX `fk_participante_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_participante_rol1_idx` (`rol_id` ASC),
  INDEX `fk_participante_Proyecto1_idx` (`Proyecto_id` ASC),
  INDEX `fk_participante_actividad1_idx` (`actividad_id` ASC),
  CONSTRAINT `fk_participante_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `sapware`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_participante_rol1`
    FOREIGN KEY (`rol_id`)
    REFERENCES `sapware`.`rol` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_participante_Proyecto1`
    FOREIGN KEY (`Proyecto_id`)
    REFERENCES `sapware`.`Proyecto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
  -- CONSTRAINT `fk_participante_actividad1`
  --   FOREIGN KEY (`actividad_id`)
  --   REFERENCES `sapware`.`actividad` (`id`)
  --   ON DELETE NO ACTION
  --   ON UPDATE NO ACTION
    
    );
    
-- -----------------------------------------------------
-- Table `sapware`.`solicitud`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sapware`.`solicitud` (
  `id_proyecto` INT NOT NULL ,
  `id_usuario` INT NOT NULL,
  `estado` TINYINT NOT NULL DEFAULT 0,
  `usuario_id` INT NOT NULL,
  INDEX `fk_solicitud_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_solicitud_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `sapware`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table `sapware`.`notificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sapware`.`notificacion` (
  `id` INT NOT NULL ,
  `descripcion` VARCHAR(45) NULL,
  `usuario_id` INT NOT NULL,
  `actividad_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_notificacion_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_notificacion_actividad1_idx` (`actividad_id` ASC),
  CONSTRAINT `fk_notificacion_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `sapware`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificacion_actividad1`
    FOREIGN KEY (`actividad_id`)
    REFERENCES `sapware`.`actividad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
  
INSERT INTO rol VALUES 
	(1, 'Administrador'),
	(2, 'Lider de Proyecto'),
	(3, 'Desarrollador');
	
INSERT INTO usuario VALUES 
	(1, 'Magdiel Omar Mercado', 'Magdiel@gmail.com', 'magdiel123'),
	(2, 'Luis Antonio Morales', 'Antonio@gmail.com', 'antonio123'),
	(3, 'Felipe de Jesus Ramires', 'Felipe@gmail.com', 'Felipe123'),
	(4, 'Luis Aguirre Fuentes', 'Aguirre@gmail.com', 'Aguirre123'),
	(5, 'Zurisaday Lopez', 'Zurisaday@gmail.com', 'Zurisaday123'),
	(6, 'Luis Rene Mijangos', 'Rene@gmail.com', 'Rene123'),
	(7, 'Maria Teresa de la Luz', 'Teresa@gmail.com', 'Teresa123'),
	(8, 'Maria Karen Cortes', 'Karen@gmail.com', 'Karen123'),
	(9, 'Jorge Octavio Ocharan', 'Octavio@gmail.com', 'Octavio123'),
	(10, 'Luis Octavio Montane', 'Montane@gmail.com', 'Montane123'),
	(11, 'Eric Schmidt', 'Schmidt@gmail.com', 'Schmidt123'),
	(12, 'Steve Jobs', 'Jobs@gmail.com', 'Jobs123'),
	(13, 'Bram Cohen', 'Cohen@gmail.com', 'Cohen123'),
	(14, 'Mike Morhaime', 'Morhaime@gmail.com', 'Morhaime123'),
	(15, 'Jimmy Wales', 'Wales@gmail.com', 'Wales123'),
	(16, 'Peter Levinsohn', 'Levinsohn@gmail.com', 'Levinsohn123'),
	(17, 'Marissa Mayer', 'Mayer@gmail.com', 'Mayer123'),
	(18, 'Chad Hurley', 'Hurley@gmail.com', 'Hurley123'),
	(19, 'Albert Einstein', 'Einstein@gmail.com', 'Einstein123'),
	(20, 'Nicolás Copérnico', 'Copernico@gmail.com', 'Copernico123');

INSERT INTO Proyecto VALUES
	(1, 'Iconix', 'Ruta', '', '0', '1', '2019-01-08 13:17:17'),
	(2, 'Cinepolis', 'Ruta', '', '0', '1', '2019-01-01 16:17:10'),
	(3, 'ADO', 'Ruta', '', '0', '1', '2019-01-05 12:27:57'),
	(4, 'Anglo', 'Ruta', '', '0', '1', '2019-01-08 18:18:45'),
	(5, 'Olimpiadas', 'Ruta', '', '0', '0', '2019-01-10 06:38:32');
	

