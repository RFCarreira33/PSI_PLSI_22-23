<?php


namespace frontend\tests\Unit;

use frontend\tests\UnitTester;
use common\models\Produto;

class ProdutoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    public function testModeloProduto()
    {
        $produto = new Produto();

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
        $produto->id_Categoria = 1;
        $this->assertTrue($produto->validate(['id_Categoria']));
        $produto->id_Iva = 1;
        $this->assertTrue($produto->validate(['id_Iva']));
        $produto->id_Marca = "AMD";
        $this->assertTrue($produto->validate(['id_Marca']));
        $produto->descricao = "ok";
        $this->assertTrue($produto->validate(['descricao']));
        $produto->imagem = "logo.jpg";
        $this->assertTrue($produto->validate(['imagem']));
        $produto->referencia = "ok2";
        $this->assertTrue($produto->validate(['referencia']));
        $produto->preco = 12;
        $this->assertTrue($produto->validate(['preco']));
    }

    function testSavingProduto()
    {
        $produto = new Produto();
        $produto->id_Categoria = 1;
        $produto->id_Iva = 1;
        $produto->id_Marca = "AMD";
        $produto->descricao = "okkkkk";
        $produto->imagem = "logo.jpg";
        $produto->referencia = "ok2";
        $produto->preco = 12;
        $produto->save();
        $this->tester->seeRecord('common\models\Produto', array('id_Categoria' => 1, 'id_Iva' => 1, 'id_Marca' => "AMD", 'descricao' => "okkkkk", 'referencia' => "ok2", 'imagem' => "logo.jpg", 'preco' => 12));
    }

    function testUpdateProduto()
    {
        $this->testSavingProduto();
        $produtoUpdate = $this->tester->grabRecord('common\models\Produto', array('referencia' => 'ok2'));
        $produtoUpdate->id_Categoria = 3;
        $produtoUpdate->id_Iva = 1;
        $produtoUpdate->id_Marca = "Nvidia";
        $produtoUpdate->descricao = "ok2";
        $produtoUpdate->imagem = "banner.png";
        $produtoUpdate->referencia = "ok3";
        $produtoUpdate->preco = 15;
        $produtoUpdate->save();
        $this->tester->seeRecord('common\models\Produto', array('id_Categoria' => 3, 'id_Iva' => 1, 'id_Marca' => "Nvidia", 'descricao' => "ok2", 'referencia' => "ok3", 'imagem' => "banner.png", 'preco' => 15));
    }

    function testDeleteProduto()
    {
        $this->testSavingProduto();
        $this->testUpdateProduto();
        $produtoDelete = $this->tester->grabRecord('common\models\Produto', array('referencia' => 'ok3'));
        $produtoDelete->delete();
        $this->tester->dontSeeRecord('common\models\Produto', array('id_Categoria' => 3, 'id_Iva' => 1, 'id_Marca' => "Nvidia", 'descricao' => "ok2", 'referencia' => "ok3", 'imagem' => "banner.png", 'preco' => 15));
    }
}
