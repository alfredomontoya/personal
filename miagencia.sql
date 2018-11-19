-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: miagencia
-- ------------------------------------------------------
-- Server version	5.5.24-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nitci_cli` varchar(16) NOT NULL,
  `nombre_cli` varchar(64) NOT NULL,
  `direccion_cli` varchar(128) NOT NULL,
  `telefono_cli` varchar(32) DEFAULT NULL,
  `estado_cli` varchar(2) DEFAULT NULL,
  `correo_cli` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'101000','DANIEL MONTOYA CALDERON','BARRIO EL PANTANAL','13654','AC','correo@gmail.com'),(2,'101100','NELFI ARANDIAA','PLAN 3000','65465 ','AC','correo@gmail.com'),(3,'102100','LUCAS','PLAN 3000','65465 ','AC','correo@gmail.com'),(4,'103100','MARCO ANTONIO SOLIZ','PANTANAL','987','AC','correo@gmail.com'),(5,'104000','DYLAN','PLAN 3000','9879','AC','correo@gmail.com'),(6,'105100','OLIVIA MONTOYA','EL FUERTE','98794','AC','correo@gmail.com'),(7,'106200','NOEMI MONTOYA','EL FUERTE','95646','AC','correo@gmail.com'),(8,'106300','SAMUEL MONTOYA','PANTANAL','9987946','AC','correo@gmail.com'),(9,'107400','CRISTIAN PIZARROSO','ASDFASD','64654','AC','correo@gmail.com'),(10,'107500','ALFREDO MONTOYA CALDERON','PLAN 4000','124234','AC','correo@gmail.com'),(11,'107600','NELSON MONTOYA GUZMAN','PANTANAL','200912384','AC','correo@gmail.com'),(12,'107700','JHOEL ALFREDO MONTOYA ARANDIA','PLAN 4000','200912384','AC','correo@gmail.com'),(13,'107800','MIGUEL PEREZ','LAS AMERICAS','123654','AC','correo@gmail.com'),(14,'109800','MIGUEL PEREZ','LAS AMERICAS','123654','AC','correo@gmail.com'),(15,'110000','MIGUEL PEREZ','LAS AMERICAS','123654','AC','correo@gmail.com'),(16,'110100','CRISTIAN MARCELO PIZARROSO PEREDO','ASKLDFJ LKJ','65465','AC','correo@gmail.com'),(17,'11111','GERARDO SERGIO DIMOFF','TERCER ANILLO','79654654','AC','correo@gmail.com'),(18,'300100','PEPITO PERES','SIN DIRECCION','79654654','AC','correo@gmail.com'),(19,'300101','CHAPULIN COLORADO','SIN DIRECCION ','321','AC','correo@gmail.com'),(20,'300102','CHILINDRINA','SIN DIRECCION','321','1','correo@gmail.com'),(21,'300103','KIKO','SIN DIRECCION ','321','2','correo@gmail.com'),(22,'300104','GODINEZ','ASDF','321','IN','correo@gmail.com'),(23,'300104','RAMON','ASDFASDF','321','PE','correo@gmail.com'),(24,'151515','ENRIQUE BURTON','SIN DIRECCION','321','IN','correo@gmail.com'),(25,'161616','JOSE MARIA','CON DIRECCION','321','IN','correo@gmail.com'),(26,'101010','ENRIQUE BURTON','SIN CASA','321','AC','correo@gmail.com'),(27,'111111','JOSE MARIA','CIB CASA','321','AC','correo@gmail.com'),(28,'300105','ENRIQUE BURTON','SIN DIRECCION','654654','AC','correo@gmail.com'),(29,'300106','JOSE MARIA','CON DIRECCION','654878','AC','correo@gmail.com'),(30,'300106','POLLO1','SIN CASA','654654','AC','correo@gmail.com'),(31,'300107','POLLO2','CON CASA','9876545','AC','correo@gmail.com'),(32,'300108','ALFREDO1','SIN DIRECCION','4654654','AC','correo@gmail.com'),(33,'300109','ALFREDO2','SIN DIRECCION ','9875465','AC','correo@gmail.com');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalledocumento`
--

DROP TABLE IF EXISTS `detalledocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalledocumento` (
  `id_detalledocumento` int(11) NOT NULL AUTO_INCREMENT,
  `id_tramite_dd` int(11) NOT NULL,
  `id_documento_dd` int(11) NOT NULL,
  `numero_dd` varchar(32) NOT NULL,
  `fechadocumento_dd` date NOT NULL,
  `cantidad_dd` int(11) NOT NULL,
  `orignal_dd` varchar(1) NOT NULL,
  `copia_dd` varchar(1) NOT NULL,
  `legalizado_dd` varchar(1) NOT NULL,
  `fotocopia_dd` varchar(1) NOT NULL,
  `estado_dd` varchar(2) NOT NULL,
  PRIMARY KEY (`id_detalledocumento`),
  KEY `fk_detalledocumento_id_tramite_dd` (`id_tramite_dd`),
  KEY `fk_detalledocumento_id_documento_dd` (`id_documento_dd`),
  CONSTRAINT `fk_detalledocumento_id_documento_dd` FOREIGN KEY (`id_documento_dd`) REFERENCES `documento` (`id_documento`),
  CONSTRAINT `fk_detalledocumento_id_tramite_dd` FOREIGN KEY (`id_tramite_dd`) REFERENCES `tramite` (`id_tramite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalledocumento`
--

LOCK TABLES `detalledocumento` WRITE;
/*!40000 ALTER TABLE `detalledocumento` DISABLE KEYS */;
INSERT INTO `detalledocumento` VALUES (1,1,1,'000','2016-07-17',1,'S','N','N','N','AC'),(2,1,5,'000','2018-07-17',1,'N','N','N','S','AC'),(3,1,15,'000','2018-07-17',1,'N','N','S','N','AC');
/*!40000 ALTER TABLE `detalledocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_doc` varchar(64) NOT NULL,
  `sigla_doc` varchar(8) DEFAULT NULL,
  `estado_doc` varchar(2) NOT NULL,
  PRIMARY KEY (`id_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` VALUES (1,'FACTURA COMERCIAL','FCOM','AC'),(2,'FACTURA DE REEXPEDICION','FR','AC'),(3,'CARTA PORTE (CRT)','CP','AC'),(4,'MANIFIESTO DE CARCA (MIC)','MC','AC'),(5,'LISTA DE EMPAQUE','LE','AC'),(6,'PARTE DE RECEPCION','PR','AC'),(7,'CERTIFICADO DE ENTIDADES FINANCIEREAS','FE','AC'),(8,'DECLARACION DE EXPORTACION DE PAIS DE ORIGEN','CE','AC'),(9,'CARPETA DE DOCUMENTOS','CD','AC'),(10,'DOCUMENTO DE TRANSPORTE HOUSE BL','DT','AC'),(11,'DOCUMENTOS DE CARGOS PORTUARIOS','DC','AC'),(12,'FACTURA DE TRANSPORTE DE MERCANCIAS','FT','AC'),(13,'DECLARACION JURADE DE SALIDA DE DEPOSITO','DS','AC'),(14,'DECLARACION JURADA DE INGRESO DE DEPOSITO','DI','AC'),(15,'DECLARACION ANDINA DEL VALOR','DA','AC'),(16,'DECLARACION DE ADQUISICION DE MERCANCIAS','DAM','AC'),(17,'CERTIFICADO DE ORIGEN','CDO','AC'),(18,'CEDULA DE IDENTIDAD','CI','AC'),(19,'NUMERO DE IDENTIFICACION TRIBURTARIA','NIT','AC'),(20,'TESTIMONIO DE PODER CONFERLANTE NOTARIO','TCN','AC'),(21,'POLIZA DE SEGURO','PDS','AC'),(22,'CERTIFICADO DE ANALISIS','CDA','AC'),(23,'HOJA DE RUTA MIN. GOBIERNO','RMG','AC'),(24,'AUTORIZACION P.MIN. GOBIERNO','AMG','AC'),(25,'GUIA AEREA(AIRWAY BILL)','GAR','AC'),(26,'CERTIFICADO DE FLETE','CDF','AC'),(27,'GUIA COURIER','GCO','AC'),(28,'FORMULARIO DE DESCRIPCION DE MERCANCIAS','FDM','AC'),(29,'FORMULARIO DE REGISTRO DE VEHICULOS','FRV','AC'),(30,'FORMULARIO DE REGISTRO DE MAQUINARIA','FRM','AC');
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulario`
--

DROP TABLE IF EXISTS `formulario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formulario` (
  `id_formulario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_form` varchar(128) NOT NULL,
  `sigla_form` varchar(8) NOT NULL,
  `estado_form` varchar(2) NOT NULL,
  PRIMARY KEY (`id_formulario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulario`
--

LOCK TABLES `formulario` WRITE;
/*!40000 ALTER TABLE `formulario` DISABLE KEYS */;
INSERT INTO `formulario` VALUES (1,'Sicoin de Ingreso','SDI','AC'),(2,'Formulario de Adquisicion de Mercancias','FAM','AC'),(3,'Formulario de Registro de Maquinaria','FRM','AC'),(4,'Formulario de Registro de Vehiculo','FRV','AC'),(5,'Formulario de Descripcion de Mercancias','FDM','AC'),(6,'Declaracion de Valor','DAV','AC'),(7,'Declaracion Unica de Importacion','DUI','AC');
/*!40000 ALTER TABLE `formulario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `codigoalf2_pais` varchar(2) NOT NULL,
  `codigoalf3_pais` varchar(4) NOT NULL,
  `codigonum_pais` varchar(8) NOT NULL,
  `nombre_pais` varchar(128) NOT NULL,
  `descripcion_pais` varchar(128) NOT NULL,
  `estado_pais` varchar(2) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (1,'AF','AF','004','Afganistán','Afganistán','AC'),(2,'AF','AFG','004','Afganistán','Afganistán','AC'),(3,'AX','ALA','248','Åland, Islas','Åland, Islas','AC'),(4,'AL','ALB','008','Albania','Albania','AC'),(5,'DE','DEU','276','Alemania','Alemania','AC'),(6,'AD','AND','020','Andorra','Andorra','AC'),(7,'AO','AGO','024','Angola','Angola','AC'),(8,'AI','AIA','660','Anguila','Anguila','AC'),(9,'AQ','ATA','010','Antártida','Antártida','AC'),(10,'AG','ATG','028','Antigua y Barbuda','Antigua y Barbuda','AC'),(11,'SA','SAU','682','Arabia Saudita','Arabia Saudita','AC'),(12,'DZ','DZA','012','Argelia','Argelia','AC'),(13,'AR','ARG','032','Argentina','Argentina','AC'),(14,'AM','ARM','051','Armenia','Armenia','AC'),(15,'AW','ABW','533','Aruba','Aruba','AC'),(16,'AU','AUS','036','Australia','Australia','AC'),(17,'AT','AUT','040','Austria','Austria','AC'),(18,'AZ','AZE','031','Azerbaiyán','Azerbaiyán','AC'),(19,'BS','BHS','044','Bahamas (las)','Bahamas (las)','AC'),(20,'BD','BGD','050','Bangladesh','Bangladesh','AC'),(21,'BB','BRB','052','Barbados','Barbados','AC'),(22,'BH','BHR','048','Bahrein','Bahrein','AC'),(23,'BE','BEL','056','Bélgica','Bélgica','AC'),(24,'BZ','BLZ','084','Belice','Belice','AC'),(25,'BJ','BEN','204','Benin','Benin','AC'),(26,'BM','BMU','060','Bermudas','Bermudas','AC'),(27,'BY','BLR','112','Belarús','Belarús','AC'),(28,'BO','BOL','068','Bolivia (Estado Plurinacional de)','Bolivia (Estado Plurinacional de)','AC'),(29,'BQ','BES','535','Bonaire, San Eustaquio y Saba','Bonaire, San Eustaquio y Saba','AC'),(30,'BA','BIH','070','Bosnia y Herzegovina','Bosnia y Herzegovina','AC'),(31,'BW','BWA','072','Botswana','Botswana','AC'),(32,'BR','BRA','076','Brasil','Brasil','AC'),(33,'BN','BRN','096','Brunei Darussalam','Brunei Darussalam','AC'),(34,'BG','BGR','100','Bulgaria','Bulgaria','AC'),(35,'BF','BFA','854','Burkina Faso','Burkina Faso','AC'),(36,'BI','BDI','108','Burundi','Burundi','AC'),(37,'BT','BTN','064','Bhután','Bhután','AC'),(38,'CV','CPV','132','Cabo Verde','Cabo Verde','AC'),(39,'KH','KHM','116','Camboya','Camboya','AC'),(40,'CM','CMR','120','Camerún','Camerún','AC'),(41,'CA','CAN','124','Canadá','Canadá','AC'),(42,'QA','QAT','634','Qatar','Qatar','AC'),(43,'TD','TCD','148','Chad','Chad','AC'),(44,'CL','CHL','152','Chile','Chile','AC'),(45,'CN','CHN','156','China','China','AC'),(46,'CY','CYP','196','Chipre','Chipre','AC'),(47,'CO','COL','170','Colombia','Colombia','AC'),(48,'KM','COM','174','Comoras (las)','Comoras (las)','AC'),(49,'KP','PRK','408','Corea (la República Popular Democrática de)','Corea (la República Popular Democrática de)','AC'),(50,'KR','KOR','410','Corea (la República de)','Corea (la República de)','AC'),(51,'CI','CIV','384','Côte d Ivoire','Côte d Ivoire','AC'),(52,'CR','CRI','188','Costa Rica','Costa Rica','AC'),(53,'HR','HRV','191','Croacia','Croacia','AC'),(54,'CU','CUB','192','Cuba','Cuba','AC'),(55,'CW','CUW','531','Curaçao','Curaçao','AC'),(56,'DK','DNK','208','Dinamarca','Dinamarca','AC'),(57,'DM','DMA','212','Dominica','Dominica','AC'),(58,'EC','ECU','218','Ecuador','Ecuador','AC'),(59,'EG','EGY','818','Egipto','Egipto','AC'),(60,'SV','SLV','222','El Salvador','El Salvador','AC'),(61,'AE','ARE','784','Emiratos Árabes Unidos (los)','Emiratos Árabes Unidos (los)','AC'),(62,'ER','ERI','232','Eritrea','Eritrea','AC'),(63,'SK','SVK','703','Eslovaquia','Eslovaquia','AC'),(64,'SI','SVN','705','Eslovenia','Eslovenia','AC'),(65,'ES','ESP','724','España','España','AC'),(66,'US','USA','840','Estados Unidos de América (los)','Estados Unidos de América (los)','AC'),(67,'EE','EST','233','Estonia','Estonia','AC'),(68,'ET','ETH','231','Etiopía','Etiopía','AC'),(69,'PH','PHL','608','Filipinas (las)','Filipinas (las)','AC'),(70,'FI','FIN','246','Finlandia','Finlandia','AC'),(71,'FJ','FJI','242','Fiji','Fiji','AC'),(72,'FR','FRA','250','Francia','Francia','AC'),(73,'GA','GAB','266','Gabón','Gabón','AC'),(74,'GM','GMB','270','Gambia (la)','Gambia (la)','AC'),(75,'GE','GEO','268','Georgia','Georgia','AC'),(76,'GH','GHA','288','Ghana','Ghana','AC'),(77,'GI','GIB','292','Gibraltar','Gibraltar','AC'),(78,'GD','GRD','308','Granada','Granada','AC'),(79,'GR','GRC','300','Grecia','Grecia','AC'),(80,'GL','GRL','304','Groenlandia','Groenlandia','AC'),(81,'GP','GLP','312','Guadeloupe','Guadeloupe','AC'),(82,'GU','GUM','316','Guam','Guam','AC'),(83,'GT','GTM','320','Guatemala','Guatemala','AC'),(84,'GF','GUF','254','Guayana Francesa','Guayana Francesa','AC'),(85,'GG','GGY','831','Guernsey','Guernsey','AC'),(86,'GN','GIN','324','Guinea','Guinea','AC'),(87,'GW','GNB','624','Guinea Bissau','Guinea Bissau','AC'),(88,'GQ','GNQ','226','Guinea Ecuatorial','Guinea Ecuatorial','AC'),(89,'GY','GUY','328','Guyana','Guyana','AC'),(90,'HT','HTI','332','Haití','Haití','AC'),(91,'HN','HND','340','Honduras','Honduras','AC'),(92,'HK','HKG','344','Hong Kong','Hong Kong','AC'),(93,'HU','HUN','348','Hungría','Hungría','AC'),(94,'IN','IND','356','India','India','AC'),(95,'ID','IDN','360','Indonesia','Indonesia','AC'),(96,'IQ','IRQ','368','Iraq','Iraq','AC'),(97,'IR','IRN','364','Irán (República Islámica de)','Irán (República Islámica de)','AC'),(98,'IE','IRL','372','Irlanda','Irlanda','AC'),(99,'BV','BVT','074','Bouvet, Isla','Bouvet, Isla','AC'),(100,'IM','IMN','833','Isla de Man','Isla de Man','AC'),(101,'CX','CXR','162','Navidad, Isla de','Navidad, Isla de','AC'),(102,'IS','ISL','352','Islandia','Islandia','AC'),(103,'KY','CYM','136','Caimán, (las) Islas','Caimán, (las) Islas','AC'),(104,'CC','CCK','166','Cocos / Keeling, (las) Islas','Cocos / Keeling, (las) Islas','AC'),(105,'CK','COK','184','Cook, (las) Islas','Cook, (las) Islas','AC'),(106,'FO','FRO','234','Feroe, (las) Islas','Feroe, (las) Islas','AC'),(107,'GS','SGS','239','Georgia del Sur (la) y las Islas Sandwich del Sur','Georgia del Sur (la) y las Islas Sandwich del Sur','AC'),(108,'HM','HMD','334','Heard (Isla) e Islas McDonald','Heard (Isla) e Islas McDonald','AC'),(109,'FK','FLK','238','Malvinas [Falkland], (las) Islas','Malvinas [Falkland], (las) Islas','AC'),(110,'MP','MNP','580','Marianas del Norte, (las) Islas','Marianas del Norte, (las) Islas','AC'),(111,'MH','MHL','584','Marshall, (las) Islas','Marshall, (las) Islas','AC'),(112,'PN','PCN','612','Pitcairn','Pitcairn','AC'),(113,'SB','SLB','090','Salomón, Islas','Salomón, Islas','AC'),(114,'TC','TCA','796','Turcas y Caicos, (las) Islas','Turcas y Caicos, (las) Islas','AC'),(115,'UM','UMI','581','Islas Ultramarinas Menores de los Estados Unidos (las)','Islas Ultramarinas Menores de los Estados Unidos (las)','AC'),(116,'VG','VGB','092','Vírgenes británicas, Islas','Vírgenes británicas, Islas','AC'),(117,'VI','VIR','850','Vírgenes de los Estados Unidos, Islas','Vírgenes de los Estados Unidos, Islas','AC'),(118,'IL','ISR','376','Israel','Israel','AC'),(119,'IT','ITA','380','Italia','Italia','AC'),(120,'JM','JAM','388','Jamaica','Jamaica','AC'),(121,'JP','JPN','392','Japón','Japón','AC'),(122,'JE','JEY','832','Jersey','Jersey','AC'),(123,'JO','JOR','400','Jordania','Jordania','AC'),(124,'KZ','KAZ','398','Kazajstán','Kazajstán','AC'),(125,'KE','KEN','404','Kenya','Kenya','AC'),(126,'KG','KGZ','417','Kirguistán','Kirguistán','AC'),(127,'KI','KIR','296','Kiribati','Kiribati','AC'),(128,'KW','KWT','414','Kuwait','Kuwait','AC'),(129,'LA','LAO','418','Lao, (la) República Democrática Popular','Lao, (la) República Democrática Popular','AC'),(130,'LS','LSO','426','Lesotho','Lesotho','AC'),(131,'LV','LVA','428','Letonia','Letonia','AC'),(132,'LB','LBN','422','Líbano','Líbano','AC'),(133,'LR','LBR','430','Liberia','Liberia','AC'),(134,'LY','LBY','434','Libia','Libia','AC'),(135,'LI','LIE','438','Liechtenstein','Liechtenstein','AC'),(136,'LT','LTU','440','Lituania','Lituania','AC'),(137,'LU','LUX','442','Luxemburgo','Luxemburgo','AC'),(138,'MO','MAC','446','Macao','Macao','AC'),(139,'MK','MKD','807','Macedonia (la ex República Yugoslava de)','Macedonia (la ex República Yugoslava de)','AC'),(140,'MG','MDG','450','Madagascar','Madagascar','AC'),(141,'MY','MYS','458','Malasia','Malasia','AC'),(142,'MW','MWI','454','Malawi','Malawi','AC'),(143,'MV','MDV','462','Maldivas','Maldivas','AC'),(144,'ML','MLI','466','Malí','Malí','AC'),(145,'MT','MLT','470','Malta','Malta','AC'),(146,'MA','MAR','504','Marruecos','Marruecos','AC'),(147,'MQ','MTQ','474','Martinique','Martinique','AC'),(148,'MU','MUS','480','Mauricio','Mauricio','AC'),(149,'MR','MRT','478','Mauritania','Mauritania','AC'),(150,'YT','MYT','175','Mayotte','Mayotte','AC'),(151,'MX','MEX','484','México','México','AC'),(152,'FM','FSM','583','Micronesia (Estados Federados de)','Micronesia (Estados Federados de)','AC'),(153,'MD','MDA','498','Moldova (la República de)','Moldova (la República de)','AC'),(154,'MC','MCO','492','Mónaco','Mónaco','AC'),(155,'MN','MNG','496','Mongolia','Mongolia','AC'),(156,'ME','MNE','499','Montenegro','Montenegro','AC'),(157,'MS','MSR','500','Montserrat','Montserrat','AC'),(158,'MZ','MOZ','508','Mozambique','Mozambique','AC'),(159,'MM','MMR','104','Myanmar','Myanmar','AC'),(160,'NA','NAM','516','Namibia','Namibia','AC'),(161,'NR','NRU','520','Nauru','Nauru','AC'),(162,'NP','NPL','524','Nepal','Nepal','AC'),(163,'NI','NIC','558','Nicaragua','Nicaragua','AC'),(164,'NE','NER','562','Níger (el)','Níger (el)','AC'),(165,'NG','NGA','566','Nigeria','Nigeria','AC'),(166,'NU','NIU','570','Niue','Niue','AC'),(167,'NF','NFK','574','Norfolk, Isla','Norfolk, Isla','AC'),(168,'NO','NOR','578','Noruega','Noruega','AC'),(169,'NC','NCL','540','Nueva Caledonia','Nueva Caledonia','AC'),(170,'NZ','NZL','554','Nueva Zelandia','Nueva Zelandia','AC'),(171,'OM','OMN','512','Omán','Omán','AC'),(172,'NL','NLD','528','Países Bajos (los)','Países Bajos (los)','AC'),(173,'PK','PAK','586','Pakistán','Pakistán','AC'),(174,'PW','PLW','585','Palau','Palau','AC'),(175,'PS','PSE','275','Palestina, Estado de','Palestina, Estado de','AC'),(176,'PA','PAN','591','Panamá','Panamá','AC'),(177,'PG','PNG','598','Papua Nueva Guinea','Papua Nueva Guinea','AC'),(178,'PY','PRY','600','Paraguay','Paraguay','AC'),(179,'PE','PER','604','Perú','Perú','AC'),(180,'PF','PYF','258','Polinesia Francesa','Polinesia Francesa','AC'),(181,'PL','POL','616','Polonia','Polonia','AC'),(182,'PT','PRT','620','Portugal','Portugal','AC'),(183,'PR','PRI','630','Puerto Rico','Puerto Rico','AC'),(184,'GB','GBR','826','Reino Unido de Gran Bretaña e Irlanda del Norte (el)','Reino Unido de Gran Bretaña e Irlanda del Norte (el)','AC'),(185,'EH','ESH','732','Sahara Occidental','Sahara Occidental','AC'),(186,'CF','CAF','140','República Centroafricana (la)','República Centroafricana (la)','AC'),(187,'CZ','CZE','203','Chequia','Chequia','AC'),(188,'CG','COG','178','Congo (el)','Congo (el)','AC'),(189,'CD','COD','180','Congo (la República Democrática del)','Congo (la República Democrática del)','AC'),(190,'DO','DOM','214','Dominicana, (la) República','Dominicana, (la) República','AC'),(191,'RE','REU','638','Reunión','Reunión','AC'),(192,'RW','RWA','646','Rwanda','Rwanda','AC'),(193,'RO','ROU','642','Rumania','Rumania','AC'),(194,'RU','RUS','643','Rusia, (la) Federación de','Rusia, (la) Federación de','AC'),(195,'WS','WSM','882','Samoa','Samoa','AC'),(196,'AS','ASM','016','Samoa Americana','Samoa Americana','AC'),(197,'BL','BLM','652','Saint Barthélemy','Saint Barthélemy','AC'),(198,'KN','KNA','659','Saint Kitts y Nevis','Saint Kitts y Nevis','AC'),(199,'SM','SMR','674','San Marino','San Marino','AC'),(200,'MF','MAF','663','Saint Martin (parte francesa)','Saint Martin (parte francesa)','AC'),(201,'PM','SPM','666','San Pedro y Miquelón','San Pedro y Miquelón','AC'),(202,'VC','VCT','670','San Vicente y las Granadinas','San Vicente y las Granadinas','AC'),(203,'SH','SHN','654','Santa Helena, Ascensión y Tristán de Acuña','Santa Helena, Ascensión y Tristán de Acuña','AC'),(204,'LC','LCA','662','Santa Lucía','Santa Lucía','AC'),(205,'ST','STP','678','Santo Tomé y Príncipe','Santo Tomé y Príncipe','AC'),(206,'SN','SEN','686','Senegal','Senegal','AC'),(207,'RS','SRB','688','Serbia','Serbia','AC'),(208,'SC','SYC','690','Seychelles','Seychelles','AC'),(209,'SL','SLE','694','Sierra leona','Sierra leona','AC'),(210,'SG','SGP','702','Singapur','Singapur','AC'),(211,'SX','SXM','534','Sint Maarten (parte neerlandesa)','Sint Maarten (parte neerlandesa)','AC'),(212,'SY','SYR','760','República Árabe Siria','República Árabe Siria','AC'),(213,'SO','SOM','706','Somalia','Somalia','AC'),(214,'LK','LKA','144','Sri Lanka','Sri Lanka','AC'),(215,'SZ','SWZ','748','Swazilandia','Swazilandia','AC'),(216,'ZA','ZAF','710','Sudáfrica','Sudáfrica','AC'),(217,'SD','SDN','729','Sudán (el)','Sudán (el)','AC'),(218,'SS','SSD','728','Sudán del Sur','Sudán del Sur','AC'),(219,'SE','SWE','752','Suecia','Suecia','AC'),(220,'CH','CHE','756','Suiza','Suiza','AC'),(221,'SR','SUR','740','Suriname','Suriname','AC'),(222,'SJ','SJM','744','Svalbard y Jan Mayen','Svalbard y Jan Mayen','AC'),(223,'TH','THA','764','Tailandia','Tailandia','AC'),(224,'TW','TWN','158','Taiwán (Provincia de China)','Taiwán (Provincia de China)','AC'),(225,'TZ','TZA','834','Tanzania, República Unida de','Tanzania, República Unida de','AC'),(226,'TJ','TJK','762','Tayikistán','Tayikistán','AC'),(227,'IO','IOT','086','Territorio Británico del Océano Índico (el)','Territorio Británico del Océano Índico (el)','AC'),(228,'TF','ATF','260','Tierras Australes Francesas (las)','Tierras Australes Francesas (las)','AC'),(229,'TL','TLS','626','Timor-Leste','Timor-Leste','AC'),(230,'TG','TGO','768','Togo','Togo','AC'),(231,'TK','TKL','772','Tokelau','Tokelau','AC'),(232,'TO','TON','776','Tonga','Tonga','AC'),(233,'TT','TTO','780','Trinidad y Tobago','Trinidad y Tobago','AC'),(234,'TN','TUN','788','Túnez','Túnez','AC'),(235,'TM','TKM','795','Turkmenistán','Turkmenistán','AC'),(236,'TR','TUR','792','Turquía','Turquía','AC'),(237,'TV','TUV','798','Tuvalu','Tuvalu','AC'),(238,'UA','UKR','804','Ucrania','Ucrania','AC'),(239,'UG','UGA','800','Uganda','Uganda','AC'),(240,'UY','URY','858','Uruguay','Uruguay','AC'),(241,'UZ','UZB','860','Uzbekistán','Uzbekistán','AC'),(242,'VU','VUT','548','Vanuatu','Vanuatu','AC'),(243,'VA','VAT','336','Santa Sede (la)','Santa Sede (la)','AC'),(244,'VE','VEN','862','Venezuela (República Bolivariana de)','Venezuela (República Bolivariana de)','AC'),(245,'VN','VNM','704','Viet Nam','Viet Nam','AC'),(246,'WF','WLF','876','Wallis y Futuna','Wallis y Futuna','AC'),(247,'YE','YEM','887','Yemen','Yemen','AC'),(248,'DJ','DJI','262','Djibouti','Djibouti','AC'),(249,'ZM','ZMB','894','Zambia','Zambia','AC'),(250,'ZW','ZWE','716','Zimbabwe','Zimbabwe','AC');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regimen`
--

DROP TABLE IF EXISTS `regimen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regimen` (
  `id_regimen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_reg` varchar(64) NOT NULL,
  `sigla_reg` varchar(4) NOT NULL,
  `estado_reg` varchar(2) NOT NULL,
  PRIMARY KEY (`id_regimen`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regimen`
--

LOCK TABLES `regimen` WRITE;
/*!40000 ALTER TABLE `regimen` DISABLE KEYS */;
INSERT INTO `regimen` VALUES (1,'IMPORTACION PARA EL CONSUMO','IM4','AC'),(2,'ADMISION TEMPORAL','IMS','AC'),(3,'EXPORTACION DEFINITIVA','EX1','AC'),(4,'EXPORTACION TEMPORAL/EXPORTACION PARA LIBRE CONSIGNACION','EX2','AC'),(5,'REEXPORTACION/REEXPEDICION/REEMBARQUE','EX3','AC'),(6,'REIMPORTACION','IM6','AC'),(7,'DEPOSITO','IM7','AC'),(8,'DESPACHO ANTICIPADO IMP A CONSUMO','IMA4','AC'),(9,'DESPACHO COURIER DE IMP MENOR CUANTIA','IMC4','AC'),(10,'DESPACHO INMEDIATO IMP A CONSUMO','IMI4','AC'),(11,'DESPACHO DE MENOR CUANTIA IMP A CONSUMO','IMM4','AC'),(12,'MODULO COMERCIAL - ZONA FRANCA','ZMC9','AC');
/*!40000 ALTER TABLE `regimen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tramite`
--

DROP TABLE IF EXISTS `tramite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tramite` (
  `id_tramite` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_tra` int(11) NOT NULL,
  `id_cliente_tra` int(11) NOT NULL,
  `numero_tra` varchar(32) NOT NULL,
  `aduana_tra` varchar(64) NOT NULL,
  `procedencia_tra` varchar(64) NOT NULL,
  `proveedor_tra` varchar(64) NOT NULL,
  `cantidadbultos_tra` int(11) NOT NULL,
  `referencia_tra` varchar(64) NOT NULL,
  `peso_tra` double NOT NULL,
  `regimen_tra` varchar(64) NOT NULL,
  `tipocambio_tra` double NOT NULL,
  `mercancia_tra` varchar(64) NOT NULL,
  `docembarque_tra` varchar(64) NOT NULL,
  `partidaarancelaria_tra` varchar(64) NOT NULL,
  `valorfob_tra` float NOT NULL,
  `fletes_tra` double NOT NULL,
  `seguro_tra` double NOT NULL,
  `otrosgastos_tra` double NOT NULL,
  `valorcifsus_tra` double NOT NULL,
  `valorcifbs_tra` double NOT NULL,
  `estado_tra` varchar(2) NOT NULL,
  `glosa_tra` varchar(256) NOT NULL,
  `fecha_tra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tramite`),
  KEY `fk_tramite_id_cliente_tra` (`id_cliente_tra`),
  KEY `fk_tramite_id_usuario_tra` (`id_usuario_tra`),
  CONSTRAINT `fk_tramite_id_cliente_tra` FOREIGN KEY (`id_cliente_tra`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `fk_tramite_id_usuario_tra` FOREIGN KEY (`id_usuario_tra`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tramite`
--

LOCK TABLES `tramite` WRITE;
/*!40000 ALTER TABLE `tramite` DISABLE KEYS */;
INSERT INTO `tramite` VALUES (1,1,1,'001-2018','LA CUMPLIDORA POR SIEMPRE','JAPON','NIPONES',100,'NELSON',15.5,'REGIMEN ABIERTO',6.69,'DE TODO UN POCO','ALFKJKLKASF','NINGUNA',10,10,10,10,10,10,'AC','tramite recepcionado normalmente','0000-00-00 00:00:00'),(2,1,10,'103','LA PROPIA','EEUU','GALLO',100,'ASLKFJ ALKF ',10,'REGIMEN CERRADO',6.68,'DE TODO DE DE TODO','DOCUMENTOS DOCUMENTOS....','NINGUNA',1000,1000,1000,1000,1000,1000,'AC','TRAMITE RECEPCIONADO CON EXITO','0000-00-00 00:00:00'),(3,1,10,'100-2018','MI ADUANA ','ALEMANIA','POLLO',150,'CRISTIAN MARCELO',80,'REGIMEN',7.96,'ROPA DE INVIERNO','NINGUNO','NINGUNO',100,100,100,100,100,100,'ac','esta glosa esd e pruba','0000-00-00 00:00:00'),(4,1,12,'101-2018','NINGUNO','PRUEBA','PRUEBA',100,'CRISTIAN',100,'ADUANA INTERNA',6.79,'MECADERIA INDUSTRIAL','BOLIVIA','500',100,100,101,105,150,150,'ac','glosa glosa glosa','0000-00-00 00:00:00'),(5,1,9,'102-2018','MI ADUANA','SAN PABLO','EEUU',500,'CRISTIAN',500,'RÉGIMEN',6.95,'ASDASD','BOLIVIA','BOLIVIA',500,600,700,800,900,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(6,1,10,'105-2018','bolivia','bolivia','bolivia',100,'cristian',485,'REGIMEN',6.95,'ROPA DE INVIERNO','BOLIVIA','BOLIVIA',500,600,700,800,900,1000,'ac','asdfasdfasdf','2018-06-15 21:42:34'),(7,1,16,'200-2018','XXXX','XXXX','XXXX',10,'CRISTIAN',100,'ADUANERO',6.97,'VARIOS','BOLIVIA','AAFFF',100,100,100,100,100,100,'AC','VARIOS','2018-06-19 20:42:51'),(8,1,1,'201-2018','INTERIOR SANTA CRUZ','BOLIVIA','BOLIVIA',100,'REF',100,'ADUANA',6.69,'MERCANCIA','POLIZA','PARTIDA',100,100,100,100,400,400,'AC','GLOSA','0000-00-00 00:00:00'),(9,1,1,'203-2018','MI ADUANA ','SAN PABLO','POLLO',100,'CRISTIAN',100,'RÉGIMEN',6.96,'DE TODO','POLIZA','BOLIVIA',100,600,100,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(10,1,4,'204-2018','MI ADUANA ','SAN PABLO','POLLO',100,'CRISTIAN',100,'RÉGIMEN',6.96,'DE TODO','POLIZA','BOLIVIA',100,600,100,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(11,1,6,'205-2018','MI ADUANA ','SAN PABLO','POLLO',100,'CRISTIAN',100,'RÉGIMEN',6.96,'DE TODO','POLIZA','BOLIVIA',100,600,100,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(12,1,15,'206-2018','MI ADUANA ','SAN PABLO','POLLO',100,'CRISTIAN',100,'RÉGIMEN',6.96,'DE TODO','POLIZA','BOLIVIA',100,600,100,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(13,1,4,'206-2018','MI ADUANA ','SAN PABLO','POLLO',100,'CRISTIAN',100,'RÉGIMEN',6.96,'DE TODO','POLIZA','6545',100,600,100,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(14,1,1,'201-2018','MI ADUANA ','SAN PABLO','POLLO',100,'CRISTIAN',100,'RÉGIMEN',6.96,'DE TODO','POLIZA','BOLIVIA',100,600,101,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(15,1,4,'208-2018','MI ADUANA ','SAN PABLO','POLLO',100,'CRISTIAN',100,'RÉGIMEN',6.96,'DE TODO','POLIZA','BOLIVIA',100,600,100,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(16,1,1,'209-2018','MI ADUANA ','SAN PABLO','POLLO',100,'CRISTIAN',100,'RÉGIMEN',6.96,'DE TODO','POLIZA','BOLIVIA',100,600,100,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(17,1,16,'210-2018','MI ADUANA ','SAN PABLO','POLLO',100,'CRISTIAN',100,'RÉGIMEN',6.96,'DE TODO','POLIZA','BOLIVIA',100,600,100,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(18,1,18,'211-2018','701.ADUANA INTERIOR SC','Bolivia (Estado Plurinacional de)','POLLO',100,'CRISTIAN',100,'IMI4 - DESPACHO INMEDIATO IMP A CONSUMO',6.69,'DE TODO','POLIZA','BOLIVIA',100,600,100,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(19,1,1,'206-2018','701.ADUANA INTERIOR SC','Bolivia (Estado Plurinacional de)','POLLO',100,'CRISTIAN',100,'IMI4 - DESPACHO INMEDIATO IMP A CONSUMO',6.68,'DE TODO','POLIZA','BOLIVIA',100,600,100,100,300,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','2018-07-30 04:00:00'),(20,1,4,'201-2018','701.ADUANA INTERIOR SC','Bolivia (Estado Plurinacional de)','POLLO',100,'CRISTIAN',100,'EX1 - EXPORTACION DEFINITIVA',6.96,'DE TODO','POLIZA','BOLIVIA',100,0,0,100,200,1392,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','2018-07-17 04:00:00'),(21,1,1,'220-2018','701.ADUANA INTERIOR SC','Bolivia (Estado Plurinacional de)','POLLO',100,'CRISTIAN',100,'EX1 - EXPORTACION DEFINITIVA',6.96,'DE TODO','POLIZA','BOLIVIA',500,600,700,900,2700,18792,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','2018-07-31 04:00:00'),(22,1,16,'221-2018','711.AEROPUERTO VIRU VIRU','Bolivia (Estado Plurinacional de)','POLLO',100,'CRISTIAN',100,'EX1 - EXPORTACION DEFINITIVA',6.96,'DE TODO','POLIZA','BOLIVIA',70,500,100,0,670,4663.2,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','0000-00-00 00:00:00'),(23,1,7,'222-2018','701.ADUANA INTERIOR SC','Bolivia (Estado Plurinacional de)','POLLO',100,'CRISTIAN',100,'EX1 - EXPORTACION DEFINITIVA',6.96,'DE TODO','POLIZA','BOLIVIA',500,50,100,100,750,5220,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','2018-07-31 22:15:53'),(24,1,3,'223-2018','711.AEROPUERTO VIRU VIRU','Bonaire, San Eustaquio y Saba','POLLO',100,'CRISTIAN',100,'IMI4 - DESPACHO INMEDIATO IMP A CONSUMO',6.96,'DE TODO','POLIZA','BOLIVIA',100,100,100,100,400,2784,'AC','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','2018-07-31 22:18:05'),(25,1,7,'224-2018','701.ADUANA INTERIOR SC','Estados Unidos de América (los)','POLLO',100,'CRISTIAN',100,'IMI4 - DESPACHO INMEDIATO IMP A CONSUMO',6.96,'DE TODO','POLIZA','BOLIVIA',100,100,100,100,400,2784,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','2018-07-31 10:20:30'),(26,1,18,'225-2018','701.ADUANA INTERIOR SC','Belice','PROVEEDOR',100,'CRISTIAN',100,'EX1 - EXPORTACION DEFINITIVA',6.96,'DE TODO','POLIZA','BOLIVIA',100,100,100,100,400,2784,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','2018-07-31 06:28:09'),(27,1,1,'226-2018','701.ADUANA INTERIOR SC','Bosnia y Herzegovina','POLLO',100,'CRISTIAN',100,'IMI4 - DESPACHO INMEDIATO IMP A CONSUMO',6.96,'DE TODO','POLIZA','BOLIVIA',100,100,100,100,400,2784,'AC','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','2018-07-31 18:30:28');
/*!40000 ALTER TABLE `tramite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `ci_us` varchar(16) NOT NULL,
  `nombre_us` varchar(128) NOT NULL,
  `direccion_us` varchar(256) DEFAULT NULL,
  `telefono_us` varchar(32) DEFAULT NULL,
  `username_us` varchar(50) NOT NULL,
  `email_us` varchar(80) NOT NULL,
  `password_us` varchar(250) NOT NULL,
  `authKey_us` varchar(250) NOT NULL,
  `accessToken_us` varchar(250) NOT NULL,
  `activate_us` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'123','Administrador de Usuario','nd','654-454-54','admin','admin@gmail.com','123','321','123',0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'miagencia'
--

--
-- Dumping routines for database 'miagencia'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-31 14:41:26
