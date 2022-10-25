<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $Crud = ['Read', 'Update', 'Delete', 'Create']; // READ = VIEW + INDEX
        $tabelasFuncionario = ['Categoria', 'Produto', 'Iva', 'Fatura', 'LinhaFatura', 'Marca', 'Stock']; //STOCK KINDA TROLLING
        $tabelasCliente = ['Produto', 'LinhaFatura', 'Fatura'];
        $tabelasAdmin = ['Empresa']; //adicionar a tabela de dados

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