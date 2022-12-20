<?php


namespace frontend\tests\Unit;

use frontend\tests\UnitTester;
use common\models\Fatura;
use common\models\Linhafatura;
use common\models\user;
use common\models\Dados;
use common\models\Carrinho;
use common\models\Produto;
use common\models\Stock;
use common\models\Loja;
use common\models\Categoria;
use common\models\Iva;
use common\models\Marca;

class FaturaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testFatura()
    {
        //Ir buscar a empresa
        $empresa = $this->tester->grabRecord('common\models\Empresa', array('designacaoSocial' => 'GlobalDiga'));

        //Criar User
        $user = new User();
        $user->username = "kk";
        $user->email = "kk@gmail.com";
        $user->setPassword("123456789");
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        //Adicionar dados ao user
        $dados = new Dados();
        $dados->id_User = $user->id;
        $dados->nome = "joao";
        $dados->nif = "222222222";
        $dados->telefone = "999999999";
        $dados->morada = "Rua do lis";
        $dados->codPostal = "3780-566";
        $dados->save();

        //Criar Loja
        $loja = new Loja();
        $loja->id_Empresa = $empresa->id;
        $loja->localidade = "Coimbra";
        $loja->save();

        //criar categoria
        $categoria = new Categoria();
        $categoria->id_CategoriaPai = null;
        $categoria->nome = "placas";
        $categoria->save();

        //criar iva
        $iva = new Iva();
        $iva->percentagem = 13;
        $iva->Ativo = 1;
        $iva->save();

        //criar Marca
        $marca = new Marca();
        $marca->nome = "INTEL";
        $marca->save();

        //Criar Produto
        $produto = new Produto();
        $produto->id_Categoria = $categoria->id;
        $produto->id_Iva = $iva->id;
        $produto->id_Marca = $marca->nome;
        $produto->descricao = "4k";
        $produto->imagem = "logo.jpg";
        $produto->referencia = "RKFGD";
        $produto->preco = 12;
        $produto->nome = "GTX3080";
        $produto->save();

        //Criar Stock
        $stock = new Stock();
        $stock->id_Produto = $produto->id;
        $stock->id_Loja = $loja->id;
        $stock->quantidade = 0;
        $stock->save();

        //Criar um carrinho
        $carrinho = new Carrinho();
        $carrinho->id_Cliente = $dados->id_User;
        $carrinho->id_Produto = $produto->id;
        $carrinho->Quantidade = 10;
        $carrinho->save();

        //Instanciar VT e VI
        $valorTotal = 0;
        $valorIva = 0;

        //Percentahem de iva
        $ivaP = $carrinho->produto->iva->percentagem / 100;
        //Valor Iva
        $valorIva = $carrinho->Quantidade * $carrinho->produto->preco * $ivaP;
        //ValorTotal da fatura
        $valorTotal = $carrinho->Quantidade * $carrinho->produto->preco;

        $fatura = new Fatura();
        $linhaFatura = new Linhafatura();

        //[FATURA]

        //Despoletar todas as regras de validação (introduzindo dados erróneos);

        //required no modelo
        $fatura->id_Cliente = null;
        $this->assertFalse($fatura->validate(['id_Cliente']));
        $fatura->nome = null;
        $this->assertFalse($fatura->validate(['nome']));
        $fatura->nif = null;
        $this->assertFalse($fatura->validate(['nif']));
        $fatura->codPostal = null;
        $this->assertFalse($fatura->validate(['codPostal']));
        $fatura->telefone = null;
        $this->assertFalse($fatura->validate(['telefone']));
        $fatura->morada = null;
        $this->assertFalse($fatura->validate(['morada']));
        $fatura->email = null;
        $this->assertFalse($fatura->validate(['email']));
        $fatura->valorTotal = null;
        $this->assertFalse($fatura->validate(['valorTotal']));
        $fatura->valorIva = null;
        $this->assertFalse($fatura->validate(['valorIva']));

        //id cliente integer
        $fatura->id_Cliente = 1.2;
        $this->assertFalse($fatura->validate(['id_Cliente']));

        //valor Total e valor iva number
        $fatura->valorTotal = "a";
        $this->assertFalse($fatura->validate(['valorTotal']));
        $fatura->valorIva = "a";
        $this->assertFalse($fatura->validate(['valorIva']));

        //nome morada max 45 caracteres
        $fatura->nome = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"; //50 caracteres
        $this->assertFalse($fatura->validate(['nome']));
        $fatura->morada = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"; //50 caracteres
        $this->assertFalse($fatura->validate(['morada']));

        //nif codPostal telefone max 9 caracteres
        $fatura->nif = "aaaaaaaaaa"; //10 caracteres
        $this->assertFalse($fatura->validate(['nif']));
        $fatura->codPostal = "aaaaaaaaaa"; //10 caracteres
        $this->assertFalse($fatura->validate(['codPostal']));
        $fatura->telefone = "aaaaaaaaaa"; //10 caracteres
        $this->assertFalse($fatura->validate(['telefone']));

        //email max 255 caracteres
        $fatura->email = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"; //260 caracteres
        $this->assertFalse($fatura->validate(['email']));

        //assert true
        $fatura->id_Cliente = $dados->id_User;
        $this->assertTrue($fatura->validate(['id_Cliente']));
        $fatura->nome = $dados->nome;
        $this->assertTrue($fatura->validate(['nome']));
        $fatura->nif = $dados->nif;
        $this->assertTrue($fatura->validate(['nif']));
        $fatura->codPostal = $dados->codPostal;
        $this->assertTrue($fatura->validate(['codPostal']));
        $fatura->telefone = $dados->telefone;
        $this->assertTrue($fatura->validate(['telefone']));
        $fatura->morada = $dados->morada;
        $this->assertTrue($fatura->validate(['morada']));
        $fatura->email = $dados->user->email;
        $this->assertTrue($fatura->validate(['email']));
        $fatura->valorTotal = $valorIva;
        $this->assertTrue($fatura->validate(['valorTotal']));
        $fatura->valorIva = $valorTotal;
        $this->assertTrue($fatura->validate(['valorIva']));

        //[LINHA FATURA]

        //Despoletar todas as regras de validação (introduzindo dados erróneos);

        //required no modelo
        $linhaFatura->id_Fatura = null;
        $this->assertFalse($linhaFatura->validate(['id_Fatura']));
        $linhaFatura->produto_nome = null;
        $this->assertFalse($linhaFatura->validate(['produto_nome']));
        $linhaFatura->produto_referencia = null;
        $this->assertFalse($linhaFatura->validate(['produto_referencia']));
        $linhaFatura->quantidade = null;
        $this->assertFalse($linhaFatura->validate(['quantidade']));
        $linhaFatura->valor = null;
        $this->assertFalse($linhaFatura->validate(['valor']));
        $linhaFatura->valorIva = null;
        $this->assertFalse($linhaFatura->validate(['valorIva']));

        //idfatura quantidade integer
        $linhaFatura->id_Fatura = 1.2;
        $this->assertFalse($linhaFatura->validate(['id_Fatura']));
        $linhaFatura->quantidade = 1.2;
        $this->assertFalse($linhaFatura->validate(['quantidade']));

        //valor , valorIva number
        $linhaFatura->valor = "a";
        $this->assertFalse($linhaFatura->validate(['valor']));
        $linhaFatura->valorIva = "a";
        $this->assertFalse($linhaFatura->validate(['valorIva']));

        //produto nome e referencia max 45 caracteres
        $linhaFatura->produto_nome = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta, asperiores nostrum error rerum iure maxime excepturi. Aliquid quis ipsum quidem, ab placeat illo ad, voluptates, perspiciatis ipsam voluptas repudiandae perferendis!"; //100 caracteres
        $this->assertFalse($linhaFatura->validate(['produto_nome']));
        $linhaFatura->produto_referencia = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta, asperiores nostrum error rerum iure maxime excepturi. Aliquid quis ipsum quidem, ab placeat illo ad, voluptates, perspiciatis ipsam voluptas repudiandae perferendis!"; //50 carateres
        $this->assertFalse($linhaFatura->validate(['produto_referencia']));

        //Criar uma fatura para fazer os assert trues da linha fatura
        $fatura = new Fatura;
        $fatura->id_Cliente = $dados->id_User;
        $fatura->nome = $dados->nome;
        $fatura->nif = $dados->nif;
        $fatura->codPostal = $dados->codPostal;
        $fatura->telefone = $dados->telefone;
        $fatura->morada = $dados->morada;
        $fatura->email = $dados->user->email;
        $fatura->dataFatura = date("Y-m-d H:i:s");
        $fatura->valorIva = $valorIva;
        $fatura->valorTotal = $valorTotal;
        $fatura->save();

        //assert true
        $linhaFatura->id_Fatura = $fatura->id;
        $this->assertTrue($linhaFatura->validate(['id_Fatura']));
        $linhaFatura->produto_nome = $carrinho->produto->nome;
        $this->assertTrue($linhaFatura->validate(['produto_nome']));
        $linhaFatura->produto_referencia = $carrinho->produto->referencia;
        $this->assertTrue($linhaFatura->validate(['produto_referencia']));
        $linhaFatura->quantidade = $carrinho->Quantidade;
        $this->assertTrue($linhaFatura->validate(['quantidade']));
        $linhaFatura->valor = $carrinho->produto->preco * $carrinho->Quantidade;
        $this->assertTrue($linhaFatura->validate(['valor']));
        $linhaFatura->valorIva = $carrinho->Quantidade * $carrinho->produto->preco * ($ivaP / 100);
        $this->assertTrue($linhaFatura->validate(['valorIva']));

        //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD [FATURA]
        $fatura = new Fatura;
        $fatura->id_Cliente = $dados->id_User;
        $fatura->nome = $dados->nome;
        $fatura->nif = $dados->nif;
        $fatura->codPostal = $dados->codPostal;
        $fatura->telefone = $dados->telefone;
        $fatura->morada = $dados->morada;
        $fatura->email = $dados->user->email;
        $fatura->dataFatura = date("Y-m-d H:i:s");
        $fatura->valorIva = $valorIva;
        $fatura->valorTotal = $valorTotal;
        $fatura->save();

        $this->tester->seeRecord('common\models\Fatura', array('id_Cliente' => $dados->id_User, 'nome' => $dados->nome, 'nif' => $dados->nif, 'codPostal' => $dados->codPostal, 'telefone' => $dados->telefone, 'morada' => $dados->morada, 'email' => $dados->user->email, 'valorIva' => $valorIva, 'valorTotal' => $valorTotal));

        //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD [LINHA FATURA]
        $linhaFatura = new LinhaFatura;
        $linhaFatura->id_Fatura = $fatura->id;
        $linhaFatura->produto_nome = $carrinho->produto->nome;
        $linhaFatura->produto_referencia = $carrinho->produto->referencia;
        $linhaFatura->quantidade = $carrinho->Quantidade;
        $linhaFatura->valor = $carrinho->produto->preco * $carrinho->Quantidade;
        $ivaP = $carrinho->produto->iva->percentagem;
        $linhaFatura->valorIva = $carrinho->Quantidade * $carrinho->produto->preco * ($ivaP / 100);
        $linhaFatura->save();

        $this->tester->seeRecord('common\models\LinhaFatura', array('id_Fatura' => $fatura->id, 'produto_nome' => $carrinho->produto->nome, 'produto_referencia' => $carrinho->produto->referencia, 'quantidade' => $carrinho->Quantidade, 'valor' => $carrinho->produto->preco * $carrinho->Quantidade, 'valorIva' => $carrinho->Quantidade * $carrinho->produto->preco * ($ivaP / 100)));


        //Ler o registo anterior e aplicar um update e Ver se o registo atualizado se encontra na BD
        $faturaUpdate = $this->tester->grabRecord('common\models\Fatura', array('id_Cliente' => $dados->id_User));
        $linhaFaturaUpdate = $this->tester->grabRecord('common\models\LinhaFatura', array('id_Fatura' => $fatura->id));

        $faturaUpdate->id_Cliente = $dados->id_User;
        $faturaUpdate->nome = $dados->nome;
        $faturaUpdate->nif = $dados->nif;
        $faturaUpdate->codPostal = $dados->codPostal;
        $faturaUpdate->telefone = $dados->telefone;
        $faturaUpdate->morada = $dados->morada;
        $faturaUpdate->email = $dados->user->email;
        $faturaUpdate->dataFatura = date("Y-m-d H:i:s");
        $faturaUpdate->valorIva = 10;
        $faturaUpdate->valorTotal = 10;
        $faturaUpdate->save();

        $linhaFaturaUpdate->id_Fatura = $faturaUpdate->id;
        $linhaFaturaUpdate->produto_nome = $carrinho->produto->nome;
        $linhaFaturaUpdate->produto_referencia = $carrinho->produto->referencia;
        $linhaFaturaUpdate->quantidade = 10;
        $linhaFaturaUpdate->valor = 15;
        $ivaP = $carrinho->produto->iva->percentagem;
        $linhaFaturaUpdate->valorIva = $carrinho->Quantidade * $carrinho->produto->preco * ($ivaP / 100);
        $linhaFaturaUpdate->save();

        $this->tester->seeRecord('common\models\Fatura', array('valorIva' => 10, 'valorTotal' => 10));
        $this->tester->seeRecord('common\models\LinhaFatura', array('quantidade' => 10, 'valor' => 15));

        //Apagar o registo e Verificar que o registo não se encontra na BD
        $faturaDelete = $this->tester->grabRecord('common\models\Fatura', array('id_Cliente' => $dados->id_User));
        $linhaFaturaDelete = $this->tester->grabRecord('common\models\LinhaFatura', array('id_Fatura' => $faturaUpdate->id));
        $linhaFaturaDelete->delete();
        $faturaDelete->delete();

        $this->tester->dontSeeRecord('common\models\Fatura', array('valorIva' => 10, 'valorTotal' => 10));
    }
}
