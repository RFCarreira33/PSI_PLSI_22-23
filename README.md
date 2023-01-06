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
> - [Codeception](https://codeception.com)
> - [DomPDF](https://github.com/dompdf/dompdf)

### Ficheiros SQL

> - projeto_final.sql: Estrutura das tabelas e dados essenciais.

### REST API

> API desenvolvida para auxiliar para a aplicação mobile. [Documentação dos vários Endpoints](https://github.com/RFCarreira33/PSI_PLSI_22-23/tree/development/projeto_final/backend/modules/api)

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

## Modo de Desenvolvimento

    git clone https://github.com/RFCarreira33/PSI_PLSI_22-23.git

- Executar o script `projeto_final.sql` juntamente do script `registos.sql` para preencher as tabelas.
- Correr o [rbac](https://www.yiiframework.com/doc/guide/2.0/en/security-authorization) para que todas as roles e permissões sejam adicionadas.

### Inicializar a aplicação

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

## Testes de Software

Editar o ficheiro de configuração e executar

    frontend/config/test.php

    // Para testes de frontned
    cd frontend
    // Para testes de backend
    cd backend

    ../vendor/bin/codecept run [type] [filename]

    -type, pode ser ignorado    Executa apenas testes do tipo especificado
    -file, pode ser ignorado    Executa apenas o teste com o nome especificado

Para executar os testes de aceitação ( `Acceptance` ) será necessário instalar `Selenium-Standalone` e um `Webdriver` para o browser e `Nodejs` caso não instalado.
[Mais opções](https://codeception.com/docs/AcceptanceTests)

    npm install selenium-standalone -g
    npx selenium-standalone install

Iniciar `Selenium-Standalone` e efetuar quaisquer alterações necessárias ao ficheiro de configuração

    npx selenium-standalone start
    ../vendor/bin/codecept run acceptance
