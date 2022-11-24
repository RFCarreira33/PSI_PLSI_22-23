<?php

namespace console\models;

use backend\models\AuthAssignment;
use yii\rbac\Rule;
use Yii;

/**
 * Checks if authorID matches user passed via params
 */
class SuperiorRule extends Rule
{
    public $name = 'Superior Role';


    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        $loggedUser = AuthAssignment::findOne(['user_id' => $user])->item_name;
        if ($loggedUser == 'admin') {
            return true;
        }
        if ($loggedUser == 'funcionario' && $params['role'] != 'admin') {
            return true;
        }
        return false;
    }
}