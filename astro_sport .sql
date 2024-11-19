-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: astro_sport
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `idcompra` int NOT NULL,
  `producto_id` int NOT NULL,
  `cantidad` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tallaID` int DEFAULT NULL,
  KEY `producto_id` (`producto_id`),
  KEY `idcompra` (`idcompra`),
  KEY `tallaID` (`tallaID`),
  CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`Codigo`),
  CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`id`),
  CONSTRAINT `carrito_ibfk_3` FOREIGN KEY (`tallaID`) REFERENCES `tallas` (`id_talla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (0,3,'3',35),(0,19,'2',37),(0,2,'1',32),(1,19,'2',38),(1,36,'1',48),(1,88,'2',50),(2,17,'2',38),(3,14,'20',36),(4,4,'1',32);
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `nombre` varchar(45) DEFAULT NULL,
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES ('botines',0),('guantes de arquero',1),('remeras',2),('kits de entrenamiento',3),('accesorios',4),('calzado',5);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `DNI` int NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `edad` int DEFAULT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (43525325,'sdadasda','fafa','dsafas','santi.buhler1@gmail.com',231,'12345678',16);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra` (
  `id` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `precioFinal` varchar(45) DEFAULT NULL,
  `Cliente_Dni` int DEFAULT NULL,
  `pagado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Cliente_Dni` (`Cliente_Dni`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`Cliente_Dni`) REFERENCES `clientes` (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (0,'2024-11-14','337',43525325,'apple_pay'),(1,'2024-11-16','130',43525325,'Mastercard '),(2,'2024-11-17','80',43525325,'apple_pay'),(3,'2024-11-17','1700',43525325,'Mastercard '),(4,'2024-11-19',NULL,43525325,NULL);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `Codigo` int NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `precio` int DEFAULT NULL,
  `subcategoria_idsubcategoria` int NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_productos_subcategoria1_idx` (`subcategoria_idsubcategoria`),
  CONSTRAINT `fk_productos_subcategoria1` FOREIGN KEY (`subcategoria_idsubcategoria`) REFERENCES `subcategoria` (`idsubcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (0,'nike','mercurial superfly',110,0,'/imagenes/BOTINES-tapones/BOTINES-tapones1.jpg',50),(1,'puma','ultra ultimate',90,0,'/imagenes/BOTINES-tapones/BOTINES-tapones2.jpg',50),(2,'puma','future 7',77,0,'/imagenes/BOTINES-tapones/BOTINES-tapones3.jpg',50),(3,'puma','future ultimate',89,0,'/imagenes/BOTINES-tapones/BOTINES-tapones4.jpg',0),(4,'nike','mercurial vapor 14 academy fg',70,0,'/imagenes/BOTINES-tapones/BOTINES-tapones5.jpg',50),(5,'nike','mercurial vapor 14 academy mg',80,0,'/imagenes/BOTINES-tapones/BOTINES-tapones6.jpg',50),(6,'adidas','predator',105,0,'/imagenes/BOTINES-tapones/BOTINES-tapones7.jpg',50),(7,'adidas','X 18',95,0,'/imagenes/BOTINES-tapones/BOTINES-tapones8.jpg',0),(9,'umbro','pro 5',80,1,'/imagenes/BOTINES-s-tapones/BotinDeFutsal1.webp',50),(10,'kelme','indoor copa',75,1,'/imagenes/BOTINES-s-tapones/BotinDeFutsal2.jpg',50),(11,'adidas','X crazy fast legue tf',95,1,'/imagenes/BOTINES-s-tapones/BotinDeFutsal3.webp',50),(12,'nike','mercurial vapor 15 academy',120,1,'/imagenes/BOTINES-s-tapones/BotinDeFutsal4.webp',50),(13,'puma','future match',75,1,'/imagenes/BOTINES-s-tapones/BotinDeFutsal5.png',50),(14,'umbro','pro 6',85,1,'/imagenes/BOTINES-s-tapones/BotinDeFutsal6.jpg',50),(15,'umbro','pro 5 bump dragon',90,1,'/imagenes/BOTINES-s-tapones/BotinDeFutsal7.webp',0),(16,'nike','tiempo leyend 9',65,1,'/imagenes/BOTINES-s-tapones/BotinDeFutsal8.webp',50),(17,'reusch','attrakt starter',40,2,'/imagenes/guantes/guantes1.jpg',50),(18,'DRB','leader 22',55,2,'/imagenes/guantes/guantes2.jpg',50),(19,'DRB','leader 22 pro',35,2,'/imagenes/guantes/guantes3.png',50),(20,'DRB','master 22',60,2,'/imagenes/guantes/guantes4.jpg',50),(21,'DRB','feline 22',55,2,'/imagenes/guantes/guantes5.png',0),(22,'reusch','attrakt infinity',40,2,'/imagenes/guantes/guantes6.jpg',50),(23,'reusch','pure contact',60,2,'/imagenes/guantes/guantes7.jpg',50),(24,'VGFC','turnen',55,2,'/imagenes/guantes/guantes8.jpg',50),(25,'puma','ultra grip',35,3,'/imagenes/guantes/guantes9.jpg',50),(26,'VGFC','bursa',70,3,'/imagenes/guantes/guantesflat1.jpg',50),(27,'VGFC','roth',50,3,'/imagenes/guantes/guantesflat2.jpg',0),(28,'shinestone','kalesi',30,3,'/imagenes/guantes/guantesflat3.webp',0),(29,'reusch','attakt fusion',40,3,'/imagenes/guantes/guantesflat4.webp',50),(30,'ho','protek blade',40,3,'/imagenes/guantes/guantesflat5.jpg',50),(31,'ho','arena',20,3,'/imagenes/guantes/guantesflat6.jpg',50),(32,'ho','axilal',20,3,'/imagenes/guantes/guantesflat7.jpg',50),(33,'amago','los pumas',25,4,'/imagenes/musculasas/remeraM1.jpg',0),(34,'imago','dry lite',25,4,'/imagenes/musculasas/remeraM2.jpg',50),(35,'imago','tawhiri',23,4,'/imagenes/musculasas/remeraM3.jpg',50),(36,'adidas','boca',30,4,'/imagenes/musculasas/remeraM5.webp',50),(37,'adidas','river',30,4,'/imagenes/musculasas/remeraM6.jpg',50),(38,'puma','indeoendiente',20,4,'/imagenes/musculasas/remeraM7.jpeg',50),(39,'kappa','racing',18,4,'/imagenes/musculasas/remeraM8.jpg',50),(40,'nike','barcelona',35,4,'/imagenes/musculasas/remerasM11.jpg',50),(41,'imago','microfibra',18,5,'/imagenes/remeras-depor/remera1.jpg',50),(42,'puma','manchater city',50,5,'/imagenes/remeras-depor/remera3.jpg',50),(43,'underarmor','tela fit',18,5,'/imagenes/remeras-depor/remera4.jpg',50),(44,'aidas','argentina',30,5,'/imagenes/remeras-depor/remera5.jpg',50),(45,'reebok','atletic dept',22,5,'/imagenes/remeras-depor/remera6.jpg',50),(46,NULL,'roja',12,5,'/imagenes/remeras-depor/remera2.jpg',50),(47,'adidas','real madrid',50,5,'/imagenes/remeras-depor/remera9.jpg',50),(48,'sg','local',20,5,'/imagenes/remeras-depor/remera7.jpg',50),(49,NULL,'Escaleras',5,6,'/imagenes/KitsDeEntrenamiento/Escaleras.webp',50),(50,NULL,'Barra',25,6,'/imagenes/KitsDeEntrenamiento/BarraEntrenamiento.jpg',50),(51,NULL,'Discos',10,6,'/imagenes/KitsDeEntrenamiento/DiscosDeLasPesas.jpg',50),(52,NULL,'Pesa Rusa',40,6,'/imagenes/KitsDeEntrenamiento/kettlebell.jpg',50),(53,NULL,'Rueda Abdominales',12,6,'/imagenes/KitsDeEntrenamiento/ruedaabs.jpg',50),(54,NULL,'Caja',105,6,'/imagenes/KitsDeEntrenamiento/cajon.jpg',50),(55,NULL,'Pelota Con Peso',55,6,'/imagenes/KitsDeEntrenamiento/pelotaconpeso.jpg',50),(56,NULL,'Colchonetas',20,6,'/imagenes/KitsDeEntrenamiento/Colchonetas.jpg',50),(57,NULL,'Pesas',120,7,'/imagenes/KitsDeEntrenamiento/setmancuernas.jpg',50),(58,NULL,'Bandas Elasticas',30,7,'/imagenes/KitsDeEntrenamiento/bandaselasticas.jpg',50),(59,NULL,'Soga con Agarre',14,7,'/imagenes/KitsDeEntrenamiento/conmanija.jpg',50),(60,NULL,'Banco Plano',100,7,'/imagenes/KitsDeEntrenamiento/banco.jpg',50),(61,NULL,'Barra',15,7,'/imagenes/KitsDeEntrenamiento/barra.jpg',50),(62,NULL,'Pera Box',10,7,'/imagenes/KitsDeEntrenamiento/pera.jpg',50),(63,NULL,'Guantes Boxeo',45,7,'/imagenes/KitsDeEntrenamiento/guantesbox.jpg',50),(64,NULL,'Tobilleras Peso',2,7,'/imagenes/KitsDeEntrenamiento/tobillera-con-peso.jpg',50),(65,NULL,'Muñequeras',5,7,'/imagenes/KitsDeEntrenamiento/muñequerasdearena.jpg',50),(66,NULL,'Pelota De Basquet',15,8,'/imagenes/Accesorios/basquet.jpg',50),(67,'Adidas','Pelota De Futbol 11',80,8,'/imagenes/Accesorios/Pelota11.avif',50),(68,'Givova','Pelota De Futsal',62,8,'/imagenes/Accesorios/givova.jpeg',50),(69,'Penn','Pelota De Tennis',3,8,'/imagenes/Accesorios/pelotatenis.jpg',50),(70,NULL,'Pelota De Golf',16,8,'/imagenes/Accesorios/golf.jpg',50),(71,'Penalty','Pelota De Handball',50,8,'/imagenes/Accesorios/handball.jpg',50),(72,NULL,'Pelota De Ping Pong',1,8,'/imagenes/Accesorios/pelotapingpong.jpg',50),(73,'Sorma','Pelota De Volley',45,8,'/imagenes/Accesorios/volley.jpg',50),(74,'Gilbert','Pelota De Rugby',15,8,'/imagenes/Accesorios/ovalada.webp',50),(75,NULL,'Soga',5,9,'/imagenes/Accesorios/soga.jpg',50),(76,'Presslove','Straps',13,9,'/imagenes/Accesorios/straps.jpg',50),(77,'Nassau','Palo De Hockey',13,9,'/imagenes/Accesorios/palodehockey.jpg',50),(78,'Wilson','Raqueta De Tenis',365,9,'/imagenes/Accesorios/raquetatenis.jpg',50),(79,'Head Speed','Raqueta De Padel',400,9,'/imagenes/Accesorios/raquetapadel.jpg',50),(80,'Callaway','Palo De Golf',285,9,'/imagenes/Accesorios/palodegolf.jpg',50),(81,NULL,'Badminton Racket',475,9,'/imagenes/Accesorios/badminton.jpg',50),(82,'Kipsta BA100','Guante De Beisbol',120,9,'/imagenes/Accesorios/guantebeisbol.avif',50),(83,'HAT HITTER','Palo De Beisbol',5,9,'/imagenes/Accesorios/palobeisbol.webp',50),(84,'Under Armor','Zapatilla Runner Negra',123,10,'/imagenes/Calzado/ZapatillasPaCorrer.avif',50),(85,'Under Armor','Zapatilla Runner',110,10,'/imagenes/Calzado/ZapatillasPaCorrer2.avif',50),(86,'Nike','Medias Runner',30,10,'/imagenes/Calzado/MediasCorrer.avif',50),(87,'Fox Socks','Medias Antideslizantes',15,10,'/imagenes/Calzado/MediasAntideslizantes.jpg',50),(88,'Fox Socks','Medias Antideslizantes B&W',15,10,'/imagenes/Calzado/MediasAntideslizantes2.avif',50),(89,'Proyec','Vendas Box',13,10,'/imagenes/Calzado/vendasBox.jpg',50),(90,'Nike','Guantes Gym',45,10,'/imagenes/Calzado/guantes.jpeg',50),(91,'Wilson','Calza Corta',25,10,'/imagenes/Calzado/Calza.png',50),(92,'Body Care','Calza Larga',45,10,'/imagenes/Calzado/CalzaLarga.jpg',50);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategoria`
--

DROP TABLE IF EXISTS `subcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcategoria` (
  `nombre` varchar(45) DEFAULT NULL,
  `idsubcategoria` int NOT NULL,
  `categoria_id` int DEFAULT NULL,
  PRIMARY KEY (`idsubcategoria`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategoria`
--

LOCK TABLES `subcategoria` WRITE;
/*!40000 ALTER TABLE `subcategoria` DISABLE KEYS */;
INSERT INTO `subcategoria` VALUES ('botines con tapones',0,0),('botines sin tapones',1,0),('Corte Negativo',2,1),('Corte Flat',3,1),('muscualosas',4,2),('deportivas',5,2),('campo',6,3),('gym',7,3),('Pelotas',8,4),('Instrumentos',9,4),('Zapas',10,5);
/*!40000 ALTER TABLE `subcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tallas`
--

DROP TABLE IF EXISTS `tallas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tallas` (
  `id_talla` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `nombre_talla` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_talla`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `tallas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tallas`
--

LOCK TABLES `tallas` WRITE;
/*!40000 ALTER TABLE `tallas` DISABLE KEYS */;
INSERT INTO `tallas` VALUES (31,0,'35'),(32,0,'36'),(33,0,'37'),(34,0,'38'),(35,0,'39'),(36,0,'40'),(37,1,'S'),(38,1,'M'),(39,1,'L'),(40,1,'XL'),(41,1,'XXL'),(42,1,'XXXL'),(43,2,'S'),(44,2,'M'),(45,2,'L'),(46,2,'XL'),(47,2,'XXL'),(48,2,'XXXL'),(49,5,'36'),(50,5,'37'),(51,5,'38'),(52,5,'39'),(53,5,'40'),(54,5,'41');
/*!40000 ALTER TABLE `tallas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-19 17:32:16
