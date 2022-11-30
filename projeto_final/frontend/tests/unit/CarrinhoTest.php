<?php


namespace frontend\tests\Unit;

use frontend\tests\UnitTester;
use common\models\Carrinho;
use common\models\Produto;
use common\models\User;
use common\models\Loja;
use common\models\Stock;
use common\models\Dados;

class CarrinhoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {

        $user = new User();
        $user->id = 4;
        $user->username = "jj";
        $user->email = "jj@gmail.com";
        $user->setPassword("123456789");
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        $dados = new Dados();
        $dados->id_User = 4;
        $dados->nome = "joao";
        $dados->nif = "222222222";
        $dados->telefone = "999999999";
        $dados->morada = "ok";
        $dados->codPostal = "3780-566";
        $dados->save();

        $loja = new Loja();
        $loja->id = 4;
        $loja->id_Empresa = 1;
        $loja->localidade = "Coimbra";
        $loja->save();

        $produto = new Produto();
        $produto->id = 4;
        $produto->id_Categoria = 1;
        $produto->id_Iva = 1;
        $produto->id_Marca = "AMD";
        $produto->descricao = "okkkkk";
        $produto->imagem = "logo.jpg";
        $produto->referencia = "ok2";
        $produto->preco = 12;
        $produto->save();

        $stock = new Stock();
        $stock->id_Produto = $produto->id;
        $stock->id_Loja = $loja->id;
        $stock->quantidade = 0;
        $stock->save();
    }

    // tests
    public function testModeloCarrrinho()
    {
        $carrinho = new Carrinho();

        //required no modelo
        $carrinho->id_Cliente = null;
        $this->assertFalse($carrinho->validate(['id_Cliente']));
        $carrinho->id_Produto = null;
        $this->assertFalse($carrinho->validate(['id_Produto']));
        $carrinho->Quantidade = null;
        $this->assertFalse($carrinho->validate(['Quantidade']));

        //todos integer
        $carrinho->id_Cliente = "a";
        $this->assertFalse($carrinho->validate(['id_Cliente']));
        $carrinho->id_Produto = "a";
        $this->assertFalse($carrinho->validate(['id_Produto']));
        $carrinho->Quantidade = "a";
        $this->assertFalse($carrinho->validate(['Quantidade']));

        //idCliente e idProduto Unique
        $carrinho->id_Cliente = 2; //ja existe
        $carrinho->id_Produto = 2; //ja existe
        $carrinho->Quantidade = 10;
        $this->assertFalse($carrinho->save());

        //assert true
        $carrinho->id_Cliente = 4;
        $this->assertTrue($carrinho->validate(['id_Cliente']));
        $carrinho->id_Produto = 4;
        $this->assertTrue($carrinho->validate(['id_Produto']));
        $carrinho->Quantidade = 10;
        $this->assertTrue($carrinho->validate(['Quantidade']));
    }

    public function testSavingCarrrinho()
    {
        $carrinho = new Carrinho();
        $carrinho->id_Cliente = 4;
        $carrinho->id_Produto = 4;
        $carrinho->Quantidade = 10;
        $carrinho->save();

        $this->tester->seeRecord('common\models\Carrinho', array('id_Cliente' => 4, 'id_Produto' => 4, 'Quantidade' => 10));
    }

    public function testUpdateCarrrinho()
    {
        $this->testSavingCarrrinho();
        $carrinho = $this->tester->grabRecord('common\models\Carrinho', array('id_Cliente' => 4));
        $carrinho->id_Cliente = 4;
        $carrinho->id_Produto = 4;
        $carrinho->Quantidade = 15;
        $carrinho->save();

        $this->tester->seeRecord('common\models\Carrinho', array('id_Cliente' => 4, 'id_Produto' => 4, 'Quantidade' => 15));
    }

    public function testDeleteCarrrinho()
    {
        $this->testSavingCarrrinho();
        $this->testUpdateCarrrinho();

        $carrinho = $this->tester->grabRecord('common\models\Carrinho', array('id_Cliente' => 4));
        $carrinho->delete();

        $this->tester->dontSeeRecord('common\models\Carrinho', array('id_Cliente' => 4, 'id_Produto' => 4, 'Quantidade' => 15));
    }
}
