<?php


namespace frontend\tests\Unit;

use frontend\tests\UnitTester;
use common\models\Categoria;

class CategoriaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    public function testModeloCategoria()
    {
        $categoria = new Categoria();

        //idcategoriapai integer
        $categoria->id_CategoriaPai = "a";
        $this->assertFalse($categoria->validate(['id_CategoriaPai']));

        //nome required
        $categoria->nome = null;
        $this->assertFalse($categoria->validate(['nome']));

        //nome string maximo 45
        $categoria->nome = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($categoria->validate(['nome']));

        //assert true
        $categoria->id_CategoriaPai = 1;
        $this->assertTrue($categoria->validate(['id_CategoriaPai']));
        $categoria->nome = "processadores";
        $this->assertTrue($categoria->validate(['nome']));
    }

    public function testSavingCategoria()
    {
        $categoria = new Categoria();

        $categoria->id_CategoriaPai = null;
        $categoria->nome = "placas";
        $categoria->save();

        $this->tester->seeRecord('common\models\Categoria', array('id_CategoriaPai' => null, 'nome' => "placas"));
    }

    public function testUpdateCategoria()
    {
        $this->testSavingCategoria();
        $categoria = $this->tester->grabRecord('common\models\Categoria', array('nome' => 'placas'));

        $categoria->id_CategoriaPai = 1;
        $categoria->nome = "processadores";
        $categoria->save();

        $this->tester->seeRecord('common\models\Categoria', array('id_CategoriaPai' => 1, 'nome' => "processadores"));
    }

    public function testDeleteCategoria()
    {
        $this->testSavingCategoria();
        $this->testUpdateCategoria();

        $categoria = $this->tester->grabRecord('common\models\Categoria', array('nome' => 'processadores'));
        $categoria->delete();

        $this->tester->dontSeeRecord('common\models\Categoria', array('id_CategoriaPai' => 1, 'nome' => "processadores"));
    }
}
