<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $Crud = ['Read', 'Update', 'Delete', 'Create']; // READ = VIEW + INDEX
        $tabelasFuncionario = ['Categoria', 'Produto', 'Iva', 'Fatura', 'LinhaFatura', 'Marca', 'Stock'];
        $tabelasCliente = ['Produto', 'LinhaFatura', 'Fatura']; // linhas ??
        $tabelasAdmin = ['Empresa'];

        $auth = Yii::$app->authManager;
        $auth->removeAll();

        //criar role funcionario
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);


        //criar role cliente
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->assign($cliente, 2);

        //criar role admin e dar asign do user id 1
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $funcionario);
        $auth->assign($admin, 1);

        //criar permissoes cliente
        /*foreach ($tabelasCliente as $tabela) {
            $permission = $auth->createPermission("Read$tabela");
            $permission->description = "Read $tabela";
            $auth->add($permission);
            $auth->addChild($cliente, $permission);
        }
        */

        $permission = $auth->createPermission("carrinho");
        $permission->description = "Aceder ao carrinho";
        $auth->add($permission);
        $auth->addChild($cliente, $permission);

        /*
        $rule = new \app\rbac\FaturaRule;
        $auth->add($rule);
        $permission = $auth->createPermission("VerFaturas");
        $permission->description = "Verifica de a fatura pertence ao user";
        $auth->add($permission);
        $permission->ruleName = $rule->name;
        $auth->addChild($cliente, $permission);
*/

        //criar permissoes funcionario
        foreach ($Crud as $itemCrud) {
            foreach ($tabelasFuncionario as $tabela) {
                $permission = $auth->createPermission("$itemCrud$tabela");
                $permission->description = "$itemCrud $tabela";
                $auth->add($permission);
                $auth->addChild($funcionario, $permission);
            }
        }

        //criar permissoes admin
        foreach ($Crud as $itemCrud) {
            foreach ($tabelasAdmin as $tabela) {
                $permission = $auth->createPermission("$itemCrud$tabela");
                $permission->description = "$itemCrud $tabela";
                $auth->add($permission);
                $auth->addChild($admin, $permission);
            }
        }
    }
}