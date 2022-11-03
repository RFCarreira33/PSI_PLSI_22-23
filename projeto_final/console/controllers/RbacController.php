<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $Crud = ['Read', 'Update', 'Delete', 'Create']; // READ = VIEW + INDEX
        $tabelasFuncionario = ['Categoria', 'Produto', 'Iva', 'Fatura', 'Marca', 'Stock'];
        $tabelasCliente = ['Produto', 'Fatura'];

        $auth = Yii::$app->authManager;
        $auth->removeAll();

        //criar role funcionario id 3
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->assign($funcionario, 3);

        //criar role cliente id 2
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->assign($cliente, 2);

        //criar role admin e dar asign do user id 1
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->assign($admin, 1);

        //criar permissoes cliente
        foreach ($tabelasCliente as $tabela) {
            $permission = $auth->createPermission("FrontendRead$tabela");
            $permission->description = "Permite ao cliente visualizar $tabela";
            $auth->add($permission);
            $auth->addChild($cliente, $permission);
        }


        //Ver faturas apenas que pertencem ao utilizador
        $rule = new \console\models\FaturaRule();
        $auth->add($rule);
        $permission = $auth->createPermission("VerFaturas");
        $permission->description = "Verifica de a fatura pertence ao user";
        $auth->add($permission);
        $permission->ruleName = $rule->name;
        $auth->addChild($cliente, $permission);


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
        $auth->addChild($admin, $funcionario);

        $permission = $auth->createPermission("EmpresaUpdate");
        $permission->description = "Alterar os dados da Empresa";
        $auth->add($permission);
        $auth->addChild($admin, $permission);
    }
}