-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_personal
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.19-MariaDB

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
-- Table structure for table `table_banco`
--

DROP TABLE IF EXISTS `table_banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_banco` (
  `cod` int(11) NOT NULL COMMENT 'Primary Key',
  `banco` text DEFAULT NULL COMMENT 'NOmbre del banco',
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='newTable';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_banco`
--

LOCK TABLES `table_banco` WRITE;
/*!40000 ALTER TABLE `table_banco` DISABLE KEYS */;
INSERT INTO `table_banco` VALUES (1,'BANCO CENTRAL DE VENEZUELA'),(102,'BANCO DE VENEZUELA S.A.C.A. BANCO UNIVERSAL'),(104,'VENEZOLANO DE CRÉDITO, S.A. BANCO UNIVERSAL'),(105,'BANCO MERCANTIL, C.A. S.A.C.A. BANCO UNIVERSAL'),(108,'BANCO PROVINCIAL, S.A. BANCO UNIVERSAL'),(114,'BANCO DEL CARIBE, C.A. BANCO UNIVERSAL'),(115,'BANCO EXTERIOR, C.A. BANCO UNIVERSAL'),(116,'BANCO OCCIDENTAL DE DESCUENTO BANCO UNIVERSAL, C.A.'),(128,'BANCO CARONI, C.A. BANCO UNIVERSAL'),(134,'BANESCO BANCO UNIVERSAL S.A.C.A.'),(137,'BANCO SOFITASA BANCO UNIVERSAL, C.A.'),(138,'BANCO PLAZA, BANCO UNIVERSAL C.A.'),(146,'BANCO DE LA GENTE EMPRENDEDORA BANGENTE, C.A.'),(149,'BANCO DEL PUEBLO SOBERANO, BANCO DE DESARROLLO'),(151,'BFC BANCO FONDO COMUN C.A. BANCO UNIVERSAL'),(157,'DELSUR BANCO UNIVERSAL, C.A.'),(163,'BANCO DEL TESORO, C.A. BANCO UNIVERSAL'),(166,'BANCO AGRICOLA DE VENEZUELA, C.A. BANCO UNIVERSAL'),(168,'BANCRECER S.A. BANCO DE DESARROLLO'),(169,'MI BANCO, BANCO MICROFINANCIERO, C.A.'),(171,'BANCO ACTIVO, C.A. BANCO UNIVERSAL'),(172,'BANCAMIGA BANCO MICROFINANCIERO, C.A.'),(173,'BANCO INTERNACIONAL DE DESARROLLO, C.A. BANCO UNIVERSAL'),(174,'BANPLUS BANCO UNIVERAL, C.A.'),(175,'BANCO BICENTENARIO BANCO UNIVERSAL, C.A.'),(176,'NOVO BANCO, S.A. SUCURSAL VENEZUELA BANCO UNIVERSAL'),(177,'BANCO DE LA FUERZA ARMADA NACIONAL BOLIVARIANA, B.U.'),(190,'CITIBANK N.A.'),(191,'BANCO NACIONAL CRÉDITO, C.A. BANCO UNIVERSAL');
/*!40000 ALTER TABLE `table_banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_block`
--

DROP TABLE IF EXISTS `table_block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_block` (
  `user_id` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL,
  `token` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_block`
--

LOCK TABLES `table_block` WRITE;
/*!40000 ALTER TABLE `table_block` DISABLE KEYS */;
INSERT INTO `table_block` VALUES ('1',0,'0'),('2',0,'0');
/*!40000 ALTER TABLE `table_block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_ciudades`
--

DROP TABLE IF EXISTS `table_ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_ciudades` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `capital` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_ciudad`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=523 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_ciudades`
--

LOCK TABLES `table_ciudades` WRITE;
/*!40000 ALTER TABLE `table_ciudades` DISABLE KEYS */;
INSERT INTO `table_ciudades` VALUES (1,1,'Maroa',0),(2,1,'Puerto Ayacucho',1),(3,1,'San Fernando de Atabapo',0),(4,2,'Anaco',0),(5,2,'Aragua de Barcelona',0),(6,2,'Barcelona',1),(7,2,'Boca de Uchire',0),(8,2,'Cantaura',0),(9,2,'Clarines',0),(10,2,'El Chaparro',0),(11,2,'El Pao Anzoátegui',0),(12,2,'El Tigre',0),(13,2,'El Tigrito',0),(14,2,'Guanape',0),(15,2,'Guanta',0),(16,2,'Lechería',0),(17,2,'Onoto',0),(18,2,'Pariaguán',0),(19,2,'Píritu',0),(20,2,'Puerto La Cruz',0),(21,2,'Puerto Píritu',0),(22,2,'Sabana de Uchire',0),(23,2,'San Mateo Anzoátegui',0),(24,2,'San Pablo Anzoátegui',0),(25,2,'San Tomé',0),(26,2,'Santa Ana de Anzoátegui',0),(27,2,'Santa Fe Anzoátegui',0),(28,2,'Santa Rosa',0),(29,2,'Soledad',0),(30,2,'Urica',0),(31,2,'Valle de Guanape',0),(43,3,'Achaguas',0),(44,3,'Biruaca',0),(45,3,'Bruzual',0),(46,3,'El Amparo',0),(47,3,'El Nula',0),(48,3,'Elorza',0),(49,3,'Guasdualito',0),(50,3,'Mantecal',0),(51,3,'Puerto Páez',0),(52,3,'San Fernando de Apure',1),(53,3,'San Juan de Payara',0),(54,4,'Barbacoas',0),(55,4,'Cagua',0),(56,4,'Camatagua',0),(58,4,'Choroní',0),(59,4,'Colonia Tovar',0),(60,4,'El Consejo',0),(61,4,'La Victoria',0),(62,4,'Las Tejerías',0),(63,4,'Magdaleno',0),(64,4,'Maracay',1),(65,4,'Ocumare de La Costa',0),(66,4,'Palo Negro',0),(67,4,'San Casimiro',0),(68,4,'San Mateo',0),(69,4,'San Sebastián',0),(70,4,'Santa Cruz de Aragua',0),(71,4,'Tocorón',0),(72,4,'Turmero',0),(73,4,'Villa de Cura',0),(74,4,'Zuata',0),(75,5,'Barinas',1),(76,5,'Barinitas',0),(77,5,'Barrancas',0),(78,5,'Calderas',0),(79,5,'Capitanejo',0),(80,5,'Ciudad Bolivia',0),(81,5,'El Cantón',0),(82,5,'Las Veguitas',0),(83,5,'Libertad de Barinas',0),(84,5,'Sabaneta',0),(85,5,'Santa Bárbara de Barinas',0),(86,5,'Socopó',0),(87,6,'Caicara del Orinoco',0),(88,6,'Canaima',0),(89,6,'Ciudad Bolívar',1),(90,6,'Ciudad Piar',0),(91,6,'El Callao',0),(92,6,'El Dorado',0),(93,6,'El Manteco',0),(94,6,'El Palmar',0),(95,6,'El Pao',0),(96,6,'Guasipati',0),(97,6,'Guri',0),(98,6,'La Paragua',0),(99,6,'Matanzas',0),(100,6,'Puerto Ordaz',0),(101,6,'San Félix',0),(102,6,'Santa Elena de Uairén',0),(103,6,'Tumeremo',0),(104,6,'Unare',0),(105,6,'Upata',0),(106,7,'Bejuma',0),(107,7,'Belén',0),(108,7,'Campo de Carabobo',0),(109,7,'Canoabo',0),(110,7,'Central Tacarigua',0),(111,7,'Chirgua',0),(112,7,'Ciudad Alianza',0),(113,7,'El Palito',0),(114,7,'Guacara',0),(115,7,'Guigue',0),(116,7,'Las Trincheras',0),(117,7,'Los Guayos',0),(118,7,'Mariara',0),(119,7,'Miranda',0),(120,7,'Montalbán',0),(121,7,'Morón',0),(122,7,'Naguanagua',0),(123,7,'Puerto Cabello',0),(124,7,'San Joaquín',0),(125,7,'Tocuyito',0),(126,7,'Urama',0),(127,7,'Valencia',1),(128,7,'Vigirimita',0),(129,8,'Aguirre',0),(130,8,'Apartaderos Cojedes',0),(131,8,'Arismendi',0),(132,8,'Camuriquito',0),(133,8,'El Baúl',0),(134,8,'El Limón',0),(135,8,'El Pao Cojedes',0),(136,8,'El Socorro',0),(137,8,'La Aguadita',0),(138,8,'Las Vegas',0),(139,8,'Libertad de Cojedes',0),(140,8,'Mapuey',0),(141,8,'Piñedo',0),(142,8,'Samancito',0),(143,8,'San Carlos',1),(144,8,'Sucre',0),(145,8,'Tinaco',0),(146,8,'Tinaquillo',0),(147,8,'Vallecito',0),(148,9,'Tucupita',1),(149,24,'Caracas',1),(150,24,'El Junquito',0),(151,10,'Adícora',0),(152,10,'Boca de Aroa',0),(153,10,'Cabure',0),(154,10,'Capadare',0),(155,10,'Capatárida',0),(156,10,'Chichiriviche',0),(157,10,'Churuguara',0),(158,10,'Coro',1),(159,10,'Cumarebo',0),(160,10,'Dabajuro',0),(161,10,'Judibana',0),(162,10,'La Cruz de Taratara',0),(163,10,'La Vela de Coro',0),(164,10,'Los Taques',0),(165,10,'Maparari',0),(166,10,'Mene de Mauroa',0),(167,10,'Mirimire',0),(168,10,'Pedregal',0),(169,10,'Píritu Falcón',0),(170,10,'Pueblo Nuevo Falcón',0),(171,10,'Puerto Cumarebo',0),(172,10,'Punta Cardón',0),(173,10,'Punto Fijo',0),(174,10,'San Juan de Los Cayos',0),(175,10,'San Luis',0),(176,10,'Santa Ana Falcón',0),(177,10,'Santa Cruz De Bucaral',0),(178,10,'Tocopero',0),(179,10,'Tocuyo de La Costa',0),(180,10,'Tucacas',0),(181,10,'Yaracal',0),(182,11,'Altagracia de Orituco',0),(183,11,'Cabruta',0),(184,11,'Calabozo',0),(185,11,'Camaguán',0),(196,11,'Chaguaramas Guárico',0),(197,11,'El Socorro',0),(198,11,'El Sombrero',0),(199,11,'Las Mercedes de Los Llanos',0),(200,11,'Lezama',0),(201,11,'Onoto',0),(202,11,'Ortíz',0),(203,11,'San José de Guaribe',0),(204,11,'San Juan de Los Morros',1),(205,11,'San Rafael de Laya',0),(206,11,'Santa María de Ipire',0),(207,11,'Tucupido',0),(208,11,'Valle de La Pascua',0),(209,11,'Zaraza',0),(210,12,'Aguada Grande',0),(211,12,'Atarigua',0),(212,12,'Barquisimeto',1),(213,12,'Bobare',0),(214,12,'Cabudare',0),(215,12,'Carora',0),(216,12,'Cubiro',0),(217,12,'Cují',0),(218,12,'Duaca',0),(219,12,'El Manzano',0),(220,12,'El Tocuyo',0),(221,12,'Guaríco',0),(222,12,'Humocaro Alto',0),(223,12,'Humocaro Bajo',0),(224,12,'La Miel',0),(225,12,'Moroturo',0),(226,12,'Quíbor',0),(227,12,'Río Claro',0),(228,12,'Sanare',0),(229,12,'Santa Inés',0),(230,12,'Sarare',0),(231,12,'Siquisique',0),(232,12,'Tintorero',0),(233,13,'Apartaderos Mérida',0),(234,13,'Arapuey',0),(235,13,'Bailadores',0),(236,13,'Caja Seca',0),(237,13,'Canaguá',0),(238,13,'Chachopo',0),(239,13,'Chiguara',0),(240,13,'Ejido',0),(241,13,'El Vigía',0),(242,13,'La Azulita',0),(243,13,'La Playa',0),(244,13,'Lagunillas Mérida',0),(245,13,'Mérida',1),(246,13,'Mesa de Bolívar',0),(247,13,'Mucuchíes',0),(248,13,'Mucujepe',0),(249,13,'Mucuruba',0),(250,13,'Nueva Bolivia',0),(251,13,'Palmarito',0),(252,13,'Pueblo Llano',0),(253,13,'Santa Cruz de Mora',0),(254,13,'Santa Elena de Arenales',0),(255,13,'Santo Domingo',0),(256,13,'Tabáy',0),(257,13,'Timotes',0),(258,13,'Torondoy',0),(259,13,'Tovar',0),(260,13,'Tucani',0),(261,13,'Zea',0),(262,14,'Araguita',0),(263,14,'Carrizal',0),(264,14,'Caucagua',0),(265,14,'Chaguaramas Miranda',0),(266,14,'Charallave',0),(267,14,'Chirimena',0),(268,14,'Chuspa',0),(269,14,'Cúa',0),(270,14,'Cupira',0),(271,14,'Curiepe',0),(272,14,'El Guapo',0),(273,14,'El Jarillo',0),(274,14,'Filas de Mariche',0),(275,14,'Guarenas',0),(276,14,'Guatire',0),(277,14,'Higuerote',0),(278,14,'Los Anaucos',0),(279,14,'Los Teques',1),(280,14,'Ocumare del Tuy',0),(281,14,'Panaquire',0),(282,14,'Paracotos',0),(283,14,'Río Chico',0),(284,14,'San Antonio de Los Altos',0),(285,14,'San Diego de Los Altos',0),(286,14,'San Fernando del Guapo',0),(287,14,'San Francisco de Yare',0),(288,14,'San José de Los Altos',0),(289,14,'San José de Río Chico',0),(290,14,'San Pedro de Los Altos',0),(291,14,'Santa Lucía',0),(292,14,'Santa Teresa',0),(293,14,'Tacarigua de La Laguna',0),(294,14,'Tacarigua de Mamporal',0),(295,14,'Tácata',0),(296,14,'Turumo',0),(297,15,'Aguasay',0),(298,15,'Aragua de Maturín',0),(299,15,'Barrancas del Orinoco',0),(300,15,'Caicara de Maturín',0),(301,15,'Caripe',0),(302,15,'Caripito',0),(303,15,'Chaguaramal',0),(305,15,'Chaguaramas Monagas',0),(307,15,'El Furrial',0),(308,15,'El Tejero',0),(309,15,'Jusepín',0),(310,15,'La Toscana',0),(311,15,'Maturín',1),(312,15,'Miraflores',0),(313,15,'Punta de Mata',0),(314,15,'Quiriquire',0),(315,15,'San Antonio de Maturín',0),(316,15,'San Vicente Monagas',0),(317,15,'Santa Bárbara',0),(318,15,'Temblador',0),(319,15,'Teresen',0),(320,15,'Uracoa',0),(321,16,'Altagracia',0),(322,16,'Boca de Pozo',0),(323,16,'Boca de Río',0),(324,16,'El Espinal',0),(325,16,'El Valle del Espíritu Santo',0),(326,16,'El Yaque',0),(327,16,'Juangriego',0),(328,16,'La Asunción',1),(329,16,'La Guardia',0),(330,16,'Pampatar',0),(331,16,'Porlamar',0),(332,16,'Puerto Fermín',0),(333,16,'Punta de Piedras',0),(334,16,'San Francisco de Macanao',0),(335,16,'San Juan Bautista',0),(336,16,'San Pedro de Coche',0),(337,16,'Santa Ana de Nueva Esparta',0),(338,16,'Villa Rosa',0),(339,17,'Acarigua',0),(340,17,'Agua Blanca',0),(341,17,'Araure',0),(342,17,'Biscucuy',0),(343,17,'Boconoito',0),(344,17,'Campo Elías',0),(345,17,'Chabasquén',0),(346,17,'Guanare',1),(347,17,'Guanarito',0),(348,17,'La Aparición',0),(349,17,'La Misión',0),(350,17,'Mesa de Cavacas',0),(351,17,'Ospino',0),(352,17,'Papelón',0),(353,17,'Payara',0),(354,17,'Pimpinela',0),(355,17,'Píritu de Portuguesa',0),(356,17,'San Rafael de Onoto',0),(357,17,'Santa Rosalía',0),(358,17,'Turén',0),(359,18,'Altos de Sucre',0),(360,18,'Araya',0),(361,18,'Cariaco',0),(362,18,'Carúpano',0),(363,18,'Casanay',0),(364,18,'Cumaná',1),(365,18,'Cumanacoa',0),(366,18,'El Morro Puerto Santo',0),(367,18,'El Pilar',0),(368,18,'El Poblado',0),(369,18,'Guaca',0),(370,18,'Guiria',0),(371,18,'Irapa',0),(372,18,'Manicuare',0),(373,18,'Mariguitar',0),(374,18,'Río Caribe',0),(375,18,'San Antonio del Golfo',0),(376,18,'San José de Aerocuar',0),(377,18,'San Vicente de Sucre',0),(378,18,'Santa Fe de Sucre',0),(379,18,'Tunapuy',0),(380,18,'Yaguaraparo',0),(381,18,'Yoco',0),(382,19,'Abejales',0),(383,19,'Borota',0),(384,19,'Bramon',0),(385,19,'Capacho',0),(386,19,'Colón',0),(387,19,'Coloncito',0),(388,19,'Cordero',0),(389,19,'El Cobre',0),(390,19,'El Pinal',0),(391,19,'Independencia',0),(392,19,'La Fría',0),(393,19,'La Grita',0),(394,19,'La Pedrera',0),(395,19,'La Tendida',0),(396,19,'Las Delicias',0),(397,19,'Las Hernández',0),(398,19,'Lobatera',0),(399,19,'Michelena',0),(400,19,'Palmira',0),(401,19,'Pregonero',0),(402,19,'Queniquea',0),(403,19,'Rubio',0),(404,19,'San Antonio del Tachira',0),(405,19,'San Cristobal',1),(406,19,'San José de Bolívar',0),(407,19,'San Josecito',0),(408,19,'San Pedro del Río',0),(409,19,'Santa Ana Táchira',0),(410,19,'Seboruco',0),(411,19,'Táriba',0),(412,19,'Umuquena',0),(413,19,'Ureña',0),(414,20,'Batatal',0),(415,20,'Betijoque',0),(416,20,'Boconó',0),(417,20,'Carache',0),(418,20,'Chejende',0),(419,20,'Cuicas',0),(420,20,'El Dividive',0),(421,20,'El Jaguito',0),(422,20,'Escuque',0),(423,20,'Isnotú',0),(424,20,'Jajó',0),(425,20,'La Ceiba',0),(426,20,'La Concepción de Trujllo',0),(427,20,'La Mesa de Esnujaque',0),(428,20,'La Puerta',0),(429,20,'La Quebrada',0),(430,20,'Mendoza Fría',0),(431,20,'Meseta de Chimpire',0),(432,20,'Monay',0),(433,20,'Motatán',0),(434,20,'Pampán',0),(435,20,'Pampanito',0),(436,20,'Sabana de Mendoza',0),(437,20,'San Lázaro',0),(438,20,'Santa Ana de Trujillo',0),(439,20,'Tostós',0),(440,20,'Trujillo',1),(441,20,'Valera',0),(442,21,'Carayaca',0),(443,21,'Litoral',0),(444,25,'Archipiélago Los Roques',0),(445,22,'Aroa',0),(446,22,'Boraure',0),(447,22,'Campo Elías de Yaracuy',0),(448,22,'Chivacoa',0),(449,22,'Cocorote',0),(450,22,'Farriar',0),(451,22,'Guama',0),(452,22,'Marín',0),(453,22,'Nirgua',0),(454,22,'Sabana de Parra',0),(455,22,'Salom',0),(456,22,'San Felipe',1),(457,22,'San Pablo de Yaracuy',0),(458,22,'Urachiche',0),(459,22,'Yaritagua',0),(460,22,'Yumare',0),(461,23,'Bachaquero',0),(462,23,'Bobures',0),(463,23,'Cabimas',0),(464,23,'Campo Concepción',0),(465,23,'Campo Mara',0),(466,23,'Campo Rojo',0),(467,23,'Carrasquero',0),(468,23,'Casigua',0),(469,23,'Chiquinquirá',0),(470,23,'Ciudad Ojeda',0),(471,23,'El Batey',0),(472,23,'El Carmelo',0),(473,23,'El Chivo',0),(474,23,'El Guayabo',0),(475,23,'El Mene',0),(476,23,'El Venado',0),(477,23,'Encontrados',0),(478,23,'Gibraltar',0),(479,23,'Isla de Toas',0),(480,23,'La Concepción del Zulia',0),(481,23,'La Paz',0),(482,23,'La Sierrita',0),(483,23,'Lagunillas del Zulia',0),(484,23,'Las Piedras de Perijá',0),(485,23,'Los Cortijos',0),(486,23,'Machiques',0),(487,23,'Maracaibo',1),(488,23,'Mene Grande',0),(489,23,'Palmarejo',0),(490,23,'Paraguaipoa',0),(491,23,'Potrerito',0),(492,23,'Pueblo Nuevo del Zulia',0),(493,23,'Puertos de Altagracia',0),(494,23,'Punta Gorda',0),(495,23,'Sabaneta de Palma',0),(496,23,'San Francisco',0),(497,23,'San José de Perijá',0),(498,23,'San Rafael del Moján',0),(499,23,'San Timoteo',0),(500,23,'Santa Bárbara Del Zulia',0),(501,23,'Santa Cruz de Mara',0),(502,23,'Santa Cruz del Zulia',0),(503,23,'Santa Rita',0),(504,23,'Sinamaica',0),(505,23,'Tamare',0),(506,23,'Tía Juana',0),(507,23,'Villa del Rosario',0),(508,21,'La Guaira',1),(509,21,'Catia La Mar',0),(510,21,'Macuto',0),(511,21,'Naiguatá',0),(512,25,'Archipiélago Los Monjes',0),(513,25,'Isla La Tortuga y Cayos adyacentes',0),(514,25,'Isla La Sola',0),(515,25,'Islas Los Testigos',0),(516,25,'Islas Los Frailes',0),(517,25,'Isla La Orchila',0),(518,25,'Archipiélago Las Aves',0),(519,25,'Isla de Aves',0),(520,25,'Isla La Blanquilla',0),(521,25,'Isla de Patos',0),(522,25,'Islas Los Hermanos',0);
/*!40000 ALTER TABLE `table_ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_cuenta`
--

DROP TABLE IF EXISTS `table_cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_cuenta` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `nombreAut` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `banco` int(5) NOT NULL,
  `tipoC` int(1) DEFAULT NULL,
  `cuentaAut` int(1) NOT NULL,
  `nCuenta` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nTarjeta` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ccv` int(3) DEFAULT NULL,
  `usuario` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `passEspecial` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `claveTlf` int(4) DEFAULT NULL,
  `passCajero` int(6) DEFAULT NULL,
  `p1` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `r1` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `p2` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `r2` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `p3` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `r3` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `fechaAct` timestamp NULL DEFAULT current_timestamp(),
  `fecha_venc` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_cuenta`
--

LOCK TABLES `table_cuenta` WRITE;
/*!40000 ALTER TABLE `table_cuenta` DISABLE KEYS */;
INSERT INTO `table_cuenta` VALUES (1,1,'William Enrique',1,0,0,'01082412520100123033','5895240113753108157',574,'14607920','0202*Feb','naca2105',21345,122321,'perro','sapike','carro','honda','comida','pasta',1,'2022-05-09 12:32:00','12/13'),(2,1,'william ',108,0,1,'01020743660000199937','123456789098765',120,'kami0214','0202*Feb','1233',233,1223,'carro ','corsa','colo','azul','carro','mustang',1,'2022-05-09 12:34:20','12/13'),(3,1,'William Enrique',1,0,1,'01050062140062367498','501878200074482276',968,'we2105','0202*Feb','naca2105',2514,89987,'perro','spike','carro','honda','comida','pasta',1,'2022-05-09 12:36:53','12.13'),(4,1,'william',1,1,1,'0987654321','98765432',765,'we21','7654ojnioh','jgyg',6543323,8765,'p1','p2','p3','p4','p4','p4',0,'2022-05-22 22:17:48','1');
/*!40000 ALTER TABLE `table_cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_estados`
--

DROP TABLE IF EXISTS `table_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(250) NOT NULL,
  `iso_3166-2` varchar(4) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_estados`
--

LOCK TABLES `table_estados` WRITE;
/*!40000 ALTER TABLE `table_estados` DISABLE KEYS */;
INSERT INTO `table_estados` VALUES (1,'Amazonas','VE-X'),(2,'Anzoátegui','VE-B'),(3,'Apure','VE-C'),(4,'Aragua','VE-D'),(5,'Barinas','VE-E'),(6,'Bolívar','VE-F'),(7,'Carabobo','VE-G'),(8,'Cojedes','VE-H'),(9,'Delta Amacuro','VE-Y'),(10,'Falcón','VE-I'),(11,'Guárico','VE-J'),(12,'Lara','VE-K'),(13,'Mérida','VE-L'),(14,'Miranda','VE-M'),(15,'Monagas','VE-N'),(16,'Nueva Esparta','VE-O'),(17,'Portuguesa','VE-P'),(18,'Sucre','VE-R'),(19,'Táchira','VE-S'),(20,'Trujillo','VE-T'),(21,'Vargas','VE-W'),(22,'Yaracuy','VE-U'),(23,'Zulia','VE-V'),(24,'Distrito Capital','VE-A'),(25,'Dependencias Federales','VE-Z');
/*!40000 ALTER TABLE `table_estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_evento`
--

DROP TABLE IF EXISTS `table_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `start` varchar(45) DEFAULT NULL,
  `end` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `descript` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_evento`
--

LOCK TABLES `table_evento` WRITE;
/*!40000 ALTER TABLE `table_evento` DISABLE KEYS */;
INSERT INTO `table_evento` VALUES (9,'Modificar todos los iconos','2022-05-25','2022-05-25','#13d858','',1),(10,'Crear  eventos con descripcion','2022-05-25','2022-05-25','#ecf00f','',1),(11,'crear las notas','2022-05-25','2022-05-25','#b4083c','',1);
/*!40000 ALTER TABLE `table_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_file`
--

DROP TABLE IF EXISTS `table_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_file` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `file_size` text DEFAULT NULL,
  `file_ruta` text DEFAULT 'NULL',
  `file_ext` char(5) DEFAULT NULL COMMENT 'extension del archivo',
  `file_status` int(1) DEFAULT NULL COMMENT 'status del archivo',
  `file_date_mod` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'fecha de modificacion',
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_file`
--

LOCK TABLES `table_file` WRITE;
/*!40000 ALTER TABLE `table_file` DISABLE KEYS */;
INSERT INTO `table_file` VALUES (1,1,'8-0500-5087432 provincial.txt','0MB','src/Docs/WILL-01/','txt',1,'2022-05-25 19:42:41'),(2,1,'45-AnyDesk.txt','0MB','src/Docs/WILL-01/','txt',1,'2022-05-25 19:42:41'),(3,1,'27-archivoCSS_GRID.css','0MB','src/Docs/WILL-01/','css',1,'2022-05-25 19:42:41'),(4,1,'33-BetFury.txt','0MB','src/Docs/WILL-01/','txt',1,'2022-05-25 19:42:42'),(5,1,'41-BLOCK FARM CLUB.xlsx','0.01MB','src/Docs/WILL-01/','xlsx',1,'2022-05-25 19:42:42'),(6,1,'36-CalculadoraFarm.xlsx','0.02MB','src/Docs/WILL-01/','xlsx',1,'2022-05-25 19:42:42'),(7,1,'Contactos_Meta.txt','0MB','src/Docs/WILL-01/','txt',1,'2022-05-25 19:43:02'),(8,1,'8-Copia de Calculadora de Retiros - PvU (KManuS88).xlsx','0.01MB','src/Docs/WILL-01/','xlsx',1,'2022-05-25 19:42:42'),(9,1,'44-Credenciales NFT.txt','0MB','src/Docs/WILL-01/','txt',1,'2022-05-25 19:42:42'),(13,1,'42-Cuentas NFT.txt','0MB','src/Docs/WILL-01/','txt',1,'2022-05-25 19:42:43'),(14,1,'Don Frio Refrigeración Spa.docx','0.01MB','src/Docs/WILL-01/','docx',1,'2022-05-25 19:42:55'),(15,1,'16-EstimadoGranja.xlsx','0.01MB','src/Docs/WILL-01/','xlsx',1,'2022-05-25 19:42:43'),(16,1,'34-Copia de Calculadora de Retiros - PvU (KManuS88).xlsx','0.01MB','src/Docs/WILL-01/','xlsx',1,'2022-05-26 00:26:57'),(17,1,'7-huddle-landing-page-with-curved-sections-master.zip','0.73MB','src/Docs/WILL-01/','zip',1,'2022-05-26 00:27:23');
/*!40000 ALTER TABLE `table_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_municipios`
--

DROP TABLE IF EXISTS `table_municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_municipios` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciudad` int(11) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `id_ciudad` (`id_ciudad`)
) ENGINE=InnoDB AUTO_INCREMENT=463 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_municipios`
--

LOCK TABLES `table_municipios` WRITE;
/*!40000 ALTER TABLE `table_municipios` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_sitio`
--

DROP TABLE IF EXISTS `table_sitio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_sitio` (
  `idSitio` int(11) NOT NULL AUTO_INCREMENT,
  `sitio` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `favorite` int(1) DEFAULT NULL,
  `user_id` int(3) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `fecha_update` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idSitio`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_sitio`
--

LOCK TABLES `table_sitio` WRITE;
/*!40000 ALTER TABLE `table_sitio` DISABLE KEYS */;
INSERT INTO `table_sitio` VALUES (1,'FACEBOOK','williamenriqe','hola','hlola',0,1,1,NULL),(2,'FONTAWESOME','we21','TWplLzVUUlY1ZkpOdks3RFpUWXJNQT09','MWM2QUM2R0JpR2xZOWRGcmdIbkdHTU5LWm5NVkFMaXl1Z1h3enFvYXVYRlZhQVRxbUFSckcwRTdlcnZPZWlzOQ',0,1,1,NULL),(3,'site','user','pass','url',0,1,0,NULL),(4,'3commas.io','william21Enrique@gmail.com','william21Enrique','https://3commas.io/es',1,1,1,NULL),(5,'adobeid.services.adobe.com','','Naca*21','https://adobeid.services.adobe.com/reset/en_US/45EVVGRNT2DRYJJ6P15C9PRYW4',0,1,1,NULL),(6,'adobeid-na1.services.adobe.com','william21enrique@gmail.com','Kamila*021','https://adobeid-na1.services.adobe.com/',0,1,1,NULL),(7,'auth.services.adobe.com','william21enrique@gmail.com','Kamila*02','https://auth.services.adobe.com/es_ES/index.html',0,1,1,NULL),(8,'web.airdroid.com','william21enrique@gmail.com','william2105','http://web.airdroid.com/',0,1,1,NULL),(9,'web.airdroid.com','william21enrique@gmail.com','william2105','https://web.airdroid.com/',0,1,1,NULL),(10,'www.alwaysdata.com','william21enrique@gmail.com','william*2105','https://www.alwaysdata.com/en/register/',0,1,1,NULL),(11,'admin.alwaysdata.com','william21enrique@gmail.com','william*2105','https://admin.alwaysdata.com/login/',0,1,1,NULL),(12,'www.amazon.com','william21enrique@gmail.com','naca2105','https://www.amazon.com/',0,1,0,NULL),(13,'elegibilidad.banavih.gob.ve','V14607920','william1402','http://elegibilidad.banavih.gob.ve/',0,1,1,NULL),(14,'elegibilidad.banavih.gob.ve','V15769775','william1402','http://elegibilidad.banavih.gob.ve/',0,NULL,1,NULL),(15,'www.bebee.com','ing.william.enrique@gmail.com','william2105','https://www.bebee.com/join',0,NULL,1,NULL),(16,'accounts.binance.com','william21enrique@gmail.com','william21Enrique','https://accounts.binance.com/en/register',0,NULL,1,NULL),(17,'birdsbank.cash','we2105','william21Enrique','https://birdsbank.cash/signup/',0,NULL,1,NULL),(18,'bitsgap.com','gamenftcrypto@gmail.com','william21Enrique','https://bitsgap.com/',0,NULL,1,NULL),(19,'blockfarm.club','william21enrique@gmail.com','bfcwillEnrique','https://blockfarm.club/register',0,NULL,1,NULL),(20,'blockfarmclub.com','will.blockfarm@gmail.com','william21Enrique','https://blockfarmclub.com/',0,NULL,1,NULL),(21,'blockfarmclub.com','william21enrique@gmail.com','bfcwillEnrique','https://blockfarmclub.com/login',0,NULL,1,NULL),(22,'account.box.com','william21enrique@gmail.com','william2105','https://account.box.com/login/credentials',0,NULL,1,NULL),(23,'btcchain.biz','1KtMc1nqtNXhgsMZHztbbprJcMZTYx6rJJ','william21Enrique','https://btcchain.biz/',0,NULL,1,NULL),(24,'btcchain.biz','we2105','william21Enrique','https://btcchain.biz/',0,NULL,1,NULL),(25,'es.btcnewz.com','william21enrique@gmail.com','william21Enrique','https://es.btcnewz.com/auth/register',0,NULL,1,NULL),(26,'www.bumeran.com.ve','ing.william.enrique@gmail.com','william2105','https://www.bumeran.com.ve/',0,NULL,1,NULL),(27,'www.bumeran.com.ve','will_enrique21@outlook.com','william2105','https://www.bumeran.com.ve/',0,NULL,1,NULL),(28,'www.bybit.com','gamenftcrypto@gmail.com','william21Enrique','https://www.bybit.com/en-US/register',0,NULL,1,NULL),(29,'micuentacorporativa.cantv.com.ve','will_enri','kamila1402','http://micuentacorporativa.cantv.com.ve/',0,NULL,1,NULL),(30,'mifactura.cantv.com.ve','william2105','Kami*0214','https://mifactura.cantv.com.ve/personaWeb/user_b2c/init.uc',0,NULL,1,NULL),(31,'oficina.cantv.net','willianinfante078','cantv15','https://oficina.cantv.net/',0,NULL,1,NULL),(32,'www.canva.com','','kamila*0214','https://www.canva.com/',0,NULL,1,NULL),(33,'www.chainmine.io','we2105','william21Enrique','https://www.chainmine.io/register',0,NULL,1,NULL),(34,'zonavip.ciudadano2cero.com','will.registro@gmail.com','@vip2ce','https://zonavip.ciudadano2cero.com/login-zona-vip/',0,NULL,1,NULL),(35,'www.coinbase.com','william21enrique@gmail.com','corsa*2356','https://www.coinbase.com/signin',0,NULL,1,NULL),(36,'www.coingecko.com','william21enrique@gmail.com','william21Enrique05*','https://www.coingecko.com/es',0,NULL,1,NULL),(37,'coinmarketcap.com','william21enrique@gmail.com','william21Enrique','https://coinmarketcap.com/',0,NULL,1,NULL),(38,'www.coinpayments.net','william21enrique@gmail.com','william21Enrique','https://www.coinpayments.net/login',0,NULL,1,NULL),(39,'www.coinpayu.com','william21enrique@gmail.com','william21Enrique','https://www.coinpayu.com/register',0,NULL,1,NULL),(40,'candidato.ve.computrabajo.com','ing.william.enrique@gmail.com','william2105','https://candidato.ve.computrabajo.co',0,NULL,1,NULL),(41,'www.computrabajo.com.ve','ing.william.enrique@gmail.com','william2105','http://www.computrabajo.com.ve/',0,NULL,1,NULL),(42,'coolors.co','william21enrique@gmail.com','william2105','https://coolors.co/202030-a33b20-09814a-e4dfda-ebbab9',0,NULL,1,NULL),(43,'store.cpanel.net','william21enrique@gmail.com','william2105','https://store.cpanel.net/login/register',0,NULL,1,NULL),(44,'crmlatino.com','crm.latino01@gmail.com','q','http://crmlatino.com/app/',0,NULL,1,NULL),(45,'www.cropbytes.com','william21enrique@gmail.com','william21Enrique','https://www.cropbytes.com/signup',0,NULL,1,NULL),(46,'cursocss.com','william21enrique@gmail.com','william21Enrique','https://cursocss.com/register',0,NULL,1,NULL),(47,'devcode.la','william21enrique@gmail.com','naca2105','https://devcode.la/',0,NULL,1,NULL),(48,'www.deviantart.com','we2105','william2105','https://www.deviantart.com/_sisu/do/signup',0,NULL,1,NULL),(49,'412enlinea.digitel.com.ve','586489','2105','https://412enlinea.digitel.com.ve/Digitel412EnLinea/',0,NULL,1,NULL),(50,'412enlinea.digitel.com.ve','5181629','2105','https://412enlinea.digitel.com.ve/Digitel412EnLinea/',0,NULL,1,NULL),(51,'ais.directvla.com','18189149','rafa101188','https://ais.directvla.com/authenticationendpoint/login.do',0,NULL,1,NULL),(52,'discord.com','we21','william2105','https://discord.com/register',0,NULL,1,NULL),(53,'discord.com','william21enrique@gmail.com','william21Enrique','https://discord.com/login',0,NULL,1,NULL),(54,'cpanel.donfriorefrigeracionspa.cl','donfrior','8	x5Va3	AjFK','https://cpanel.donfriorefrigeracionspa.cl/',0,NULL,1,NULL),(55,'dribbble.com','we21','william2105','https://dribbble.com/signup/new',0,NULL,1,NULL),(56,'ea-mine.com','we21','william21Enrique','http://ea-mine.com/Auth',0,NULL,1,NULL),(57,'ea-mine.com','we21','william21Enrique','https://ea-mine.com/Auth',0,NULL,1,NULL),(58,'signin.ea.com','enriWill','kami2105Enrique','https://signin.ea.com/p/juno/create',0,NULL,1,NULL),(59,'easybtc-mining.com','gamenftcrypto@gmail.com','william21Enrique','https://easybtc-mining.com/register/',0,NULL,1,NULL),(60,'www.evernote.com','william21enrique@gmail.com','William2105*','https://www.evernote.com/Login.action',0,NULL,1,NULL),(61,'expresscrypto.io','we2105','william21Enrique*','https://expresscrypto.io/login',0,NULL,1,NULL),(62,'www.facebook.com','williamenriqe','kami0214','https://www.facebook.com/',0,1,1,NULL),(63,'faucetcrypto.com','william','william21Enrique','https://faucetcrypto.com/ref/301153',0,NULL,1,NULL),(64,'faucetcrypto.com','william21enrique@gmail.com','william21Enrique','https://faucetcrypto.com/register',0,NULL,1,NULL),(65,'faucetpay.io','williamenrique','william21Enrique','https://faucetpay.io/account/register',0,NULL,1,NULL),(66,'tasks.figure-eight.work','ing.william.enrique@gmail.com','William2105','https://tasks.figure-eight.work/sessions/new',0,NULL,1,NULL),(67,'firefaucet.win','we21','william21Enrique','https://firefaucet.win/register',0,NULL,1,NULL),(68,'fontastic.me','william21enrique@gmail.com','william2105','http://fontastic.me/',0,NULL,1,NULL),(69,'app.fontastic.me','william21enrique@gmail.com','william2105','https://app.fontastic.me/accounts/login/',0,NULL,1,NULL),(70,'fontawesome.com','william21enrique@gmail.com','william21Enrique','https://fontawesome.com/sessions/sign-in',0,NULL,1,NULL),(71,'freedogecoin.cloud','DRN1NEz7Zqoft6KdWNLmq2wYqmC4dVftAG','william21Enriqu','https://freedogecoin.cloud/user/login',0,NULL,1,NULL),(72,'www.freelancer.com','','william2105','https://www.freelancer.com/users/reset_user_password.php',0,NULL,1,NULL),(73,'www.freepik.es','we2105','William*2105','https://www.freepik.es/',0,NULL,1,NULL),(74,'freeusdtmining.com','TM6rYoXryhDWEGq7XXJaMspaGNwPFJyvbv','william21Enriqu','https://freeusdtmining.com/user/login',0,NULL,1,NULL),(75,'freeusdtmining.com','we2105','william21Enrique','https://freeusdtmining.com/register',0,NULL,1,NULL),(76,'themes.getbootstrap.com','william21enrique@gmail.com','william210','https://themes.getbootstrap.com/my-account/',0,NULL,1,NULL),(77,'github.com','william21enrique@gmail.com','ingwilliam2105','https://github.com/login',0,NULL,1,NULL),(78,'github.com','williamenrique','ingwilliam2105','https://github.com/login',0,NULL,1,NULL),(79,'gitlab.com','william21enrique@gmail.com','william2105','https://gitlab.com/users/sign_in',0,NULL,1,NULL),(80,'extensions.gnome.org','we21','william2105','https://extensions.gnome.org/accounts/register/',0,NULL,1,NULL),(81,'godsunchained.com','william21enrique@gmail.com','william21Enrique','https://godsunchained.com/account/login',0,NULL,1,NULL),(82,'accounts.google.com','ing.william.enrique','william2105','https://accounts.google.com/',0,NULL,1,NULL),(83,'accounts.google.com','will.registro','2105william','https://accounts.google.com/signin/v2/challenge/pwd',0,NULL,1,NULL),(84,'accounts.google.com','william21enrique@gmail.com','kami*0214','https://accounts.google.com/',0,NULL,1,NULL),(85,'accounts.google.com','ybet.naca','kamilava','https://accounts.google.com/AddSession',0,NULL,1,NULL),(86,'grenbit.com','we21','william21Enrique','https://grenbit.com/reg',0,NULL,1,NULL),(87,'dashboard.honeygain.com','william21enrique@gmail.com','william21Enriqu','https://dashboard.honeygain.com/sign-up',0,NULL,1,NULL),(88,'www.hostinger.mx','servicioswe21web@gmail.com','william21Enrique','https://www.hostinger.mx/',0,NULL,1,NULL),(89,'iceberg.servidordecorreos.com','app','53hlBBMg','https://iceberg.servidordecorreos.com:2222/user/database/create',0,NULL,1,NULL),(90,'iceberg.servidordecorreos.com','transportemudanzas','tr@n5p0App','https://iceberg.servidordecorreos.com:2222/',0,NULL,1,NULL),(91,'icomoon.io','william21enrique@gmail.com','william2105','https://icomoon.io/',0,NULL,1,NULL),(92,'app.infinityfree.net','william21enrique@gmail.com','william2105','https://app.infinityfree.net/register',0,NULL,1,NULL),(93,'www.inter.com.ve','will_enrique21@hotmail.com','william210','http://www.inter.com.ve/servicios/index.html',0,NULL,1,NULL),(94,'mi.inter.com.ve','lachispa_infante@hotmail.com','24infante','https://mi.inter.com.ve/',0,NULL,1,NULL),(95,'mi.inter.com.ve','will_enrique21@outlook.com','Kami*2105','https://mi.inter.com.ve/',0,NULL,1,NULL),(96,'put.intt.gob.ve','','william2105','https://put.intt.gob.ve/index.php',0,NULL,1,NULL),(97,'iqbroker.com','will.registro@gmail.com','william2105','https://iqbroker.com/lp/mobile-partner/es/',0,NULL,1,NULL),(98,'login.iqoption.com','will.registro@gmail.com','william21Enrique','https://login.iqoption.com/es/login',0,NULL,1,NULL),(99,'jusee.ltd','we21','william21Enrique','https://jusee.ltd/',0,NULL,1,NULL),(100,'admin.kiubix.mx','william21enrique@gmail.com','William*2105','https://admin.kiubix.mx/sistema/clientarea.php',0,NULL,1,NULL),(101,'www.linkedin.com','william21enrique@gmail.com','kamila2105','https://www.linkedin.com/uas/captcha-submit',0,NULL,1,NULL),(102,'login.linode.com','we2105','william*2105','https://login.linode.com/signup',0,NULL,1,NULL),(103,'login.live.com','migdaliaacosta65@hotmail.com','7590929','https://login.live.com/login.srf',0,NULL,1,NULL),(104,'login.live.com','will_enrique21@outlook.com','2105william','https://login.live.com/',0,NULL,1,NULL),(105,'login.live.com','ybet_naca@outlook.com','2582naca','https://login.live.com/',0,NULL,1,NULL),(106,'mega.nz','william21enrique@gmail.com','william2105','https://mega.nz/',0,NULL,1,NULL),(107,'www.mercadolibre.com','will_enrique','0214kami','https://www.mercadolibre.com/jms/mlv/lgz/login',0,NULL,1,NULL),(108,'minerpool.online','will.registro@gmail.com','william21Enrique','https://minerpool.online/auth/register',0,NULL,1,NULL),(109,'mining.online','we21','william21Enrique','https://mining.online/',0,NULL,1,NULL),(110,'mining.online','william21enrique@gmail.com','kbkmWFWm','https://mining.online/',0,NULL,1,NULL),(111,'www.mobox.io','we21','william21Enrique','https://www.mobox.io/',0,NULL,1,NULL),(112,'account.mongodb.com','william21enrique@gmail.com','william2105','https://account.mongodb.com/account/login',0,NULL,1,NULL),(113,'www.mudet.com','will.registro@gmail.com','william2105','https://www.mudet.com/registro-club/',0,NULL,1,NULL),(114,'play.mymasterwar.com','william21enrique','william21Enrique','https://play.mymasterwar.com/',0,NULL,1,NULL),(115,'www.nicehash.com','gamenftcrypto@gmail.com','william21Enrique*','https://www.nicehash.com/my/register',0,NULL,1,NULL),(116,'www.okex.com','william21enrique@gmail.com','Onewilliam21','https://www.okex.com/es-es/account/register',0,NULL,1,NULL),(117,'login.oracle.com','william21enrique@gmail.com','William2105','https://login.oracle.com/mysso/signon.jsp',0,NULL,1,NULL),(118,'login.payoneer.com','','william21Enrique','https://login.payoneer.com/changepassword',0,NULL,1,NULL),(119,'www.paypal.com','william21enrique@gmail.com','2105william','https://www.paypal.com/',0,NULL,1,NULL),(120,'pelisplus.co','will.registro@gmail.com','william2105','http://pelisplus.co/auth/login/',0,NULL,1,NULL),(121,'personal.com','agenda@gmail.com','q','http://personal.com/',0,NULL,1,NULL),(122,'poloniex.com','william21enrique@gmail.com','william21Enrique','https://poloniex.com/signup/',0,NULL,1,NULL),(123,'login.poloniex.com','william21enrique@gmail.com','william21Enrique','https://login.poloniex.com/login',0,NULL,1,NULL),(124,'postimages.org','william21enrique@gmail.com','H1k5ThYsyGYL','https://postimages.org/login',0,NULL,1,NULL),(125,'presetsart.com','will.registro@gmail.com','i$cVMFiPKL^9','https://presetsart.com/mi-cuenta/',0,NULL,1,NULL),(126,'prosalud.gob.ve','ybet_naca@outlook.com','15769775','https://prosalud.gob.ve/',0,NULL,1,NULL),(127,'ramines.biz','we21','william21Enrique','https://ramines.biz/',0,NULL,1,NULL),(128,'rollercoin.com','william21enrique@gmail.com','william21Enrique','https://rollercoin.com/sign-up',0,NULL,1,NULL),(129,'secure.runhosting.com','william21enrique@gmail.com','william210','https://secure.runhosting.com/signup_form.html',0,NULL,1,NULL),(130,'www.sammobile.com','we21','william2105','https://www.sammobile.com/login/',0,NULL,1,NULL),(131,'seeljefe.com','williamenriqe','william2105','https://seeljefe.com/site/signup',0,NULL,1,NULL),(132,'contribuyente.seniat.gob.ve','v3812225','v38122','http://contribuyente.seniat.gob.ve/iseniatlogin/contribuyente.do',0,NULL,1,NULL),(133,'contribuyente.seniat.gob.ve','will2105','kami0214','http://contribuyente.seniat.gob.ve/',0,NULL,1,NULL),(134,'contribuyente.seniat.gob.ve','ybet81naca','kami0214','http://contribuyente.seniat.gob.ve/',0,NULL,1,NULL),(135,'server.hostingbricks.com','workinfo','obAr7771aZ','https://server.hostingbricks.com:2083/',0,NULL,1,NULL),(136,'server8.globalhostla.com','contacto','Transpo','https://server8.globalhostla.com:2222/user/email/create-account',0,NULL,1,NULL),(137,'server8.globalhostla.com','transpo4','8Oqm@2*ZD01gVm','https://server8.globalhostla.com:2222/',0,NULL,1,NULL),(138,'iceberg.servidordecorreos.com','transportemudanzas','tr@n5p0Ap','https://iceberg.servidordecorreos.com/webmail/',0,NULL,1,NULL),(139,'soclaieqb.xyz','we2105','william21Enrique','https://soclaieqb.xyz/register.php',0,NULL,1,NULL),(140,'token-club.com','gamenftcrypto@gmail.com','william21Enrique','https://token-club.com/signup',0,NULL,1,NULL),(141,'www.tronair.pro','0x37af5CD5809cc5e971f32521712B1733276B8211','william21Enrique','https://www.tronair.pro/',0,NULL,1,NULL),(142,'www.tronair.pro','0xd47102162886325e2e9346c5F14B231beF50C018','william21Enrique','https://www.tronair.pro/',0,NULL,1,NULL),(143,'www.tronair.pro','0xf4db8a45f36d97d1fefd467e8b14e7073b393b38','william21Enrique','https://www.tronair.pro/',0,NULL,1,NULL),(144,'www.trymyui.com','william21enrique@gmail.com','william2105','https://www.trymyui.com/worker/signup',0,NULL,1,NULL),(145,'turing.ly','ing.william.enrique@gmail.com','william2105','https://turing.ly/signup',0,NULL,1,NULL),(146,'twitter.com','@enri_will','william2105','https://twitter.com/johanaeste',0,1,1,NULL),(147,'api.twitter.com','enri_will','william2105','https://api.twitter.com/oauth/authorize',0,NULL,1,NULL),(148,'login.ubuntu.com','william21enrique@gmail.com','william2105','https://login.ubuntu.com/',0,NULL,1,NULL),(149,'www.udemy.com','william21enrique@gmail.com','william2105','https://www.udemy.com/',0,NULL,1,NULL),(150,'www.virustotal.com','william21enrique@gmail.com','william2105','https://www.virustotal.com/',0,NULL,1,NULL),(151,'w3layouts.com','william21enrique@gmail.com','william2105','https://w3layouts.com/',0,NULL,1,NULL),(152,'my.w3layouts.com','william21enrique@gmail.com','william2105','https://my.w3layouts.com/login/',0,NULL,1,NULL),(153,'marketplace.wanakafarm.com','william21enrique@gmail.com','william21Enriqu','https://marketplace.wanakafarm.com/',0,NULL,1,NULL),(154,'waves.exchange','william21enrique@gmail.com','william21Enrique*','https://waves.exchange/sign-up/email',0,NULL,1,NULL),(155,'www.workana.com','william21enrique@gmail.com','william2105','https://www.workana.com/login',0,NULL,1,NULL),(156,'workinfo.ibx.lat','workinfo','obAr7771aZ','https://workinfo.ibx.lat:2083/',0,NULL,1,NULL),(157,'workinfo.ibx.lat','info@workinfo.ibx.lat','william2105','https://workinfo.ibx.lat:2096/',0,NULL,1,NULL),(158,'www.xm.com','','william21Enriqu','https://www.xm.com/',0,NULL,1,NULL),(159,'my.xm.com','67294674','william21Enriqu','https://my.xm.com/es/member/login',0,NULL,1,NULL),(160,'registrocombustible.yaracuy.gob.ve','LIJISMEL','mamposo','https://registrocombustible.yaracuy.gob.ve/',0,NULL,1,NULL),(161,'registrocombustible.yaracuy.gob.ve','WE2105','william21','https://registrocombustible.yaracuy.gob.ve/usuario/nuevo',0,NULL,1,NULL),(162,'ypmoney.xyz','we2105','william2105','https://ypmoney.xyz/register.php',0,NULL,1,NULL),(163,'us05web.zoom.us','infante','William2105','https://us05web.zoom.us/activate',0,NULL,1,NULL),(164,'faucetpay.zootrx.com','TC3x4F91yc2TKBx6hWcJVMfF3SVYmgTSMR','william21Enrique','https://faucetpay.zootrx.com/',0,NULL,1,NULL),(165,'HLOLA MINDO','jhv hj',' hjb ','jhgvjkljhgu',0,1,1,'2022-05-08 21:10:17'),(166,'COMBINA','cambio','nueva','https://www.srcodigofuente.es/tutoriales/ver-tutorial/if-else-alternativo-php-html',1,1,1,'2022-05-08 23:49:50');
/*!40000 ALTER TABLE `table_sitio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_user`
--

DROP TABLE IF EXISTS `table_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `ci` int(11) DEFAULT NULL,
  `user` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `nick` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ruta` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(4) DEFAULT NULL,
  `ciudad` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `codPostal` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `fecha_reg` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user`
--

LOCK TABLES `table_user` WRITE;
/*!40000 ALTER TABLE `table_user` DISABLE KEYS */;
INSERT INTO `table_user` VALUES (1,14607920,'we23','william21enrique@gmail.com','q','william enrique','infante','Profile-82d7f152.png','WILL-01','src/Docs/WILL-01/','04125181629','calle 34 entre av 10y 11',1,'san felipe','3231','22O35Ri&',1,'2022-05-08 15:30:27'),(2,NULL,NULL,'will.registro@gmail.com','q','enrique I',NULL,NULL,'ENRI-02','src/Docs/ENRI-02/',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-05-20 21:43:07');
/*!40000 ALTER TABLE `table_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-03 10:28:10
