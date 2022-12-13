# Yii Framework REST API

Esta API é o que permite ligar os serviços fazer a ligação entre a aplicação [Mobile](https://github.com/RFCarreira33/PSI_AMSI_22-23) e a aplicação [Web](https://github.com/RFCarreira33/PSI_PLSI_22-23).

## Endpoints

Métodos de Autenticação usados `Access-token` e `HTTP Basic`.

| Endpoint           | Descrição                                       | Autenticação   | Método | Resposta            |
| :----------------- | :---------------------------------------------- | :------------- | :----- | :------------------ |
| `/user/login`      | Verifica as crendenciais                        | `Http Basic`   | GET    | Access Token        |
| `/user/register`   | Regista uma conta Cliente caso seja válida      | ---            | POST   | True / False        |
| `/produtos`        | Devolve todos os produtos Ativos                | ---            | GET    | Array de Produtos   |
| `/produtos/{id}`   | Devolve o produto com `{id}`                    | ---            | GET    | Produto             |
| `/produtos/search` | Filtra produtos por `?{categoria}{nome}{order}` | ---            | GET    | Array de Produtos   |
| `/filters`         | Devolve todas as marcas e categorias            | ---            | GET    | Objeto com 2 arrays |
| `/dados`           | Devolve os dados do cliente                     | `Access-token` | GET    | Dados               |
| `/dados/update`    | Atualiza os dados do cliente                    | `Access-token` | PUT    | True / False        |
| `/faturas`         | Devolve todas as faturas do cliente             | `Access-token` | GET    | Array de Faturas    |
| `/faturas/{id}`    | Devolve as linhas da fatura com `{id}`          | `Access-token` | GET    | Array de Linhas     |
| `/carrinho`        | Devolve a carrinho do cliente                   | `Access-token` | GET    | Array de Carrinhos  |
| `/carrinho/create` | Recebe um produto e quantidade e adiciona       | `Access-token` | POST   | True / False        |
| `/carrinho/buy`    | Compra tudo o que estiver no carrinho           | `Access-token` | GET    | True                |
| `/carrinho/remove` | Recebe id de um produto                         | `Access-token` | POST   | True / False        |
| `/carrinho/update` | Recebe um produto e quantidade                  | `Access-token` | PUT    | True / False        |
| `/carrinho/delete` | Limpa o carrinho do cliente                     | `Access-token` | DELETE | True                |
