CREATE DATABASE
    IF NOT EXISTS `projeto_final_teste`
    /*!40100 DEFAULT CHARACTER SET latin1 */
;

USE `projeto_final_teste`;

-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)

--

-- Host: localhost    Database: projeto_final

-- ------------------------------------------------------

-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!50503 SET NAMES utf8 */

;

/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */

;

/*!40103 SET TIME_ZONE='+00:00' */

;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */

;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */

;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */

;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */

;

--

-- Table structure for table `auth_assignment`

--

DROP TABLE IF EXISTS `auth_assignment`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `auth_assignment` (
        `item_name` varchar(64) NOT NULL,
        `user_id` varchar(64) NOT NULL,
        `created_at` int(11) DEFAULT NULL,
        PRIMARY KEY (`item_name`, `user_id`),
        KEY `idx-auth_assignment-user_id` (`user_id`),
        CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8;

/*!40101 SET character_set_client = @saved_cs_client */

;

INSERT INTO
    `auth_assignment` (
        `item_name`,
        `user_id`,
        `created_at`
    )
VALUES ('admin', '1', 1669125447), ('cliente', '2', 1669125447), ('funcionario', '3', 1669125447);

--

-- Table structure for table `auth_item`

--

DROP TABLE IF EXISTS `auth_item`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `auth_item` (
        `name` varchar(64) NOT NULL,
        `type` smallint(6) NOT NULL,
        `description` text,
        `rule_name` varchar(64) DEFAULT NULL,
        `data` blob,
        `created_at` int(11) DEFAULT NULL,
        `updated_at` int(11) DEFAULT NULL,
        PRIMARY KEY (`name`),
        KEY `rule_name` (`rule_name`),
        KEY `idx-auth_item-type` (`type`),
        CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE
        SET
            NULL ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8;

/*!40101 SET character_set_client = @saved_cs_client */

;

INSERT INTO
    `auth_item` (
        `name`,
        `type`,
        `description`,
        `rule_name`,
        `data`,
        `created_at`,
        `updated_at`
    )
VALUES (
        'admin',
        1,
        NULL,
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'cliente',
        1,
        NULL,
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'Comprador',
        2,
        'Ver faturas',
        'Comprador',
        NULL,
        1669125447,
        1669125447
    ), (
        'CreateAdmin',
        2,
        'Permissão para criar uma conta de Admin',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'CreateCategoria',
        2,
        'Create Categoria',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'CreateFatura',
        2,
        'Create Fatura',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'CreateIva',
        2,
        'Create Iva',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'CreateMarca',
        2,
        'Create Marca',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'CreateProduto',
        2,
        'Create Produto',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'CreateStock',
        2,
        'Create Stock',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeactivateCategoria',
        2,
        'Deactivate Categoria',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeactivateFatura',
        2,
        'Deactivate Fatura',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeactivateIva',
        2,
        'Deactivate Iva',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeactivateMarca',
        2,
        'Deactivate Marca',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeactivateProduto',
        2,
        'Deactivate Produto',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeactivateStock',
        2,
        'Deactivate Stock',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeleteCategoria',
        2,
        'Permission to delete Categoria',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeleteFatura',
        2,
        'Permission to delete Fatura',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeleteIva',
        2,
        'Permission to delete Iva',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeleteMarca',
        2,
        'Permission to delete Marca',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeleteProduto',
        2,
        'Permission to delete Produto',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'DeleteStock',
        2,
        'Permission to delete Stock',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'FrontendReadFatura',
        2,
        'Permite ao cliente visualizar Fatura',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'FrontendReadProduto',
        2,
        'Permite ao cliente visualizar Produto',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'funcionario',
        1,
        NULL,
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'ReadCategoria',
        2,
        'Read Categoria',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'ReadEmpresa',
        2,
        'Alterar os dados da Empresa',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'ReadFatura',
        2,
        'Read Fatura',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'ReadIva',
        2,
        'Read Iva',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'ReadMarca',
        2,
        'Read Marca',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'ReadProduto',
        2,
        'Read Produto',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'ReadStock',
        2,
        'Read Stock',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'UpdateCategoria',
        2,
        'Update Categoria',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'UpdateEmpresa',
        2,
        'Alterar os dados da Empresa',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'UpdateFatura',
        2,
        'Update Fatura',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'UpdateIva',
        2,
        'Update Iva',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'UpdateMarca',
        2,
        'Update Marca',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'UpdateProduto',
        2,
        'Update Produto',
        NULL,
        NULL,
        1669125447,
        1669125447
    ), (
        'UpdateStock',
        2,
        'Update Stock',
        NULL,
        NULL,
        1669125447,
        1669125447
    );

--

-- Table structure for table `auth_item_child`

--

DROP TABLE IF EXISTS `auth_item_child`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `auth_item_child` (
        `parent` varchar(64) NOT NULL,
        `child` varchar(64) NOT NULL,
        PRIMARY KEY (`parent`, `child`),
        KEY `child` (`child`),
        CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8;

/*!40101 SET character_set_client = @saved_cs_client */

;

INSERT INTO
    `auth_item_child` (`parent`, `child`)
VALUES ('cliente', 'Comprador'), ('admin', 'CreateAdmin'), (
        'funcionario',
        'CreateCategoria'
    ), ('funcionario', 'CreateFatura'), ('funcionario', 'CreateIva'), ('funcionario', 'CreateMarca'), (
        'funcionario',
        'CreateProduto'
    ), ('funcionario', 'CreateStock'), (
        'funcionario',
        'DeactivateCategoria'
    ), (
        'funcionario',
        'DeactivateFatura'
    ), (
        'funcionario',
        'DeactivateIva'
    ), (
        'funcionario',
        'DeactivateMarca'
    ), (
        'funcionario',
        'DeactivateProduto'
    ), (
        'funcionario',
        'DeactivateStock'
    ), ('admin', 'DeleteCategoria'), ('admin', 'DeleteFatura'), ('admin', 'DeleteIva'), ('admin', 'DeleteMarca'), ('admin', 'DeleteProduto'), ('admin', 'DeleteStock'), (
        'cliente',
        'FrontendReadFatura'
    ), (
        'cliente',
        'FrontendReadProduto'
    ), ('admin', 'funcionario'), (
        'funcionario',
        'ReadCategoria'
    ), ('admin', 'ReadEmpresa'), ('funcionario', 'ReadFatura'), ('funcionario', 'ReadIva'), ('funcionario', 'ReadMarca'), ('funcionario', 'ReadProduto'), ('funcionario', 'ReadStock'), (
        'funcionario',
        'UpdateCategoria'
    ), ('admin', 'UpdateEmpresa'), ('funcionario', 'UpdateFatura'), ('funcionario', 'UpdateIva'), ('funcionario', 'UpdateMarca'), (
        'funcionario',
        'UpdateProduto'
    ), ('funcionario', 'UpdateStock');

--

-- Table structure for table `auth_rule`

--

DROP TABLE IF EXISTS `auth_rule`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `auth_rule` (
        `name` varchar(64) NOT NULL,
        `data` blob,
        `created_at` int(11) DEFAULT NULL,
        `updated_at` int(11) DEFAULT NULL,
        PRIMARY KEY (`name`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8;

/*!40101 SET character_set_client = @saved_cs_client */

;

INSERT INTO
    `auth_rule` (
        `name`,
        `data`,
        `created_at`,
        `updated_at`
    )
VALUES (
        'Comprador',
        0x4f3a32353a22636f6e736f6c655c6d6f64656c735c46617475726152756c65223a333a7b733a343a226e616d65223b733a393a22436f6d707261646f72223b733a393a22637265617465644174223b693a313636393132353434373b733a393a22757064617465644174223b693a313636393132353434373b7d,
        1669125447,
        1669125447
    );

--

-- Table structure for table `carrinho`

--

DROP TABLE IF EXISTS `carrinho`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `carrinho` (
        `id_Cliente` int(11) NOT NULL,
        `id_Produto` int(11) NOT NULL,
        `Quantidade` int(11) NOT NULL,
        PRIMARY KEY (`id_Cliente`, `id_Produto`),
        KEY `idProduto` (`id_Produto`),
        KEY `idCliente` (`id_Cliente`, `id_Produto`),
        KEY `idCliente_2` (`id_Cliente`, `id_Produto`),
        CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `user` (`id`),
        CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`id_Produto`) REFERENCES `produto` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

--

-- Table structure for table `categoria`

--

DROP TABLE IF EXISTS `categoria`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `categoria` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_CategoriaPai` int(11) DEFAULT NULL,
        `nome` varchar(45) NOT NULL,
        PRIMARY KEY (`id`),
        KEY `categoriaPai` (`id_CategoriaPai`),
        CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_CategoriaPai`) REFERENCES `categoria` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

--

-- Table structure for table `dados`

--

DROP TABLE IF EXISTS `dados`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `dados` (
        `id_User` int(11) NOT NULL,
        `nome` varchar(45) NOT NULL,
        `telefone` varchar(9) NOT NULL,
        `nif` varchar(9) NOT NULL,
        `morada` varchar(45) NOT NULL,
        `codPostal` varchar(9) NOT NULL,
        `codDesconto` enum('Sim', 'Não', 'Sem Acesso') NOT NULL DEFAULT 'Sem Acesso',
        PRIMARY KEY (`id_User`),
        KEY `idUser` (`id_User`),
        CONSTRAINT `dados_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `user` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

-- Table structure for table `empresa`

--

DROP TABLE IF EXISTS `empresa`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `empresa` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `designacaoSocial` varchar(45) NOT NULL,
        `email` varchar(45) NOT NULL,
        `telefone` varchar(9) NOT NULL,
        `nif` varchar(9) NOT NULL,
        `morada` varchar(45) NOT NULL,
        `codPostal` varchar(9) NOT NULL,
        `localidade` varchar(45) NOT NULL,
        `capitalSocial` int(11) NOT NULL,
        `imgBanner` varchar(255) NOT NULL,
        `imgLogo` text NOT NULL,
        `codigoDesconto` varchar(10) DEFAULT '',
        `valorDesconto` int(11) DEFAULT '0',
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

INSERT INTO
    `empresa` (
        `id`,
        `designacaoSocial`,
        `email`,
        `telefone`,
        `nif`,
        `morada`,
        `codPostal`,
        `localidade`,
        `capitalSocial`,
        `imgBanner`,
        `imgLogo`
    )
VALUES (
        1,
        'GlobalDiga',
        'globaldiga@gmail.com',
        '244501812',
        '503503503',
        'Rua do',
        '2410-367',
        'Leiria',
        28654876,
        'ok.jpg',
        'logo.png'
    );

--

-- Table structure for table `fatura`

--

DROP TABLE IF EXISTS `fatura`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `fatura` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_Cliente` int(11) NOT NULL,
        `nome` varchar(45) NOT NULL,
        `nif` varchar(9) NOT NULL,
        `codPostal` varchar(9) NOT NULL,
        `telefone` varchar(9) NOT NULL,
        `morada` varchar(45) NOT NULL,
        `email` varchar(255) NOT NULL,
        `dataFatura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `subtotal` decimal(11, 2) NOT NULL,
        `valorIva` decimal(11, 2) NOT NULL,
        `valorDesconto` decimal(11, 2) NOT NULL,
        `valorTotal` decimal(11, 2) NOT NULL,
        PRIMARY KEY (`id`),
        KEY `idCliente` (`id_Cliente`),
        CONSTRAINT `fatura_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `dados` (`id_User`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

--

-- Table structure for table `iva`

--

DROP TABLE IF EXISTS `iva`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `iva` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `percentagem` int(11) NOT NULL,
        `Ativo` tinyint(1) NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

--

-- Table structure for table `linhafatura`

--

DROP TABLE IF EXISTS `linhafatura`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `linhafatura` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_Fatura` int(11) NOT NULL,
        `produto_nome` varchar(100) NOT NULL,
        `produto_referencia` varchar(45) NOT NULL,
        `quantidade` int(11) NOT NULL,
        `valor` decimal(11, 2) NOT NULL,
        `valorIva` decimal(11, 2) NOT NULL,
        PRIMARY KEY (`id`),
        KEY `idFatura` (`id_Fatura`),
        CONSTRAINT `linhafatura_ibfk_1` FOREIGN KEY (`id_Fatura`) REFERENCES `fatura` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

--

-- Table structure for table `loja`

--

DROP TABLE IF EXISTS `loja`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `loja` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_Empresa` int(11) NOT NULL,
        `localidade` varchar(45) NOT NULL,
        `latitude` varchar(255) DEFAULT NULL,
        `longitude` varchar(255) DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `idEmpresa` (`id_Empresa`),
        CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`id_Empresa`) REFERENCES `empresa` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

--

-- Table structure for table `marca`

--

DROP TABLE IF EXISTS `marca`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `marca` (
        `nome` varchar(45) NOT NULL,
        PRIMARY KEY (`nome`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

--

-- Table structure for table `migration`

--

DROP TABLE IF EXISTS `migration`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `migration` (
        `version` varchar(180) NOT NULL,
        `apply_time` int(11) DEFAULT NULL,
        PRIMARY KEY (`version`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

INSERT INTO
    `migration` (`version`, `apply_time`)
VALUES (
        'm000000_000000_base',
        1666104799
    ), (
        'm130524_201442_init',
        1666104802
    ), (
        'm140506_102106_rbac_init',
        1666107620
    ), (
        'm170907_052038_rbac_add_index_on_auth_assignment_user_id',
        1666107620
    ), (
        'm180523_151638_rbac_updates_indexes_without_prefix',
        1666107620
    ), (
        'm190124_110200_add_verification_token_column_to_user_table',
        1666104802
    ), (
        'm200409_110543_rbac_update_mssql_trigger',
        1666107620
    ), (
        'm221018_154041_init_rbac',
        1666108008
    );

--

-- Table structure for table `produto`

--

DROP TABLE IF EXISTS `produto`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `produto` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_Categoria` int(11) NOT NULL,
        `id_Iva` int(11) NOT NULL,
        `id_Marca` varchar(45) NOT NULL,
        `descricao` text NOT NULL,
        `imagem` text NOT NULL,
        `referencia` varchar(45) NOT NULL,
        `preco` decimal(11, 2) NOT NULL,
        `nome` varchar(100) DEFAULT NULL,
        `Ativo` tinyint(1) NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`),
        KEY `idIva` (`id_Iva`),
        KEY `idSubcategoria` (`id_Categoria`),
        KEY `marca` (`id_Marca`),
        CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_Iva`) REFERENCES `iva` (`id`),
        CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`id_Marca`) REFERENCES `marca` (`nome`),
        CONSTRAINT `produto_ibfk_4` FOREIGN KEY (`id_Categoria`) REFERENCES `categoria` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

--

-- Table structure for table `stock`

--

DROP TABLE IF EXISTS `stock`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `stock` (
        `id_Loja` int(11) NOT NULL,
        `id_Produto` int(11) NOT NULL,
        `quantidade` int(11) NOT NULL,
        PRIMARY KEY (`id_Loja`, `id_Produto`),
        KEY `idLoja` (`id_Loja`),
        KEY `idProduto` (`id_Produto`),
        CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_Loja`) REFERENCES `loja` (`id`),
        CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`id_Produto`) REFERENCES `produto` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */

;

--

-- Table structure for table `user`

--

DROP TABLE IF EXISTS `user`;

/*!40101 SET @saved_cs_client     = @@character_set_client */

;

/*!50503 SET character_set_client = utf8mb4 */

;

CREATE TABLE
    `user` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `username` varchar(255) NOT NULL,
        `auth_key` varchar(32) NOT NULL,
        `password_hash` varchar(255) NOT NULL,
        `password_reset_token` varchar(255) DEFAULT NULL,
        `email` varchar(255) NOT NULL,
        `status` smallint(6) NOT NULL DEFAULT '10',
        `created_at` int(11) NOT NULL,
        `updated_at` int(11) NOT NULL,
        `verification_token` varchar(255) DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `username` (`username`),
        UNIQUE KEY `email` (`email`),
        UNIQUE KEY `password_reset_token` (`password_reset_token`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8;

/*!40101 SET character_set_client = @saved_cs_client */

;

INSERT INTO
    `user` (
        `id`,
        `username`,
        `auth_key`,
        `password_hash`,
        `password_reset_token`,
        `email`,
        `status`,
        `created_at`,
        `updated_at`,
        `verification_token`
    )
VALUES (
        1,
        'admin',
        'zx8XakGqQFMniURHZ0EPQHP0ESo2c9ZU',
        '$2y$13$2J/mDcioD6Ly4A2JCgvYUuDzUTwRZ5ye0RxiMc6rYSIVwFl2w.mte',
        NULL,
        'admin@gmail.com',
        10,
        1666107512,
        1666107512,
        'l6yJJiwDgybNJyGYvh1opn5L7yrhXPkN_1666107512'
    ), (
        2,
        'cliente',
        '4VSpN1OuE8poYmpOYj7Ydfemd8rVsvEv',
        '$2y$13$CRfnOyBa8CzQcdfI86pIOu.uFi0th5tOCGuqCl0TUFMO6ebjiYKg2',
        NULL,
        'cliente@gmail.com',
        10,
        1666112069,
        1666112069,
        'oJPREkKzHvs-Y1vFtg7HkAv0QOsN9Hpu_1666112069'
    ), (
        3,
        'funcionario',
        '9exi6gzj7eDty99pGSZORalM66Fa9wfC',
        '$2y$13$YHu7iZ9A8pfHfy4gIWW/mu0gLjtasCy.twDTPK66QHxKcFiIMZ.EC',
        NULL,
        'funcionario@gmail.com',
        10,
        1667235750,
        1667235750,
        '13f01cOizu-KBHzyvOwk5IgZh6lrpi-z_1667235750'
    );

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */

;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */

;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */

;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */

;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */

;

-- Dump completed on 2022-12-21  9:05:15