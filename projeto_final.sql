DROP DATABASE if EXISTS projeto_final;

CREATE DATABASE projeto_final;

USE projeto_final;

--

-- Table structure for table `carrinho`

--

CREATE TABLE
    `carrinho` (
        `idUser` int(11) NOT NULL,
        `idProduto` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `categoria`

--

CREATE TABLE
    `categoria` (`nome` varchar(45) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

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
        `capitalSocial` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `fatura`

--

CREATE TABLE
    `fatura` (
        `id` int(11) NOT NULL,
        `idCliente` int(11) NOT NULL,
        `dataFatura` date NOT NULL,
        `valorTotal` decimal(11, 2) NOT NULL,
        `valorIva` decimal(11, 2) NOT NULL,
        `estado` enum('Emitida', 'Em Lancamento') NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `iva`

--

CREATE TABLE
    `iva` (
        `id` int(11) NOT NULL,
        `percentagem` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `linhaFatura`

--

CREATE TABLE
    `linhaFatura` (
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
        `localidade` varchar(45) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `marca`

--

CREATE TABLE
    `marca` (`nome` varchar(45) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `produto`

--

CREATE TABLE
    `produto` (
        `id` int(11) NOT NULL,
        `Subcategoria` varchar(45) NOT NULL,
        `idIva` int(11) NOT NULL,
        `marca` varchar(45) NOT NULL,
        `descricao` text NOT NULL,
        `imagem` text NOT NULL,
        `referencia` varchar(45) NOT NULL,
        `preco` decimal(11, 2) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

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

-- Table structure for table `subcategoria`

--

CREATE TABLE
    `subcategoria` (
        `idCategoria` varchar(45) NOT NULL,
        `nome` varchar(45) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `user`

--

CREATE TABLE
    `user` (
        `id` int(11) NOT NULL,
        `nome` varchar(45) NOT NULL,
        `pass` varchar(255) NOT NULL,
        `email` varchar(45) NOT NULL,
        `telefone` varchar(9) NOT NULL,
        `nif` varchar(9) NOT NULL,
        `morada` varchar(45) NOT NULL,
        `codPostal` varchar(9) NOT NULL,
        `role` enum(
            'cliente',
            'administrador',
            'funcionario'
        ) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Indexes for dumped tables

--

--

-- Indexes for table `carrinho`

--

ALTER TABLE `carrinho`
ADD
    KEY `idProduto` (`idProduto`),
ADD KEY `idUser` (`idUser`);

--

-- Indexes for table `categoria`

--

ALTER TABLE `categoria`
ADD PRIMARY KEY (`nome`),
ADD UNIQUE KEY `nome` (`nome`);

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

-- Indexes for table `linhaFatura`

--

ALTER TABLE `linhaFatura`
ADD PRIMARY KEY (`id`),
ADD
    KEY `idFatura` (`idFatura`),
ADD
    KEY `idProduto` (`idProduto`);

--

-- Indexes for table `loja`

--

ALTER TABLE `loja` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `marca`

--

ALTER TABLE `marca` ADD PRIMARY KEY (`nome`);

--

-- Indexes for table `produto`

--

ALTER TABLE `produto`
ADD PRIMARY KEY (`id`),
ADD KEY `idIva` (`idIva`),
ADD
    KEY `idSubcategoria` (`Subcategoria`),
ADD KEY `marca` (`marca`);

--

-- Indexes for table `stock`

--

ALTER TABLE `stock`
ADD KEY `idLoja` (`idLoja`),
ADD
    KEY `idProduto` (`idProduto`);

--

-- Indexes for table `subcategoria`

--

ALTER TABLE `subcategoria`
ADD PRIMARY KEY (`nome`),
ADD UNIQUE KEY `nome` (`nome`),
ADD
    KEY `idCategoria` (`idCategoria`);

--

-- Indexes for table `user`

--

ALTER TABLE `user` ADD PRIMARY KEY (`id`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `empresa`

--

ALTER TABLE `empresa` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `fatura`

--

ALTER TABLE `fatura` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `iva`

--

ALTER TABLE `iva` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `linhaFatura`

--

ALTER TABLE
    `linhaFatura` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `loja`

--

ALTER TABLE `loja` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `produto`

--

ALTER TABLE `produto` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `user`

--

ALTER TABLE `user` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- Constraints for dumped tables

--

--

-- Constraints for table `carrinho`

--

ALTER TABLE `carrinho`
ADD
    CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
    CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--

-- Constraints for table `fatura`

--

ALTER TABLE `fatura`
ADD
    CONSTRAINT `fatura_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--

-- Constraints for table `linhaFatura`

--

ALTER TABLE `linhaFatura`
ADD
    CONSTRAINT `linhafatura_ibfk_1` FOREIGN KEY (`idFatura`) REFERENCES `fatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
    CONSTRAINT `linhafatura_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--

-- Constraints for table `produto`

--

ALTER TABLE `produto`
ADD
    CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idIva`) REFERENCES `iva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
    CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`marca`) REFERENCES `marca` (`nome`),
ADD
    CONSTRAINT `produto_ibfk_4` FOREIGN KEY (`Subcategoria`) REFERENCES `subcategoria` (`nome`);

--

-- Constraints for table `stock`

--

ALTER TABLE `stock`
ADD
    CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`idLoja`) REFERENCES `loja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
    CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--

-- Constraints for table `subcategoria`

--

ALTER TABLE `subcategoria`
ADD
    CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`nome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

COMMIT;