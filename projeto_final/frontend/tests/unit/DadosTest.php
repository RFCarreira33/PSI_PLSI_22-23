<?php


namespace frontend\tests\Unit;

use frontend\tests\UnitTester;
use common\models\Dados;
use common\models\User;

class DadosTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    function testModeloDados()
    {
        //criação de um user 
        $user = new User();
        $user->username = "jj";
        $user->email = "jj@gmail.com";
        $user->setPassword("123456789");
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        $dados = new Dados();

        //Despoletar todas as regras de validação (introduzindo dados erróneos);

        //required no modelo
        $dados->id_User = null;
        $this->assertFalse($dados->validate(['id_User']));
        $dados->nome = null;
        $this->assertFalse($dados->validate(['nome']));
        $dados->nif = null;
        $this->assertFalse($dados->validate(['nif']));
        $dados->telefone = null;
        $this->assertFalse($dados->validate(['telefone']));
        $dados->morada = null;
        $this->assertFalse($dados->validate(['morada']));
        $dados->codPostal = null;
        $this->assertFalse($dados->validate(['codPostal']));

        //id user integer
        $dados->id_User = "a";
        $this->assertFalse($dados->validate(['id_User']));

        //morada e nome max 45 caracteres
        $dados->morada = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"; //50 caracteres
        $this->assertFalse($dados->validate(['morada']));
        $dados->nome = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"; //50 caracteres
        $this->assertFalse($dados->validate(['nome']));

        //nif , codpostal e telefone max 9 caracteres
        $dados->nif = "1111111111"; //10 caracteres
        $this->assertFalse($dados->validate(['nif']));
        $dados->codPostal = "aaaaaaaaaa"; //10 caracteres
        $this->assertFalse($dados->validate(['codPostal']));
        $dados->telefone = "1111111111"; //10 caracteres
        $this->assertFalse($dados->validate(['telefone']));

        //Regex validação
        $dados->codPostal = "3780-6";
        $this->assertFalse($dados->validate(['codPostal']));
        $dados->telefone = "9123 12432";
        $this->assertFalse($dados->validate(['telefone']));
        $dados->nif = "22134565 4";
        $this->assertFalse($dados->validate(['nif']));

        //assert trues
        $dados->id_User = $user->id;
        $this->assertTrue($dados->validate(['id_User']));
        $dados->nome = "joao";
        $this->assertTrue($dados->validate(['nome']));
        $dados->nif = "231123123";
        $this->assertTrue($dados->validate(['nif']));
        $dados->telefone = "123123123";
        $this->assertTrue($dados->validate(['telefone']));
        $dados->morada = "Rua da Igreja";
        $this->assertTrue($dados->validate(['morada']));
        $dados->codPostal = "3780-566";
        $this->assertTrue($dados->validate(['codPostal']));

        //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD
        $dados = new Dados();
        $dados->id_User = $user->id;
        $dados->nome = "joao";
        $dados->nif = "222222222";
        $dados->telefone = "999999999";
        $dados->morada = "Rua da Igreja";
        $dados->codPostal = "3780-566";
        $dados->save();
        $this->tester->seeRecord('common\models\Dados', array('id_user' => $user->id, 'nome' => "joao", 'nif' => "222222222", 'telefone' => "999999999", 'morada' => "Rua da Igreja", 'codPostal' => "3780-566"));

        //Ler o registo anterior e aplicar um update e Ver se o registo atualizado se encontra na BD
        $dadosUpdate = $this->tester->grabRecord('common\models\Dados', array('nif' => '222222222'));
        $dadosUpdate->nome = "pedro";
        $dadosUpdate->nif = "111111111";
        $dadosUpdate->telefone = "111111111";
        $dadosUpdate->morada = "Rua dos pousos";
        $dadosUpdate->codPostal = "3780-567";
        $dadosUpdate->save();
        $this->tester->seeRecord('common\models\Dados', array('id_user' => $user->id, 'nome' => "pedro", 'nif' => "111111111", 'telefone' => "111111111", 'morada' => "Rua dos pousos", 'codPostal' => "3780-567"));

        //Apagar o registo e Verificar que o registo não se encontra na BD
        $dadosDelete = $this->tester->grabRecord('common\models\Dados', array('nif' => '111111111'));
        $dadosDelete->delete();
        $this->tester->dontSeeRecord('common\models\Dados', array('id_user' => $user->id, 'nome' => "pedro", 'nif' => "111111111", 'telefone' => "111111111", 'morada' => "Rua dos pousos", 'codPostal' => "3780-567"));
    }
}
