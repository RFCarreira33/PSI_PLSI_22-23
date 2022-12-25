# Yii Framework REST API

Esta API é o que permite ligar os serviços fazer a ligação entre a aplicação [Mobile](https://github.com/RFCarreira33/PSI_AMSI_22-23) e a aplicação [Web](https://github.com/RFCarreira33/PSI_PLSI_22-23).

## Endpoints

Métodos de Autenticação usados `Access-token` e `HTTP Basic`.

| Endpoint             | Descrição                                        | Autenticação   | Método | Resposta            |
| :------------------- | :----------------------------------------------- | :------------- | :----- | :------------------ |
| `/user/login`        | Verifica as crendenciais                         | `Http Basic`   | GET    | Access Token        |
| `/user/register`     | Regista uma conta Cliente caso seja válida       | ---            | POST   | Success / Error     |
| `/produtos`          | Devolve todos os produtos Ativos                 | ---            | GET    | Array de Produtos   |
| `/produtos/{id}`     | Devolve o produto com `{id}`                     | ---            | GET    | Produto             |
| `/produtos/search`   | Filtra produtos por `?{categoria}{nome}{order}`  | ---            | GET    | Array de Produtos   |
| `/produtos/location` | Devolve a loja mais próximo com stock do produto | ---            | POST   | Loja                |
| `/filters`           | Devolve todas as marcas e categorias             | ---            | GET    | Objeto com 2 arrays |
| `/dados`             | Devolve os dados do cliente                      | `Access-token` | GET    | Dados               |
| `/dados/update`      | Atualiza os dados do cliente                     | `Access-token` | PUT    | Success / Error     |
| `/faturas`           | Devolve todas as faturas e linhas do cliente     | `Access-token` | GET    | Array de Faturas    |
| `/carrinho`          | Devolve a carrinho do cliente                    | `Access-token` | GET    | Array de Carrinhos  |
| `/carrinho/coupon`   | Verifica se o cupão inserido é válido            | `Access-token` | POST   | Success / Error     |
| `/carrinho/create`   | Recebe um produto e quantidade e adiciona        | `Access-token` | POST   | Success / Error     |
| `/carrinho/buy`      | Compra tudo o que estiver no carrinho            | `Access-token` | POST   | Success / Error     |
| `/carrinho/remove`   | Recebe id de um produto                          | `Access-token` | POST   | Success / Error     |
| `/carrinho/update`   | Recebe um produto e quantidade                   | `Access-token` | PUT    | Success / Error     |
| `/carrinho/delete`   | Limpa o carrinho do cliente                      | `Access-token` | DELETE | True                |
