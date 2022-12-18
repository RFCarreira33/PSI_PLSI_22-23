CREATE DATABASE if NOT EXISTS projeto_final;
USE projeto_final;

--
-- Banco de dados: `projeto_final`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8mb3  NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8mb3  NOT NULL,
  `created_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1669125447),
('cliente', '2', 1669125447),
('funcionario', '3', 1669125447);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8mb3  NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8mb3 ,
  `rule_name` varchar(64) CHARACTER SET utf8mb3  DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1669125447, 1669125447),
('cliente', 1, NULL, NULL, NULL, 1669125447, 1669125447),
('Comprador', 2, 'Ver faturas', 'Comprador', NULL, 1669125447, 1669125447),
('CreateAdmin', 2, 'Permissão para criar uma conta de Admin', NULL, NULL, 1669125447, 1669125447),
('CreateCategoria', 2, 'Create Categoria', NULL, NULL, 1669125447, 1669125447),
('CreateFatura', 2, 'Create Fatura', NULL, NULL, 1669125447, 1669125447),
('CreateIva', 2, 'Create Iva', NULL, NULL, 1669125447, 1669125447),
('CreateMarca', 2, 'Create Marca', NULL, NULL, 1669125447, 1669125447),
('CreateProduto', 2, 'Create Produto', NULL, NULL, 1669125447, 1669125447),
('CreateStock', 2, 'Create Stock', NULL, NULL, 1669125447, 1669125447),
('DeactivateCategoria', 2, 'Deactivate Categoria', NULL, NULL, 1669125447, 1669125447),
('DeactivateFatura', 2, 'Deactivate Fatura', NULL, NULL, 1669125447, 1669125447),
('DeactivateIva', 2, 'Deactivate Iva', NULL, NULL, 1669125447, 1669125447),
('DeactivateMarca', 2, 'Deactivate Marca', NULL, NULL, 1669125447, 1669125447),
('DeactivateProduto', 2, 'Deactivate Produto', NULL, NULL, 1669125447, 1669125447),
('DeactivateStock', 2, 'Deactivate Stock', NULL, NULL, 1669125447, 1669125447),
('DeleteCategoria', 2, 'Permission to delete Categoria', NULL, NULL, 1669125447, 1669125447),
('DeleteFatura', 2, 'Permission to delete Fatura', NULL, NULL, 1669125447, 1669125447),
('DeleteIva', 2, 'Permission to delete Iva', NULL, NULL, 1669125447, 1669125447),
('DeleteMarca', 2, 'Permission to delete Marca', NULL, NULL, 1669125447, 1669125447),
('DeleteProduto', 2, 'Permission to delete Produto', NULL, NULL, 1669125447, 1669125447),
('DeleteStock', 2, 'Permission to delete Stock', NULL, NULL, 1669125447, 1669125447),
('FrontendReadFatura', 2, 'Permite ao cliente visualizar Fatura', NULL, NULL, 1669125447, 1669125447),
('FrontendReadProduto', 2, 'Permite ao cliente visualizar Produto', NULL, NULL, 1669125447, 1669125447),
('funcionario', 1, NULL, NULL, NULL, 1669125447, 1669125447),
('ReadCategoria', 2, 'Read Categoria', NULL, NULL, 1669125447, 1669125447),
('ReadEmpresa', 2, 'Alterar os dados da Empresa', NULL, NULL, 1669125447, 1669125447),
('ReadFatura', 2, 'Read Fatura', NULL, NULL, 1669125447, 1669125447),
('ReadIva', 2, 'Read Iva', NULL, NULL, 1669125447, 1669125447),
('ReadMarca', 2, 'Read Marca', NULL, NULL, 1669125447, 1669125447),
('ReadProduto', 2, 'Read Produto', NULL, NULL, 1669125447, 1669125447),
('ReadStock', 2, 'Read Stock', NULL, NULL, 1669125447, 1669125447),
('UpdateCategoria', 2, 'Update Categoria', NULL, NULL, 1669125447, 1669125447),
('UpdateEmpresa', 2, 'Alterar os dados da Empresa', NULL, NULL, 1669125447, 1669125447),
('UpdateFatura', 2, 'Update Fatura', NULL, NULL, 1669125447, 1669125447),
('UpdateIva', 2, 'Update Iva', NULL, NULL, 1669125447, 1669125447),
('UpdateMarca', 2, 'Update Marca', NULL, NULL, 1669125447, 1669125447),
('UpdateProduto', 2, 'Update Produto', NULL, NULL, 1669125447, 1669125447),
('UpdateStock', 2, 'Update Stock', NULL, NULL, 1669125447, 1669125447);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8mb3  NOT NULL,
  `child` varchar(64) CHARACTER SET utf8mb3  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('cliente', 'Comprador'),
('admin', 'CreateAdmin'),
('funcionario', 'CreateCategoria'),
('funcionario', 'CreateFatura'),
('funcionario', 'CreateIva'),
('funcionario', 'CreateMarca'),
('funcionario', 'CreateProduto'),
('funcionario', 'CreateStock'),
('funcionario', 'DeactivateCategoria'),
('funcionario', 'DeactivateFatura'),
('funcionario', 'DeactivateIva'),
('funcionario', 'DeactivateMarca'),
('funcionario', 'DeactivateProduto'),
('funcionario', 'DeactivateStock'),
('admin', 'DeleteCategoria'),
('admin', 'DeleteFatura'),
('admin', 'DeleteIva'),
('admin', 'DeleteMarca'),
('admin', 'DeleteProduto'),
('admin', 'DeleteStock'),
('cliente', 'FrontendReadFatura'),
('cliente', 'FrontendReadProduto'),
('admin', 'funcionario'),
('funcionario', 'ReadCategoria'),
('admin', 'ReadEmpresa'),
('funcionario', 'ReadFatura'),
('funcionario', 'ReadIva'),
('funcionario', 'ReadMarca'),
('funcionario', 'ReadProduto'),
('funcionario', 'ReadStock'),
('funcionario', 'UpdateCategoria'),
('admin', 'UpdateEmpresa'),
('funcionario', 'UpdateFatura'),
('funcionario', 'UpdateIva'),
('funcionario', 'UpdateMarca'),
('funcionario', 'UpdateProduto'),
('funcionario', 'UpdateStock');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8mb3  NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('Comprador', 0x4f3a32353a22636f6e736f6c655c6d6f64656c735c46617475726152756c65223a333a7b733a343a226e616d65223b733a393a22436f6d707261646f72223b733a393a22637265617465644174223b693a313636393132353434373b733a393a22757064617465644174223b693a313636393132353434373b7d, 1669125447, 1669125447);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_Cliente` int NOT NULL,
  `id_Produto` int NOT NULL,
  `Quantidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `carrinho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int NOT NULL,
  `id_CategoriaPai` int DEFAULT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `categoria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id_User` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `morada` varchar(45) NOT NULL,
  `codPostal` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id_User`, `nome`, `telefone`, `nif`, `morada`, `codPostal`) VALUES
(1, 'admin', '912456334', '123654234', 'Rua Bordalo Pinheiro', '3780-232'),
(2, 'Joao Jesus', '960234654', '231056345', 'Vila Nova de Monsarros', '3780-566'),
(3, 'Rodrigo Carreira', '965348654', '231765987', 'Parceiros', '3780-547');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int NOT NULL,
  `designacaoSocial` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `morada` varchar(45) NOT NULL,
  `codPostal` varchar(9) NOT NULL,
  `localidade` varchar(45) NOT NULL,
  `capitalSocial` int NOT NULL,
  `imgBanner` varchar(255) NOT NULL,
  `imgLogo` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `designacaoSocial`, `email`, `telefone`, `nif`, `morada`, `codPostal`, `localidade`, `capitalSocial`, `imgBanner`, `imgLogo`) VALUES
(1, 'GlobalDiga', 'globaldiga@gmail.com', '244501812', '503503503', 'Rua do', '2410-367', 'Leiria', 28654876, 'ok.jpg', 'logo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE `fatura` (
  `id` int NOT NULL,
  `id_Cliente` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `codPostal` varchar(9) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `morada` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dataFatura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valorTotal` decimal(11,2) NOT NULL,
  `valorIva` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `fatura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `iva`
--

CREATE TABLE `iva` (
  `id` int NOT NULL,
  `percentagem` int NOT NULL,
  `Ativo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `iva`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhafatura`
--

CREATE TABLE `linhafatura` (
  `id` int NOT NULL,
  `id_Fatura` int NOT NULL,
  `produto_nome` varchar(100) NOT NULL,
  `produto_referencia` varchar(45) NOT NULL,
  `quantidade` int NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `valorIva` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `linhafatura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE `loja` (
  `id` int NOT NULL,
  `id_Empresa` int NOT NULL,
  `localidade` varchar(45) NOT NULL,
  `latitude` VARCHAR(255) DEFAULT NULL,
  `longitude` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `loja`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `marca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1666104799),
('m130524_201442_init', 1666104802),
('m140506_102106_rbac_init', 1666107620),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1666107620),
('m180523_151638_rbac_updates_indexes_without_prefix', 1666107620),
('m190124_110200_add_verification_token_column_to_user_table', 1666104802),
('m200409_110543_rbac_update_mssql_trigger', 1666107620),
('m221018_154041_init_rbac', 1666108008);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int NOT NULL,
  `id_Categoria` int NOT NULL,
  `id_Iva` int NOT NULL,
  `id_Marca` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` text NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `preco` decimal(11,2) NOT NULL,
  `nome` VARCHAR(100) DEFAULT NULL,
  `Ativo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `produto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `id_Loja` int NOT NULL,
  `id_Produto` int NOT NULL,
  `quantidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `stock`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'zx8XakGqQFMniURHZ0EPQHP0ESo2c9ZU', '$2y$13$2J/mDcioD6Ly4A2JCgvYUuDzUTwRZ5ye0RxiMc6rYSIVwFl2w.mte', NULL, 'admin@gmail.com', 10, 1666107512, 1666107512, 'l6yJJiwDgybNJyGYvh1opn5L7yrhXPkN_1666107512'),
(2, 'cliente', '4VSpN1OuE8poYmpOYj7Ydfemd8rVsvEv', '$2y$13$CRfnOyBa8CzQcdfI86pIOu.uFi0th5tOCGuqCl0TUFMO6ebjiYKg2', NULL, 'cliente@gmail.com', 10, 1666112069, 1666112069, 'oJPREkKzHvs-Y1vFtg7HkAv0QOsN9Hpu_1666112069'),
(3, 'funcionario', '9exi6gzj7eDty99pGSZORalM66Fa9wfC', '$2y$13$YHu7iZ9A8pfHfy4gIWW/mu0gLjtasCy.twDTPK66QHxKcFiIMZ.EC', NULL, 'funcionario@gmail.com', 10, 1667235750, 1667235750, '13f01cOizu-KBHzyvOwk5IgZh6lrpi-z_1667235750');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Índices para tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Índices para tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Índices para tabela `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_Cliente`,`id_Produto`),
  ADD KEY `idProduto` (`id_Produto`),
  ADD KEY `idCliente` (`id_Cliente`,`id_Produto`),
  ADD KEY `idCliente_2` (`id_Cliente`,`id_Produto`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaPai` (`id_CategoriaPai`);

--
-- Índices para tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id_User`),
  ADD KEY `idUser` (`id_User`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`id_Cliente`);

--
-- Índices para tabela `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `linhafatura`
--
ALTER TABLE `linhafatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFatura` (`id_Fatura`);

--
-- Índices para tabela `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEmpresa` (`id_Empresa`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`nome`);

--
-- Índices para tabela `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idIva` (`id_Iva`),
  ADD KEY `idSubcategoria` (`id_Categoria`),
  ADD KEY `marca` (`id_Marca`);

--
-- Índices para tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_Loja`,`id_Produto`),
  ADD KEY `idLoja` (`id_Loja`),
  ADD KEY `idProduto` (`id_Produto`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `linhafatura`
--
ALTER TABLE `linhafatura`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `loja`
--
ALTER TABLE `loja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`id_Produto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_CategoriaPai`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `dados`
--
ALTER TABLE `dados`
  ADD CONSTRAINT `dados_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `fatura_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `dados` (`id_User`);

--
-- Limitadores para a tabela `linhafatura`
--
ALTER TABLE `linhafatura`
  ADD CONSTRAINT `linhafatura_ibfk_1` FOREIGN KEY (`id_Fatura`) REFERENCES `fatura` (`id`);

--
-- Limitadores para a tabela `loja`
--
ALTER TABLE `loja`
  ADD CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`id_Empresa`) REFERENCES `empresa` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_Iva`) REFERENCES `iva` (`id`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`id_Marca`) REFERENCES `marca` (`nome`),
  ADD CONSTRAINT `produto_ibfk_4` FOREIGN KEY (`id_Categoria`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_Loja`) REFERENCES `loja` (`id`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`id_Produto`) REFERENCES `produto` (`id`);
COMMIT;

CREATE DATABASE if NOT EXISTS projeto_final_teste;
USE projeto_final_teste;

--
-- Banco de dados: `projeto_final`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8mb3  NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8mb3  NOT NULL,
  `created_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1669125447),
('cliente', '2', 1669125447),
('funcionario', '3', 1669125447);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8mb3  NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8mb3 ,
  `rule_name` varchar(64) CHARACTER SET utf8mb3  DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1669125447, 1669125447),
('cliente', 1, NULL, NULL, NULL, 1669125447, 1669125447),
('Comprador', 2, 'Ver faturas', 'Comprador', NULL, 1669125447, 1669125447),
('CreateAdmin', 2, 'Permissão para criar uma conta de Admin', NULL, NULL, 1669125447, 1669125447),
('CreateCategoria', 2, 'Create Categoria', NULL, NULL, 1669125447, 1669125447),
('CreateFatura', 2, 'Create Fatura', NULL, NULL, 1669125447, 1669125447),
('CreateIva', 2, 'Create Iva', NULL, NULL, 1669125447, 1669125447),
('CreateMarca', 2, 'Create Marca', NULL, NULL, 1669125447, 1669125447),
('CreateProduto', 2, 'Create Produto', NULL, NULL, 1669125447, 1669125447),
('CreateStock', 2, 'Create Stock', NULL, NULL, 1669125447, 1669125447),
('DeactivateCategoria', 2, 'Deactivate Categoria', NULL, NULL, 1669125447, 1669125447),
('DeactivateFatura', 2, 'Deactivate Fatura', NULL, NULL, 1669125447, 1669125447),
('DeactivateIva', 2, 'Deactivate Iva', NULL, NULL, 1669125447, 1669125447),
('DeactivateMarca', 2, 'Deactivate Marca', NULL, NULL, 1669125447, 1669125447),
('DeactivateProduto', 2, 'Deactivate Produto', NULL, NULL, 1669125447, 1669125447),
('DeactivateStock', 2, 'Deactivate Stock', NULL, NULL, 1669125447, 1669125447),
('DeleteCategoria', 2, 'Permission to delete Categoria', NULL, NULL, 1669125447, 1669125447),
('DeleteFatura', 2, 'Permission to delete Fatura', NULL, NULL, 1669125447, 1669125447),
('DeleteIva', 2, 'Permission to delete Iva', NULL, NULL, 1669125447, 1669125447),
('DeleteMarca', 2, 'Permission to delete Marca', NULL, NULL, 1669125447, 1669125447),
('DeleteProduto', 2, 'Permission to delete Produto', NULL, NULL, 1669125447, 1669125447),
('DeleteStock', 2, 'Permission to delete Stock', NULL, NULL, 1669125447, 1669125447),
('FrontendReadFatura', 2, 'Permite ao cliente visualizar Fatura', NULL, NULL, 1669125447, 1669125447),
('FrontendReadProduto', 2, 'Permite ao cliente visualizar Produto', NULL, NULL, 1669125447, 1669125447),
('funcionario', 1, NULL, NULL, NULL, 1669125447, 1669125447),
('ReadCategoria', 2, 'Read Categoria', NULL, NULL, 1669125447, 1669125447),
('ReadEmpresa', 2, 'Alterar os dados da Empresa', NULL, NULL, 1669125447, 1669125447),
('ReadFatura', 2, 'Read Fatura', NULL, NULL, 1669125447, 1669125447),
('ReadIva', 2, 'Read Iva', NULL, NULL, 1669125447, 1669125447),
('ReadMarca', 2, 'Read Marca', NULL, NULL, 1669125447, 1669125447),
('ReadProduto', 2, 'Read Produto', NULL, NULL, 1669125447, 1669125447),
('ReadStock', 2, 'Read Stock', NULL, NULL, 1669125447, 1669125447),
('UpdateCategoria', 2, 'Update Categoria', NULL, NULL, 1669125447, 1669125447),
('UpdateEmpresa', 2, 'Alterar os dados da Empresa', NULL, NULL, 1669125447, 1669125447),
('UpdateFatura', 2, 'Update Fatura', NULL, NULL, 1669125447, 1669125447),
('UpdateIva', 2, 'Update Iva', NULL, NULL, 1669125447, 1669125447),
('UpdateMarca', 2, 'Update Marca', NULL, NULL, 1669125447, 1669125447),
('UpdateProduto', 2, 'Update Produto', NULL, NULL, 1669125447, 1669125447),
('UpdateStock', 2, 'Update Stock', NULL, NULL, 1669125447, 1669125447);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8mb3  NOT NULL,
  `child` varchar(64) CHARACTER SET utf8mb3  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('cliente', 'Comprador'),
('admin', 'CreateAdmin'),
('funcionario', 'CreateCategoria'),
('funcionario', 'CreateFatura'),
('funcionario', 'CreateIva'),
('funcionario', 'CreateMarca'),
('funcionario', 'CreateProduto'),
('funcionario', 'CreateStock'),
('funcionario', 'DeactivateCategoria'),
('funcionario', 'DeactivateFatura'),
('funcionario', 'DeactivateIva'),
('funcionario', 'DeactivateMarca'),
('funcionario', 'DeactivateProduto'),
('funcionario', 'DeactivateStock'),
('admin', 'DeleteCategoria'),
('admin', 'DeleteFatura'),
('admin', 'DeleteIva'),
('admin', 'DeleteMarca'),
('admin', 'DeleteProduto'),
('admin', 'DeleteStock'),
('cliente', 'FrontendReadFatura'),
('cliente', 'FrontendReadProduto'),
('admin', 'funcionario'),
('funcionario', 'ReadCategoria'),
('admin', 'ReadEmpresa'),
('funcionario', 'ReadFatura'),
('funcionario', 'ReadIva'),
('funcionario', 'ReadMarca'),
('funcionario', 'ReadProduto'),
('funcionario', 'ReadStock'),
('funcionario', 'UpdateCategoria'),
('admin', 'UpdateEmpresa'),
('funcionario', 'UpdateFatura'),
('funcionario', 'UpdateIva'),
('funcionario', 'UpdateMarca'),
('funcionario', 'UpdateProduto'),
('funcionario', 'UpdateStock');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8mb3  NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('Comprador', 0x4f3a32353a22636f6e736f6c655c6d6f64656c735c46617475726152756c65223a333a7b733a343a226e616d65223b733a393a22436f6d707261646f72223b733a393a22637265617465644174223b693a313636393132353434373b733a393a22757064617465644174223b693a313636393132353434373b7d, 1669125447, 1669125447);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_Cliente` int NOT NULL,
  `id_Produto` int NOT NULL,
  `Quantidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `carrinho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int NOT NULL,
  `id_CategoriaPai` int DEFAULT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `id_CategoriaPai`, `nome`) VALUES
(1, NULL, 'OPGG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id_User` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `morada` varchar(45) NOT NULL,
  `codPostal` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `dados`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int NOT NULL,
  `designacaoSocial` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `morada` varchar(45) NOT NULL,
  `codPostal` varchar(9) NOT NULL,
  `localidade` varchar(45) NOT NULL,
  `capitalSocial` int NOT NULL,
  `imgBanner` varchar(255) NOT NULL,
  `imgLogo` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `designacaoSocial`, `email`, `telefone`, `nif`, `morada`, `codPostal`, `localidade`, `capitalSocial`, `imgBanner`, `imgLogo`) VALUES
(1, 'GlobalDiga', 'globaldiga@gmail.com', '244501812', '503503503', 'Rua do', '2410-367', 'Leiria', 28654876, 'ok.jpg', 'logo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE `fatura` (
  `id` int NOT NULL,
  `id_Cliente` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `codPostal` varchar(9) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `morada` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dataFatura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valorTotal` decimal(11,2) NOT NULL,
  `valorIva` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `fatura`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `iva`
--

CREATE TABLE `iva` (
  `id` int NOT NULL,
  `percentagem` int NOT NULL,
  `Ativo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `iva`
--

INSERT INTO `iva` (`id`, `percentagem`, `Ativo`) VALUES
(1, 23, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhafatura`
--

CREATE TABLE `linhafatura` (
  `id` int NOT NULL,
  `id_Fatura` int NOT NULL,
  `produto_nome` varchar(45) NOT NULL,
  `produto_referencia` varchar(45) NOT NULL,
  `quantidade` int NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `valorIva` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `linhafatura`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE `loja` (
  `id` int NOT NULL,
  `id_Empresa` int NOT NULL,
  `localidade` varchar(45) NOT NULL,
  `latitude` VARCHAR(255) DEFAULT NULL,
  `longitude` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`id`, `id_Empresa`, `localidade`) VALUES
(1, 1, 'Leiria'),
(2, 1, 'Aveiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`nome`) VALUES
('AMD'),
('Nvidia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1666104799),
('m130524_201442_init', 1666104802),
('m140506_102106_rbac_init', 1666107620),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1666107620),
('m180523_151638_rbac_updates_indexes_without_prefix', 1666107620),
('m190124_110200_add_verification_token_column_to_user_table', 1666104802),
('m200409_110543_rbac_update_mssql_trigger', 1666107620),
('m221018_154041_init_rbac', 1666108008);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int NOT NULL,
  `id_Categoria` int NOT NULL,
  `id_Iva` int NOT NULL,
  `id_Marca` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` text NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `preco` decimal(11,2) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `Ativo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `id_Categoria`, `id_Iva`, `id_Marca`, `descricao`, `imagem`, `referencia`, `preco`, `nome`, `Ativo`) VALUES
(1, 1, 1, 'AMD', 'Motor Gráfico: NVIDIA® GeForce® GTX 1060 \r\n<br>\r\nBus: PCI Express x16 3.0\r\n<br>\r\nClock GPU: Base: 1530 MHz, Boost: 1785 MHz\r\n<br>\r\nClock de Memória: 14000 MHz\r\n<br>\r\nNúcleos CUDA: 1408\r\n<br>\r\nMemória: 6GB GDDR6\r\n<br>\r\nInterface de Memória: 192 Bits\r\n<br>\r\nInterface I/O:\r\n<br>\r\n3 x DisplayPort (v1.4)\r\n<br>\r\n1 x HDMI 2.0b\r\n<br>\r\nSuporte HDCP 2.2\r\n<br>\r\nVersão DirectX: 12\r\n<br>\r\nVersão OpenGL: 4.5\r\n<br>\r\nDimensões do produto: 204 x 128 x 42 mm\r\n<br>\r\nPeso do produto: 669 g', 'gpu.jpg', 'qwdasa', '15.00', 'GTX 1060', 1),
(2, 1, 1, 'Nvidia', 'Motor Gráfico: NVIDIA® GeForce® GTX 1070 \r\n<br>\r\nBus: PCI Express x16 3.0\r\n<br>\r\nClock GPU: Base: 1530 MHz, Boost: 1785 MHz\r\n<br>\r\nClock de Memória: 14000 MHz\r\n<br>\r\nNúcleos CUDA: 1408\r\n<br>\r\nMemória: 6GB GDDR6\r\n<br>\r\nInterface de Memória: 192 Bits\r\n<br>\r\nInterface I/O:\r\n<br>\r\n3 x DisplayPort (v1.4)\r\n<br>\r\n1 x HDMI 2.0b\r\n<br>\r\nSuporte HDCP 2.2\r\n<br>\r\nVersão DirectX: 12\r\n<br>\r\nVersão OpenGL: 4.5\r\n<br>\r\nDimensões do produto: 204 x 128 x 42 mm\r\n<br>\r\nPeso do produto: 669 g', 'cooler.jpg', 'sadd', '20.00', 'GTX 1070', 1),
(3, 1, 1, 'Nvidia', 'Motor Gráfico: NVIDIA® GeForce® GTX 1080\r\n<br>\r\nBus: PCI Express x16 3.0\r\n<br>\r\nClock GPU: Base: 1530 MHz, Boost: 1785 \r\nMHz\r\n<br>\r\nClock de Memória: 14000 MHz\r\n<br>\r\nNúcleos CUDA: 1408\r\n<br>\r\nMemória: 6GB GDDR6\r\n<br>\r\nInterface de Memória: 192 Bits\r\n<br>\r\nInterface I/O:\r\n<br>\r\n3 x DisplayPort (v1.4)\r\n<br>\r\n1 x HDMI 2.0b\r\n<br>\r\nSuporte HDCP 2.2\r\n<br>\r\nVersão DirectX: 12\r\n<br>\r\nVersão OpenGL: 4.5\r\n<br>\r\nDimensões do produto: 204 x 128 x 42 mm\r\n<br>\r\nPeso do produto: 669 g', 'gt 730.jpg', 'asdsad', '50.00', 'GTX 1080', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `id_Loja` int NOT NULL,
  `id_Produto` int NOT NULL,
  `quantidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`id_Loja`, `id_Produto`, `quantidade`) VALUES
(1, 1, 15),
(1, 2, 15),
(1, 3, 0),
(2, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'zx8XakGqQFMniURHZ0EPQHP0ESo2c9ZU', '$2y$13$2J/mDcioD6Ly4A2JCgvYUuDzUTwRZ5ye0RxiMc6rYSIVwFl2w.mte', NULL, 'admin@gmail.com', 10, 1666107512, 1666107512, 'l6yJJiwDgybNJyGYvh1opn5L7yrhXPkN_1666107512'),
(2, 'cliente', '4VSpN1OuE8poYmpOYj7Ydfemd8rVsvEv', '$2y$13$CRfnOyBa8CzQcdfI86pIOu.uFi0th5tOCGuqCl0TUFMO6ebjiYKg2', NULL, 'cliente@gmail.com', 10, 1666112069, 1666112069, 'oJPREkKzHvs-Y1vFtg7HkAv0QOsN9Hpu_1666112069'),
(3, 'funcionario', '9exi6gzj7eDty99pGSZORalM66Fa9wfC', '$2y$13$YHu7iZ9A8pfHfy4gIWW/mu0gLjtasCy.twDTPK66QHxKcFiIMZ.EC', NULL, 'funcionario@gmail.com', 10, 1667235750, 1667235750, '13f01cOizu-KBHzyvOwk5IgZh6lrpi-z_1667235750');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Índices para tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Índices para tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Índices para tabela `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_Cliente`,`id_Produto`),
  ADD KEY `idProduto` (`id_Produto`),
  ADD KEY `idCliente` (`id_Cliente`,`id_Produto`),
  ADD KEY `idCliente_2` (`id_Cliente`,`id_Produto`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaPai` (`id_CategoriaPai`);

--
-- Índices para tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id_User`),
  ADD KEY `idUser` (`id_User`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`id_Cliente`);

--
-- Índices para tabela `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `linhafatura`
--
ALTER TABLE `linhafatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFatura` (`id_Fatura`);

--
-- Índices para tabela `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEmpresa` (`id_Empresa`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`nome`);

--
-- Índices para tabela `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idIva` (`id_Iva`),
  ADD KEY `idSubcategoria` (`id_Categoria`),
  ADD KEY `marca` (`id_Marca`);

--
-- Índices para tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_Loja`,`id_Produto`),
  ADD KEY `idLoja` (`id_Loja`),
  ADD KEY `idProduto` (`id_Produto`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `linhafatura`
--
ALTER TABLE `linhafatura`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `loja`
--
ALTER TABLE `loja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`id_Produto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_CategoriaPai`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `dados`
--
ALTER TABLE `dados`
  ADD CONSTRAINT `dados_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `fatura_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `dados` (`id_User`);

--
-- Limitadores para a tabela `linhafatura`
--
ALTER TABLE `linhafatura`
  ADD CONSTRAINT `linhafatura_ibfk_1` FOREIGN KEY (`id_Fatura`) REFERENCES `fatura` (`id`);

--
-- Limitadores para a tabela `loja`
--
ALTER TABLE `loja`
  ADD CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`id_Empresa`) REFERENCES `empresa` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_Iva`) REFERENCES `iva` (`id`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`id_Marca`) REFERENCES `marca` (`nome`),
  ADD CONSTRAINT `produto_ibfk_4` FOREIGN KEY (`id_Categoria`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_Loja`) REFERENCES `loja` (`id`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`id_Produto`) REFERENCES `produto` (`id`);
COMMIT;
