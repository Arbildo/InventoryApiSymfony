-- TO-DO
-- IMPLEMENT MIGRATIONS

-- MySQL dump 10.15  Distrib 10.0.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: inventory_bd
-- ------------------------------------------------------
-- Server version	10.0.38-MariaDB-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cargo`
--

DROP TABLE IF EXISTS `tbl_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cargo` (
  `ID_CARGO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(200) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_CARGO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cargo`
--

LOCK TABLES `tbl_cargo` WRITE;
/*!40000 ALTER TABLE `tbl_cargo` DISABLE KEYS */;
INSERT INTO `tbl_cargo` VALUES (2,'ALMACENERO',1),(3,'JEFE ALMACENERO',1);
/*!40000 ALTER TABLE `tbl_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cliente`
--

DROP TABLE IF EXISTS `tbl_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cliente` (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO` varchar(200) NOT NULL,
  `NOMBRE` varchar(200) NOT NULL,
  `ID_TIPO` int(11) DEFAULT NULL,
  `NUMERO_DOC` varchar(200) NOT NULL,
  `DIRECCION` varchar(200) NOT NULL,
  `CORREO` varchar(200) NOT NULL,
  `TELEFONO` varchar(200) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`),
  KEY `ID_TIPO` (`ID_TIPO`),
  CONSTRAINT `tbl_cliente_ibfk_1` FOREIGN KEY (`ID_TIPO`) REFERENCES `tbl_tipo_documento` (`ID_TIPO`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cliente`
--

LOCK TABLES `tbl_cliente` WRITE;
/*!40000 ALTER TABLE `tbl_cliente` DISABLE KEYS */;
INSERT INTO `tbl_cliente` VALUES (1,'CL000001','Universal Textiles SAC',1,'20046516541','Calle Liberato 325, la victoria','utextiles.venteas@gmail.com','0174536465',1),(2,'CL000002','Ramos Fabricaciones',1,'20105456532','Calle Cajamarquillo 105, La Victoria','ventasfabramongmail.com','0171234658',1),(3,'CL000003','Acrilicos Jordan SAC',1,'20156454613','Av. Colectora 245, Santa Anita','acrilicosj@gmail.com','0154656541',1),(4,'CL000004','Tejidos San Ignacio',1,'20787973214','Av. Michael Faraday 758, Ate','venta.ignacion@gmail.com','0187465468',1),(5,'CL000005','Compañia E&M',1,'20454574846','Av. Cantobello 189, Lurigancho','eym.ventas@gmail.com','0175154665',1),(6,'CL000006','Confecciones Michel',1,'20545468471','CalleHuaylas 466, Olivos','Michelleconfe@gmail.com','0174546461',1),(7,'CL000007','Daniela Caceres Dorregaray',2,'47646595','Calle Las Cruzadas 264, Comas','Dcaceres@gmail.com','942563988',1),(8,'CL000008','Alejandra Gutierrez Sosa',2,'46517952','Calle. meza retables lote D, Comas','Aguit@hotmail.com','7452136',1),(9,'CL000009','MASTER NEGOCIOS E.I.R.L.',1,'20548612226','','','',1),(10,'CL000010','CUTTI MEJIA JOSE MANUEL',1,'10465880347','','','944886925',1),(11,'CL000011','CORDERO VASQUEZ JAIME ANTONIO',1,'10465880347','','','944886925',1),(12,'CL000012','SBCC ENGINEERS SOLUTIONS S.A.C.',1,'20565764366','','','987654344',1),(13,'CL000013','JULYSA KAREN SAUCEDO NECIOSUP',2,'47089237','','','015503553',1),(14,'CL000014','HELEN GAMBOA PEREZ',2,'47344444','','','014555434',1),(15,'CL000015','RAQUEL QUISPE HUAMAN',2,'45656533','jr. Tahuantisuyo 252','raquel01@gmail.com','983431334',1),(16,'CL000016','EDITH CONDORI AQUISE',2,'43454354','jr. Wiracocha 132','edith02@gmail.com','987654343',1),(17,'CL000017','JESSICA PICHARDI LLAMOCA',2,'43535345','jr. chinchaisuyo 198 ','jess_10@gmail.com','946132434',1),(18,'CL000018','DISTRIBUIDORA Y SERVICIOS COMERCIALES M & M E.I.R.L. ',1,'20454938730','','','',1),(19,'CL000019','CORPORACION VIMAC EMPRESA INDIVIDUAL DE RESPONSABILIDAD LIMITADA ',1,'20448294448','','','',1),(20,'CL000020','CORPORACION MERU E.I.R.L. ',1,'20448205798','','','',1),(21,'CL000021','DISTRIBUCIONES Y REPRESENTACIONES RAIMER E.I.R.L. ',1,'20448159745','','','',1),(22,'CL000022','COMERCIAL SECME S.A.C. ',1,'20448127380','','','',1),(23,'CL000023','CORPORACION DICOMSA S.A.C.',1,'20448127118','','','',1),(24,'CL000024','JL. NEGOCIOS CAR E.I.R.L. ',1,'20448099238','','','',1),(25,'CL000025','IMPORT & EXPORT ARPASI E.I.R.L. ',1,'20448052941','','','',1),(26,'CL000026','ALEXANDRA SUAREZ PEREZ',2,'45532224','av. chimu 746','alexa123@gmail.com','015501332',1),(27,'CL000027','rooto',1,'32432432423','234324','','234234232',3),(28,'CL000028','BRIGHITTE LOPEZ CASAS',2,'01234567','av. habich','brayan01@gmail.com','987654321',1),(29,'CL000029','PAOLA ARBOLEDA CACERES',2,'45568491','jr. charles sutton 199','plablo01@gmail.com','953461346',1);
/*!40000 ALTER TABLE `tbl_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_detalle_pedido`
--

DROP TABLE IF EXISTS `tbl_detalle_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_detalle_pedido` (
  `ID_DETALLE_PEDIDO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEDIDO` int(11) DEFAULT NULL,
  `ID_PRODUCTO_DETALLE` int(11) DEFAULT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `PRECIO` decimal(12,2) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_DETALLE_PEDIDO`),
  KEY `ID_PEDIDO` (`ID_PEDIDO`),
  KEY `ID_PRODUCTO_DETALLE` (`ID_PRODUCTO_DETALLE`),
  CONSTRAINT `tbl_detalle_pedido_ibfk_1` FOREIGN KEY (`ID_PEDIDO`) REFERENCES `tbl_pedido` (`ID_PEDIDO`),
  CONSTRAINT `tbl_detalle_pedido_ibfk_2` FOREIGN KEY (`ID_PRODUCTO_DETALLE`) REFERENCES `tbl_producto_detalle` (`ID_PRODUCTO_DETALLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_detalle_pedido`
--

LOCK TABLES `tbl_detalle_pedido` WRITE;
/*!40000 ALTER TABLE `tbl_detalle_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_detalle_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lote`
--

DROP TABLE IF EXISTS `tbl_lote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_lote` (
  `ID_LOTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(200) NOT NULL,
  `FECHA_VENCIMIENTO` date DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_LOTE`),
  KEY `fk_lote_estado_id` (`ESTADO`),
  CONSTRAINT `fk_lote_estado_id` FOREIGN KEY (`ESTADO`) REFERENCES `tbl_lote_estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lote`
--

LOCK TABLES `tbl_lote` WRITE;
/*!40000 ALTER TABLE `tbl_lote` DISABLE KEYS */;
INSERT INTO `tbl_lote` VALUES (1,'LOTE DEL MES DE ABRIL','2019-04-30',2,'2019-03-31 13:48:24'),(2,'LOTE DEL MES DE MAYO','2019-05-31',2,'2019-04-30 14:49:33'),(3,'LOTE DEL MES DE OCTUBRE','2019-10-31',2,'2019-09-30 14:51:09');
/*!40000 ALTER TABLE `tbl_lote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lote_estado`
--

DROP TABLE IF EXISTS `tbl_lote_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_lote_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lote_estado`
--

LOCK TABLES `tbl_lote_estado` WRITE;
/*!40000 ALTER TABLE `tbl_lote_estado` DISABLE KEYS */;
INSERT INTO `tbl_lote_estado` VALUES (1,'ACTIVO'),(2,'VENCIDO');
/*!40000 ALTER TABLE `tbl_lote_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pedido`
--

DROP TABLE IF EXISTS `tbl_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pedido` (
  `ID_PEDIDO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `ID_ENCARGADO` int(11) DEFAULT NULL,
  `ESTADO` int(11) NOT NULL COMMENT '4=pendiente,5=completo,6=incompleto,7=anulado,11=atendido,12=atendido fuera de tiempo, 14=incometo fuera de tiempo',
  `FECHA_PEDIDO` datetime NOT NULL,
  `TOTAL` double(6,2) NOT NULL,
  PRIMARY KEY (`ID_PEDIDO`),
  KEY `ID_CLIENTE` (`ID_CLIENTE`),
  KEY `ID_ENCARGADO` (`ID_ENCARGADO`),
  CONSTRAINT `tbl_pedido_ibfk_3` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `tbl_cliente` (`ID_CLIENTE`),
  CONSTRAINT `tbl_pedido_ibfk_4` FOREIGN KEY (`ID_ENCARGADO`) REFERENCES `tbl_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pedido`
--

LOCK TABLES `tbl_pedido` WRITE;
/*!40000 ALTER TABLE `tbl_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_perdida`
--

DROP TABLE IF EXISTS `tbl_perdida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_perdida` (
  `ID_PERDIDA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DETALLE_PRODUCTO` int(11) DEFAULT NULL,
  `CODIGO` varchar(50) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DESCRIPCION` text NOT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PERDIDA`),
  KEY `ID_DETALLE_PRODUCTO` (`ID_DETALLE_PRODUCTO`),
  KEY `fk_perdida_estado_id` (`ESTADO`),
  CONSTRAINT `fk_perdida_estado_id` FOREIGN KEY (`ESTADO`) REFERENCES `tbl_perdida_estado` (`id`),
  CONSTRAINT `tbl_perdida_ibfk_1` FOREIGN KEY (`ID_DETALLE_PRODUCTO`) REFERENCES `tbl_producto_detalle` (`ID_PRODUCTO_DETALLE`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_perdida`
--

LOCK TABLES `tbl_perdida` WRITE;
/*!40000 ALTER TABLE `tbl_perdida` DISABLE KEYS */;
INSERT INTO `tbl_perdida` VALUES (50,45,'PERDIDA-50','2019-10-01 15:36:00',4,'Pérdida de producto',2),(51,46,'PERDIDA-51','2019-10-02 15:36:00',11,'Pérdida de producto',2),(52,47,'PERDIDA-52','2019-10-03 15:36:00',4,'Pérdida de producto',2),(53,48,'PERDIDA-53','2019-10-04 15:36:00',5,'Pérdida de producto',2),(54,49,'PERDIDA-54','2019-10-05 15:36:00',3,'Pérdida de producto',2),(55,50,'PERDIDA-55','2019-10-06 15:36:00',10,'Pérdida de producto',2),(56,51,'PERDIDA-56','2019-10-07 15:36:00',9,'Pérdida de producto',2),(57,52,'PERDIDA-57','2019-10-08 15:36:00',5,'Pérdida de producto',2),(58,53,'PERDIDA-58','2019-10-09 15:36:00',6,'Pérdida de producto',2),(59,54,'PERDIDA-59','2019-10-10 15:36:00',9,'Pérdida de producto',2),(60,55,'PERDIDA-60','2019-10-11 15:36:00',9,'Pérdida de producto',2),(61,56,'PERDIDA-61','2019-10-12 15:36:00',3,'Pérdida de producto',2),(62,57,'PERDIDA-62','2019-10-13 15:36:00',7,'Pérdida de producto',2),(63,58,'PERDIDA-63','2019-10-14 15:36:00',5,'Pérdida de producto',2),(64,59,'PERDIDA-64','2019-10-15 15:36:00',8,'Pérdida de producto',2),(65,60,'PERDIDA-65','2019-10-16 15:36:00',4,'Pérdida de producto',2),(66,61,'PERDIDA-66','2019-10-17 15:36:00',9,'Pérdida de producto',2),(67,62,'PERDIDA-67','2019-10-18 15:36:00',7,'Pérdida de producto',2),(68,63,'PERDIDA-68','2019-10-19 15:36:00',5,'Pérdida de producto',2),(69,64,'PERDIDA-69','2019-10-20 15:36:00',6,'Pérdida de producto',2),(70,65,'PERDIDA-70','2019-10-21 15:36:00',4,'Pérdida de producto',2),(71,66,'PERDIDA-71','2019-10-22 15:36:00',6,'Pérdida de producto',2),(72,58,'PERDIDA-72','2019-10-09 15:36:00',6,'Pérdida de producto',2),(73,63,'PERDIDA-73','2019-10-19 15:36:00',9,'Pérdida de producto',2),(74,65,'PERDIDA-74','2019-10-21 15:36:00',8,'Pérdida de producto',2),(75,58,'PERDIDA-75','2019-10-14 15:36:00',7,'Pérdida de producto',2),(76,66,'PERDIDA-76','2019-10-22 15:36:00',6,'Pérdida de producto',2),(77,7,'PERDIDA-77','2019-12-11 14:03:43',2,'DescripciónDescripciónDescripción',1);
/*!40000 ALTER TABLE `tbl_perdida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_perdida_estado`
--

DROP TABLE IF EXISTS `tbl_perdida_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_perdida_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_perdida_estado`
--

LOCK TABLES `tbl_perdida_estado` WRITE;
/*!40000 ALTER TABLE `tbl_perdida_estado` DISABLE KEYS */;
INSERT INTO `tbl_perdida_estado` VALUES (1,'PENDIENTE'),(2,'ATENDIDO');
/*!40000 ALTER TABLE `tbl_perdida_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_producto`
--

DROP TABLE IF EXISTS `tbl_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_producto` (
  `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(200) NOT NULL,
  `CODIGO` varchar(200) NOT NULL,
  `ID_TIPO` int(11) DEFAULT NULL,
  `ID_UNIDAD` int(11) DEFAULT NULL,
  `DESCRIPCION` varchar(200) NOT NULL,
  `ID_ESTADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `ID_CLASE` (`ID_TIPO`),
  KEY `ID_UNIDAD` (`ID_UNIDAD`),
  KEY `tbl_producto_ibfk_3` (`ID_ESTADO`),
  CONSTRAINT `tbl_producto_ibfk_1` FOREIGN KEY (`ID_TIPO`) REFERENCES `tbl_tipo_producto` (`ID_TIPO`),
  CONSTRAINT `tbl_producto_ibfk_2` FOREIGN KEY (`ID_UNIDAD`) REFERENCES `tbl_unidad_medida` (`ID_UNIDAD`),
  CONSTRAINT `tbl_producto_ibfk_3` FOREIGN KEY (`ID_ESTADO`) REFERENCES `tbl_producto_estado` (`ID_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_producto`
--

LOCK TABLES `tbl_producto` WRITE;
/*!40000 ALTER TABLE `tbl_producto` DISABLE KEYS */;
INSERT INTO `tbl_producto` VALUES (1,'YI Outdoor','P0001',1,1,'Cámara de exterior',1),(2,'Sricam SP017','P0001',1,1,'Cámara de exterior',1),(3,'XVIM 8CH 4-in-1 720P','P0003',1,1,'Cámara de exterior',1),(4,'Smonet 4CH 720','P0004',1,1,'Cámara de exterior',1),(5,'Extintores PQS ABC 12 kg','P0005',2,1,'Extintor de polvo seco',1),(6,'Wall Safety 6kg','P0006',2,1,'Extintor de polvo químico',1),(7,'Extintores PQS ABC 2 kg','P0007',2,1,'Extintor para auto-polvo seco',1),(8,'DS150i Series','P0008',3,1,'Detectores de Salida',1),(9,'ISC-PB1-100','P0009',3,1,'Pulsador de pánico, GLT',1),(10,'F220 Photoelectric','P0010',5,1,'Detectores de humo',1),(11,'F220-B6RS','P0011',5,1,'Base con sirena y relé tipo A, 4 cables',1),(12,'AMC2','P0012',6,1,'Controlador de acceso modular',1),(13,'SmartYIBA','P0013',3,1,'Sistema de alarma WIFI SmartYIBA Android IOS APP Alarmas con equipos de alarma de intrusos de seguridad para el hogar',1),(14,'Sannce 1080P','P0014',1,1,'Kit de 4 Cámaras de Vigilancia para la Casa ',1),(15,'SzinoCAM','P0015',4,1,'Kits de Cámaras de Seguridad Inalámbricas IP con LED’s Infrarrojos para CCTV',1),(16,'Anran 1920P','P0016',1,1,'Sistema de Cámaras IP de Vigilancia para Casas CCTV ANRAN 1920P',1),(17,'Arlo','P0017',4,1,'Kit de Cámaras de Vigilancia con Audio sin Cables',1),(18,'AnniCam','P0018',1,1,'Kits de Cámaras de Seguridad con Visión Nocturna para CCTV',1),(19,'Extintor C2 ','P0019',2,1,'Extintor de CO2 de 10KG',1),(20,'Apeman FHD 1080P','P0020',4,1,'Cámara para interiores',1),(21,'Smtaly C2','P0021',4,1,'Cámara de  exterior',1),(22,'Avemia 700 ','P0022',1,1,'Camara Domo Antivandalica, alcance Ir 25 Mt ',1);
/*!40000 ALTER TABLE `tbl_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_producto_detalle`
--

DROP TABLE IF EXISTS `tbl_producto_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_producto_detalle` (
  `ID_PRODUCTO_DETALLE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PRODUCTO` int(11) DEFAULT NULL,
  `ID_LOTE` int(11) DEFAULT NULL,
  `STOCK_INICIAL` int(11) NOT NULL,
  `STOCK_MINIMO` int(11) NOT NULL,
  `PRECIO` decimal(12,2) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `STOCK_ACTUAL` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID_PRODUCTO_DETALLE`),
  KEY `id_producto` (`ID_PRODUCTO`),
  KEY `ID_LOTE` (`ID_LOTE`),
  KEY `fk_estado_id` (`estado`),
  CONSTRAINT `fk_estado_id` FOREIGN KEY (`estado`) REFERENCES `tbl_producto_detalle_estado` (`id`),
  CONSTRAINT `tbl_producto_detalle_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `tbl_producto` (`ID_PRODUCTO`),
  CONSTRAINT `tbl_producto_detalle_ibfk_3` FOREIGN KEY (`ID_LOTE`) REFERENCES `tbl_lote` (`ID_LOTE`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_producto_detalle`
--

LOCK TABLES `tbl_producto_detalle` WRITE;
/*!40000 ALTER TABLE `tbl_producto_detalle` DISABLE KEYS */;
INSERT INTO `tbl_producto_detalle` VALUES (1,1,1,127,10,150.00,1,127),(2,2,1,110,10,150.00,2,110),(3,3,1,115,10,150.00,2,115),(4,4,1,111,10,150.00,2,111),(5,5,1,126,10,150.00,2,126),(6,6,1,125,10,150.00,2,125),(7,7,1,130,10,150.00,2,130),(8,8,1,129,10,150.00,2,129),(9,9,1,125,10,150.00,2,125),(10,10,1,116,10,150.00,2,116),(11,11,1,120,10,150.00,2,120),(12,12,1,112,10,150.00,2,112),(13,13,1,120,10,150.00,2,120),(14,14,1,114,10,150.00,2,114),(15,15,1,111,10,150.00,2,111),(16,16,1,122,10,150.00,2,122),(17,17,1,117,10,150.00,2,117),(18,18,1,115,10,150.00,2,115),(19,19,1,112,10,150.00,2,112),(20,20,1,110,10,150.00,2,110),(21,21,1,121,10,150.00,2,121),(22,22,1,112,10,150.00,2,112),(45,1,3,138,10,177.00,2,119),(46,2,3,120,10,148.00,2,106),(47,3,3,121,10,178.00,2,112),(48,4,3,119,10,150.00,2,110),(49,5,3,135,10,169.00,2,119),(50,6,3,138,10,160.00,2,118),(51,7,3,137,10,172.00,2,129),(52,8,3,137,10,178.00,2,121),(53,9,3,137,10,165.00,2,124),(54,10,3,133,10,145.00,2,113),(55,11,3,129,10,157.00,2,113),(56,12,3,129,10,158.00,2,107),(57,13,3,127,10,170.00,2,118),(58,14,3,130,10,159.00,2,106),(59,15,3,122,10,171.00,2,110),(60,16,3,132,10,149.00,2,121),(61,17,3,128,10,147.00,2,114),(62,18,3,119,10,170.00,2,113),(63,19,3,121,10,179.00,2,106),(64,20,3,120,10,164.00,2,105),(65,21,3,133,10,145.00,2,113),(66,22,3,125,10,179.00,2,105),(67,2,1,127,10,150.00,1,127),(68,2,1,127,10,150.00,1,127);
/*!40000 ALTER TABLE `tbl_producto_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_producto_detalle_estado`
--

DROP TABLE IF EXISTS `tbl_producto_detalle_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_producto_detalle_estado` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_producto_detalle_estado`
--

LOCK TABLES `tbl_producto_detalle_estado` WRITE;
/*!40000 ALTER TABLE `tbl_producto_detalle_estado` DISABLE KEYS */;
INSERT INTO `tbl_producto_detalle_estado` VALUES (1,'DISPONIBLE'),(2,'AGOTADO');
/*!40000 ALTER TABLE `tbl_producto_detalle_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_producto_estado`
--

DROP TABLE IF EXISTS `tbl_producto_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_producto_estado` (
  `ID_ESTADO` int(11) NOT NULL,
  `ESTADO` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_producto_estado`
--

LOCK TABLES `tbl_producto_estado` WRITE;
/*!40000 ALTER TABLE `tbl_producto_estado` DISABLE KEYS */;
INSERT INTO `tbl_producto_estado` VALUES (0,'INACTIVO'),(1,'ACTIVO');
/*!40000 ALTER TABLE `tbl_producto_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_documento`
--

DROP TABLE IF EXISTS `tbl_tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_documento` (
  `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO` varchar(200) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_TIPO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_documento`
--

LOCK TABLES `tbl_tipo_documento` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_documento` DISABLE KEYS */;
INSERT INTO `tbl_tipo_documento` VALUES (1,'RUC',1),(2,'DNI',1);
/*!40000 ALTER TABLE `tbl_tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_producto`
--

DROP TABLE IF EXISTS `tbl_tipo_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_producto` (
  `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(200) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_TIPO`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_producto`
--

LOCK TABLES `tbl_tipo_producto` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_producto` DISABLE KEYS */;
INSERT INTO `tbl_tipo_producto` VALUES (1,'CCTV',1),(2,'EXTINTOR',1),(3,'ALARMA',1),(4,'CAMARA IP',1),(5,'SISTEMA DE DETECCIÓN',1),(6,'SISTEMA DE CONTROL DE ACCESO',1);
/*!40000 ALTER TABLE `tbl_tipo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_unidad_medida`
--

DROP TABLE IF EXISTS `tbl_unidad_medida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_unidad_medida` (
  `ID_UNIDAD` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(200) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_UNIDAD`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_unidad_medida`
--

LOCK TABLES `tbl_unidad_medida` WRITE;
/*!40000 ALTER TABLE `tbl_unidad_medida` DISABLE KEYS */;
INSERT INTO `tbl_unidad_medida` VALUES (1,'UNIDAD',1);
/*!40000 ALTER TABLE `tbl_unidad_medida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO` varchar(10) DEFAULT NULL,
  `NOMBRES` varchar(200) NOT NULL,
  `APELLIDOS` varchar(200) NOT NULL,
  `USUARIO` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `ID_CARGO` int(11) DEFAULT NULL,
  `CORREO` varchar(200) NOT NULL,
  `FOTO` varchar(30) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `ID_CARGO` (`ID_CARGO`),
  KEY `tbl_usuario_ibfk_2` (`ESTADO`),
  CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`ID_CARGO`) REFERENCES `tbl_cargo` (`ID_CARGO`),
  CONSTRAINT `tbl_usuario_ibfk_2` FOREIGN KEY (`ESTADO`) REFERENCES `tbl_usuario_estado` (`ID_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (1,'CLI-1','JUANECO','JUAN','JUAN','123',3,'juan@juan.pe','----',1),(2,'CLI-2','Pepito','JUAN','pepe_pepito','123456',2,'root@idigital.com',NULL,1),(3,'CLI-3','Pepito','Pepe','pepe_pepito','123456',2,'pepe@gmail.com',NULL,0);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario_estado`
--

DROP TABLE IF EXISTS `tbl_usuario_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuario_estado` (
  `ID_ESTADO` int(11) NOT NULL,
  `ESTADO` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario_estado`
--

LOCK TABLES `tbl_usuario_estado` WRITE;
/*!40000 ALTER TABLE `tbl_usuario_estado` DISABLE KEYS */;
INSERT INTO `tbl_usuario_estado` VALUES (0,'INACTIVO'),(1,'ACTIVO');
/*!40000 ALTER TABLE `tbl_usuario_estado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-11 17:07:13
