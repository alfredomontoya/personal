CREATE DATABASE  IF NOT EXISTS `miagencia` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `miagencia`;
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
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'101000','daniel montoya calderon','barrio el pantanal','13654','AC'),(2,'101100','nelfi arandiaa','plan 3000','65465 ','AC'),(3,'102100','lucas','plan 3000','65465 ','AC'),(4,'103100','roman montoya','pantanal','987','AC'),(5,'104000','DYLAN','PLAN 3000','9879','AC'),(6,'105100','OLIVIA MONTOYA','EL FUERTE','98794','AC'),(7,'106200','NOEMI MONTOYA','EL FUERTE','95646','AC'),(8,'106300','SAMUEL MONTOYA','PANTANAL','9987946','AC'),(9,'107400','cristian pizarroso','asdfasd','64654','AC'),(10,'107500','alfredo montoya calderon','plan 4000','124234','AC'),(11,'107600','nelson montoya guzman','pantanal','200912384','AC'),(12,'107700','jhoel alfredo montoya arandia','plan 4000','200912384','AC'),(13,'107800','miguel perez','las americas','123654','AC'),(14,'109800','miguel perez','las americas','123654','AC'),(15,'110000','miguel perez','las americas','123654','AC'),(16,'110100','cristian marcelo pizarroso peredo','askldfj lkj','65465','AC'),(17,'11111','GERARDO SERGIO DIMOFF','TERCER ANILLO','79654654','AC');
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
  PRIMARY KEY (`id_detalledocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalledocumento`
--

LOCK TABLES `detalledocumento` WRITE;
/*!40000 ALTER TABLE `detalledocumento` DISABLE KEYS */;
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
  `importacionaconsumo_tra` varchar(64) NOT NULL,
  `tipocambio_tra` double NOT NULL,
  `mercancia_tra` varchar(64) NOT NULL,
  `docembarque_tra` varchar(64) NOT NULL,
  `partidaarancelaria_tra` varchar(64) NOT NULL,
  `telefono_tra` varchar(32) NOT NULL,
  `correo_tra` varchar(64) NOT NULL,
  `valorfob_tra` float NOT NULL,
  `fletes_tra` double NOT NULL,
  `seguro_tra` double NOT NULL,
  `otrosgastos_tra` double NOT NULL,
  `valorcifsus_tra` double NOT NULL,
  `valorcifbs_tra` double NOT NULL,
  `estado_tra` varchar(2) NOT NULL,
  `glosa_tra` varchar(256) NOT NULL,
  `canal_tra` varchar(32) DEFAULT NULL,
  `nrofactura_tra` varchar(45) DEFAULT NULL,
  `fechafactura_tra` date DEFAULT NULL,
  `montofactura_tra` double DEFAULT NULL,
  `foliosdocumento_tra` int(11) DEFAULT NULL,
  `foliosdui_tra` int(11) DEFAULT NULL,
  `fecha_tra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `facturacomercialnumero_tra` varchar(16) DEFAULT NULL,
  `facturacomercialfecha_tra` datetime DEFAULT NULL,
  `facturacomercialcantidad_tra` int(11) DEFAULT NULL,
  `facturacomercialoriginal_tra` varchar(2) DEFAULT NULL,
  `facturacomercialcopia_tra` varchar(2) DEFAULT NULL,
  `facturacomerciallegalizado_tra` varchar(2) DEFAULT NULL,
  `facturacomercialfotocopia_tra` varchar(2) DEFAULT NULL,
  `facturareexpedicionnumero_tra` varchar(16) DEFAULT NULL,
  `facturareexpedicionfecha_tra` date DEFAULT NULL,
  `facturareexpedicioncantidad_tra` int(11) DEFAULT NULL,
  `facturareexpedicionoriginal_tra` varchar(2) DEFAULT NULL,
  `facturareexpedicionlegalizado_tra` varchar(2) DEFAULT NULL,
  `facturareexpedicionfotocopia_tra` varchar(2) DEFAULT NULL,
  `cartaportenumero_tra` varchar(16) DEFAULT NULL,
  `cartaportefecha_tra` date DEFAULT NULL,
  `cartaportecantidad_tra` int(11) DEFAULT NULL,
  `cartaporteoriginal_tra` varchar(2) DEFAULT NULL,
  `cartaportelegalizado_tra` varchar(2) DEFAULT NULL,
  `cartaportefotocopia_tra` varchar(2) DEFAULT NULL,
  `manifiestocarganumero_tra` varchar(16) DEFAULT NULL,
  `manifiestocargafecha_tra` date DEFAULT NULL,
  `manifiestocargacantidad_tra` int(11) DEFAULT NULL,
  `manifiestocargaoriginal_tra` varchar(2) DEFAULT NULL,
  `manifiestocargalegalizado_tra` varchar(2) DEFAULT NULL,
  `manifiestocargafotocopia_tra` varchar(2) DEFAULT NULL,
  `listaempaquenumero_tra` varchar(16) DEFAULT NULL,
  `listaempaquefecha_tra` date DEFAULT NULL,
  `listaempaquecantidad_tra` int(11) DEFAULT NULL,
  `listaempaqueoriginal_tra` varchar(2) DEFAULT NULL,
  `listaempaquecopia_tra` varchar(2) DEFAULT NULL,
  `listaempaquelegalizado_tra` varchar(2) DEFAULT NULL,
  `listaempaquefotocopia_tra` varchar(2) DEFAULT NULL,
  `parterecepcionnumero_tra` varchar(16) DEFAULT NULL,
  `parterecepcionfecha_tra` date DEFAULT NULL,
  `parterecepcioncantidad_tra` int(11) DEFAULT NULL,
  `parterecepcionoriginal_tra` varchar(2) DEFAULT NULL,
  `parterecepcioncopia_tra` varchar(2) DEFAULT NULL,
  `parterecepcionlegalizado_tra` varchar(2) DEFAULT NULL,
  `parterecepcionfotocopia_tra` varchar(2) DEFAULT NULL,
  `certificadoentidadfinancieranumero_tra` varchar(16) DEFAULT NULL,
  `certificadoentidadfinancierafecha_tra` date DEFAULT NULL,
  `certificadoentidadfinancieracantidad_tra` int(11) DEFAULT NULL,
  `certificadoentidadfinancieraoriginal_tra` varchar(2) DEFAULT NULL,
  `certificadoentidadfinancieracopia_tra` varchar(2) DEFAULT NULL,
  `certificadoentidadfinancieralegalizado_tra` varchar(2) DEFAULT NULL,
  `certificadoentidadfinancierafotocopia_tra` varchar(2) DEFAULT NULL,
  `declaraexportpaisorigennumero_tra` varchar(16) DEFAULT NULL,
  `declaraexportpaisorigenfecha_tra` date DEFAULT NULL,
  `declaraexportpaisorigencantidad_tra` int(11) DEFAULT NULL,
  `declaraexportpaisorigenoriginal_tra` varchar(2) DEFAULT NULL,
  `declaraexportpaisorigencopia_tra` varchar(2) DEFAULT NULL,
  `declaraexportpaisorigenlegalizado_tra` varchar(2) DEFAULT NULL,
  `declaraexportpaisorigenfotocopia_tra` varchar(2) DEFAULT NULL,
  `carpetadocumentosnumero_tra` varchar(16) DEFAULT NULL,
  `carpetadocumentosfecha_tra` date DEFAULT NULL,
  `carpetadocumentoscantidad_tra` int(11) DEFAULT NULL,
  `carpetadocumentosoriginal_tra` varchar(2) DEFAULT NULL,
  `carpetadocumentoscopia_tra` varchar(2) DEFAULT NULL,
  `carpetadocumentoslegalizado_tra` varchar(2) DEFAULT NULL,
  `carpetadocumentosfotocopia_tra` varchar(2) DEFAULT NULL,
  `doctransphousenumero_tra` varchar(16) DEFAULT NULL,
  `doctransphousefecha_tra` date DEFAULT NULL,
  `doctransphousecantidad_tra` int(11) DEFAULT NULL,
  `doctransphouseoriginal_tra` varchar(2) DEFAULT NULL,
  `doctransphousecopia_tra` varchar(2) DEFAULT NULL,
  `doctransphouselegalizado_tra` varchar(2) DEFAULT NULL,
  `doctransphousefotocopia_tra` varchar(2) DEFAULT NULL,
  `doccargoportuarionumero_tra` varchar(16) DEFAULT NULL,
  `doccargoportuariofecha_tra` date DEFAULT NULL,
  `doccargoportuariocantidad_tra` int(11) DEFAULT NULL,
  `doccargoportuariooriginal_tra` varchar(2) DEFAULT NULL,
  `doccargoportuariocopia_tra` varchar(2) DEFAULT NULL,
  `doccargoportuariolegalizado_tra` varchar(2) DEFAULT NULL,
  `doccargoportuariofotocopia_tra` varchar(2) DEFAULT NULL,
  `factranspmercancianumero_tra` varchar(16) DEFAULT NULL,
  `factranspmercanciafecha_tra` date DEFAULT NULL,
  `factranspmercanciacantidad_tra` int(11) DEFAULT NULL,
  `factranspmercanciaoriginal_tra` varchar(2) DEFAULT NULL,
  `factranspmercanciacopia_tra` varchar(2) DEFAULT NULL,
  `factranspmercancialegalizado_tra` varchar(2) DEFAULT NULL,
  `factranspmercanciafotocopia_tra` varchar(2) DEFAULT NULL,
  `ddjjsalidadepositonumero_tra` varchar(16) DEFAULT NULL,
  `ddjjsalidadepositofecha_tra` date DEFAULT NULL,
  `ddjjsalidadepositocantidad_tra` int(11) DEFAULT NULL,
  `ddjjsalidadepositooriginal_tra` varchar(2) DEFAULT NULL,
  `ddjjsalidadepositocopia_tra` varchar(2) DEFAULT NULL,
  `ddjjsalidadepositolegalizado_tra` varchar(2) DEFAULT NULL,
  `ddjjsalidadepositofotocopia_tra` varchar(2) DEFAULT NULL,
  `ddjjingresodepositonumero_tra` varchar(16) DEFAULT NULL,
  `ddjjingresodepositofecha_tra` date DEFAULT NULL,
  `ddjjingresodepositocantidad_tra` int(11) DEFAULT NULL,
  `ddjjingresodepositooriginal_tra` varchar(2) DEFAULT NULL,
  `ddjjingresodepositocopia_tra` varchar(2) DEFAULT NULL,
  `ddjjingresodepositolegalizado_tra` varchar(2) DEFAULT NULL,
  `ddjjingresodepositofotocopia_tra` varchar(2) DEFAULT NULL,
  `ddjjandinavalornumero_tra` varchar(16) DEFAULT NULL,
  `ddjjandinavalorfecha_tra` date DEFAULT NULL,
  `ddjjandinavalorcantidad_tra` int(11) DEFAULT NULL,
  `ddjjandinavalororiginal_tra` varchar(2) DEFAULT NULL,
  `ddjjandinavalorcopia_tra` varchar(2) DEFAULT NULL,
  `ddjjandinavalorlegalizado_tra` varchar(2) DEFAULT NULL,
  `ddjjandinavalorfotocopia_tra` varchar(2) DEFAULT NULL,
  `ddjjadqmercancianumero_tra` varchar(16) DEFAULT NULL,
  `ddjjadqmercanciafecha_tra` date DEFAULT NULL,
  `ddjjadqmercanciacantidad_tra` int(11) DEFAULT NULL,
  `ddjjadqmercanciaoriginal_tra` varchar(2) DEFAULT NULL,
  `ddjjadqmercanciacopia_tra` varchar(2) DEFAULT NULL,
  `ddjjadqmercancialegalizado_tra` varchar(2) DEFAULT NULL,
  `ddjjadqmercanciafotocopia_tra` varchar(2) DEFAULT NULL,
  `certiforigennumero_tra` varchar(16) DEFAULT NULL,
  `certiforigenfecha_tra` date DEFAULT NULL,
  `certiforigencantidad_tra` int(11) DEFAULT NULL,
  `certiforigenoriginal_tra` varchar(2) DEFAULT NULL,
  `certiforigencopia_tra` varchar(2) DEFAULT NULL,
  `certiforigenlegalizado_tra` varchar(2) DEFAULT NULL,
  `certiforigenfotocopia_tra` varchar(2) DEFAULT NULL,
  `cedulaidentidadnumero_tra` varchar(16) DEFAULT NULL,
  `cedulaidentidadfecha_tra` date DEFAULT NULL,
  `cedulaidentidadcantidad_tra` int(11) DEFAULT NULL,
  `cedulaidentidadoriginal_tra` varchar(2) DEFAULT NULL,
  `cedulaidentidadcopia_tra` varchar(2) DEFAULT NULL,
  `cedulaidentidadlegalizado_tra` varchar(2) DEFAULT NULL,
  `cedulaidentidadfotocopia_tra` varchar(2) DEFAULT NULL,
  `numidentributarianumero_tra` varchar(16) DEFAULT NULL,
  `numidentributariafecha_tra` date DEFAULT NULL,
  `numidentributariacantidad_tra` int(11) DEFAULT NULL,
  `numidentributariaoriginal_tra` varchar(2) DEFAULT NULL,
  `numidentributariacopia_tra` varchar(2) DEFAULT NULL,
  `numidentributarialegalizado_tra` varchar(2) DEFAULT NULL,
  `numidentributariafotocopia_tra` varchar(2) DEFAULT NULL,
  `testpodernotarionumero_tra` varchar(16) DEFAULT NULL,
  `testpodernotariofecha_tra` date DEFAULT NULL,
  `testpodernotariocantidad_tra` int(11) DEFAULT NULL,
  `testpodernotariooriginal_tra` varchar(2) DEFAULT NULL,
  `testpodernotariocopia_tra` varchar(2) DEFAULT NULL,
  `testpodernotariolegalizado_tra` varchar(2) DEFAULT NULL,
  `testpodernotariofotocopia_tra` varchar(2) DEFAULT NULL,
  `polizaseguronumero_tra` varchar(16) DEFAULT NULL,
  `polizasegurofecha_tra` date DEFAULT NULL,
  `polizasegurocantidad_tra` int(11) DEFAULT NULL,
  `polizasegurooriginal_tra` varchar(2) DEFAULT NULL,
  `polizasegurocopia_tra` varchar(2) DEFAULT NULL,
  `polizasegurolegalizado_tra` varchar(2) DEFAULT NULL,
  `polizasegurofotocopia_tra` varchar(2) DEFAULT NULL,
  `certifanalisisnumero_tra` varchar(16) DEFAULT NULL,
  `certifanalisisfecha_tra` date DEFAULT NULL,
  `certifanalisiscantidad_tra` int(11) DEFAULT NULL,
  `certifanalisisoriginal_tra` varchar(2) DEFAULT NULL,
  `certifanalisiscopia_tra` varchar(2) DEFAULT NULL,
  `certifanalisislegalizado_tra` varchar(2) DEFAULT NULL,
  `certifanalisisfotocopia_tra` varchar(2) DEFAULT NULL,
  `hojarutamingobnumero_tra` varchar(16) DEFAULT NULL,
  `hojarutamingobfecha_tra` date DEFAULT NULL,
  `hojarutamingobcantidad_tra` int(11) DEFAULT NULL,
  `hojarutamingoboriginal_tra` varchar(2) DEFAULT NULL,
  `hojarutamingobcopia_tra` varchar(2) DEFAULT NULL,
  `hojarutamingoblegalizado_tra` varchar(2) DEFAULT NULL,
  `hojarutamingobfotocopia_tra` varchar(2) DEFAULT NULL,
  `autgobley1008numero_tra` varchar(16) DEFAULT NULL,
  `autgobley1008fecha_tra` date DEFAULT NULL,
  `autgobley1008cantidad_tra` int(11) DEFAULT NULL,
  `autgobley1008original_tra` varchar(2) DEFAULT NULL,
  `autgobley1008copia_tra` varchar(2) DEFAULT NULL,
  `autgobley1008legalizado_tra` varchar(2) DEFAULT NULL,
  `autgobley1008fotocopia_tra` varchar(2) DEFAULT NULL,
  `guiaereanumero_tra` varchar(16) DEFAULT NULL,
  `guiaereafecha_tra` date DEFAULT NULL,
  `guiaereacantidad_tra` int(11) DEFAULT NULL,
  `guiaereaoriginal_tra` varchar(2) DEFAULT NULL,
  `guiaereacopia_tra` varchar(2) DEFAULT NULL,
  `guiaerealegalizado_tra` varchar(2) DEFAULT NULL,
  `guiaereafotocopia_tra` varchar(2) DEFAULT NULL,
  `certiffletenumero_tra` varchar(16) DEFAULT NULL,
  `certiffletefecha_tra` date DEFAULT NULL,
  `certiffletecantidad_tra` int(11) DEFAULT NULL,
  `certiffleteoriginal_tra` varchar(2) DEFAULT NULL,
  `certiffletecopia_tra` varchar(2) DEFAULT NULL,
  `certiffletelegalizado_tra` varchar(2) DEFAULT NULL,
  `certiffletefotocopia_tra` varchar(2) DEFAULT NULL,
  `guiacouriernumero_tra` varchar(16) DEFAULT NULL,
  `guiacourierfecha_tra` date DEFAULT NULL,
  `guiacouriercantidad_tra` int(11) DEFAULT NULL,
  `guiacourieroriginal_tra` varchar(2) DEFAULT NULL,
  `guiacouriercopia_tra` varchar(2) DEFAULT NULL,
  `guiacourierlegalizado_tra` varchar(2) DEFAULT NULL,
  `guiacourierfotocopia_tra` varchar(2) DEFAULT NULL,
  `formdecmernumero_tra` varchar(16) DEFAULT NULL,
  `formdecmerfecha_tra` date DEFAULT NULL,
  `formdecmercantidad_tra` int(11) DEFAULT NULL,
  `formdecmeroriginal_tra` varchar(2) DEFAULT NULL,
  `formdecmercopia_tra` varchar(2) DEFAULT NULL,
  `formdecmerlegalizado_tra` varchar(2) DEFAULT NULL,
  `formdecmerfotocopia_tra` varchar(2) DEFAULT NULL,
  `formregvehnumero_tra` varchar(16) DEFAULT NULL,
  `formregvehfecha_tra` date DEFAULT NULL,
  `formregvehcantidad_tra` int(11) DEFAULT NULL,
  `formregvehoriginal_tra` varchar(2) DEFAULT NULL,
  `formregvehcopia_tra` varchar(2) DEFAULT NULL,
  `formregvehlegalizado_tra` varchar(2) DEFAULT NULL,
  `formregvehfotocopia_tra` varchar(2) DEFAULT NULL,
  `formregmaqnumero_tra` varchar(16) DEFAULT NULL,
  `formregmaqfecha_tra` date DEFAULT NULL,
  `formregmaqcantidad_tra` int(11) DEFAULT NULL,
  `formregmaqoriginal_tra` varchar(2) DEFAULT NULL,
  `formregmaqcopia_tra` varchar(2) DEFAULT NULL,
  `formregmaqlegalizado_tra` varchar(2) DEFAULT NULL,
  `formregmaqfotocopia_tra` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_tramite`),
  KEY `fk_tramite_id_cliente_tra` (`id_cliente_tra`),
  KEY `fk_tramite_id_usuario_tra` (`id_usuario_tra`),
  CONSTRAINT `fk_tramite_id_cliente_tra` FOREIGN KEY (`id_cliente_tra`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `fk_tramite_id_usuario_tra` FOREIGN KEY (`id_usuario_tra`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tramite`
--

LOCK TABLES `tramite` WRITE;
/*!40000 ALTER TABLE `tramite` DISABLE KEYS */;
INSERT INTO `tramite` VALUES (1,1,1,'001-2018','LA CUMPLIDORA POR SIEMPRE','JAPON','NIPONES',100,'NELSON',15.5,'REGIMEN ABIERTO','ASFASDF',6.69,'DE TODO UN POCO','ALFKJKLKASF','NINGUNA','76032555','amontoya@gmail.com',10,10,10,10,10,10,'AC','tramite recepcionado normalmente','rojo','100','2018-06-06',10000,100,100,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,10,'103','LA PROPIA','EEUU','GALLO',100,'ASLKFJ ALKF ',10,'REGIMEN CERRADO','NINGUNO',6.68,'DE TODO DE DE TODO','DOCUMENTOS DOCUMENTOS....','NINGUNA','9876544','correo@gmail.com',1000,1000,1000,1000,1000,1000,'AC','TRAMITE RECEPCIONADO CON EXITO','VERDE','54654','2018-06-05',10000,80,80,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,1,10,'100-2018','MI ADUANA ','ALEMANIA','POLLO',150,'CRISTIAN MARCELO',80,'REGIMEN','SI',7.96,'ROPA DE INVIERNO','NINGUNO','NINGUNO','9876541','cristian@gmail.com',100,100,100,100,100,100,'ac','esta glosa esd e pruba','rojo','100','0000-00-00',500,10,10,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,12,'101-2018','NINGUNO','PRUEBA','PRUEBA',100,'CRISTIAN',100,'ADUANA INTERNA','ROPA',6.79,'MECADERIA INDUSTRIAL','BOLIVIA','500','7654123','aduana@gmail.com',100,100,101,105,150,150,'ac','glosa glosa glosa','verde','100','0000-00-00',500,500,5,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,9,'102-2018','MI ADUANA','SAN PABLO','EEUU',500,'CRISTIAN',500,'RÉGIMEN','REGIMEN',6.95,'ASDASD','BOLIVIA','BOLIVIA','4555654654','cristian@gmail.com',500,600,700,800,900,1000,'ac','ALSDKJFA LSKDJF ALSKJDF AÑSLKJ','VERDE','46545','0000-00-00',5454,5,5,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,1,10,'105-2018','bolivia','bolivia','bolivia',100,'cristian',485,'REGIMEN','REGIMEN',6.95,'ROPA DE INVIERNO','BOLIVIA','BOLIVIA','987987','cristian@gmail.com',500,600,700,800,900,1000,'ac','asdfasdfasdf','amarillo','987987','0000-00-00',880045,5,5,'2018-06-15 21:42:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,1,16,'200-2018','XXXX','XXXX','XXXX',10,'CRISTIAN',100,'ADUANERO','VARIOS',6.97,'VARIOS','BOLIVIA','AAFFF','76045646','amontoya@gmail.com',100,100,100,100,100,100,'AC','VARIOS','ROJO','6546','2018-06-19',800,10,10,'2018-06-19 20:42:51',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
INSERT INTO `usuario` VALUES (1,'123','admin','nd','654','admin','admin@gmail.com','123','321','123',0);
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

-- Dump completed on 2018-06-27 16:24:10
