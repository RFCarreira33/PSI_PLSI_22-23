<?php

namespace console\models;

use yii\rbac\Rule;
use common\models\Fatura;

/**
 * Checks if authorID matches user passed via params
 */
class FaturaRule extends Rule
{
    public $name = 'Comprador';


    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['fatura']) ? $params['fatura']->id_Cliente == $user : false;
    }
}
