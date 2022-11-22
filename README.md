# Projeto GlobalDiga

### Instituição:

- Instituto Politécnico de Leiria
  ![Logo IPL](https://www.ipleiria.pt/wp-content/uploads/2022/04/estg_h.svg)

#### Curso:

> - TeSP — Programação de Sistemas de Informação

#### Unidades curriculares:

> - Plataformas de Sistemas de Informação
> - Serviços e Interoperabilidade de Sistemas

#### Desenvolvido por:

> - João Jesus Nº2211874
> - João Ferreira Nº2211889
> - Rodrigo Carreira Nº2213146

#### Descrição:

> Pretende-se implementar uma aplicação para uma loja de informática online.
> Esta possui como objetivos principais:
>
> - Permitir que os clientes efetuem compras
> - Auxiliar na gestão das lojas e empresa

> Este projeto foi desenvolvido com:
>
> - [Yii2 Framework](https://www.yiiframework.com/)
> - [AdminLTE](https://adminlte.io)
> - [Bootstrap](https://getbootstrap.com)

### Ficheiros SQL

> - projeto_final.sql: Estrutura das tabelas e dados essenciais;

### Credenciais de utilizadores

> Administrador:
>
> - Username: admin
> - Password: admin123
>
> Funcionário:
>
> - Username: funcionario
> - Password: funcionario123
>
> Cliente:
>
> - Username: cliente
> - Password: cliente123

### Development Mode

    git clone https://github.com/RFCarreira33/PSI_PLSI_22-23.git

### Executar o script `projeto_final.sql`

    cd projeto_final
    composer update
    ./init
    ./yii rbac/init

### Configurar a Base de Dados

Efetuar quaisquer mudanças necessárias em `username`, `password` ou `host`.

    common/config/main-local.php

    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=projeto_final',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
