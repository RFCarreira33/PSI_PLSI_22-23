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

    public function testCategoria()
    {
        //instanciar a categoria
        $categoria = new Categoria();

        //Despoletar todas as regras de validação (introduzindo dados erróneos);

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
        $categoria->id_CategoriaPai = null;
        $this->assertTrue($categoria->validate(['id_CategoriaPai']));
        $categoria->nome = "processadores";
        $this->assertTrue($categoria->validate(['nome']));

        //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD
        $categoria = new Categoria();
        $categoria->id_CategoriaPai = null;
        $categoria->nome = "placas";
        $categoria->save();

        $this->tester->seeRecord('common\models\Categoria', array('id_CategoriaPai' => null, 'nome' => "placas"));

        //Ler o registo anterior e aplicar um update e Ver se o registo atualizado se encontra na BD
        $categoriaUpdate = $this->tester->grabRecord('common\models\Categoria', array('nome' => 'placas'));

        $categoriaUpdate->id_CategoriaPai = 1;
        $categoriaUpdate->nome = "processadores";
        $categoriaUpdate->save();

        $this->tester->seeRecord('common\models\Categoria', array('id_CategoriaPai' => 1, 'nome' => "processadores"));

        //Apagar o registo e Verificar que o registo não se encontra na BD
        $categoriaDelete = $this->tester->grabRecord('common\models\Categoria', array('nome' => 'processadores'));
        $categoriaDelete->delete();

        $this->tester->dontSeeRecord('common\models\Categoria', array('id_CategoriaPai' => 1, 'nome' => "processadores"));
    }
}
