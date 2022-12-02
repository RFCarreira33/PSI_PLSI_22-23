<?php


namespace frontend\tests\Unit;

use frontend\tests\UnitTester;
use common\models\Carrinho;
use common\models\Produto;
use common\models\User;
use common\models\Loja;
use common\models\Stock;
use common\models\Dados;
use common\models\Iva;
use common\models\Marca;
use common\models\Categoria;

class CarrinhoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testCarrrinho()
    {

        $empresa = $this->tester->grabRecord('common\models\Empresa', array('designacaoSocial' => 'GlobalDiga'));

        $user = new User();
        $user->username = "pp";
        $user->email = "pp@gmail.com";
        $user->setPassword("123456789");
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        $dados = new Dados();
        $dados->id_User = $user->id;
        $dados->nome = "joao";
        $dados->nif = "222222222";
        $dados->telefone = "999999999";
        $dados->morada = "Rua do lis";
        $dados->codPostal = "3780-566";
        $dados->save();

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

        $produto = new Produto();
        $produto->id_Categoria = $categoria->id;
        $produto->id_Iva = $iva->id;
        $produto->id_Marca = $marca->nome;
        $produto->descricao = "GTX1080";
        $produto->imagem = "logo.jpg";
        $produto->referencia = "ADFRG";
        $produto->preco = 12;
        $produto->nome = "GTX4080";
        $produto->save();

        $stock = new Stock();
        $stock->id_Produto = $produto->id;
        $stock->id_Loja = $loja->id;
        $stock->quantidade = 0;
        $stock->save();

        //instanciar carrinho
        $carrinho = new Carrinho();

        //Despoletar todas as regras de validação (introduzindo dados erróneos);

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
        $carrinho->id_Cliente = $dados->id_User;
        $this->assertTrue($carrinho->validate(['id_Cliente']));
        $carrinho->id_Produto = $produto->id;
        $this->assertTrue($carrinho->validate(['id_Produto']));
        $carrinho->Quantidade = 10;
        $this->assertTrue($carrinho->validate(['Quantidade']));

        //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD
        $carrinho = new Carrinho();
        $carrinho->id_Cliente = $dados->id_User;
        $carrinho->id_Produto = $produto->id;
        $carrinho->Quantidade = 10;
        $carrinho->save();

        $this->tester->seeRecord('common\models\Carrinho', array('id_Cliente' => $dados->id_User, 'id_Produto' => $produto->id, 'Quantidade' => 10));

        //Ler o registo anterior e aplicar um update e Ver se o registo atualizado se encontra na BD
        $carrinhoUpdate = $this->tester->grabRecord('common\models\Carrinho', array('id_Cliente' => $dados->id_User));
        $carrinhoUpdate->id_Cliente = $dados->id_User;
        $carrinhoUpdate->id_Produto = $produto->id;
        $carrinhoUpdate->Quantidade = 15;
        $carrinhoUpdate->save();

        $this->tester->seeRecord('common\models\Carrinho', array('id_Cliente' => $dados->id_User, 'id_Produto' => $produto->id, 'Quantidade' => 15));

        //Apagar o registo e Verificar que o registo não se encontra na BD
        $carrinhoDelete = $this->tester->grabRecord('common\models\Carrinho', array('id_Cliente' => $dados->id_User));
        $carrinhoDelete->delete();

        $this->tester->dontSeeRecord('common\models\Carrinho', array('id_Cliente' => $dados->id_User, 'id_Produto' => $produto->id, 'Quantidade' => 15));
    }
}
