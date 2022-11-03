-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Host: localhost

-- Generation Time: Oct 27, 2022 at 04:25 PM

-- Server version: 10.4.21-MariaDB

-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `projeto_final`

--

-- --------------------------------------------------------

--

-- Table structure for table `auth_assignment`

--

CREATE TABLE
    `auth_assignment` (
        `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
        `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
        `created_at` int(11) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

--

-- Dumping data for table `auth_assignment`

--

INSERT INTO
    `auth_assignment` (
        `item_name`,
        `user_id`,
        `created_at`
    )
VALUES ('admin', '1', 1666701423);

-- --------------------------------------------------------

--

-- Table structure for table `auth_item`

--

CREATE TABLE
    `auth_item` (
        `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
        `type` smallint(6) NOT NULL,
        `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
        `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
        `data` blob DEFAULT NULL,
        `created_at` int(11) DEFAULT NULL,
        `updated_at` int(11) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

--

-- Dumping data for table `auth_item`

--

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
        1666701423,
        1666701423
    ), (
        'cliente',
        1,
        NULL,
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'CreateCategoria',
        2,
        'Create Categoria',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'CreateEmpresa',
        2,
        'Create Empresa',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'CreateFatura',
        2,
        'Create Fatura',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'CreateIva',
        2,
        'Create Iva',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'CreateLinhaFatura',
        2,
        'Create LinhaFatura',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'CreateMarca',
        2,
        'Create Marca',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'CreateProduto',
        2,
        'Create Produto',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'CreateStock',
        2,
        'Create Stock',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'DeleteCategoria',
        2,
        'Delete Categoria',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'DeleteEmpresa',
        2,
        'Delete Empresa',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'DeleteFatura',
        2,
        'Delete Fatura',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'DeleteIva',
        2,
        'Delete Iva',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'DeleteLinhaFatura',
        2,
        'Delete LinhaFatura',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'DeleteMarca',
        2,
        'Delete Marca',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'DeleteProduto',
        2,
        'Delete Produto',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'DeleteStock',
        2,
        'Delete Stock',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'funcionario',
        1,
        NULL,
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'IndexCategoria',
        2,
        'Index Categoria',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'IndexEmpresa',
        2,
        'Index Empresa',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'IndexFatura',
        2,
        'Index Fatura',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'IndexIva',
        2,
        'Index Iva',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'IndexLinhaFatura',
        2,
        'Index LinhaFatura',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'IndexMarca',
        2,
        'Index Marca',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'IndexProduto',
        2,
        'Index Produto',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'IndexStock',
        2,
        'Index Stock',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'UpdateCategoria',
        2,
        'Update Categoria',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'UpdateEmpresa',
        2,
        'Update Empresa',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'UpdateFatura',
        2,
        'Update Fatura',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'UpdateIva',
        2,
        'Update Iva',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'UpdateLinhaFatura',
        2,
        'Update LinhaFatura',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'UpdateMarca',
        2,
        'Update Marca',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'UpdateProduto',
        2,
        'Update Produto',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'UpdateStock',
        2,
        'Update Stock',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'ViewCategoria',
        2,
        'View Categoria',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'ViewEmpresa',
        2,
        'View Empresa',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'ViewFatura',
        2,
        'View Fatura',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'ViewIva',
        2,
        'View Iva',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'ViewLinhaFatura',
        2,
        'View LinhaFatura',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'ViewMarca',
        2,
        'View Marca',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'ViewProduto',
        2,
        'View Produto',
        NULL,
        NULL,
        1666701423,
        1666701423
    ), (
        'ViewStock',
        2,
        'View Stock',
        NULL,
        NULL,
        1666701423,
        1666701423
    );

-- --------------------------------------------------------

--

-- Table structure for table `auth_item_child`

--

CREATE TABLE
    `auth_item_child` (
        `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
        `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

--

-- Dumping data for table `auth_item_child`

--

INSERT INTO
    `auth_item_child` (`parent`, `child`)
VALUES ('admin', 'CreateEmpresa'), ('admin', 'DeleteEmpresa'), ('admin', 'funcionario'), ('admin', 'IndexEmpresa'), ('admin', 'UpdateEmpresa'), ('admin', 'ViewEmpresa'), (
        'funcionario',
        'CreateCategoria'
    ), ('funcionario', 'CreateFatura'), ('funcionario', 'CreateIva'), (
        'funcionario',
        'CreateLinhaFatura'
    ), ('funcionario', 'CreateMarca'), (
        'funcionario',
        'CreateProduto'
    ), ('funcionario', 'CreateStock'), (
        'funcionario',
        'DeleteCategoria'
    ), ('funcionario', 'DeleteFatura'), ('funcionario', 'DeleteIva'), (
        'funcionario',
        'DeleteLinhaFatura'
    ), ('funcionario', 'DeleteMarca'), (
        'funcionario',
        'DeleteProduto'
    ), ('funcionario', 'DeleteStock'), (
        'funcionario',
        'IndexCategoria'
    ), ('funcionario', 'IndexFatura'), ('funcionario', 'IndexIva'), (
        'funcionario',
        'IndexLinhaFatura'
    ), ('funcionario', 'IndexMarca'), ('funcionario', 'IndexProduto'), ('funcionario', 'IndexStock'), (
        'funcionario',
        'UpdateCategoria'
    ), ('funcionario', 'UpdateFatura'), ('funcionario', 'UpdateIva'), (
        'funcionario',
        'UpdateLinhaFatura'
    ), ('funcionario', 'UpdateMarca'), (
        'funcionario',
        'UpdateProduto'
    ), ('funcionario', 'UpdateStock'), (
        'funcionario',
        'ViewCategoria'
    ), ('funcionario', 'ViewFatura'), ('funcionario', 'ViewIva'), (
        'funcionario',
        'ViewLinhaFatura'
    ), ('funcionario', 'ViewMarca'), ('funcionario', 'ViewProduto'), ('funcionario', 'ViewStock');

-- --------------------------------------------------------

--

-- Table structure for table `auth_rule`

--

CREATE TABLE
    `auth_rule` (
        `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
        `data` blob DEFAULT NULL,
        `created_at` int(11) DEFAULT NULL,
        `updated_at` int(11) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `carrinho`

--

CREATE TABLE
    `carrinho` (
        `idCliente` int(11) NOT NULL,
        `idProduto` int(11) NOT NULL,
        `Quantidade` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `categoria`

--

CREATE TABLE
    `categoria` (
        `id` int(11) NOT NULL,
        `categoriaPai` int(11) DEFAULT NULL,
        `nome` varchar(45) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `categoria`

--

INSERT INTO
    `categoria` (`id`, `categoriaPai`, `nome`)
VALUES (1, NULL, 'OPGG');

-- --------------------------------------------------------

--

-- Table structure for table `dados`

--

CREATE TABLE
    `dados` (
        `idUser` int(11) NOT NULL,
        `nome` varchar(45) NOT NULL,
        `telefone` varchar(9) NOT NULL,
        `nif` varchar(9) NOT NULL,
        `morada` varchar(45) NOT NULL,
        `codPostal` varchar(9) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `dados`

--

INSERT INTO
    `dados` (
        `idUser`,
        `nome`,
        `telefone`,
        `nif`,
        `morada`,
        `codPostal`
    )
VALUES (
        2,
        'test',
        '123123123',
        '123123123',
        'yse',
        '123123123'
    );

-- --------------------------------------------------------

--

-- Table structure for table `empresa`

--

CREATE TABLE
    `empresa` (
        `id` int(11) NOT NULL,
        `designacaoSocial` varchar(45) NOT NULL,
        `email` varchar(45) NOT NULL,
        `telefone` varchar(9) NOT NULL,
        `nif` varchar(9) NOT NULL,
        `morada` varchar(45) NOT NULL,
        `codPostal` varchar(9) NOT NULL,
        `localidade` varchar(45) NOT NULL,
        `capitalSocial` int(11) NOT NULL,
        `imgBanner` varchar(255) NOT NULL,
        `imgLogo` varchar(255) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `empresa`

--

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
        '',
        ''
    );

-- --------------------------------------------------------

--

-- Table structure for table `fatura`

--

CREATE TABLE
    `fatura` (
        `id` int(11) NOT NULL,
        `idCliente` int(11) NOT NULL,
        `dataFatura` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
        `valorTotal` decimal(11, 2) NOT NULL,
        `valorIva` decimal(11, 2) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `iva`

--

CREATE TABLE
    `iva` (
        `id` int(11) NOT NULL,
        `percentagem` int(11) NOT NULL,
        `Ativo` tinyint(1) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `iva`

--

INSERT INTO `iva` (`id`, `percentagem`, `Ativo`) VALUES (1, 23, 0);

-- --------------------------------------------------------

--

-- Table structure for table `linhafatura`

--

CREATE TABLE
    `linhafatura` (
        `id` int(11) NOT NULL,
        `idFatura` int(11) NOT NULL,
        `idProduto` int(11) NOT NULL,
        `quantidade` int(11) NOT NULL,
        `valor` decimal(11, 2) NOT NULL,
        `valorIva` decimal(11, 2) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `loja`

--

CREATE TABLE
    `loja` (
        `id` int(11) NOT NULL,
        `idEmpresa` int(11) NOT NULL,
        `localidade` varchar(45) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `marca`

--

CREATE TABLE
    `marca` (`nome` varchar(45) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `marca`

--

INSERT INTO `marca` (`nome`) VALUES ('AMD'), ('Nvidia');

-- --------------------------------------------------------

--

-- Table structure for table `migration`

--

CREATE TABLE
    `migration` (
        `version` varchar(180) NOT NULL,
        `apply_time` int(11) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `migration`

--

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

-- --------------------------------------------------------

--

-- Table structure for table `produto`

--

CREATE TABLE
    `produto` (
        `id` int(11) NOT NULL,
        `idCategoria` int(11) NOT NULL,
        `idIva` int(11) NOT NULL,
        `marca` varchar(45) NOT NULL,
        `descricao` text NOT NULL,
        `imagem` text NOT NULL,
        `referencia` varchar(45) NOT NULL,
        `preco` decimal(11, 2) NOT NULL,
        `nome` varchar(50) DEFAULT NULL,
        `Ativo` tinyint(1) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `produto`

--

INSERT INTO
    `produto` (
        `id`,
        `idCategoria`,
        `idIva`,
        `marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `Ativo`
    )
VALUES (
        1,
        1,
        1,
        'AMD',
        'BESATS',
        'gpu.jpg',
        'qwdasa',
        '15.00',
        'GTX 1060',
        0
    ), (
        2,
        1,
        1,
        'Nvidia',
        'ewfdsds',
        'cooler.jpg',
        'sadd',
        '20.00',
        'GTX 1070',
        0
    ), (
        3,
        1,
        1,
        'Nvidia',
        'sadsad',
        'gt 730.jpg',
        'asdsad',
        '50.00',
        'GTX 1080',
        0
    );

-- --------------------------------------------------------

--

-- Table structure for table `stock`

--

CREATE TABLE
    `stock` (
        `idLoja` int(11) NOT NULL,
        `idProduto` int(11) NOT NULL,
        `quantidade` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `user`

--

CREATE TABLE
    `user` (
        `id` int(11) NOT NULL,
        `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
        `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `status` smallint(6) NOT NULL DEFAULT 10,
        `created_at` int(11) NOT NULL,
        `updated_at` int(11) NOT NULL,
        `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

--

-- Dumping data for table `user`

--

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
    );

--

-- Indexes for dumped tables

--

--

-- Indexes for table `auth_assignment`

--

ALTER TABLE `auth_assignment`
ADD
    PRIMARY KEY (`item_name`, `user_id`),
ADD
    KEY `idx-auth_assignment-user_id` (`user_id`);

--

-- Indexes for table `auth_item`

--

ALTER TABLE `auth_item`
ADD PRIMARY KEY (`name`),
ADD
    KEY `rule_name` (`rule_name`),
ADD
    KEY `idx-auth_item-type` (`type`);

--

-- Indexes for table `auth_item_child`

--

ALTER TABLE `auth_item_child`
ADD
    PRIMARY KEY (`parent`, `child`),
ADD KEY `child` (`child`);

--

-- Indexes for table `auth_rule`

--

ALTER TABLE `auth_rule` ADD PRIMARY KEY (`name`);

--

-- Indexes for table `carrinho`

--

ALTER TABLE `carrinho`
ADD
    PRIMARY KEY (`idCliente`, `idProduto`),
ADD
    KEY `idProduto` (`idProduto`),
ADD
    KEY `idCliente` (`idCliente`, `idProduto`),
ADD
    KEY `idCliente_2` (`idCliente`, `idProduto`);

--

-- Indexes for table `categoria`

--

ALTER TABLE `categoria`
ADD PRIMARY KEY (`id`),
ADD
    KEY `categoriaPai` (`categoriaPai`);

--

-- Indexes for table `dados`

--

ALTER TABLE `dados`
ADD PRIMARY KEY (`idUser`),
ADD KEY `idUser` (`idUser`);

--

-- Indexes for table `empresa`

--

ALTER TABLE `empresa` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `fatura`

--

ALTER TABLE `fatura`
ADD PRIMARY KEY (`id`),
ADD
    KEY `idCliente` (`idCliente`);

--

-- Indexes for table `iva`

--

ALTER TABLE `iva` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `linhafatura`

--

ALTER TABLE `linhafatura`
ADD PRIMARY KEY (`id`),
ADD
    KEY `idFatura` (`idFatura`),
ADD
    KEY `idProduto` (`idProduto`);

--

-- Indexes for table `loja`

--

ALTER TABLE `loja`
ADD PRIMARY KEY (`id`),
ADD
    KEY `idEmpresa` (`idEmpresa`);

--

-- Indexes for table `marca`

--

ALTER TABLE `marca` ADD PRIMARY KEY (`nome`);

--

-- Indexes for table `migration`

--

ALTER TABLE `migration` ADD PRIMARY KEY (`version`);

--

-- Indexes for table `produto`

--

ALTER TABLE `produto`
ADD PRIMARY KEY (`id`),
ADD KEY `idIva` (`idIva`),
ADD
    KEY `idSubcategoria` (`idCategoria`),
ADD KEY `marca` (`marca`);

--

-- Indexes for table `stock`

--

ALTER TABLE `stock`
ADD KEY `idLoja` (`idLoja`),
ADD
    KEY `idProduto` (`idProduto`);

--

-- Indexes for table `user`

--

ALTER TABLE `user`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `username` (`username`),
ADD
    UNIQUE KEY `email` (`email`),
ADD
    UNIQUE KEY `password_reset_token` (`password_reset_token`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `categoria`

--

ALTER TABLE
    `categoria` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--

-- AUTO_INCREMENT for table `empresa`

--

ALTER TABLE
    `empresa` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--

-- AUTO_INCREMENT for table `fatura`

--

ALTER TABLE
    `fatura` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--

-- AUTO_INCREMENT for table `iva`

--

ALTER TABLE
    `iva` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--

-- AUTO_INCREMENT for table `linhafatura`

--

ALTER TABLE
    `linhafatura` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `loja`

--

ALTER TABLE `loja` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `produto`

--

ALTER TABLE
    `produto` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

--

-- AUTO_INCREMENT for table `user`

--

ALTER TABLE
    `user` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--

-- Constraints for dumped tables

--

--

-- Constraints for table `auth_assignment`

--

ALTER TABLE `auth_assignment`
ADD
    CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--

-- Constraints for table `auth_item`

--

ALTER TABLE `auth_item`
ADD
    CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE
SET NULL ON UPDATE CASCADE;

--

-- Constraints for table `auth_item_child`

--

ALTER TABLE `auth_item_child`
ADD
    CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD
    CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--

-- Constraints for table `carrinho`

--

ALTER TABLE `carrinho`
ADD
    CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `user` (`id`),
ADD
    CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);

--

-- Constraints for table `categoria`

--

ALTER TABLE `categoria`
ADD
    CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`categoriaPai`) REFERENCES `categoria` (`id`);

--

-- Constraints for table `dados`

--

ALTER TABLE `dados`
ADD
    CONSTRAINT `dados_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--

-- Constraints for table `fatura`

--

ALTER TABLE `fatura`
ADD
    CONSTRAINT `fatura_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `dados` (`idUser`);

--

-- Constraints for table `linhafatura`

--

ALTER TABLE `linhafatura`
ADD
    CONSTRAINT `linhafatura_ibfk_1` FOREIGN KEY (`idFatura`) REFERENCES `fatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
    CONSTRAINT `linhafatura_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--

-- Constraints for table `loja`

--

ALTER TABLE `loja`
ADD
    CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`);

--

-- Constraints for table `produto`

--

ALTER TABLE `produto`
ADD
    CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idIva`) REFERENCES `iva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
    CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`marca`) REFERENCES `marca` (`nome`),
ADD
    CONSTRAINT `produto_ibfk_4` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`);

--

-- Constraints for table `stock`

--

ALTER TABLE `stock`
ADD
    CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`idLoja`) REFERENCES `loja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
    CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;