<?php


namespace frontend\tests\Unit;

use frontend\tests\UnitTester;
use common\models\Produto;
use common\models\Loja;
use common\models\Categoria;
use common\models\Stock;
use common\models\Iva;
use common\models\Marca;

class ProdutoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    public function testProduto()
    {
        //Ir buscar a empresa
        $empresa = $this->tester->grabRecord('common\models\Empresa', array('designacaoSocial' => 'GlobalDiga'));

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

        //instansiar produto
        $produto = new Produto();

        //Despoletar todas as regras de validação (introduzindo dados erróneos);

        //Required no modelo
        $produto->id_Categoria = null;
        $this->assertFalse($produto->validate(['id_Categoria']));
        $produto->id_Iva = null;
        $this->assertFalse($produto->validate(['id_Iva']));
        $produto->id_Marca = null;
        $this->assertFalse($produto->validate(['id_Marca']));
        $produto->descricao = null;
        $this->assertFalse($produto->validate(['descricao']));
        $produto->imagem = null;
        $this->assertFalse($produto->validate(['imagem']));
        $produto->referencia = null;
        $this->assertFalse($produto->validate(['referencia']));
        $produto->preco = null;
        $this->assertFalse($produto->validate(['preco']));

        //id Categoria, id Iva, Ativo Integer
        $produto->id_Categoria = 1.2;
        $this->assertFalse($produto->validate(['id_Categoria']));
        $produto->id_Iva = 1.2;
        $this->assertFalse($produto->validate(['id_Iva']));
        $produto->Ativo = 1.2;
        $this->assertFalse($produto->validate(['Ativo']));

        //preco is number
        $produto->preco = "a";
        $this->assertFalse($produto->validate(['preco']));

        //id marca / referencia maximo 45 caracteres
        $produto->id_Marca = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($produto->validate(['id_Marca']));
        $produto->referencia = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($produto->validate(['referencia']));

        //nome max 50 caracteres
        $produto->nome = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($produto->validate(['nome']));

        //ativo 0 a 1
        $produto->Ativo = 3;
        $this->assertFalse($produto->validate(['Ativo']));

        //imagme jpg/jpeg/png
        $produto->imagem = "projeot_final.sql";
        $this->assertFalse($produto->validate(['imagem']));

        //assert true
        $produto->id_Categoria = $categoria->id;
        $this->assertTrue($produto->validate(['id_Categoria']));
        $produto->id_Iva = $iva->id;
        $this->assertTrue($produto->validate(['id_Iva']));
        $produto->id_Marca = $marca->nome;
        $this->assertTrue($produto->validate(['id_Marca']));
        $produto->descricao = "ok";
        $this->assertTrue($produto->validate(['descricao']));
        $produto->imagem = "logo.jpg";
        $this->assertTrue($produto->validate(['imagem']));
        $produto->referencia = "ok2";
        $this->assertTrue($produto->validate(['referencia']));
        $produto->preco = 12;
        $this->assertTrue($produto->validate(['preco']));

        //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD
        $produto = new Produto();
        $produto->id_Categoria = $categoria->id;
        $produto->id_Iva = $iva->id;
        $produto->id_Marca = $marca->nome;
        $produto->descricao = "GTX3080";
        $produto->imagem = "logo.jpg";
        $produto->referencia = "RKFGD";
        $produto->preco = 12;
        $produto->save();

        $stock = new Stock();
        $stock->id_Produto = $produto->id;
        $stock->id_Loja = $loja->id;
        $stock->quantidade = 0;
        $stock->save();

        $this->tester->seeRecord('common\models\Stock', array('id_Loja' => $loja->id, 'id_Produto' => $produto->id, 'quantidade' => 0));
        $this->tester->seeRecord('common\models\Produto', array('id_Categoria' => $categoria->id, 'id_Iva' => $iva->id, 'id_Marca' => $marca->nome, 'descricao' => "GTX3080", 'referencia' => "RKFGD", 'imagem' => "logo.jpg", 'preco' => 12));

        //Ler o registo anterior e aplicar um update e Ver se o registo atualizado se encontra na BD
        $produtoUpdate = $this->tester->grabRecord('common\models\Produto', array('referencia' => 'RKFGD'));
        $ivaUpdate = $this->tester->grabRecord('common\models\Iva', array('percentagem' => '23'));
        $categoriaUpdate = $this->tester->grabRecord('common\models\Categoria', array('nome' => 'OPGG'));
        $marcaUpdate = $this->tester->grabRecord('common\models\Marca', array('nome' => 'Nvidia'));
        $produtoUpdate->id_Categoria = $categoriaUpdate->id;
        $produtoUpdate->id_Iva = $ivaUpdate->id;
        $produtoUpdate->id_Marca = $marcaUpdate->nome;
        $produtoUpdate->descricao = "GTX4080";
        $produtoUpdate->imagem = "banner.png";
        $produtoUpdate->referencia = "DFTGL";
        $produtoUpdate->preco = 15;
        $produtoUpdate->save();

        $stockUpdate = $this->tester->grabRecord('common\models\Stock', array('id_Loja' => $loja->id));
        $stockUpdate->quantidade = 15;
        $stockUpdate->save();

        $this->tester->seeRecord('common\models\Stock', array('quantidade' => 15));
        $this->tester->seeRecord('common\models\Produto', array('id_Categoria' => $categoriaUpdate->id, 'id_Iva' => $ivaUpdate->id, 'id_Marca' => $marcaUpdate->nome, 'descricao' => "GTX4080", 'referencia' => "DFTGL", 'imagem' => "banner.png", 'preco' => 15));

        //Apagar o registo e Verificar que o registo não se encontra na BD
        $produtoDelete = $this->tester->grabRecord('common\models\Produto', array('referencia' => 'DFTGL'));
        $stockDelete = $this->tester->grabRecord('common\models\Stock', array('id_Loja' => $loja->id));
        $stockDelete->delete();
        $produtoDelete->delete();
        $this->tester->dontSeeRecord('common\models\Produto', array('id_Categoria' => $categoriaUpdate->id, 'id_Iva' => $ivaUpdate->id, 'id_Marca' => $marcaUpdate->nome, 'descricao' => "GTX4080", 'referencia' => "DFTGL", 'imagem' => "banner.png", 'preco' => 15));
    }
}
