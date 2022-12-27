/*
 TeSP_PSI_2123
 Globaldiga
 João Pedro Jesus, estudante n.º 2211874
 Rodrigo Filipe Carreira, estudante n.º 2213146
 João Ferreira, estudante nº 2211889
 */

USE projeto_final;

INSERT INTO
    `loja` (
        `id`,
        `id_Empresa`,
        `localidade`,
        `latitude`,
        `longitude`
    )
VALUES (
        1,
        1,
        'Leiria',
        '39.75432371409301',
        '-8.820840997312317'
    ), (
        2,
        1,
        'Lisboa',
        '38.83457487883205',
        '-9.337723665385509'
    ), (
        3,
        1,
        'Porto',
        '41.25692553919101',
        '-8.625050968363148'
    );

INSERT INTO
    `categoria` (
        `id`,
        `id_CategoriaPai`,
        `nome`
    )
VALUES (1, NULL, 'Componentes'), (2, NULL, 'Periféricos'), (3, NULL, 'Imagem'), (4, 1, 'Processadores'), (5, 1, 'Motherboards'), (6, 1, 'Placas Gráficas'), (7, 1, 'Memórias RAM'), (8, 1, 'Fontes Alimentação'), (9, 1, 'Caixas'), (10, 2, 'Ratos'), (11, 2, 'Teclados'), (12, 2, 'Headsets'), (13, 3, 'Monitores'), (14, 3, 'Televisores');

INSERT INTO
    `iva` (`id`, `percentagem`, `ativo`)
VALUES (1, 23, 1), (2, 13, 0);

INSERT INTO `marca` (`nome`)
VALUES ('AMD'), ('RAZER'), ('INTEL'), ('NVIDIA'), ('CORSAIR'), ('GSKILL'), ('KINGSTON'), ('SEASONIC'), ('MSI'), ('NOX'), ('LOGITECH'), ('APPLE'), ('STEELSERIES'), ('BENQ'), ('ASUS'), ('GIGABYTE'), ('LG'), ('SAMSUNG');

-- Processadores

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        1,
        4,
        1,
        'AMD',
        'Socket: AM4 Frequência Base: 3.50 GHz Frequência Turbo: Até 4.40 GHz Número Núcleos: 6 Número Threads: 12 Cache L2 total: 3 MB Cache L3 total: 32 MB Litografia: TSMC 7nm FinFET TDP: 65 W Solução térmica: AMD Wraith Stealth',
        'Ryzen5600.jpg',
        'R5600',
        160,
        'Ryzen 5 5600',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        2,
        4,
        1,
        'AMD',
        'Socket: AM4 Frequência Base: 3.80 GHz Frequência Turbo: Até 4.7 GHz Número Núcleos: 8 Número Threads: 16 Cache L2 total: 4 MB Cache L3 total: 32 MB Litografia: TSMC 7nm FinFET TDP: 105 W Solução térmica: Não incluído',
        'Ryzen5800X.jpg',
        'R7800X',
        280,
        'Ryzen 7 5900X',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        3,
        4,
        1,
        'AMD',
        'Socket: AM4 Frequência Base: 3.70 GHz Frequência Turbo: Até 4.8 GHz Número Núcleos: 12 Número Threads: 24 Cache L2 total: 6 MB Cache L3 total: 64 MB Litografia: TSMC 7nm FinFET TDP: 105 W Solução térmica: Não incluído',
        'Ryzen5800X.jpg',
        'R9900X',
        415,
        'Ryzen 9 5900X',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        4,
        4,
        1,
        'AMD',
        'Solução térmica: Não incluído Arquitetura: Zen 3 Socket: sWRX8 Frequência Base: 2.70 GHz Frequência Turbo: Até 4.5 GHz Número Núcleos: 64 Número Threads: 128 Cache L1 total: 4 MB Cache L2 total: 32 MB Cache L3 total: 256 MB Litografia: TSMC 7nm FinFET TDP: 280 W',
        'RyzenPRO5995WX.jpg',
        'RP995WX',
        8000,
        'Ryzen Threadripper PRO 5995WX',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        5,
        4,
        1,
        'INTEL',
        'Número de núcleos: 6 Número de núcleos de performance: 6 Número de núcleos eficientes: 0 Número de threads: 12 Frequência turbo máxima: 4.40 GHz Frequência turbo máxima de núcleo de performance: 4.40 GHz Frequência base do núcleo de performance: 2.50 GHz Cache: 18 MB Intel® Smart Cache Cache Total L2: 7.5 MB TDP Base: 65 W TDP Turbo: 117 W',
        'i512400F.jpg',
        'I12400F',
        215,
        'Intel Core i5-12400F',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        6,
        4,
        1,
        'INTEL',
        'Número de núcleos: 12 Número de núcleos de performance: 8 Número de núcleos eficientes: 4 Número de threads: 20 Frequência turbo máxima: 4.90 GHz Frequência turbo máxima de núcleo de performance: 4.90 GHz Frequência turbo máxima de núcleo eficiente: 4.80 GHz Frequência base de núcleo de performance: 3.60 GHz Frequência base de núcleo eficiente: 2.10 GHz Cache: 25 MB Intel® Smart Cache Cache Total L2: 12 MB TDP Base: 65 W TDP Turbo: 180 W Gráficos integrados: Não Incluídos',
        'i712700F.jpg',
        'I12700F',
        390,
        'Intel Core i7-12700F',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        7,
        4,
        1,
        'INTEL',
        'Número de núcleos: 16 Número de núcleos de performance: 8 Número de núcleos eficientes: 8 Número de threads: 24 Frequência turbo máxima: 5.20 GHz Frequência turbo máxima de núcleo de performance: 5.10 GHz Frequência turbo máxima de núcleo eficiente: 3.90 GHz Frequência base de núcleo de performance: 3.20 GHz Frequência base de núcleo eficiente: 2.40 GHz Cache: 30 MB Intel® Smart Cache Cache Total L2: 14 MB TDP Base: 125 W TDP Turbo: 241 W Gráficos integrados: Intel® UHD Graphics 770',
        'i912900K.jpg',
        'I12900K',
        595,
        'Intel Core i9-12900K',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        8,
        4,
        1,
        'INTEL',
        'Número de núcleos: 4 Número de núcleos de performance: 4 Número de núcleos eficientes: 0 Número de threads: 8 Frequência turbo máxima: 4.30 GHz Frequência turbo máxima de núcleo de performance: 4.30 GHz Frequência base do núcleo de performance: 3.30 GHz Cache: 12 MB Intel® Smart Cache Cache Total L2: 5 MB TDP Base: 58 W TDP Turbo: 89 W',
        'i312100F.jpg',
        'I12100F',
        119,
        'Intel Core i3-12100F',
        1
    );

-- Motherboards

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        9,
        5,
        1,
        'ASUS',
        'Processador: Suporta AMD AM4 Socket para 3ª Ger. AMD Ryzen™ e 3ª Ger. AMD Ryzen™ com Radeon™ Graphics Processor Chipset: AMD B550 Memória RAM: Processador 3ª Ger. AMD Ryzen™ 4 x DIMM, Max. 128GB, DDR4 4600(O.C)/4400(O.C)/4266(O.C.)/4133(O.C.)/4000(O.C.)/3866(O.C.)/3733(O.C.)/3600(O.C.)/3466(O.C.)/3333(O.C.)/3200/3000/2800/2666/2400/2133 MHz ECC and non-ECC, Un-buffered Memory * 3ª Ger. AMD Ryzen™ com Radeon™ Graphics Processors 4 x DIMM, Max. 128GB, DDR4 4800(O.C.)/4600(O.C)/4466(O.C.)/4400(O.C)/4266(O.C.)/4133(O.C.)/4000(O.C.)/3866(O.C.)/3600(O.C.)/3466(O.C.)/3200/3000/2800/2666/2400/2133 MHz ECC and non-ECC, Un-buffered Memory Dual Channel Memory Architecture Slots de Expansão: 3rd Gen AMD Ryzen™ Processors 1 x PCIe 4.0 x16 (x16 mode) 3rd Gen AMD Ryzen™ with Radeon™ Graphics Processors 1 x PCIe 3.0 x16 (x16 mode) AMD B550 Chipset 1 x PCIe 3.0 x16 (x4 mode) 3 x PCIe 3.0 x1 Armazenamento: Total supports 2 x M.2 slot(s) and 6 x SATA 6Gb/s ports 3rd Gen AMD Ryzen™ Processors : 1 x M.2 Socket 3, with M key, type 2242/2260/2280/22110 storage devices support(SATA & PCIe 4.0 x4 mode) 3rd Gen AMD Ryzen™ with Radeon™ Graphics Processors : 1 x M.2 Socket 3, with M key, type 2242/2260/2280/22110 storage devices support (SATA & PCIE 3.0 x 4 mode) AMD B550 Chipset : 1 x M.2 Socket 3, with M key, type 2242/2260/2280/22110 storage devices support (SATA & PCIE 3.0 x 4 mode)*2 6 x SATA 6Gb/s port(s), *2 Support Raid 0, 1, 10 LAN: Realtek® RTL8111H ASUS LANGuard Áudio: Realtek ALC887 7.1-Channel High Definition Audio CODEC Portas USB: Portas Traseiras USB ( Total 8 ) 2 x USB 3.2 Gen 2 port(s)(1 x Type-A +1 x USB Type-C®) 4 x USB 3.2 Gen 1 port(s)(4 x Type-A) 2 x USB 2.0 port(s)(2 x Type-A) Portas Frontais USB ( Total 6 ) 2 x USB 3.2 Gen 1 port(s)(2 x Type-A) 4 x USB 2.0 port(s)(4 x Type-A)',
        'APB550P.jpg',
        'MB550P',
        150,
        'ATX Asus Prime B550-Plus',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        10,
        5,
        1,
        'ASUS',
        'Processador: Suporta processadores AMD AM4 Socket AMD Ryzen™ 2nd Generation/3rd Gen AMD Ryzen™/2nd and 1st Gen AMD Ryzen™ with Radeon™ Vega Graphics Chipset: AMD X570 Memória RAM: Processadores AMD Ryzen™ 3ª Geração 4 x DIMM, Máx. 128GB, DDR4 MHz Un-buffered Memory Processadores AMD Ryzen™ 2ª Geração 4 x DIMM, Máx. 128GB, DDR4 MHz Un-buffered Memory Processadores AMD Ryzen™ 2ª e 1ª Geração com Radeon™ Vega Graphics 4 x DIMM, Máx. 128GB, DDR4 Un-buffered Memory Arquitetura de memória Dual Channel Memória ECC suportada por vários CPU Suporte Multi-GPU: Processadores 3ª e 2ª Geração AMD Ryzen™ / 2ª Geração AMD Ryzen™ / 1ª Geração Suporta tecnologia AMD CrossFireX™ Slots de Expansão: Processador AMD Ryzen™ 3ª Geração 1 x PCIe 4.0 x16 (x16 mode) Processador AMD Ryzen™ 2ª Geração 1 x PCIe 3.0 x16 (x16 mode) Processadores AMD Ryzen™ 2ª e 1ª Geração com gráficos Radeon™ Vega 1 x PCIe 3.0/2.0 x16 (x8 mode) Chipset AMD X570 1 x PCIe 4.0 x16 (Máximo modo x4) 2 x PCIe 4.0 x1 Armazenamento: Processadores AMD Ryzen™ 3ª Geração 1 x M.2 Socket 3, com M key, tipo 2242/2260/2280/22110 (modos SATA & PCIE 4.0 x 4) Processadores AMD Ryzen™ 2ª Geração 1 x M.2_1 socket 3, with M key, type 2242/2260/2280/22110 (modos SATA & PCIE 3.0 x 4) Chipset AMD X570: 1 x M.2_2 socket 3, with M Key, tipo 2242/2260/2280/22110(PCIE 4.0 x4 e modos SATA) 8 x Portas SATA 6Gb/s Suporta Raid 0, 1, 10',
        'ATX570P.jpg',
        'MX570P',
        290,
        'ATX Asus TUF Gaming X570-PLUS',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        11,
        5,
        1,
        'GIGABYTE',
        'Processador: Suporta processadores 11ª Geração Intel® Core™ i9 / Intel® Core™ i7 / Intel® Core™ i5 Suporta processadores 10ª Geração Intel® Core™ i9 / Intel® Core™ i7 / Intel® Core™ i5 / Intel® Core™ i3 / Intel® Pentium® / Intel® Celeron®* * Limitado a processadores com 4 MB Intel® Smart Cache, família Intel® Celeron® G5xx5. L3 cache varia de acordo com o processador Chipset: Intel® Z590 Express Chipset Memória RAM: Processadores 11ª Geração Intel® Core™ i9/i7/i5 Suporta os seguintes módulos de memória DDR4 5400 (O.C)/ DDR4 5333(O.C.)/ DDR4 5133(O.C.)/DDR4 5000(O.C.)/4933(O.C.)/4800(O.C.)/ 4700(O.C.)/ 4600(O.C.)/ 4500(O.C.)/ 4400(O.C.)/ 4300(O.C.)/4266(O.C.) / 4133(O.C.) / 4000(O.C.) / 3866(O.C.) / 3800(O.C.) / 3733(O.C.) / 3666(O.C.) / 3600(O.C.) / 3466(O.C.) / 3400(O.C.) / 3333(O.C.) / 3300(O.C.) / 3200 / 3000 / 2933 / 2800 / 2666 / 2400 / 2133 MHz Processadores 10ª Geração Intel® Core™ i9/i7 Suporta os seguintes módulos de memória DDR4 2933/2666/2400/2133 MHz Processadores 10ª Geração Intel® Core™ i5/i3/Pentium®/Celeron® Suporta os seguintes módulos de memória DDR4 2666/2400/2133 MHz 4 x DDR4 DIMM socket suporta até 128 GB (32 GB capacidade DIMM única) Arquitetura de memória Dual Channel Suporta módulos de memória ECC Un-buffered DIMM 1Rx8/2Rx8 Suporta módulos de memória non-ECC Un-buffered DIMM 1Rx8/2Rx8/1Rx16 Suporta módulos de memória Extreme Memory Profile Slots de Expansão: 1 x PCI Express x16 slot, running at x16 (PCIEX16) 1 x PCI Express x16 slot, running at x8 (PCIEX8) 1 x PCI Express x16 slot, running at x4 (PCIEX4) Gráficos Onboard: Suporte integrado de gráficos Processador-Intel® HD Graphics: 1 x DisplayPort, suportando uma resolução máxima de 4096x2304@60 Hz Tecnologia Multi-Graphics: Suporte às tecnologias AMD Quad-GPU CrossFire™ e 2-Way AMD CrossFire™ Armazenamento: CPU: 1 x M.2 connector (Socket 3, M key, type 2242/2260/2280/22110 PCIe 4.0 x4/x2 SSD support) (M2A_CPU)* *Supported by 11th Generation processors only. Chipset: 1 x M.2 connector (Socket 3, M key, type 2242/2260/2280/22110 SATA and PCIe 3.0 x4/x2 SSD support) (M2P_SB) 1 x M.2 connector (Socket 3, M key, type 2242/2260/2280/22110 PCIe 3.0 x4/x2 SSD support) (M2M_SB) 6 x SATA 6Gb/s connectors Suporte para RAID 0, RAID 1, RAID 5 e RAID 10',
        'AGZ590.jpg',
        'MZ590',
        340,
        'ATX Gigabyte Z590 Aorus Master',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        12,
        5,
        1,
        'ASUS',
        'Processador: Intel® Socket LGA1700 para processadores Intel® Core ™ de 12ª geração, Pentium® Gold e Celeron® Suporta Tecnologia Intel® Turbo Boost 2.0 e Tecnologia Intel® Turbo Boost Max 3.0 Chipset: Intel® Z690 Memória RAM: 4 x DIMM, Max. 128GB, DDR5 6400+(OC)/ 6200(OC)/ 6000(OC)/ 5800(OC)/ 5600(OC)/ 5400(OC)/ 5200(OC)/5000(OC)/4800 Non-ECC, Un-buffered Memory Arquitetura de memória Dual Channel Suporta Intel® Extreme Memory Profile (XMP) OptiMem III Gráficos: 1 x Intel® Thunderbolt™ 4 ports (USB Type-C®) video outputs Slots de Expansão: Processadores Intel® 12ª Geração: 2 x PCIe 5.0 x16 slot(s) (supports x16 or x8/x8 mode(s)) Intel® Z690 Chipset 1 x PCIe 3.0 x1 slot Armazenamento: Suporta 5 x M.2 slots e 6 x portas SATA 6Gb/s Processadores Intel® 12ª Geração M.2_1 slot (Key M), type 2242/2260/2280/22110 Processadores Intel® 12ª Geração suportam modo PCIe 5.0 x4 M.2_2 slot (Key M), type 2280 Processadores Intel® 12ª Geração suportam modo PCIe 4.0 x4 Intel® Z690 Chipset M.2_3 slot (Key M), type 2280 (supports PCIe 4.0 x4 & SATA modes) DIMM.2_1 slot (Key M) via ROG DIMM.2, type 2242/2260/2280/22110 (supports PCIe 4.0 x4 mode) DIMM.2_2 slot (Key M) via ROG DIMM.2, type 2242/2260/2280/22110 (supports PCIe 4.0 x4 mode) 6 x Portas SATA 6Gb/s',
        'ARGZ690.jpg',
        'MZ690',
        1930,
        'Extended-ATX Asus ROG Maximus Z690 Extreme Glacial',
        1
    );

-- Placas Graficas

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        13,
        6,
        1,
        'AMD',
        'Motor Gráfico: AMD Radeon RX 6600 Bus: PCI Express 4.0 Memória: 8GB GDDR6 Clock GPU: Base: 1626 MHz Game: 2044 MHz Boost: 2491 MHz Stream Processors: 1792 Clock de Memória: 14 Gbps Interface de Memória: 128 bits Interface: 3 x DisplayPort (v1.4) 1 x HDMI 2.1 Suporte HDCP: Sim DirectX®: 12 Dimensões do produto: 24.1 x 13.1 x 4.1 cm',
        'R66008G.jpg',
        'PGRX6600',
        380,
        'XFX Radeon RX 6600 Speedster SWFT 210 Core Gaming 8GB GDDR6',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        14,
        6,
        1,
        'AMD',
        'Motor Gráfico: AMD Radeon RX 6900 XT Bus: PCI Express 4.0 Memória: 16GB GDDR6 Clock GPU: Clock Base: 2375MHz | Clock Boost: 2525MHz Stream Processors: 5120 Clock de Memória: 16.0 Gbps Interface de Memória: 256 Bits Interface: 3 x DisplayPort 1.4a 1 x HDMI 2.1 Suporte HDCP: Sim OpenGL: 4.6 DirectX®: 12',
        'R690016G.jpg',
        'PGRX6900XT',
        1889,
        'Sapphire Toxic Radeon RX 6900 XT Extreme Edition 16GB GDDR6',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        15,
        6,
        1,
        'NVIDIA',
        'Motor Gráfico: NVIDIA GeForce RTX 4090 Arquitetura: NVIDIA Ada Lovelace Núcleos Ray Tracing: 3ª Geração Núcleos Tensor: 4ª Geração Interface Bus: PCI Express® Gen 4 Clock GPU: 2.23 Ghz (Clock Base) / TBC (Clock Boost) Núcleos CUDA: 16384 Memória: 24GB GDDR6X Velocidade de Memória: 21 Gbps Interface de Memória: 384 Bits Interface I/O: 3 x DisplayPort v1.4a 1 x HDMI 2.1a (Suporta 4K@120Hz HDR, 8K@60Hz HDR e Variable Refresh Rate) Suporte HDCP 2.3 Versão DirectX: 12 Ultimate Versão OpenGL: 4.6 Dimensões do produto: 336 x 142 x 78 mm Peso do produto: 2413 g',
        'N409024G.jpg',
        'PGRTX4090X',
        2260,
        'MSI GeForce RTX 4090 Suprim X 24G',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        16,
        6,
        1,
        'NVIDIA',
        'Motor Gráfico: NVIDIA® GeForce® RTX 3060 Ti Bus: PCI Express 4.0 16x Clore Clock: Base: 1410 MHz, Boost: 1770 MHz Clock de Memória: 14 Gbps Núcleos CUDA: 4864 Memória: 8GB GDDR6 Interface de Memória: 256 Bits Interface I/O: 3 x DisplayPort 1.4 1 x HDMI 2.1 Suporte HDCP 2.3 Versão DirectX: 12 Versão OpenGL: 4.6 Dimensões do produto: 278 x 131 x 51 mm Peso do produto: 1007 g',
        'N30608G.jpg',
        'PGRTX3060X',
        580,
        'MSI GeForce RTX 3060 Ti Gaming X 8G LHR',
        1
    );

-- RAM

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        17,
        7,
        1,
        'KINGSTON',
        'Especificações: Capacidade: 16GB (1x16GB) Tipo: DIMM DDR5 Velocidade: 4800 MHz Tensão: 1.1V Latência: CL38 Dimensões do produto: 133.3mm x 6.6mm x 34.9mm',
        'RDDR54800.jpg',
        'RMDDR516G4800',
        80,
        'Kingston Fury Beast 16GB (1x16GB) DDR5-4800MHz CL38 Preta',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        18,
        7,
        1,
        'CORSAIR',
        'Especificações: Capacidade: 16GB (1x16GB) Tipo: DIMM DDR5 Velocidade: 4800 MHz Tensão: 1.1V Latência: CL38 Dimensões do produto: 133.3mm x 6.6mm x 34.9mm',
        'RDDR43600.jpg',
        'RMDDR416G3600',
        93,
        'Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4-3600MHz CL18 Preta',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        19,
        7,
        1,
        'GSKILL',
        'Tipo: 240-Pin DDR3 SDRAM Capacidade: 8GB (2 x 4GB) Velocidade: DDR3 2400 (PC3 19200) CAS: 10 Timing: 10-12-12-31-2N Voltagem: 1.65V Intel XMP: Sim',
        'RDDR32400.jpg',
        'RMDDR38G2400',
        68,
        'G.SKILL Trident X 8GB (2x4GB) DDR3-2400MHz CL10',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        20,
        7,
        1,
        'GSKILL',
        'Capacidade: 2GB (1x2GB) Tipo: DDR4 Velocidade: 667MHz Latência: 4-4-4-12-2N Tensão: 1.80V~1.90V Registered/Unbuffered: Unbuffered Error Checking: Non-ECC',
        'RDDR2667.jpg',
        'RMDDR22G667',
        28,
        'G.SKILL Performance 2GB (1x2GB) DDR2-667MHz CL4 Azul',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        21,
        7,
        1,
        'GSKILL',
        'Série: Trident Z RGB Capacidade: Kit Dual-Channel 32GB (16GBx2) Tipo: DDR4 Velocidade: 3200MHz Latência: 14-14-14-34-2N Voltagem: 1.35v Registered/Unbuffered: Unbuffered Error Checking: Non-ECC Recursos: Intel XMP 2.0 (Extreme Memory Profile) Ready',
        'RDDR43200.jpg',
        'RMDDR432G3200',
        284,
        'Memória RAM G.SKILL Trident Z RGB 32GB (2x16GB) DDR4-3200MHz CL14 Preta',
        1
    );

-- Fontes

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        22,
        8,
        1,
        'SEASONIC',
        'Especificações: Capacidade: 650W DC Output: +3.3 V@20A | +5 V@20A | +12 V@54A | -12 V@0.3A | +5 VSB@2.5A Refrigeração: 120 mm Proteções: OPP, OVP, UVP, SCP Segurança e EMC: cTUVus, TUV, Gost-R, CB , BSMI, CCC, CE, FCC, C-tick Conformidade Ambiental: Energy Star, RoHS, WEEE, REACH Dimensões do produto: 140 mm (L) x 150 mm (W) x 86 mm (H) Conectores: 1 x Main Power (24/20 pins) 1 x CPU (8/4 pins) 4 x PCIe (8/6 pins) 6 x SATA 3 x Peripheral 1 x Floppy',
        'FS650.jpg',
        'FS650',
        65,
        'Seasonic S12III Series 650W 80PLUS Bronze',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        23,
        8,
        1,
        'CORSAIR',
        'Especificações: Padrão: ATX12V v2.4 Potência: 850 W DC Output: +3,3 V@20A | +5V@20A | +12 V@83,3A | -12 V@0,3A | +5VSB@3A Modular: Sim Totalmente Modular Eficiência: 80 PLUS Gold Dimensões do produto: 150 x 86 x 140 mm (WxHxD) Conectores: 1x 24-pin ATX 2x 4+4-pin CPU +12V (EPS) 4x PATA 6x 6+2-pin PCIe 7x SATA',
        'FC1000.jpg',
        'FC1000',
        187,
        'Corsair RM Series RM1000e 80 Plus Gold Full Modular',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        24,
        8,
        1,
        'MSI',
        'Especificações: Capacidade máxima: 750 W Eficiência: Até 90% (80 Plus Gold) DC Output: 22A@+5V | 22A@+3.3V | 25@+12VMBPH | 25A@+12VCPU | 35A@+12VVGA1 | 30A@+12VVGA2 | 0.3A@-12V | 2.5A@+5VSB Refrigeração: 1 x Ventoinha 140mm Proteções: OCP / OVP / OPP / OTP / SCP / UVP Dimensões do produto: 150mm x 160mm x 86mm Conectores: 1 x ATX 24-PIN @ 600mm ± 10mm 6 x PCI-E 8-PIN (6+2) @ 500mm ± 10mm 8 x SATA @ 950mm ± 10mm 2 x EPS 8-PIN (4+4) @ 700mm ± 10mm 5 x PERIPHERAL / FDD 4-PIN @ 1100mm ± 10mm',
        'FM750.jpg',
        'FM750',
        129,
        'MSI MPG A750GF 750W 80 PLUS Gold Full Modular',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        25,
        8,
        1,
        'NOX',
        'Especificações: Tipo: ATX12V v2.31 & EPS 12V 2.91/2.92 com PFC activo Capacidade: 700 W DC Output: +3.3V@18A | +5V@18A | +12V@58A | -12V@0.3A | +5VSB@3A Certificação: 80 PLUS Bronze Eficiência: 85% Voltagem: 100-240V / 12-6A / 47-63 Hz Segurança: OVP, UVP, SCP, SIP e OPP Ventoinha: Ventoinha silenciosa de 120mm com controlo de velocidade inteligente Dimensões do produto: 150 x 157.5 x 86 mm Peso do produto: 2.01 Kg Conectores: 1 x Conector Principal 1 x EPS 12V 4+4 pinos 2 x PCIE 6+2 pinos 7 x SATA 4 pinos 3 x Molex 4 pinos',
        'FN700.jpg',
        'FN700',
        69,
        'Nox Hummer X700W 80 PLUS Bronze Semi Modular',
        1
    );

-- Caixas

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        26,
        9,
        1,
        'CORSAIR',
        'Motherboards compatíveis: Mini-ITX, Micro-ATX, ATX, E-ATX (305mm x 277mm) Slots de expansão: 7 + 2 Vertical Baías: 2 x 3.5" internas, 2 x 2.5" internas Sistema de Refrigeração: Frontal: Suporta 3 x ventoinhas 120mm ou 2 x 140mm (1 x 120mm incluída) Superior: Suporta 2 x ventoinhas 120mm ou 2x 140mm (opcionais/não incluídas) Traseira: Suporta 1 x ventoinha 120mm (1 x 120mm incluída) Portas I/O: 1 x USB 3.0 1 x USB 3.1 Tipo C 1 x Jack Fones de ouvido/microfone Botão Ligar/desligar Botão Reiniciar Comprimento Máx. VGA: Até 360mm Altura Máx. Cooler CPU: 170mm Dimensões do produto: 453mm x 230mm x 466mm',
        'CC4000D.jpg',
        'CC4000D',
        109,
        'Extended-ATX Corsair 4000D Airflow Tempered Glass Branca',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        27,
        9,
        1,
        'NOX',
        'Características Principais: Iluminação Rainbow ARGB com diversos modos de iluminação Compartimento isolado para instalação de PSU para melhor eficiência térmica Painel lateral janelado em acrílico transparente Controlador de velocidade para 7 ventoinhas Sistema de gestão de cablagem Sistema de filtragem de pó Compatibilidade MB: ATX / Micro ATX Baías: Internas: 2x 3.5''; 2x 2.5'' Ventoinhas: Frontal: 3x 120 mm (1x incluída) Traseira: 1x 120 mm (incluída) Topo: 1x 120 mm (não incluída) Slots: 7 Conexões: 1x USB 3.0; 2x USB 2.0; 1x HD Audio; 1x Mic Dimensões: 206 x 470 x 460 mm Peso: 4.8 Kg Material: Chassis em aço SPCC; Painel frontal em plástico ABS Compatibilidade: Cooler CPU: 161 mm (altura máxima) Placa gráfica: 380 mm (comprimento máximo) Refrigeração líquida: Frontal: 120 / 240 mm; Topo: 120 mm; Traseira: 120 mm',
        'CNPROB.jpg',
        'CNPROB',
        46,
        'ATX Nox Hummer MC PRO ARGB Branco',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        28,
        9,
        1,
        'NOX',
        'Material de construção: Chassi de aço SPCC 0,7 mm | Painel lateral de vidro temperado de 4mm Motherboards compatíveis: Micro-ATX, Mini-ITX Baías: 3x 3.5'', 2x 2.5'' Slots de expansão: 4 Sistema de Refrigeração: Frontal: Suporta 2 x ventoinhas 120mm ou 140mm (opcionais/não incluídas) Traseira: Suporta 1 x ventoinha 120mm (1 x ARGB Rainbow incluída) Superior: Suporta 2 x ventoinhas 120mm ou 140mm (opcionais/não incluídas) Portas I/O: 1 x USB 3.0 2 x USB 2.0 Jacks áudio Comprimento máx. VGA: Até 375 mm Altura máx. Cooler CPU: Até 163 mm Dimensões do produto: 210 x 393 x 437 mm (W x H x D) Peso do produto: 5,3 Kg',
        'CNFUSIONS.jpg',
        'CNFUSIONS',
        50,
        'Micro-ATX Nox Hummer Fusion S RGB Tempered Glass Preta',
        1
    );

-- Ratos

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        29,
        10,
        1,
        'RAZER',
        'Especificações: Conectividade: Razer HyperSpeed Wireless Cabo de carregamento: Speedflex USB tipo C Autonomia da bateria: Até 90 horas (movimento constante a 1000Hz) Até 24 horas (movimento constante a 4000Hz) quando em HyperPolling Wireless Dongle (vendido separadamente) Iluminação RGB: Não Sensor: Ótico Focus Pro 30K Resolução sensor: 30000 DPI Velocidade máxima: 750 IPS Aceleração máxima: 70 G Botões programáveis: 5 Vida útil: 90-milhões de Cliques Perfis de memória On-board: 1 Pés do rato: 100% PTFE Dimensões: 128 x 68 x 44 mm Peso: 63 g',
        'RDPROW.jpg',
        'RDPROW',
        150,
        'Razer DeathAdder V3 Pro Wireless 30000DPI Branco',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        30,
        10,
        1,
        'LOGITECH',
        'Requisitos do sistema: Porta USB Windows® 8 ou superior, mac OS 10.11 ou superior Acesso à Internet para download de software Compatibilidade de plataformas: Windows® 8 ou superior, mac OS 10.11 ou superior Especificações técnicas: Tecnologia sem fio LIGHTSPEED™ Memória de bordo* Sistema tensor de clique Pés de PTFE sem aditivos 5 botões Rastreamento Sensor: HERO™ Resolução: 100 – 25.400 DPI Aceleração máxima: > 40 G** Velocidade máxima.: > 400 IPS** Suavização/aceleração/filtragem nulas Sensibilidade Taxa de transmissão USB: 1000 Hz (1 ms) Microprocessador: ARM de 32 bits Duração da bateria*** Movimento constante: 70h Especificações Físicas Altura: 125,0 mm Largura: 63,5 mm Profundidade: 40,0 mm Peso: 63 g Conteúdo da embalagem: Rato gaming sem fio Receptor sem fio LIGHTSPEED™ Cabo de dados/carregamento',
        'LGPSW.jpg',
        'LGPSW',
        129,
        'Logitech G Pro X Superlight Wireless 25600DPI Preto',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        31,
        10,
        1,
        'APPLE',
        'Especificações: Conectividade: Bluetooth, Conetor Lightning, Sem fios Altura: 2,16 cm Largura: 5,71 cm Profundidade: 11,35 cm Peso: 0,099 kg',
        'APMMB.jpg',
        'APMMB',
        83,
        'Apple Magic Mouse Branco',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        32,
        10,
        1,
        'MSI',
        'Especificações: Sensor: Óptico, PAW-3519 Resolução: 200 / 400 / 800 / 1600 / 3200 DPI (máx. 4200 via software) Interface: USB 2.0 Botões: 6 Polling rate: 1000Hz Compatibilidade: Windows 10 / 8.1 / 8 / 7 Cabo: 1,8 m com conector banhado a ouro Dimensões do produto: 128 x 68.5 x 40.5 mm Peso do produto: 103g',
        'MSIGM08.jpg',
        'MSIGM08',
        14,
        'MSI Clutch GM08 4200DPI Preto',
        1
    );

-- Teclados

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        33,
        11,
        1,
        'RAZER',
        'Características Principais: Switches Mecânicos Razer™ para uma execução rápida e precisa Switches com case transparente para uma iluminação Razer Chroma™ RGB mais brilhante Keycaps doubleshot em ABS para suportar um uso intenso Descanso ergonómico para os pulsos para um conforto prolongado no jogo Estrutura em alumínio para uma maior durabilidade Especificações: Layout PT (Tecla Enter Grande) Switches mecânicos Razer™ projetados para jogos Vida útil de 80 milhões de toques de teclas Retroiluminação personalizável Razer Chroma™ RGB com 16,8 milhões de opções de cores Descanso ergonômico para os pulsos Seletor digital multifuncional Tecla específica para mídia Memória híbrida integrada e armazenamento na nuvem – até 5 perfis Habilitado para Razer Synapse 3 Opções de roteamento do cabo Sobreposição de até N teclas Teclas totalmente programáveis com gravação instantânea de macros Opção de modo de jogo Ultrapolling de 1000 Hz Estrutura em alumínio',
        'RBWG.jpg',
        'RBWG',
        149,
        'Razer Blackwidow V3 PT Green Switches',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        34,
        11,
        1,
        'CORSAIR',
        'Especificações: Layout UK Teclas mecânicas 100% Cherry MX Speed Tempo de resposta: 1ms Luz de Fundo RGB Teclas Macro: 6 dedicadas Matriz: 100% anti-ghosting Dimensões do Produto: 465mm x 171mm x 36mm Peso do Produto: 1.324kg Conteúdo da Embalagem: Teclado mecânico para jogos K95 RGB PLATINUM Descanso para pulso integral removível Guia de início rápido',
        'CK95C.jpg',
        'CK95C',
        289,
        'Corsair K95 RGB PLATINUM UK Cherry MX Speed',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        35,
        11,
        1,
        'MSI',
        'Especificações: Layout: PT (Tecla Enter Grande) Interface: USB 2.0 Retroiluminação: RGB Anti-Ghosting: Sim, 12 teclas (QWERASDFZXCV) Comprimento do cabo: 1,8 m com conector banhado a ouro Dimensões do produto: 455.2 x 171.3 x 34.3 mm Peso do produto: 866.5 g',
        'MSIGK20.jpg',
        'MSIGK20',
        30,
        'MSI Vigor GK20 Gaming RGB PT',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        36,
        11,
        1,
        'LOGITECH',
        'Especificações: Layout: PT (Tecla Enter Grande) Interface: USB 2.0 Retroiluminação: RGB Anti-Ghosting: Sim, 12 teclas (QWERASDFZXCV) Comprimento do cabo: 1,8 m com conector banhado a ouro Dimensões do produto: 455.2 x 171.3 x 34.3 mm Peso do produto: 866.5 g',
        'LGT512.jpg',
        'LGT512',
        99,
        'Logitech G512 Carbon RGB PT GX Brown Switches',
        1
    );

-- Headsets

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        37,
        12,
        1,
        'STEELSERIES',
        'Auscultadores: Drivers: 40 mm Resposta de frequência: 20–20000 Hz Sensibilidade: 98 dBSPL Impedância: 32 Ohm Distorção Harmónica Total: < 3% Microfone: Resposta de frequência: 100–6,500 Hz Padrão de captação: Bidirectional Sensibilidade: -38 dBV/Pa Impedâncai: 2200 Ohm Wireless: Alcance: Até 12 metros Autonomia: 20 horas Conectividade: Bluetooth 4.1 Perfis bluetooth: A2DP, HFP, HSP Conteúdo da Embalagem: Headset Arctis 9 Cabo de carregamento USB Guia do utilizador',
        'SSA9W.jpg',
        'SSA9W',
        150,
        'SteelSeries Arctis 9 Wireless Preto',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        38,
        12,
        1,
        'LOGITECH',
        'Auscultadores: Driver: PRO-G de malha híbrida de 50 mm Ímã: Neodímio Resposta de frequência: 20 Hz - 20 kHz Impedância: 35 ohm Sensibilidade: 91.7 dB SPL @ 1 mW & 1 cm Comprimento do cabo para PC: 2 m Comprimento do cabo para dispositivo móvel: 1,5 m Cabo PC splitter: 120 mm Peso com cabos: 320 g Microfone: Padrão de captação do microfone: Cardioide (unidirecional) Tipo: Condensador de eletreto Tamanho: 6 mm Resposta de frequência: 100 Hz-10 KHz Conteúdo da Embalagem: Headset PRO X Gaming Fones acolchoados de espuma viscoelástica e couro sintético Fones acolchoados de espuma viscoelástica e tecido Placa de som externa USB Microfone destacável Cabo de 2 m com botão integrado para volume e mute Cabo móvel com botão Divisor Y para entradas separadas de microfone e fone de ouvido Bolsa para transporte Documentação do utilizador',
        'LGPROX.jpg',
        'LGPROX',
        109,
        'Logitech G PRO X Gaming 7.1 Surround',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        39,
        12,
        1,
        'RAZER',
        'Características Principais: Drivers de 50 mm Razer™ TriForce de Titânio para o máximo desempenho de áudio Microfone cardioide Razer™ HyperClear com placa de som USB para uma melhor captação de voz e controlos avançados do microfone Cancelamento passivo de ruídos avançado para uma concentração ininterrupta Almofadas auriculares em espuma viscoelástica FlowKnit para um conforto premium THX Spatial Audio para uma precisão espacial extrema, oferecendo uma maior imersão e vantagem competitiva Auscultadores: Resposta de frequência: 12 Hz – 28 KHz Impedância: 32 Ω a 1 KHz Sensibilidade (a 1 kHz): 100 dBSPL/mW, 1 KHz Drivers: Driver dinâmico de 50 mm personalizado Diâmetro interno da concha auricular: 65 x 40 mm Tipo de conexão: 3,5 mm Comprimento do cabo: 1,8 m Peso aproximado: 262 g Almofadas auriculares ovais: Almofadas respiráveis em espuma viscoelástica Microfone: Resposta de frequência: 100 Hz - 10 KHz Relação sinal-ruído: 60 dB Sensibilidade (a 1 kHz) -42 dB V/Pa, 1 KHz Padrão de captação: Unidirecional',
        'RBSP.jpg',
        'RBSP',
        80,
        'Razer Blackshark V2 THX Preto',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        40,
        12,
        1,
        'MSI',
        'Auscultadores: Drivers: Neodímio de 40mm Resposta de frequência: 20Hz~20KHz SPL: 109 dB ± 3 dB Impedância: 32 ohm ± 15% Conexão: USB 2.0 Comprimento do cabo: 2.2 metros Peso do produto: 300 g Microfone: Diretividade: Unidirectional Resposta de Frequência: 100 Hz~10 kHZ Sensibilidade: -36 dB ± 3 dB Impedância: 2.2k ohm',
        'MSIGH50.jpg',
        'MSIGH50',
        70,
        'MSI Immerse GH50 7.1 RGB Gaming',
        1
    );

-- Monitores

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        41,
        13,
        1,
        'BENQ',
        'Tamanho ecrã: 24.5" Tratamento de superfície: Anti-Glare Relação de aspecto: 16:9 Resolução: 1920 x 1080 a 240Hz (HDMI 2.0, DP)‎‎‎‎ Brilho: 320cd/m Contraste nativo: 1000:1 Tipo de painel: TN Ângulos de visão: 170/160 Tempo de resposta: 1ms (GtG) Reprodução de cores: 16.7 Milhões de cores Portas I/O: 3 x HDMI (v2.0) 1 x DisplayPort (v1.2) Headphone Jack Suporte HDCP 1.4 Consumo energético: Consumo de energia (modo ligado): <40W Consumo de energia (modo de espera): <0,5 W Ajustabilidade: Inclinação (para baixo / para cima): -5˚- 23˚ Girar (esquerda / direita): 45˚ / 45˚ Pivô: 90˚ Suporte de ajuste de altura: 155 mm Norma VESA: 100 x 100 mm Dimensões do produto: 521 (Highest) / 443 (Lowest) x 571 x 200 Peso do produto: 6.2 kg',
        'BENQZXL2546K.jpg',
        'BENQZXL2546K',
        500,
        'BenQ Zowie XL2546K TN 24.5" FHD 16:9 240Hz FreeSync Premium',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        42,
        13,
        1,
        'LG',
        'Ecrã: Dimensões (polegadas): 27 polegadas Dimensões (cm): 68,5 cm Resolução: 2560 x 1440 Tipo de painel: IPS Relação de aspeto: 16:9 Espaçamento de píxeis: 0,2331 x 0,2331 mm Brilho (Mín.): 320 cd/m² Brilho (Tip.): 400 cd/m² Gama de cores (Mín.): DCI-P3 90% (CIE1976) Gama de cores (Tip.): DCI-P3 98% (CIE1976) Profundidade de cor (número de cores): 1,07 B Relação de contraste (mín.): 700:1 Relação de contraste (Tip.): 1000:1 Tempo de resposta: 1 ms (GtG em Faster) Ângulo de visualização (CR≥10): 178º(R/L), 178º(U/D) Tratamento de superfície: Antibrilho Características: HDR 10: SIM Ecrã VESA HDR™: Ecrã HDR™ 400 Efeito HDR: SIM Tecnologia Nano IPS™: Sim Gama de cores ampla: Sim Calibração de cores: Sim Proteção anticintilação: Sim Modo de leitura: Sim Tec. redução de desfocagem em movimento: Sim NVIDIA G-Sync™: Compatível com NVIDIA G-SYNC AMD FreeSync™: Sim (Premium) FreeSync (compensação de taxa de frames reduzida): Sim Estabilizador de pretos: Sim Sincronização da Ação Dinâmica: Sim Crosshair: Sim Contador FPS: Sim',
        'LG27GP850.jpg',
        'LG27GP850',
        399,
        'LG UltraGear 27GP850-B Nano IPS 27" QHD 16:9 165Hz FreeSync / G-SYNC Compatible',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        43,
        13,
        1,
        'MSI',
        'Polegadas: 24.5" Tratamento superfície: Anti-glare Resolução: 1920 x 1080 Taxa de Atualização: 240 Hz Tipo de Painel: IPS Tempo de Resposta: 1ms Brilho: 400 nits Relação de Aspecto: 16:9 Relação de Contraste: 1000:1 DCR: 100000000:1 Ângulos de Visualização: 178° (H) / 178° (V) Reprodução de cores: 1.07B (8bits + FRC) Interface: 1 x DP (1.2a) 2 x HDMI (2.0) 1 x USB Type C (DisplayPort Alternate) 3 x USB 2.0 Type A 1 x USB 2.0 Type B 1 x Earphone out',
        'MSIMAG251RX.jpg',
        'MSIMAG251RX',
        214,
        'MSI Optix MAG251RX IPS 24.5" FHD 16:9 240Hz FreeSync / G-SYNC Compatible',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        44,
        13,
        1,
        'ASUS',
        'Ecrã: Tamanho do Ecrã: Wide Screen 27.0" (68.47cm) 16:9 Saturação de Cor: NTSC 72% Tipo de Ecrã: IPS Resolução: 1920x1080 Tratamento de Ecrã: Anti-Glare Densidade Pixels: 0.311 mm Ângulo de Visualização (CR≧10): 178°(H)/178°(V) Cores: 16.7 Milhões Brilho: 250 cd/m (Typical) Relação de Contraste: 1000:1 (Típico) Tempo de Resposta: 1ms MPRT Flicker free: Sim Taxa de Atualização: 165Hz',
        'ATVG27Q1A.jpg',
        'ATVG27Q1A',
        199,
        'Asus TUF Gaming VG279Q1A IPS 27" FHD 165Hz FreeSync',
        1
    );

-- Televisores

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        45,
        14,
        1,
        'LG',
        'Painel: Tipo de painel: OLED evo 4K com Brightness Booster Tamanho, em polegadas: 55'' Resolução: 3840x2160 Reprodução de cor: Perfect Color Dimming e contraste: Pixel Dimming Taxa de refrescamento: 120 Hz Imagem: Imagem AI Pro: Sim Upscaling AI: Upscaling AI 4K Seleção de Modo AI: Sim Controlo de Brilho AI: Sim Tecnologia HDR: Cinema HDR Dolby Vision IQ: Sim HDR10 Pro: Sim HLG: Sim FILMMAKER MODE™: Sim Mapeamento de tons dinâmico: Sim (Pro) Motion Pro: Sim',
        'LGC2554K.jpg',
        'LGC2554K',
        1179,
        'LG Série C2 SmartTV 55" OLED evo 4K UHD',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        46,
        14,
        1,
        'SAMSUNG',
        'Especificações: Ecrã: Tamanho de ecrã: 50" Resolução: 3,840 x 2,160 Taxa de atualização: Até 144Hz Video: Motor de imagem: Processador Neo Quantum 4K PQI (Índice de Qualidade de Imagem): 4500 Mil Milhões de Cores: Sim HDR (High Dynamic Range): Quantum HDR 1500 IA Upscale: Sim HDR10+: Certificado (HDR10+ Adaptivo & HDR10+ Gaming) Contraste: Tecnologia Quantum Matrix HLG (Hybrid Log Gamma): Sim Micro Dimming: Ultimate UHD Dimming Clear Motion: LED Clear Motion Tecnologia Motion: Motion Xcelerator Turbo Pro Noise Reduction: Sim Filmmaker Mode: Sim Calibragem Técnica de Fábrica: Sim Áudio: Dolby Atmos: Sim (não equipada com coluna superior) Dolby Digital Plus: Sim (MS12 2ch) Som adaptativo+: Sim Active Voice Amplifier: Sim Object Tracking Sound: OTS Lite Potência de saída (RMS): 40W Tipo de colunas: 2.2 Canais Woofer: Sim Q-Symphony: Sim Áudio Bluetooth: Sim Dual Audio Support (Bluetooth): Sim Ligação Multiroom: Sim',
        'SQN90B.jpg',
        'SQN90B',
        1149,
        'Samsung QN90B SmartTV 50" Neo QLED 4K UHD',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        47,
        14,
        1,
        'SAMSUNG',
        'Ecrã: Tamanho do ecrã 75 " Resolução 3,840 x 2,160 Vídeo: Motor de Imagem Processador Crystal 4K Índice Qualidade de Imagem (PQI) 2800 HDR (High Dynamic Range) HDR HDR10 + Sim HLG (Hybrid Log Gamma) Sim Contraste Mega Contraste Cor Cristal Dinâmica Micro Dimming UHD Dimming Intensificador de Contraste Sim Modo Filme Sim Compatível com Modo Natural Sim',
        'SAU9005.jpg',
        'SAU9005',
        799,
        'Samsung AU9005 SmartTV 75" LED 4K UHD',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        48,
        14,
        1,
        'LG',
        'Plataforma: Sistema Operativo: webOS 22 Processador: α5 Gen5 AI Retroiluminação: Direct LED Painel: Tipo de painel: NanoCell 4K Tamanho, em polegadas: 75'' Resolução: 3840x2160 Tecnologia de cor: NanoCell Taxa de refrescamento: 60 Hz Imagem: Upscaling AI: Upscaling 4K Controlo de Brilho AI: Sim Tecnologia HDR: Active HDR HDR10 Pro: Sim HLG: Sim FILMMAKER MODE™: Sim Mapeamento de tons dinâmico: Sim',
        'LGNANO76.jpg',
        'LGNANO76',
        979,
        'LG Série NANO76 SmartTV 75" NanoCell 4K UHD',
        1
    );

INSERT INTO
    `stock` (
        `id_Loja`,
        `id_Produto`,
        `quantidade`
    )
VALUES (1, 1, 25), (2, 1, 25), (3, 1, 25), (1, 2, 25), (2, 2, 25), (3, 2, 25), (1, 3, 25), (2, 3, 25), (3, 3, 25), (1, 4, 0), (2, 4, 0), (3, 4, 0), (1, 5, 25), (2, 5, 25), (3, 5, 25), (1, 6, 25), (2, 6, 25), (3, 6, 25), (1, 7, 25), (2, 7, 25), (3, 7, 25), (1, 8, 25), (2, 8, 25), (3, 8, 25), (1, 9, 25), (2, 9, 25), (3, 9, 25), (1, 10, 25), (2, 10, 25), (3, 10, 25), (1, 11, 25), (2, 11, 25), (3, 11, 25), (1, 12, 25), (2, 12, 25), (3, 12, 25), (1, 13, 25), (2, 13, 25), (3, 13, 25), (1, 14, 25), (2, 14, 25), (3, 14, 25), (1, 15, 25), (2, 15, 25), (3, 15, 25), (1, 16, 25), (2, 16, 25), (3, 16, 25), (1, 17, 25), (2, 17, 25), (3, 17, 25), (1, 18, 25), (2, 18, 25), (3, 18, 25), (1, 19, 25), (2, 19, 25), (3, 19, 25), (1, 20, 25), (2, 20, 25), (3, 20, 25), (1, 21, 25), (2, 21, 25), (3, 21, 25), (1, 22, 25), (2, 22, 25), (3, 22, 25), (1, 23, 25), (2, 23, 25), (3, 23, 25), (1, 24, 25), (2, 24, 25), (3, 24, 25), (1, 25, 25), (2, 25, 25), (3, 25, 25), (1, 26, 25), (2, 26, 25), (3, 26, 25), (1, 27, 25), (2, 27, 25), (3, 27, 25), (1, 28, 25), (2, 28, 25), (3, 28, 25), (1, 29, 25), (2, 29, 25), (3, 29, 25), (1, 30, 25), (2, 30, 25), (3, 30, 25), (1, 31, 25), (2, 31, 25), (3, 31, 25), (1, 32, 25), (2, 32, 25), (3, 32, 25), (1, 33, 25), (2, 33, 25), (3, 33, 25), (1, 34, 25), (2, 34, 25), (3, 34, 25), (1, 35, 25), (2, 35, 25), (3, 35, 25), (1, 36, 25), (2, 36, 25), (3, 36, 25), (1, 37, 25), (2, 37, 25), (3, 37, 25), (1, 38, 25), (2, 38, 25), (3, 38, 25), (1, 39, 25), (2, 39, 25), (3, 39, 25), (1, 40, 25), (2, 40, 25), (3, 40, 25), (1, 41, 25), (2, 41, 25), (3, 41, 25), (1, 42, 25), (2, 42, 25), (3, 42, 25), (1, 43, 25), (2, 43, 25), (3, 43, 25), (1, 44, 25), (2, 44, 25), (3, 44, 25), (1, 45, 25), (2, 45, 25), (3, 45, 25), (1, 46, 25), (2, 46, 25), (3, 46, 25), (1, 47, 25), (2, 47, 25), (3, 47, 25), (1, 48, 25), (2, 48, 25), (3, 48, 25);

/*
 TeSP_PSI_2123
 Globaldiga
 João Pedro Jesus, estudante n.º 2211874
 Rodrigo Filipe Carreira, estudante n.º 2213146
 João Ferreira, estudante nº 2211889
 */

USE projeto_final_teste;

INSERT INTO
    `loja` (
        `id`,
        `id_Empresa`,
        `localidade`,
        `latitude`,
        `longitude`
    )
VALUES (
        1,
        1,
        'Leiria',
        '39.75432371409301',
        '-8.820840997312317'
    ), (
        2,
        1,
        'Lisboa',
        '38.83457487883205',
        '-9.337723665385509'
    ), (
        3,
        1,
        'Porto',
        '41.25692553919101',
        '-8.625050968363148'
    );

INSERT INTO
    `categoria` (
        `id`,
        `id_CategoriaPai`,
        `nome`
    )
VALUES (1, NULL, 'Componentes'), (2, NULL, 'Periféricos'), (3, NULL, 'Imagem'), (4, 1, 'Processadores'), (5, 1, 'Motherboards'), (6, 1, 'Placas Gráficas'), (7, 1, 'Memórias RAM'), (8, 1, 'Fontes Alimentação'), (9, 1, 'Caixas'), (10, 2, 'Ratos'), (11, 2, 'Teclados'), (12, 2, 'Headsets'), (13, 3, 'Monitores'), (14, 3, 'Televisores');

INSERT INTO
    `iva` (`id`, `percentagem`, `ativo`)
VALUES (1, 23, 1), (2, 13, 0);

INSERT INTO `marca` (`nome`)
VALUES ('AMD'), ('RAZER'), ('INTEL'), ('NVIDIA'), ('CORSAIR'), ('GSKILL'), ('KINGSTON'), ('SEASONIC'), ('MSI'), ('NOX'), ('LOGITECH'), ('APPLE'), ('STEELSERIES'), ('BENQ'), ('ASUS'), ('GIGABYTE'), ('LG'), ('SAMSUNG');

-- Processadores

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        1,
        4,
        1,
        'AMD',
        'Socket: AM4 Frequência Base: 3.50 GHz Frequência Turbo: Até 4.40 GHz Número Núcleos: 6 Número Threads: 12 Cache L2 total: 3 MB Cache L3 total: 32 MB Litografia: TSMC 7nm FinFET TDP: 65 W Solução térmica: AMD Wraith Stealth',
        'Ryzen5600.jpg',
        'R5600',
        160,
        'Ryzen 5 5600',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        2,
        4,
        1,
        'AMD',
        'Socket: AM4 Frequência Base: 3.80 GHz Frequência Turbo: Até 4.7 GHz Número Núcleos: 8 Número Threads: 16 Cache L2 total: 4 MB Cache L3 total: 32 MB Litografia: TSMC 7nm FinFET TDP: 105 W Solução térmica: Não incluído',
        'Ryzen5800X.jpg',
        'R7800X',
        280,
        'Ryzen 7 5900X',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        3,
        4,
        1,
        'AMD',
        'Socket: AM4 Frequência Base: 3.70 GHz Frequência Turbo: Até 4.8 GHz Número Núcleos: 12 Número Threads: 24 Cache L2 total: 6 MB Cache L3 total: 64 MB Litografia: TSMC 7nm FinFET TDP: 105 W Solução térmica: Não incluído',
        'Ryzen5800X.jpg',
        'R9900X',
        415,
        'Ryzen 9 5900X',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        4,
        4,
        1,
        'AMD',
        'Solução térmica: Não incluído Arquitetura: Zen 3 Socket: sWRX8 Frequência Base: 2.70 GHz Frequência Turbo: Até 4.5 GHz Número Núcleos: 64 Número Threads: 128 Cache L1 total: 4 MB Cache L2 total: 32 MB Cache L3 total: 256 MB Litografia: TSMC 7nm FinFET TDP: 280 W',
        'RyzenPRO5995WX.jpg',
        'RP995WX',
        8000,
        'Ryzen Threadripper PRO 5995WX',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        5,
        4,
        1,
        'INTEL',
        'Número de núcleos: 6 Número de núcleos de performance: 6 Número de núcleos eficientes: 0 Número de threads: 12 Frequência turbo máxima: 4.40 GHz Frequência turbo máxima de núcleo de performance: 4.40 GHz Frequência base do núcleo de performance: 2.50 GHz Cache: 18 MB Intel® Smart Cache Cache Total L2: 7.5 MB TDP Base: 65 W TDP Turbo: 117 W',
        'i512400F.jpg',
        'I12400F',
        215,
        'Intel Core i5-12400F',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        6,
        4,
        1,
        'INTEL',
        'Número de núcleos: 12 Número de núcleos de performance: 8 Número de núcleos eficientes: 4 Número de threads: 20 Frequência turbo máxima: 4.90 GHz Frequência turbo máxima de núcleo de performance: 4.90 GHz Frequência turbo máxima de núcleo eficiente: 4.80 GHz Frequência base de núcleo de performance: 3.60 GHz Frequência base de núcleo eficiente: 2.10 GHz Cache: 25 MB Intel® Smart Cache Cache Total L2: 12 MB TDP Base: 65 W TDP Turbo: 180 W Gráficos integrados: Não Incluídos',
        'i712700F.jpg',
        'I12700F',
        390,
        'Intel Core i7-12700F',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        7,
        4,
        1,
        'INTEL',
        'Número de núcleos: 16 Número de núcleos de performance: 8 Número de núcleos eficientes: 8 Número de threads: 24 Frequência turbo máxima: 5.20 GHz Frequência turbo máxima de núcleo de performance: 5.10 GHz Frequência turbo máxima de núcleo eficiente: 3.90 GHz Frequência base de núcleo de performance: 3.20 GHz Frequência base de núcleo eficiente: 2.40 GHz Cache: 30 MB Intel® Smart Cache Cache Total L2: 14 MB TDP Base: 125 W TDP Turbo: 241 W Gráficos integrados: Intel® UHD Graphics 770',
        'i912900K.jpg',
        'I12900K',
        595,
        'Intel Core i9-12900K',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        8,
        4,
        1,
        'INTEL',
        'Número de núcleos: 4 Número de núcleos de performance: 4 Número de núcleos eficientes: 0 Número de threads: 8 Frequência turbo máxima: 4.30 GHz Frequência turbo máxima de núcleo de performance: 4.30 GHz Frequência base do núcleo de performance: 3.30 GHz Cache: 12 MB Intel® Smart Cache Cache Total L2: 5 MB TDP Base: 58 W TDP Turbo: 89 W',
        'i312100F.jpg',
        'I12100F',
        119,
        'Intel Core i3-12100F',
        1
    );

-- Motherboards

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        9,
        5,
        1,
        'ASUS',
        'Processador: Suporta AMD AM4 Socket para 3ª Ger. AMD Ryzen™ e 3ª Ger. AMD Ryzen™ com Radeon™ Graphics Processor Chipset: AMD B550 Memória RAM: Processador 3ª Ger. AMD Ryzen™ 4 x DIMM, Max. 128GB, DDR4 4600(O.C)/4400(O.C)/4266(O.C.)/4133(O.C.)/4000(O.C.)/3866(O.C.)/3733(O.C.)/3600(O.C.)/3466(O.C.)/3333(O.C.)/3200/3000/2800/2666/2400/2133 MHz ECC and non-ECC, Un-buffered Memory * 3ª Ger. AMD Ryzen™ com Radeon™ Graphics Processors 4 x DIMM, Max. 128GB, DDR4 4800(O.C.)/4600(O.C)/4466(O.C.)/4400(O.C)/4266(O.C.)/4133(O.C.)/4000(O.C.)/3866(O.C.)/3600(O.C.)/3466(O.C.)/3200/3000/2800/2666/2400/2133 MHz ECC and non-ECC, Un-buffered Memory Dual Channel Memory Architecture Slots de Expansão: 3rd Gen AMD Ryzen™ Processors 1 x PCIe 4.0 x16 (x16 mode) 3rd Gen AMD Ryzen™ with Radeon™ Graphics Processors 1 x PCIe 3.0 x16 (x16 mode) AMD B550 Chipset 1 x PCIe 3.0 x16 (x4 mode) 3 x PCIe 3.0 x1 Armazenamento: Total supports 2 x M.2 slot(s) and 6 x SATA 6Gb/s ports 3rd Gen AMD Ryzen™ Processors : 1 x M.2 Socket 3, with M key, type 2242/2260/2280/22110 storage devices support(SATA & PCIe 4.0 x4 mode) 3rd Gen AMD Ryzen™ with Radeon™ Graphics Processors : 1 x M.2 Socket 3, with M key, type 2242/2260/2280/22110 storage devices support (SATA & PCIE 3.0 x 4 mode) AMD B550 Chipset : 1 x M.2 Socket 3, with M key, type 2242/2260/2280/22110 storage devices support (SATA & PCIE 3.0 x 4 mode)*2 6 x SATA 6Gb/s port(s), *2 Support Raid 0, 1, 10 LAN: Realtek® RTL8111H ASUS LANGuard Áudio: Realtek ALC887 7.1-Channel High Definition Audio CODEC Portas USB: Portas Traseiras USB ( Total 8 ) 2 x USB 3.2 Gen 2 port(s)(1 x Type-A +1 x USB Type-C®) 4 x USB 3.2 Gen 1 port(s)(4 x Type-A) 2 x USB 2.0 port(s)(2 x Type-A) Portas Frontais USB ( Total 6 ) 2 x USB 3.2 Gen 1 port(s)(2 x Type-A) 4 x USB 2.0 port(s)(4 x Type-A)',
        'APB550P.jpg',
        'MB550P',
        150,
        'ATX Asus Prime B550-Plus',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        10,
        5,
        1,
        'ASUS',
        'Processador: Suporta processadores AMD AM4 Socket AMD Ryzen™ 2nd Generation/3rd Gen AMD Ryzen™/2nd and 1st Gen AMD Ryzen™ with Radeon™ Vega Graphics Chipset: AMD X570 Memória RAM: Processadores AMD Ryzen™ 3ª Geração 4 x DIMM, Máx. 128GB, DDR4 MHz Un-buffered Memory Processadores AMD Ryzen™ 2ª Geração 4 x DIMM, Máx. 128GB, DDR4 MHz Un-buffered Memory Processadores AMD Ryzen™ 2ª e 1ª Geração com Radeon™ Vega Graphics 4 x DIMM, Máx. 128GB, DDR4 Un-buffered Memory Arquitetura de memória Dual Channel Memória ECC suportada por vários CPU Suporte Multi-GPU: Processadores 3ª e 2ª Geração AMD Ryzen™ / 2ª Geração AMD Ryzen™ / 1ª Geração Suporta tecnologia AMD CrossFireX™ Slots de Expansão: Processador AMD Ryzen™ 3ª Geração 1 x PCIe 4.0 x16 (x16 mode) Processador AMD Ryzen™ 2ª Geração 1 x PCIe 3.0 x16 (x16 mode) Processadores AMD Ryzen™ 2ª e 1ª Geração com gráficos Radeon™ Vega 1 x PCIe 3.0/2.0 x16 (x8 mode) Chipset AMD X570 1 x PCIe 4.0 x16 (Máximo modo x4) 2 x PCIe 4.0 x1 Armazenamento: Processadores AMD Ryzen™ 3ª Geração 1 x M.2 Socket 3, com M key, tipo 2242/2260/2280/22110 (modos SATA & PCIE 4.0 x 4) Processadores AMD Ryzen™ 2ª Geração 1 x M.2_1 socket 3, with M key, type 2242/2260/2280/22110 (modos SATA & PCIE 3.0 x 4) Chipset AMD X570: 1 x M.2_2 socket 3, with M Key, tipo 2242/2260/2280/22110(PCIE 4.0 x4 e modos SATA) 8 x Portas SATA 6Gb/s Suporta Raid 0, 1, 10',
        'ATX570P.jpg',
        'MX570P',
        290,
        'ATX Asus TUF Gaming X570-PLUS',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        11,
        5,
        1,
        'GIGABYTE',
        'Processador: Suporta processadores 11ª Geração Intel® Core™ i9 / Intel® Core™ i7 / Intel® Core™ i5 Suporta processadores 10ª Geração Intel® Core™ i9 / Intel® Core™ i7 / Intel® Core™ i5 / Intel® Core™ i3 / Intel® Pentium® / Intel® Celeron®* * Limitado a processadores com 4 MB Intel® Smart Cache, família Intel® Celeron® G5xx5. L3 cache varia de acordo com o processador Chipset: Intel® Z590 Express Chipset Memória RAM: Processadores 11ª Geração Intel® Core™ i9/i7/i5 Suporta os seguintes módulos de memória DDR4 5400 (O.C)/ DDR4 5333(O.C.)/ DDR4 5133(O.C.)/DDR4 5000(O.C.)/4933(O.C.)/4800(O.C.)/ 4700(O.C.)/ 4600(O.C.)/ 4500(O.C.)/ 4400(O.C.)/ 4300(O.C.)/4266(O.C.) / 4133(O.C.) / 4000(O.C.) / 3866(O.C.) / 3800(O.C.) / 3733(O.C.) / 3666(O.C.) / 3600(O.C.) / 3466(O.C.) / 3400(O.C.) / 3333(O.C.) / 3300(O.C.) / 3200 / 3000 / 2933 / 2800 / 2666 / 2400 / 2133 MHz Processadores 10ª Geração Intel® Core™ i9/i7 Suporta os seguintes módulos de memória DDR4 2933/2666/2400/2133 MHz Processadores 10ª Geração Intel® Core™ i5/i3/Pentium®/Celeron® Suporta os seguintes módulos de memória DDR4 2666/2400/2133 MHz 4 x DDR4 DIMM socket suporta até 128 GB (32 GB capacidade DIMM única) Arquitetura de memória Dual Channel Suporta módulos de memória ECC Un-buffered DIMM 1Rx8/2Rx8 Suporta módulos de memória non-ECC Un-buffered DIMM 1Rx8/2Rx8/1Rx16 Suporta módulos de memória Extreme Memory Profile Slots de Expansão: 1 x PCI Express x16 slot, running at x16 (PCIEX16) 1 x PCI Express x16 slot, running at x8 (PCIEX8) 1 x PCI Express x16 slot, running at x4 (PCIEX4) Gráficos Onboard: Suporte integrado de gráficos Processador-Intel® HD Graphics: 1 x DisplayPort, suportando uma resolução máxima de 4096x2304@60 Hz Tecnologia Multi-Graphics: Suporte às tecnologias AMD Quad-GPU CrossFire™ e 2-Way AMD CrossFire™ Armazenamento: CPU: 1 x M.2 connector (Socket 3, M key, type 2242/2260/2280/22110 PCIe 4.0 x4/x2 SSD support) (M2A_CPU)* *Supported by 11th Generation processors only. Chipset: 1 x M.2 connector (Socket 3, M key, type 2242/2260/2280/22110 SATA and PCIe 3.0 x4/x2 SSD support) (M2P_SB) 1 x M.2 connector (Socket 3, M key, type 2242/2260/2280/22110 PCIe 3.0 x4/x2 SSD support) (M2M_SB) 6 x SATA 6Gb/s connectors Suporte para RAID 0, RAID 1, RAID 5 e RAID 10',
        'AGZ590.jpg',
        'MZ590',
        340,
        'ATX Gigabyte Z590 Aorus Master',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        12,
        5,
        1,
        'ASUS',
        'Processador: Intel® Socket LGA1700 para processadores Intel® Core ™ de 12ª geração, Pentium® Gold e Celeron® Suporta Tecnologia Intel® Turbo Boost 2.0 e Tecnologia Intel® Turbo Boost Max 3.0 Chipset: Intel® Z690 Memória RAM: 4 x DIMM, Max. 128GB, DDR5 6400+(OC)/ 6200(OC)/ 6000(OC)/ 5800(OC)/ 5600(OC)/ 5400(OC)/ 5200(OC)/5000(OC)/4800 Non-ECC, Un-buffered Memory Arquitetura de memória Dual Channel Suporta Intel® Extreme Memory Profile (XMP) OptiMem III Gráficos: 1 x Intel® Thunderbolt™ 4 ports (USB Type-C®) video outputs Slots de Expansão: Processadores Intel® 12ª Geração: 2 x PCIe 5.0 x16 slot(s) (supports x16 or x8/x8 mode(s)) Intel® Z690 Chipset 1 x PCIe 3.0 x1 slot Armazenamento: Suporta 5 x M.2 slots e 6 x portas SATA 6Gb/s Processadores Intel® 12ª Geração M.2_1 slot (Key M), type 2242/2260/2280/22110 Processadores Intel® 12ª Geração suportam modo PCIe 5.0 x4 M.2_2 slot (Key M), type 2280 Processadores Intel® 12ª Geração suportam modo PCIe 4.0 x4 Intel® Z690 Chipset M.2_3 slot (Key M), type 2280 (supports PCIe 4.0 x4 & SATA modes) DIMM.2_1 slot (Key M) via ROG DIMM.2, type 2242/2260/2280/22110 (supports PCIe 4.0 x4 mode) DIMM.2_2 slot (Key M) via ROG DIMM.2, type 2242/2260/2280/22110 (supports PCIe 4.0 x4 mode) 6 x Portas SATA 6Gb/s',
        'ARGZ690.jpg',
        'MZ690',
        1930,
        'Extended-ATX Asus ROG Maximus Z690 Extreme Glacial',
        1
    );

-- Placas Graficas

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        13,
        6,
        1,
        'AMD',
        'Motor Gráfico: AMD Radeon RX 6600 Bus: PCI Express 4.0 Memória: 8GB GDDR6 Clock GPU: Base: 1626 MHz Game: 2044 MHz Boost: 2491 MHz Stream Processors: 1792 Clock de Memória: 14 Gbps Interface de Memória: 128 bits Interface: 3 x DisplayPort (v1.4) 1 x HDMI 2.1 Suporte HDCP: Sim DirectX®: 12 Dimensões do produto: 24.1 x 13.1 x 4.1 cm',
        'R66008G.jpg',
        'PGRX6600',
        380,
        'XFX Radeon RX 6600 Speedster SWFT 210 Core Gaming 8GB GDDR6',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        14,
        6,
        1,
        'AMD',
        'Motor Gráfico: AMD Radeon RX 6900 XT Bus: PCI Express 4.0 Memória: 16GB GDDR6 Clock GPU: Clock Base: 2375MHz | Clock Boost: 2525MHz Stream Processors: 5120 Clock de Memória: 16.0 Gbps Interface de Memória: 256 Bits Interface: 3 x DisplayPort 1.4a 1 x HDMI 2.1 Suporte HDCP: Sim OpenGL: 4.6 DirectX®: 12',
        'R690016G.jpg',
        'PGRX6900XT',
        1889,
        'Sapphire Toxic Radeon RX 6900 XT Extreme Edition 16GB GDDR6',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        15,
        6,
        1,
        'NVIDIA',
        'Motor Gráfico: NVIDIA GeForce RTX 4090 Arquitetura: NVIDIA Ada Lovelace Núcleos Ray Tracing: 3ª Geração Núcleos Tensor: 4ª Geração Interface Bus: PCI Express® Gen 4 Clock GPU: 2.23 Ghz (Clock Base) / TBC (Clock Boost) Núcleos CUDA: 16384 Memória: 24GB GDDR6X Velocidade de Memória: 21 Gbps Interface de Memória: 384 Bits Interface I/O: 3 x DisplayPort v1.4a 1 x HDMI 2.1a (Suporta 4K@120Hz HDR, 8K@60Hz HDR e Variable Refresh Rate) Suporte HDCP 2.3 Versão DirectX: 12 Ultimate Versão OpenGL: 4.6 Dimensões do produto: 336 x 142 x 78 mm Peso do produto: 2413 g',
        'N409024G.jpg',
        'PGRTX4090X',
        2260,
        'MSI GeForce RTX 4090 Suprim X 24G',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        16,
        6,
        1,
        'NVIDIA',
        'Motor Gráfico: NVIDIA® GeForce® RTX 3060 Ti Bus: PCI Express 4.0 16x Clore Clock: Base: 1410 MHz, Boost: 1770 MHz Clock de Memória: 14 Gbps Núcleos CUDA: 4864 Memória: 8GB GDDR6 Interface de Memória: 256 Bits Interface I/O: 3 x DisplayPort 1.4 1 x HDMI 2.1 Suporte HDCP 2.3 Versão DirectX: 12 Versão OpenGL: 4.6 Dimensões do produto: 278 x 131 x 51 mm Peso do produto: 1007 g',
        'N30608G.jpg',
        'PGRTX3060X',
        580,
        'MSI GeForce RTX 3060 Ti Gaming X 8G LHR',
        1
    );

-- RAM

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        17,
        7,
        1,
        'KINGSTON',
        'Especificações: Capacidade: 16GB (1x16GB) Tipo: DIMM DDR5 Velocidade: 4800 MHz Tensão: 1.1V Latência: CL38 Dimensões do produto: 133.3mm x 6.6mm x 34.9mm',
        'RDDR54800.jpg',
        'RMDDR516G4800',
        80,
        'Kingston Fury Beast 16GB (1x16GB) DDR5-4800MHz CL38 Preta',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        18,
        7,
        1,
        'CORSAIR',
        'Especificações: Capacidade: 16GB (1x16GB) Tipo: DIMM DDR5 Velocidade: 4800 MHz Tensão: 1.1V Latência: CL38 Dimensões do produto: 133.3mm x 6.6mm x 34.9mm',
        'RDDR43600.jpg',
        'RMDDR416G3600',
        93,
        'Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4-3600MHz CL18 Preta',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        19,
        7,
        1,
        'GSKILL',
        'Tipo: 240-Pin DDR3 SDRAM Capacidade: 8GB (2 x 4GB) Velocidade: DDR3 2400 (PC3 19200) CAS: 10 Timing: 10-12-12-31-2N Voltagem: 1.65V Intel XMP: Sim',
        'RDDR32400.jpg',
        'RMDDR38G2400',
        68,
        'G.SKILL Trident X 8GB (2x4GB) DDR3-2400MHz CL10',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        20,
        7,
        1,
        'GSKILL',
        'Capacidade: 2GB (1x2GB) Tipo: DDR4 Velocidade: 667MHz Latência: 4-4-4-12-2N Tensão: 1.80V~1.90V Registered/Unbuffered: Unbuffered Error Checking: Non-ECC',
        'RDDR2667.jpg',
        'RMDDR22G667',
        28,
        'G.SKILL Performance 2GB (1x2GB) DDR2-667MHz CL4 Azul',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        21,
        7,
        1,
        'GSKILL',
        'Série: Trident Z RGB Capacidade: Kit Dual-Channel 32GB (16GBx2) Tipo: DDR4 Velocidade: 3200MHz Latência: 14-14-14-34-2N Voltagem: 1.35v Registered/Unbuffered: Unbuffered Error Checking: Non-ECC Recursos: Intel XMP 2.0 (Extreme Memory Profile) Ready',
        'RDDR43200.jpg',
        'RMDDR432G3200',
        284,
        'Memória RAM G.SKILL Trident Z RGB 32GB (2x16GB) DDR4-3200MHz CL14 Preta',
        1
    );

-- Fontes

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        22,
        8,
        1,
        'SEASONIC',
        'Especificações: Capacidade: 650W DC Output: +3.3 V@20A | +5 V@20A | +12 V@54A | -12 V@0.3A | +5 VSB@2.5A Refrigeração: 120 mm Proteções: OPP, OVP, UVP, SCP Segurança e EMC: cTUVus, TUV, Gost-R, CB , BSMI, CCC, CE, FCC, C-tick Conformidade Ambiental: Energy Star, RoHS, WEEE, REACH Dimensões do produto: 140 mm (L) x 150 mm (W) x 86 mm (H) Conectores: 1 x Main Power (24/20 pins) 1 x CPU (8/4 pins) 4 x PCIe (8/6 pins) 6 x SATA 3 x Peripheral 1 x Floppy',
        'FS650.jpg',
        'FS650',
        65,
        'Seasonic S12III Series 650W 80PLUS Bronze',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        23,
        8,
        1,
        'CORSAIR',
        'Especificações: Padrão: ATX12V v2.4 Potência: 850 W DC Output: +3,3 V@20A | +5V@20A | +12 V@83,3A | -12 V@0,3A | +5VSB@3A Modular: Sim Totalmente Modular Eficiência: 80 PLUS Gold Dimensões do produto: 150 x 86 x 140 mm (WxHxD) Conectores: 1x 24-pin ATX 2x 4+4-pin CPU +12V (EPS) 4x PATA 6x 6+2-pin PCIe 7x SATA',
        'FC1000.jpg',
        'FC1000',
        187,
        'Corsair RM Series RM1000e 80 Plus Gold Full Modular',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        24,
        8,
        1,
        'MSI',
        'Especificações: Capacidade máxima: 750 W Eficiência: Até 90% (80 Plus Gold) DC Output: 22A@+5V | 22A@+3.3V | 25@+12VMBPH | 25A@+12VCPU | 35A@+12VVGA1 | 30A@+12VVGA2 | 0.3A@-12V | 2.5A@+5VSB Refrigeração: 1 x Ventoinha 140mm Proteções: OCP / OVP / OPP / OTP / SCP / UVP Dimensões do produto: 150mm x 160mm x 86mm Conectores: 1 x ATX 24-PIN @ 600mm ± 10mm 6 x PCI-E 8-PIN (6+2) @ 500mm ± 10mm 8 x SATA @ 950mm ± 10mm 2 x EPS 8-PIN (4+4) @ 700mm ± 10mm 5 x PERIPHERAL / FDD 4-PIN @ 1100mm ± 10mm',
        'FM750.jpg',
        'FM750',
        129,
        'MSI MPG A750GF 750W 80 PLUS Gold Full Modular',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        25,
        8,
        1,
        'NOX',
        'Especificações: Tipo: ATX12V v2.31 & EPS 12V 2.91/2.92 com PFC activo Capacidade: 700 W DC Output: +3.3V@18A | +5V@18A | +12V@58A | -12V@0.3A | +5VSB@3A Certificação: 80 PLUS Bronze Eficiência: 85% Voltagem: 100-240V / 12-6A / 47-63 Hz Segurança: OVP, UVP, SCP, SIP e OPP Ventoinha: Ventoinha silenciosa de 120mm com controlo de velocidade inteligente Dimensões do produto: 150 x 157.5 x 86 mm Peso do produto: 2.01 Kg Conectores: 1 x Conector Principal 1 x EPS 12V 4+4 pinos 2 x PCIE 6+2 pinos 7 x SATA 4 pinos 3 x Molex 4 pinos',
        'FN700.jpg',
        'FN700',
        69,
        'Nox Hummer X700W 80 PLUS Bronze Semi Modular',
        1
    );

-- Caixas

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        26,
        9,
        1,
        'CORSAIR',
        'Motherboards compatíveis: Mini-ITX, Micro-ATX, ATX, E-ATX (305mm x 277mm) Slots de expansão: 7 + 2 Vertical Baías: 2 x 3.5" internas, 2 x 2.5" internas Sistema de Refrigeração: Frontal: Suporta 3 x ventoinhas 120mm ou 2 x 140mm (1 x 120mm incluída) Superior: Suporta 2 x ventoinhas 120mm ou 2x 140mm (opcionais/não incluídas) Traseira: Suporta 1 x ventoinha 120mm (1 x 120mm incluída) Portas I/O: 1 x USB 3.0 1 x USB 3.1 Tipo C 1 x Jack Fones de ouvido/microfone Botão Ligar/desligar Botão Reiniciar Comprimento Máx. VGA: Até 360mm Altura Máx. Cooler CPU: 170mm Dimensões do produto: 453mm x 230mm x 466mm',
        'CC4000D.jpg',
        'CC4000D',
        109,
        'Extended-ATX Corsair 4000D Airflow Tempered Glass Branca',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        27,
        9,
        1,
        'NOX',
        'Características Principais: Iluminação Rainbow ARGB com diversos modos de iluminação Compartimento isolado para instalação de PSU para melhor eficiência térmica Painel lateral janelado em acrílico transparente Controlador de velocidade para 7 ventoinhas Sistema de gestão de cablagem Sistema de filtragem de pó Compatibilidade MB: ATX / Micro ATX Baías: Internas: 2x 3.5''; 2x 2.5'' Ventoinhas: Frontal: 3x 120 mm (1x incluída) Traseira: 1x 120 mm (incluída) Topo: 1x 120 mm (não incluída) Slots: 7 Conexões: 1x USB 3.0; 2x USB 2.0; 1x HD Audio; 1x Mic Dimensões: 206 x 470 x 460 mm Peso: 4.8 Kg Material: Chassis em aço SPCC; Painel frontal em plástico ABS Compatibilidade: Cooler CPU: 161 mm (altura máxima) Placa gráfica: 380 mm (comprimento máximo) Refrigeração líquida: Frontal: 120 / 240 mm; Topo: 120 mm; Traseira: 120 mm',
        'CNPROB.jpg',
        'CNPROB',
        46,
        'ATX Nox Hummer MC PRO ARGB Branco',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        28,
        9,
        1,
        'NOX',
        'Material de construção: Chassi de aço SPCC 0,7 mm | Painel lateral de vidro temperado de 4mm Motherboards compatíveis: Micro-ATX, Mini-ITX Baías: 3x 3.5'', 2x 2.5'' Slots de expansão: 4 Sistema de Refrigeração: Frontal: Suporta 2 x ventoinhas 120mm ou 140mm (opcionais/não incluídas) Traseira: Suporta 1 x ventoinha 120mm (1 x ARGB Rainbow incluída) Superior: Suporta 2 x ventoinhas 120mm ou 140mm (opcionais/não incluídas) Portas I/O: 1 x USB 3.0 2 x USB 2.0 Jacks áudio Comprimento máx. VGA: Até 375 mm Altura máx. Cooler CPU: Até 163 mm Dimensões do produto: 210 x 393 x 437 mm (W x H x D) Peso do produto: 5,3 Kg',
        'CNFUSIONS.jpg',
        'CNFUSIONS',
        50,
        'Micro-ATX Nox Hummer Fusion S RGB Tempered Glass Preta',
        1
    );

-- Ratos

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        29,
        10,
        1,
        'RAZER',
        'Especificações: Conectividade: Razer HyperSpeed Wireless Cabo de carregamento: Speedflex USB tipo C Autonomia da bateria: Até 90 horas (movimento constante a 1000Hz) Até 24 horas (movimento constante a 4000Hz) quando em HyperPolling Wireless Dongle (vendido separadamente) Iluminação RGB: Não Sensor: Ótico Focus Pro 30K Resolução sensor: 30000 DPI Velocidade máxima: 750 IPS Aceleração máxima: 70 G Botões programáveis: 5 Vida útil: 90-milhões de Cliques Perfis de memória On-board: 1 Pés do rato: 100% PTFE Dimensões: 128 x 68 x 44 mm Peso: 63 g',
        'RDPROW.jpg',
        'RDPROW',
        150,
        'Razer DeathAdder V3 Pro Wireless 30000DPI Branco',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        30,
        10,
        1,
        'LOGITECH',
        'Requisitos do sistema: Porta USB Windows® 8 ou superior, mac OS 10.11 ou superior Acesso à Internet para download de software Compatibilidade de plataformas: Windows® 8 ou superior, mac OS 10.11 ou superior Especificações técnicas: Tecnologia sem fio LIGHTSPEED™ Memória de bordo* Sistema tensor de clique Pés de PTFE sem aditivos 5 botões Rastreamento Sensor: HERO™ Resolução: 100 – 25.400 DPI Aceleração máxima: > 40 G** Velocidade máxima.: > 400 IPS** Suavização/aceleração/filtragem nulas Sensibilidade Taxa de transmissão USB: 1000 Hz (1 ms) Microprocessador: ARM de 32 bits Duração da bateria*** Movimento constante: 70h Especificações Físicas Altura: 125,0 mm Largura: 63,5 mm Profundidade: 40,0 mm Peso: 63 g Conteúdo da embalagem: Rato gaming sem fio Receptor sem fio LIGHTSPEED™ Cabo de dados/carregamento',
        'LGPSW.jpg',
        'LGPSW',
        129,
        'Logitech G Pro X Superlight Wireless 25600DPI Preto',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        31,
        10,
        1,
        'APPLE',
        'Especificações: Conectividade: Bluetooth, Conetor Lightning, Sem fios Altura: 2,16 cm Largura: 5,71 cm Profundidade: 11,35 cm Peso: 0,099 kg',
        'APMMB.jpg',
        'APMMB',
        83,
        'Apple Magic Mouse Branco',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        32,
        10,
        1,
        'MSI',
        'Especificações: Sensor: Óptico, PAW-3519 Resolução: 200 / 400 / 800 / 1600 / 3200 DPI (máx. 4200 via software) Interface: USB 2.0 Botões: 6 Polling rate: 1000Hz Compatibilidade: Windows 10 / 8.1 / 8 / 7 Cabo: 1,8 m com conector banhado a ouro Dimensões do produto: 128 x 68.5 x 40.5 mm Peso do produto: 103g',
        'MSIGM08.jpg',
        'MSIGM08',
        14,
        'MSI Clutch GM08 4200DPI Preto',
        1
    );

-- Teclados

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        33,
        11,
        1,
        'RAZER',
        'Características Principais: Switches Mecânicos Razer™ para uma execução rápida e precisa Switches com case transparente para uma iluminação Razer Chroma™ RGB mais brilhante Keycaps doubleshot em ABS para suportar um uso intenso Descanso ergonómico para os pulsos para um conforto prolongado no jogo Estrutura em alumínio para uma maior durabilidade Especificações: Layout PT (Tecla Enter Grande) Switches mecânicos Razer™ projetados para jogos Vida útil de 80 milhões de toques de teclas Retroiluminação personalizável Razer Chroma™ RGB com 16,8 milhões de opções de cores Descanso ergonômico para os pulsos Seletor digital multifuncional Tecla específica para mídia Memória híbrida integrada e armazenamento na nuvem – até 5 perfis Habilitado para Razer Synapse 3 Opções de roteamento do cabo Sobreposição de até N teclas Teclas totalmente programáveis com gravação instantânea de macros Opção de modo de jogo Ultrapolling de 1000 Hz Estrutura em alumínio',
        'RBWG.jpg',
        'RBWG',
        149,
        'Razer Blackwidow V3 PT Green Switches',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        34,
        11,
        1,
        'CORSAIR',
        'Especificações: Layout UK Teclas mecânicas 100% Cherry MX Speed Tempo de resposta: 1ms Luz de Fundo RGB Teclas Macro: 6 dedicadas Matriz: 100% anti-ghosting Dimensões do Produto: 465mm x 171mm x 36mm Peso do Produto: 1.324kg Conteúdo da Embalagem: Teclado mecânico para jogos K95 RGB PLATINUM Descanso para pulso integral removível Guia de início rápido',
        'CK95C.jpg',
        'CK95C',
        289,
        'Corsair K95 RGB PLATINUM UK Cherry MX Speed',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        35,
        11,
        1,
        'MSI',
        'Especificações: Layout: PT (Tecla Enter Grande) Interface: USB 2.0 Retroiluminação: RGB Anti-Ghosting: Sim, 12 teclas (QWERASDFZXCV) Comprimento do cabo: 1,8 m com conector banhado a ouro Dimensões do produto: 455.2 x 171.3 x 34.3 mm Peso do produto: 866.5 g',
        'MSIGK20.jpg',
        'MSIGK20',
        30,
        'MSI Vigor GK20 Gaming RGB PT',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        36,
        11,
        1,
        'LOGITECH',
        'Especificações: Layout: PT (Tecla Enter Grande) Interface: USB 2.0 Retroiluminação: RGB Anti-Ghosting: Sim, 12 teclas (QWERASDFZXCV) Comprimento do cabo: 1,8 m com conector banhado a ouro Dimensões do produto: 455.2 x 171.3 x 34.3 mm Peso do produto: 866.5 g',
        'LGT512.jpg',
        'LGT512',
        99,
        'Logitech G512 Carbon RGB PT GX Brown Switches',
        1
    );

-- Headsets

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        37,
        12,
        1,
        'STEELSERIES',
        'Auscultadores: Drivers: 40 mm Resposta de frequência: 20–20000 Hz Sensibilidade: 98 dBSPL Impedância: 32 Ohm Distorção Harmónica Total: < 3% Microfone: Resposta de frequência: 100–6,500 Hz Padrão de captação: Bidirectional Sensibilidade: -38 dBV/Pa Impedâncai: 2200 Ohm Wireless: Alcance: Até 12 metros Autonomia: 20 horas Conectividade: Bluetooth 4.1 Perfis bluetooth: A2DP, HFP, HSP Conteúdo da Embalagem: Headset Arctis 9 Cabo de carregamento USB Guia do utilizador',
        'SSA9W.jpg',
        'SSA9W',
        150,
        'SteelSeries Arctis 9 Wireless Preto',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        38,
        12,
        1,
        'LOGITECH',
        'Auscultadores: Driver: PRO-G de malha híbrida de 50 mm Ímã: Neodímio Resposta de frequência: 20 Hz - 20 kHz Impedância: 35 ohm Sensibilidade: 91.7 dB SPL @ 1 mW & 1 cm Comprimento do cabo para PC: 2 m Comprimento do cabo para dispositivo móvel: 1,5 m Cabo PC splitter: 120 mm Peso com cabos: 320 g Microfone: Padrão de captação do microfone: Cardioide (unidirecional) Tipo: Condensador de eletreto Tamanho: 6 mm Resposta de frequência: 100 Hz-10 KHz Conteúdo da Embalagem: Headset PRO X Gaming Fones acolchoados de espuma viscoelástica e couro sintético Fones acolchoados de espuma viscoelástica e tecido Placa de som externa USB Microfone destacável Cabo de 2 m com botão integrado para volume e mute Cabo móvel com botão Divisor Y para entradas separadas de microfone e fone de ouvido Bolsa para transporte Documentação do utilizador',
        'LGPROX.jpg',
        'LGPROX',
        109,
        'Logitech G PRO X Gaming 7.1 Surround',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        39,
        12,
        1,
        'RAZER',
        'Características Principais: Drivers de 50 mm Razer™ TriForce de Titânio para o máximo desempenho de áudio Microfone cardioide Razer™ HyperClear com placa de som USB para uma melhor captação de voz e controlos avançados do microfone Cancelamento passivo de ruídos avançado para uma concentração ininterrupta Almofadas auriculares em espuma viscoelástica FlowKnit para um conforto premium THX Spatial Audio para uma precisão espacial extrema, oferecendo uma maior imersão e vantagem competitiva Auscultadores: Resposta de frequência: 12 Hz – 28 KHz Impedância: 32 Ω a 1 KHz Sensibilidade (a 1 kHz): 100 dBSPL/mW, 1 KHz Drivers: Driver dinâmico de 50 mm personalizado Diâmetro interno da concha auricular: 65 x 40 mm Tipo de conexão: 3,5 mm Comprimento do cabo: 1,8 m Peso aproximado: 262 g Almofadas auriculares ovais: Almofadas respiráveis em espuma viscoelástica Microfone: Resposta de frequência: 100 Hz - 10 KHz Relação sinal-ruído: 60 dB Sensibilidade (a 1 kHz) -42 dB V/Pa, 1 KHz Padrão de captação: Unidirecional',
        'RBSP.jpg',
        'RBSP',
        80,
        'Razer Blackshark V2 THX Preto',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        40,
        12,
        1,
        'MSI',
        'Auscultadores: Drivers: Neodímio de 40mm Resposta de frequência: 20Hz~20KHz SPL: 109 dB ± 3 dB Impedância: 32 ohm ± 15% Conexão: USB 2.0 Comprimento do cabo: 2.2 metros Peso do produto: 300 g Microfone: Diretividade: Unidirectional Resposta de Frequência: 100 Hz~10 kHZ Sensibilidade: -36 dB ± 3 dB Impedância: 2.2k ohm',
        'MSIGH50.jpg',
        'MSIGH50',
        70,
        'MSI Immerse GH50 7.1 RGB Gaming',
        1
    );

-- Monitores

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        41,
        13,
        1,
        'BENQ',
        'Tamanho ecrã: 24.5" Tratamento de superfície: Anti-Glare Relação de aspecto: 16:9 Resolução: 1920 x 1080 a 240Hz (HDMI 2.0, DP)‎‎‎‎ Brilho: 320cd/m Contraste nativo: 1000:1 Tipo de painel: TN Ângulos de visão: 170/160 Tempo de resposta: 1ms (GtG) Reprodução de cores: 16.7 Milhões de cores Portas I/O: 3 x HDMI (v2.0) 1 x DisplayPort (v1.2) Headphone Jack Suporte HDCP 1.4 Consumo energético: Consumo de energia (modo ligado): <40W Consumo de energia (modo de espera): <0,5 W Ajustabilidade: Inclinação (para baixo / para cima): -5˚- 23˚ Girar (esquerda / direita): 45˚ / 45˚ Pivô: 90˚ Suporte de ajuste de altura: 155 mm Norma VESA: 100 x 100 mm Dimensões do produto: 521 (Highest) / 443 (Lowest) x 571 x 200 Peso do produto: 6.2 kg',
        'BENQZXL2546K.jpg',
        'BENQZXL2546K',
        500,
        'BenQ Zowie XL2546K TN 24.5" FHD 16:9 240Hz FreeSync Premium',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        42,
        13,
        1,
        'LG',
        'Ecrã: Dimensões (polegadas): 27 polegadas Dimensões (cm): 68,5 cm Resolução: 2560 x 1440 Tipo de painel: IPS Relação de aspeto: 16:9 Espaçamento de píxeis: 0,2331 x 0,2331 mm Brilho (Mín.): 320 cd/m² Brilho (Tip.): 400 cd/m² Gama de cores (Mín.): DCI-P3 90% (CIE1976) Gama de cores (Tip.): DCI-P3 98% (CIE1976) Profundidade de cor (número de cores): 1,07 B Relação de contraste (mín.): 700:1 Relação de contraste (Tip.): 1000:1 Tempo de resposta: 1 ms (GtG em Faster) Ângulo de visualização (CR≥10): 178º(R/L), 178º(U/D) Tratamento de superfície: Antibrilho Características: HDR 10: SIM Ecrã VESA HDR™: Ecrã HDR™ 400 Efeito HDR: SIM Tecnologia Nano IPS™: Sim Gama de cores ampla: Sim Calibração de cores: Sim Proteção anticintilação: Sim Modo de leitura: Sim Tec. redução de desfocagem em movimento: Sim NVIDIA G-Sync™: Compatível com NVIDIA G-SYNC AMD FreeSync™: Sim (Premium) FreeSync (compensação de taxa de frames reduzida): Sim Estabilizador de pretos: Sim Sincronização da Ação Dinâmica: Sim Crosshair: Sim Contador FPS: Sim',
        'LG27GP850.jpg',
        'LG27GP850',
        399,
        'LG UltraGear 27GP850-B Nano IPS 27" QHD 16:9 165Hz FreeSync / G-SYNC Compatible',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        43,
        13,
        1,
        'MSI',
        'Polegadas: 24.5" Tratamento superfície: Anti-glare Resolução: 1920 x 1080 Taxa de Atualização: 240 Hz Tipo de Painel: IPS Tempo de Resposta: 1ms Brilho: 400 nits Relação de Aspecto: 16:9 Relação de Contraste: 1000:1 DCR: 100000000:1 Ângulos de Visualização: 178° (H) / 178° (V) Reprodução de cores: 1.07B (8bits + FRC) Interface: 1 x DP (1.2a) 2 x HDMI (2.0) 1 x USB Type C (DisplayPort Alternate) 3 x USB 2.0 Type A 1 x USB 2.0 Type B 1 x Earphone out',
        'MSIMAG251RX.jpg',
        'MSIMAG251RX',
        214,
        'MSI Optix MAG251RX IPS 24.5" FHD 16:9 240Hz FreeSync / G-SYNC Compatible',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        44,
        13,
        1,
        'ASUS',
        'Ecrã: Tamanho do Ecrã: Wide Screen 27.0" (68.47cm) 16:9 Saturação de Cor: NTSC 72% Tipo de Ecrã: IPS Resolução: 1920x1080 Tratamento de Ecrã: Anti-Glare Densidade Pixels: 0.311 mm Ângulo de Visualização (CR≧10): 178°(H)/178°(V) Cores: 16.7 Milhões Brilho: 250 cd/m (Typical) Relação de Contraste: 1000:1 (Típico) Tempo de Resposta: 1ms MPRT Flicker free: Sim Taxa de Atualização: 165Hz',
        'ATVG27Q1A.jpg',
        'ATVG27Q1A',
        199,
        'Asus TUF Gaming VG279Q1A IPS 27" FHD 165Hz FreeSync',
        1
    );

-- Televisores

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        45,
        14,
        1,
        'LG',
        'Painel: Tipo de painel: OLED evo 4K com Brightness Booster Tamanho, em polegadas: 55'' Resolução: 3840x2160 Reprodução de cor: Perfect Color Dimming e contraste: Pixel Dimming Taxa de refrescamento: 120 Hz Imagem: Imagem AI Pro: Sim Upscaling AI: Upscaling AI 4K Seleção de Modo AI: Sim Controlo de Brilho AI: Sim Tecnologia HDR: Cinema HDR Dolby Vision IQ: Sim HDR10 Pro: Sim HLG: Sim FILMMAKER MODE™: Sim Mapeamento de tons dinâmico: Sim (Pro) Motion Pro: Sim',
        'LGC2554K.jpg',
        'LGC2554K',
        1179,
        'LG Série C2 SmartTV 55" OLED evo 4K UHD',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        46,
        14,
        1,
        'SAMSUNG',
        'Especificações: Ecrã: Tamanho de ecrã: 50" Resolução: 3,840 x 2,160 Taxa de atualização: Até 144Hz Video: Motor de imagem: Processador Neo Quantum 4K PQI (Índice de Qualidade de Imagem): 4500 Mil Milhões de Cores: Sim HDR (High Dynamic Range): Quantum HDR 1500 IA Upscale: Sim HDR10+: Certificado (HDR10+ Adaptivo & HDR10+ Gaming) Contraste: Tecnologia Quantum Matrix HLG (Hybrid Log Gamma): Sim Micro Dimming: Ultimate UHD Dimming Clear Motion: LED Clear Motion Tecnologia Motion: Motion Xcelerator Turbo Pro Noise Reduction: Sim Filmmaker Mode: Sim Calibragem Técnica de Fábrica: Sim Áudio: Dolby Atmos: Sim (não equipada com coluna superior) Dolby Digital Plus: Sim (MS12 2ch) Som adaptativo+: Sim Active Voice Amplifier: Sim Object Tracking Sound: OTS Lite Potência de saída (RMS): 40W Tipo de colunas: 2.2 Canais Woofer: Sim Q-Symphony: Sim Áudio Bluetooth: Sim Dual Audio Support (Bluetooth): Sim Ligação Multiroom: Sim',
        'SQN90B.jpg',
        'SQN90B',
        1149,
        'Samsung QN90B SmartTV 50" Neo QLED 4K UHD',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        47,
        14,
        1,
        'SAMSUNG',
        'Ecrã: Tamanho do ecrã 75 " Resolução 3,840 x 2,160 Vídeo: Motor de Imagem Processador Crystal 4K Índice Qualidade de Imagem (PQI) 2800 HDR (High Dynamic Range) HDR HDR10 + Sim HLG (Hybrid Log Gamma) Sim Contraste Mega Contraste Cor Cristal Dinâmica Micro Dimming UHD Dimming Intensificador de Contraste Sim Modo Filme Sim Compatível com Modo Natural Sim',
        'SAU9005.jpg',
        'SAU9005',
        799,
        'Samsung AU9005 SmartTV 75" LED 4K UHD',
        1
    );

INSERT INTO
    `produto` (
        `id`,
        `id_Categoria`,
        `id_Iva`,
        `id_Marca`,
        `descricao`,
        `imagem`,
        `referencia`,
        `preco`,
        `nome`,
        `ativo`
    )
VALUES (
        48,
        14,
        1,
        'LG',
        'Plataforma: Sistema Operativo: webOS 22 Processador: α5 Gen5 AI Retroiluminação: Direct LED Painel: Tipo de painel: NanoCell 4K Tamanho, em polegadas: 75'' Resolução: 3840x2160 Tecnologia de cor: NanoCell Taxa de refrescamento: 60 Hz Imagem: Upscaling AI: Upscaling 4K Controlo de Brilho AI: Sim Tecnologia HDR: Active HDR HDR10 Pro: Sim HLG: Sim FILMMAKER MODE™: Sim Mapeamento de tons dinâmico: Sim',
        'LGNANO76.jpg',
        'LGNANO76',
        979,
        'LG Série NANO76 SmartTV 75" NanoCell 4K UHD',
        1
    );

INSERT INTO
    `stock` (
        `id_Loja`,
        `id_Produto`,
        `quantidade`
    )
VALUES (1, 1, 25), (2, 1, 25), (3, 1, 25), (1, 2, 25), (2, 2, 25), (3, 2, 25), (1, 3, 25), (2, 3, 25), (3, 3, 25), (1, 4, 0), (2, 4, 0), (3, 4, 0), (1, 5, 25), (2, 5, 25), (3, 5, 25), (1, 6, 25), (2, 6, 25), (3, 6, 25), (1, 7, 25), (2, 7, 25), (3, 7, 25), (1, 8, 25), (2, 8, 25), (3, 8, 25), (1, 9, 25), (2, 9, 25), (3, 9, 25), (1, 10, 25), (2, 10, 25), (3, 10, 25), (1, 11, 25), (2, 11, 25), (3, 11, 25), (1, 12, 25), (2, 12, 25), (3, 12, 25), (1, 13, 25), (2, 13, 25), (3, 13, 25), (1, 14, 25), (2, 14, 25), (3, 14, 25), (1, 15, 25), (2, 15, 25), (3, 15, 25), (1, 16, 25), (2, 16, 25), (3, 16, 25), (1, 17, 25), (2, 17, 25), (3, 17, 25), (1, 18, 25), (2, 18, 25), (3, 18, 25), (1, 19, 25), (2, 19, 25), (3, 19, 25), (1, 20, 25), (2, 20, 25), (3, 20, 25), (1, 21, 25), (2, 21, 25), (3, 21, 25), (1, 22, 25), (2, 22, 25), (3, 22, 25), (1, 23, 25), (2, 23, 25), (3, 23, 25), (1, 24, 25), (2, 24, 25), (3, 24, 25), (1, 25, 25), (2, 25, 25), (3, 25, 25), (1, 26, 25), (2, 26, 25), (3, 26, 25), (1, 27, 25), (2, 27, 25), (3, 27, 25), (1, 28, 25), (2, 28, 25), (3, 28, 25), (1, 29, 25), (2, 29, 25), (3, 29, 25), (1, 30, 25), (2, 30, 25), (3, 30, 25), (1, 31, 25), (2, 31, 25), (3, 31, 25), (1, 32, 25), (2, 32, 25), (3, 32, 25), (1, 33, 25), (2, 33, 25), (3, 33, 25), (1, 34, 25), (2, 34, 25), (3, 34, 25), (1, 35, 25), (2, 35, 25), (3, 35, 25), (1, 36, 25), (2, 36, 25), (3, 36, 25), (1, 37, 25), (2, 37, 25), (3, 37, 25), (1, 38, 25), (2, 38, 25), (3, 38, 25), (1, 39, 25), (2, 39, 25), (3, 39, 25), (1, 40, 25), (2, 40, 25), (3, 40, 25), (1, 41, 25), (2, 41, 25), (3, 41, 25), (1, 42, 25), (2, 42, 25), (3, 42, 25), (1, 43, 25), (2, 43, 25), (3, 43, 25), (1, 44, 25), (2, 44, 25), (3, 44, 25), (1, 45, 25), (2, 45, 25), (3, 45, 25), (1, 46, 25), (2, 46, 25), (3, 46, 25), (1, 47, 25), (2, 47, 25), (3, 47, 25), (1, 48, 25), (2, 48, 25), (3, 48, 25);