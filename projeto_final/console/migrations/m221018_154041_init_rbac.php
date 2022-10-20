<?php

use yii\db\Migration;

/**
 * Class m221018_154041_init_rbac
 */
class m221018_154041_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221018_154041_init_rbac cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = Yii::$app->authManager;

        //criar permissoes
        $backendLogin = $auth->createPermission('backendLogin');
        $backendLogin->description = 'Login for Backend';
        $auth->add($backendLogin);

        $frontendLogin = $auth->createPermission('frontendLogin');
        $frontendLogin->description = 'Login for Frontend';
        $frontendLogin->add($frontendLogin);


        //criar role funcionario
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $backendLogin);

        //criar role cliente
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $frontendLogin);

        //criar role admin e dar asign do user id 1
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $funcionario);
        $auth->assign($admin, 1);
    }

    public function down()
    {
        echo "m221018_154041_init_rbac cannot be reverted.\n";

        return false;
    }
}