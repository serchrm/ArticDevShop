-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `idAdmin` int NOT NULL,
  PRIMARY KEY (`idAdmin`),
  CONSTRAINT `admin_fk` FOREIGN KEY (`idAdmin`) REFERENCES `usuario` (`idUsuar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `idUsuar` int NOT NULL,
  `idProd` int NOT NULL,
  `cantidad` int DEFAULT NULL,
  PRIMARY KEY (`idUsuar`,`idProd`),
  KEY `carrito_fk2` (`idProd`),
  CONSTRAINT `carrito_fk1` FOREIGN KEY (`idUsuar`) REFERENCES `usuario` (`idUsuar`),
  CONSTRAINT `carrito_fk2` FOREIGN KEY (`idProd`) REFERENCES `producto` (`idProd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(90) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (2,'Tarjetas Graficas','Contamos con un amplia variedad de tarjetas para gaming'),(3,'Procesadores','Tenemos los mejores procesadores del mercado'),(4,'Teclados','Gran variedad de teclados de la mejor calidad'),(5,'Mouses','Los mejores Mouses del mercado, ergonomicos y de las mejores marcas');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cupon`
--

DROP TABLE IF EXISTS `cupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cupon` (
  `idCupon` int NOT NULL,
  `nombreCupon` varchar(80) DEFAULT NULL,
  `descripcion` varchar(160) DEFAULT NULL,
  `porcentaje` tinyint DEFAULT NULL,
  PRIMARY KEY (`idCupon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cupon`
--

LOCK TABLES `cupon` WRITE;
/*!40000 ALTER TABLE `cupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `cupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventario` (
  `numLote` int NOT NULL AUTO_INCREMENT,
  `idProd` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precComp` float(16,2) DEFAULT NULL,
  `precVent` float(16,2) DEFAULT NULL,
  PRIMARY KEY (`numLote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario_venta`
--

DROP TABLE IF EXISTS `inventario_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventario_venta` (
  `numLote` int NOT NULL,
  `idVenta` int NOT NULL,
  `cantidad` int DEFAULT NULL,
  `cupon` int DEFAULT NULL,
  PRIMARY KEY (`numLote`,`idVenta`),
  KEY `invent_fk2` (`idVenta`),
  KEY `inventario_venta_fk3` (`cupon`),
  CONSTRAINT `invent_fk1` FOREIGN KEY (`numLote`) REFERENCES `inventario` (`numLote`),
  CONSTRAINT `invent_fk2` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`numVenta`),
  CONSTRAINT `inventario_venta_fk3` FOREIGN KEY (`cupon`) REFERENCES `cupon` (`idCupon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario_venta`
--

LOCK TABLES `inventario_venta` WRITE;
/*!40000 ALTER TABLE `inventario_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `idProd` int NOT NULL AUTO_INCREMENT,
  `idCateg` int DEFAULT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `descripcion` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`idProd`),
  KEY `producto_fk1` (`idCateg`),
  CONSTRAINT `producto_fk1` FOREIGN KEY (`idCateg`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,2,'RTX 3090','La mejor tarjeta grafica del mercado, cuenta con 12 GbGDDR6 con una potencia increible, contamos con un stock limitado a pocas piezas, aprovecha y consiguela cuanto antes'),(2,2,'RX 5500XT','La flamante Radeon RX 5500 XT con la arquitectura RDNA proporciona un rendimiento excepcional y una experiencia de juego de alta fidelidad. Toma el control con Radeon RX 5500 XT'),(3,2,'RTX TITAN','NVIDIA® TITAN RTX™ está diseñada para investigadores, desarrolladores y creadores. Está impulsado por la arquitectura Turing™, que ofrece 130 Tensor TFLOPs de rendimiento'),(4,2,'RTX 2060','La GeForce RTX™ 2060 cuenta con la arquitectura NVIDIA Turing™, que brinda un rendimiento increíble, la potencia del Ray Tracing en tiempo real y la inteligencia artifical'),(5,2,'RX 6700XT','Presentamos las tarjetas gráficas AMD Radeon™ serie RX 6000, diseñadas con la revolucionaria arquitectura AMD RDNA™ 2 y preparadas para que juegues con un rendimiento asombroso'),(6,2,'RX Vega 64','Vive la maxima experiencia de juegos con Radeon RX Vega 64 y la tecnologia Radeon Freesync, creado para jugadores extremos, impulsado por la arquitectura vega'),(7,4,'Teclado Vorago Kb-102, Cable 1.50m Usb 2.0, Negro','Teclado de membrana plastico de excelente calidad y fabricacion'),(8,4,'Mini Teclado Multimedia Acteck Tx20 Conexion Bluetooth, Soporta 3 Dispositivos, Bateria Recargable','Flamante teclado ultimo modelo, teclas ultra comodas, excelente opcion\npara estudiantes'),(9,4,'Teclado Plegable Acteck Ax40, Inalambrico Bluetooth 3.0, Bateria Recargable','Teclado portatil, lleva a todos lados este increible teclado, ahorra espacio y tiempo.'),(10,4,'Teclado Gaming Mecanico Logitech G Pro, Interruptores Gx Blue, 12 Teclas Programables, Iluminacion Rgb Lightsync','Conviertete en el mejor gamer  con este teclado con teclas profesionales e iluminacion RGB'),(11,3,'Intel core i5 9a Socket 1151 2.8 Ghz','Desempeño de IA con Intel® Deep Learning Boost (Intel® DL Boost)'),(12,3,'Procesador Intel Core I5-7640x, Frecuencia Turbo 4,2 Ghz','Velocidad sin limitaciones con capacidad de respuesta de tecnología Intel Turbo Boost 2.0.'),(13,3,'Procesador AMD Ryzen 7 5800X - 3.8 GHz - 8 Núcleos ','La verdadera inteligencia artificial con un procesador de 8 núcleos, 16 subprocesos y un TDP de 65 vatios asombrosamente eficiente.'),(14,5,'Mouse Inalambrico Logitech G604','Con 15 controles programables, tecnologia inalambirca de ultima generacion, scroll superrapido y un revolucionario sensor.'),(15,5,'Mouse Optico Gamer Gigabyte Aorus M5','Increible mouse pensado para gamers profesionales\nya que cuenta con tecnologia de punta y fue diseñado por una marca de renombre llena innovaciones'),(16,5,'Gamdias Erebos Laser','Mouse  que rompe estereotipos del mercado, llega con excelentes materiales, el favorito de gamers novatos'),(17,5,'Mouse Hyperx Pulsefire Core Pixart 3327','Mouse increible para personas que estan empezando en el mundo del gaming con muchisimas ventajas y muy buenas funcionalidades.');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuar` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `pass_md5` char(32) DEFAULT NULL,
  PRIMARY KEY (`idUsuar`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta` (
  `numVenta` int NOT NULL AUTO_INCREMENT,
  `comprador` int DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL,
  PRIMARY KEY (`numVenta`),
  KEY `venta_fk1` (`comprador`),
  CONSTRAINT `venta_fk1` FOREIGN KEY (`comprador`) REFERENCES `usuario` (`idUsuar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-06 17:20:10
