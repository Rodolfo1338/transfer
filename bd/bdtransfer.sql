/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.30-MariaDB : Database - bdtransfer
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdtransfer` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bdtransfer`;

/*Table structure for table `tblalumnos` */

DROP TABLE IF EXISTS `tblalumnos`;

CREATE TABLE `tblalumnos` (
  `vchmatricula` varchar(8) NOT NULL,
  `vchnombre` varchar(30) NOT NULL,
  `vchapp` varchar(30) NOT NULL,
  `vchapm` varchar(30) NOT NULL,
  `chrcuatrimestre` char(2) DEFAULT NULL,
  `chrgrupo` char(1) DEFAULT NULL,
  `vchcurp` varchar(18) DEFAULT NULL,
  `vchdireccion` varchar(60) DEFAULT NULL,
  `vchtelefono` varchar(10) DEFAULT NULL,
  `vchemail` varchar(20) DEFAULT NULL,
  `intidusuario` int(11) DEFAULT NULL,
  `intidcarrera` int(11) DEFAULT NULL,
  PRIMARY KEY (`vchmatricula`),
  UNIQUE KEY `vchmatricula` (`vchmatricula`),
  UNIQUE KEY `vchcurp` (`vchcurp`),
  UNIQUE KEY `vchtelefono` (`vchtelefono`),
  UNIQUE KEY `vchemail` (`vchemail`),
  KEY `intidusuario` (`intidusuario`),
  KEY `intidcarrera` (`intidcarrera`),
  CONSTRAINT `tblalumnos_ibfk_1` FOREIGN KEY (`intidusuario`) REFERENCES `tblusuario` (`intidusuario`),
  CONSTRAINT `tblalumnos_ibfk_2` FOREIGN KEY (`intidcarrera`) REFERENCES `tblcarreras` (`intidcarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblalumnos` */

insert  into `tblalumnos`(`vchmatricula`,`vchnombre`,`vchapp`,`vchapm`,`chrcuatrimestre`,`chrgrupo`,`vchcurp`,`vchdireccion`,`vchtelefono`,`vchemail`,`intidusuario`,`intidcarrera`) values ('20170604','Heymi','Torres','Guzman','10','a','HYTE457632GMNVVR84','Yahualica','5511282911','Torres@gmail.com',1,3),('20171021','Janeth','Bautista','Antonio','10','b','JBTA982345HNSBBR98','Huejutla','7712562341','Jany@gmail.com',3,1),('20171022','Heidy','Ramirez','Nicolas','10','b','HRNC982345HNSBBR98','Huejutla','7712562300','Heidy@gmail.com',5,2),('20171234','Dulce Lorena','Angeles','Hernandez','10','B','DLAH872343gndbre98','Huejutla','5511887341','Dolce@gmail.com',9,2),('20171338','Jorge Rodolfo','Ontiveros','Sanjuan','10','b','IOSJ971031HMCNNR04','Yahualica','7713402983','Rodolfo@gmail.com',2,1),('20173452','Elizabeth','Martinez','Martinez','10','B','ELMM127634GCBNNE95','Huejutla','7722431229','Elizabeth@gmail.com',7,1);

/*Table structure for table `tblcarreras` */

DROP TABLE IF EXISTS `tblcarreras`;

CREATE TABLE `tblcarreras` (
  `intidcarrera` int(11) NOT NULL AUTO_INCREMENT,
  `vchcarrera` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`intidcarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblcarreras` */

insert  into `tblcarreras`(`intidcarrera`,`vchcarrera`) values (1,'Tic'),(2,'Mecanica'),(3,'Agrobiotecnologia');

/*Table structure for table `tblconceptos` */

DROP TABLE IF EXISTS `tblconceptos`;

CREATE TABLE `tblconceptos` (
  `intidconcepto` int(11) NOT NULL AUTO_INCREMENT,
  `vchconcepto` varchar(50) NOT NULL,
  `intcosto` int(11) NOT NULL,
  PRIMARY KEY (`intidconcepto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblconceptos` */

/*Table structure for table `tblconceptospendientes` */

DROP TABLE IF EXISTS `tblconceptospendientes`;

CREATE TABLE `tblconceptospendientes` (
  `intidconceptopendiente` int(11) NOT NULL AUTO_INCREMENT,
  `bolestadoconcepto` tinyint(1) DEFAULT NULL,
  `intidconcepto` int(11) DEFAULT NULL,
  `vchmatricula` varchar(8) DEFAULT NULL,
  `intidmateria` int(11) DEFAULT NULL,
  PRIMARY KEY (`intidconceptopendiente`),
  KEY `intidconcepto` (`intidconcepto`),
  KEY `vchmatricula` (`vchmatricula`),
  KEY `intidmateria` (`intidmateria`),
  CONSTRAINT `tblconceptospendientes_ibfk_1` FOREIGN KEY (`intidconcepto`) REFERENCES `tblconceptos` (`intidconcepto`),
  CONSTRAINT `tblconceptospendientes_ibfk_2` FOREIGN KEY (`vchmatricula`) REFERENCES `tblalumnos` (`vchmatricula`),
  CONSTRAINT `tblconceptospendientes_ibfk_3` FOREIGN KEY (`intidmateria`) REFERENCES `tblmaterias` (`intidmateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblconceptospendientes` */

/*Table structure for table `tblcuentas` */

DROP TABLE IF EXISTS `tblcuentas`;

CREATE TABLE `tblcuentas` (
  `vchidcuenta` varchar(8) DEFAULT NULL,
  `vchfechavencimiento` char(5) DEFAULT NULL,
  `vchcodigoseguridad` char(3) DEFAULT NULL,
  `fltsaldo` float DEFAULT NULL,
  UNIQUE KEY `vchidcuenta` (`vchidcuenta`),
  CONSTRAINT `tblcuentas_ibfk_1` FOREIGN KEY (`vchidcuenta`) REFERENCES `tblalumnos` (`vchmatricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblcuentas` */

/*Table structure for table `tblempledos` */

DROP TABLE IF EXISTS `tblempledos`;

CREATE TABLE `tblempledos` (
  `intidempleado` int(11) NOT NULL AUTO_INCREMENT,
  `vchnombre` varchar(30) NOT NULL,
  `vchapp` varchar(30) NOT NULL,
  `vchapm` varchar(30) NOT NULL,
  `vchrfc` varchar(20) NOT NULL,
  `vchdireccion` varchar(60) DEFAULT NULL,
  `vchpuesto` varchar(30) DEFAULT NULL,
  `intidusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`intidempleado`),
  UNIQUE KEY `vchrfc` (`vchrfc`),
  KEY `intidusuario` (`intidusuario`),
  CONSTRAINT `tblempledos_ibfk_1` FOREIGN KEY (`intidusuario`) REFERENCES `tblusuario` (`intidusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblempledos` */

/*Table structure for table `tblmaterias` */

DROP TABLE IF EXISTS `tblmaterias`;

CREATE TABLE `tblmaterias` (
  `intidmateria` int(11) NOT NULL AUTO_INCREMENT,
  `vchmateria` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`intidmateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblmaterias` */

/*Table structure for table `tblmovimientodetalle` */

DROP TABLE IF EXISTS `tblmovimientodetalle`;

CREATE TABLE `tblmovimientodetalle` (
  `intidmovimientodetalle` int(11) NOT NULL AUTO_INCREMENT,
  `intidconceptopendiente` int(11) DEFAULT NULL,
  `intidmovimiento` int(11) DEFAULT NULL,
  `fltimporte` float DEFAULT NULL,
  `vchfecha` char(5) DEFAULT NULL,
  PRIMARY KEY (`intidmovimientodetalle`),
  KEY `intidconceptopendiente` (`intidconceptopendiente`),
  KEY `intidmovimiento` (`intidmovimiento`),
  CONSTRAINT `tblmovimientodetalle_ibfk_1` FOREIGN KEY (`intidconceptopendiente`) REFERENCES `tblconceptospendientes` (`intidconceptopendiente`),
  CONSTRAINT `tblmovimientodetalle_ibfk_2` FOREIGN KEY (`intidmovimiento`) REFERENCES `tblmovimientos` (`intidmovimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblmovimientodetalle` */

/*Table structure for table `tblmovimientos` */

DROP TABLE IF EXISTS `tblmovimientos`;

CREATE TABLE `tblmovimientos` (
  `intidmovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `vchidcuenta` varchar(8) DEFAULT NULL,
  `intidtiposervicio` int(11) DEFAULT NULL,
  `flttmovimiento` float DEFAULT NULL,
  PRIMARY KEY (`intidmovimiento`),
  KEY `intidtiposervicio` (`intidtiposervicio`),
  KEY `tblmovimientos_ibfk_1` (`vchidcuenta`),
  CONSTRAINT `tblmovimientos_ibfk_1` FOREIGN KEY (`vchidcuenta`) REFERENCES `tblcuentas` (`vchidcuenta`),
  CONSTRAINT `tblmovimientos_ibfk_2` FOREIGN KEY (`intidtiposervicio`) REFERENCES `tbltipo_servicios` (`intidtipo_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblmovimientos` */

/*Table structure for table `tblpersonas` */

DROP TABLE IF EXISTS `tblpersonas`;

CREATE TABLE `tblpersonas` (
  `intidpersona` int(11) NOT NULL AUTO_INCREMENT,
  `vchnombre` varchar(30) NOT NULL,
  `vchapp` varchar(30) NOT NULL,
  `vchapm` varchar(30) NOT NULL,
  `vchdireccion` varchar(50) DEFAULT NULL,
  `vchrfc` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`intidpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblpersonas` */

/*Table structure for table `tblpreguntas` */

DROP TABLE IF EXISTS `tblpreguntas`;

CREATE TABLE `tblpreguntas` (
  `intidpregunta` int(11) NOT NULL AUTO_INCREMENT,
  `vchpregunta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`intidpregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblpreguntas` */

/*Table structure for table `tblrespuestas` */

DROP TABLE IF EXISTS `tblrespuestas`;

CREATE TABLE `tblrespuestas` (
  `intidrespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `vchrespuesta` varchar(50) NOT NULL,
  `intidpregunta` int(11) DEFAULT NULL,
  `intidusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`intidrespuesta`),
  KEY `intidpregunta` (`intidpregunta`),
  KEY `intidusuario` (`intidusuario`),
  CONSTRAINT `tblrespuestas_ibfk_1` FOREIGN KEY (`intidpregunta`) REFERENCES `tblpreguntas` (`intidpregunta`),
  CONSTRAINT `tblrespuestas_ibfk_2` FOREIGN KEY (`intidusuario`) REFERENCES `tblusuario` (`intidusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblrespuestas` */

/*Table structure for table `tblroles` */

DROP TABLE IF EXISTS `tblroles`;

CREATE TABLE `tblroles` (
  `intidrol` int(11) NOT NULL AUTO_INCREMENT,
  `vchrol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`intidrol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblroles` */

insert  into `tblroles`(`intidrol`,`vchrol`) values (1,'Alumno'),(2,'Rector'),(3,'Administrador'),(4,'Cajero');

/*Table structure for table `tbltipo_servicios` */

DROP TABLE IF EXISTS `tbltipo_servicios`;

CREATE TABLE `tbltipo_servicios` (
  `intidtipo_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `vchtipo_servicio` varchar(100) DEFAULT NULL,
  `comision` float NOT NULL,
  `clvservicio` char(10) DEFAULT NULL,
  PRIMARY KEY (`intidtipo_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbltipo_servicios` */

/*Table structure for table `tblusuario` */

DROP TABLE IF EXISTS `tblusuario`;

CREATE TABLE `tblusuario` (
  `intidusuario` int(11) NOT NULL AUTO_INCREMENT,
  `vchusuario` varchar(30) NOT NULL,
  `vchpassword` varchar(30) NOT NULL,
  `intidrol` int(11) DEFAULT NULL,
  PRIMARY KEY (`intidusuario`),
  UNIQUE KEY `vchusuario` (`vchusuario`),
  KEY `intidrol` (`intidrol`),
  CONSTRAINT `tblusuario_ibfk_1` FOREIGN KEY (`intidrol`) REFERENCES `tblroles` (`intidrol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tblusuario` */

insert  into `tblusuario`(`intidusuario`,`vchusuario`,`vchpassword`,`intidrol`) values (1,'Rodo','12345',1),(2,'heymi','12345',1),(3,'jany','12345',1),(5,'Heidy','rousheidy',1),(6,'Gadiel','G1338',1),(7,'Eli','Farmacia78',1),(8,'Andres','novagraf',1),(9,'Dolce','latooo',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
