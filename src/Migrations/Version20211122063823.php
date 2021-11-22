<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122063823 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Migration to create Database';
    }

    public function up(Schema $schema) : void
    {
        $this.$this->addSql("

            CREATE TABLE `migration_versions` (
              `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
              `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
              PRIMARY KEY (`version`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            
            CREATE TABLE `tbl_cargo` (
              `ID_CARGO` int(11) NOT NULL AUTO_INCREMENT,
              `NOMBRE` varchar(200) NOT NULL,
              `ESTADO` int(11) NOT NULL,
              PRIMARY KEY (`ID_CARGO`)
            ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
            
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
            
            CREATE TABLE `tbl_perdida_estado` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `nombre` varchar(20) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
            
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
            ) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
            
            CREATE TABLE `tbl_producto_detalle` (
              `ID_PRODUCTO_DETALLE` int(11) NOT NULL AUTO_INCREMENT,
              `ID_PRODUCTO` int(11) DEFAULT NULL,
              `STOCK_INICIAL` int(11) NOT NULL,
              `STOCK_MINIMO` int(11) NOT NULL,
              `PRECIO` decimal(12,2) NOT NULL,
              `estado` int(11) DEFAULT NULL,
              `STOCK_ACTUAL` int(4) DEFAULT NULL,
              PRIMARY KEY (`ID_PRODUCTO_DETALLE`),
              KEY `id_producto` (`ID_PRODUCTO`),
              KEY `fk_estado_id` (`estado`),
              CONSTRAINT `fk_estado_id` FOREIGN KEY (`estado`) REFERENCES `tbl_producto_detalle_estado` (`id`),
              CONSTRAINT `tbl_producto_detalle_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `tbl_producto` (`ID_PRODUCTO`)
            ) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
            
            CREATE TABLE `tbl_producto_detalle_estado` (
              `ID` int(11) NOT NULL AUTO_INCREMENT,
              `nombre` varchar(20) NOT NULL,
              PRIMARY KEY (`ID`)
            ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
            
            CREATE TABLE `tbl_producto_estado` (
              `ID_ESTADO` int(11) NOT NULL,
              `ESTADO` varchar(10) DEFAULT NULL,
              PRIMARY KEY (`ID_ESTADO`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            
            CREATE TABLE `tbl_tipo_documento` (
              `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT,
              `TIPO` varchar(200) NOT NULL,
              `ESTADO` int(11) NOT NULL,
              PRIMARY KEY (`ID_TIPO`)
            ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
            
            CREATE TABLE `tbl_tipo_producto` (
              `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT,
              `NOMBRE` varchar(200) NOT NULL,
              `ESTADO` int(11) NOT NULL,
              PRIMARY KEY (`ID_TIPO`)
            ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
            
            CREATE TABLE `tbl_unidad_medida` (
              `ID_UNIDAD` int(11) NOT NULL AUTO_INCREMENT,
              `NOMBRE` varchar(200) NOT NULL,
              `ESTADO` int(11) NOT NULL,
              PRIMARY KEY (`ID_UNIDAD`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
            
            CREATE TABLE `tbl_usuario` (
              `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
              `CODIGO` varchar(200) NOT NULL,
              `NOMBRES` varchar(200) NOT NULL,
              `APELLIDOS` varchar(200) NOT NULL,
              `USUARIO` varchar(200) NOT NULL,
              `PASSWORD` varchar(200) NOT NULL,
              `ID_CARGO` int(11) DEFAULT NULL,
              `CORREO` varchar(200) NOT NULL,
              `ESTADO` int(11) DEFAULT NULL,
              PRIMARY KEY (`ID_USUARIO`),
              KEY `ID_CARGO` (`ID_CARGO`),
              KEY `tbl_usuario_ibfk_2` (`ESTADO`),
              CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`ID_CARGO`) REFERENCES `tbl_cargo` (`ID_CARGO`),
              CONSTRAINT `tbl_usuario_ibfk_2` FOREIGN KEY (`ESTADO`) REFERENCES `tbl_usuario_estado` (`ID_ESTADO`)
            ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
            
            CREATE TABLE `tbl_usuario_estado` (
              `ID_ESTADO` int(11) NOT NULL,
              `ESTADO` varchar(15) DEFAULT NULL,
              PRIMARY KEY (`ID_ESTADO`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            CREATE TABLE `tbl_venta` (
              `ID_VENTA` int(11) NOT NULL AUTO_INCREMENT,
              `ID_USUARIO` int(11) NOT NULL,
              `ID_CLIENTE` int(11) NOT NULL,
              `FECHA_VENTA` timestamp NOT NULL DEFAULT current_timestamp(),
              `FECHA_PAGO` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
              `ESTADO` tinyint(4) DEFAULT NULL,
              PRIMARY KEY (`ID_VENTA`),
              KEY `ID_USUARIO` (`ID_USUARIO`),
              KEY `ID_CLIENTE` (`ID_CLIENTE`),
              KEY `ESTADO` (`ESTADO`),
              CONSTRAINT `tbl_venta_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_usuario` (`ID_USUARIO`),
              CONSTRAINT `tbl_venta_ibfk_2` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `tbl_cliente` (`ID_CLIENTE`),
              CONSTRAINT `tbl_venta_ibfk_3` FOREIGN KEY (`ESTADO`) REFERENCES `tbl_venta_estado` (`ID`)
            ) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
            
            CREATE TABLE `tbl_venta_credito` (
              `ID` int(11) NOT NULL AUTO_INCREMENT,
              `ID_VENTA` int(11) NOT NULL,
              `MONTO` decimal(6,2) NOT NULL,
              `FECHA_PAGO` timestamp NOT NULL DEFAULT current_timestamp(),
              PRIMARY KEY (`ID`),
              KEY `ID_VENTA` (`ID_VENTA`),
              CONSTRAINT `tbl_venta_credito_ibfk_1` FOREIGN KEY (`ID_VENTA`) REFERENCES `tbl_venta` (`ID_VENTA`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            CREATE TABLE `tbl_venta_detalle_producto` (
              `ID` int(11) NOT NULL AUTO_INCREMENT,
              `ID_VENTA` int(11) NOT NULL,
              `ID_PRODUCTO_DETALLE` int(11) NOT NULL,
              `CANTIDAD` int(11) NOT NULL,
              PRIMARY KEY (`ID`),
              KEY `ID_VENTA` (`ID_VENTA`),
              KEY `ID_PRODUCTO_DETALLE` (`ID_PRODUCTO_DETALLE`),
              CONSTRAINT `tbl_venta_detalle_producto_ibfk_1` FOREIGN KEY (`ID_VENTA`) REFERENCES `tbl_venta` (`ID_VENTA`),
              CONSTRAINT `tbl_venta_detalle_producto_ibfk_2` FOREIGN KEY (`ID_PRODUCTO_DETALLE`) REFERENCES `tbl_producto_detalle` (`ID_PRODUCTO_DETALLE`)
            ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
            
            CREATE TABLE `tbl_venta_estado` (
              `ID` tinyint(4) NOT NULL,
              `ESTADO` varchar(15) DEFAULT NULL,
              PRIMARY KEY (`ID`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            /*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
            /*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
            /*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
            /*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
        ");

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
