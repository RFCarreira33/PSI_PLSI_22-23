<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int|null $created_at
 *
 * @property AuthItem $itemName
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
            [['item_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::class, 'targetAttribute' => ['item_name' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[ItemName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(AuthItem::class, ['name' => 'item_name']);
    }


    public static function isCliente()
    {
        $user = AuthAssignment::find()->where(['user_id' => Yii::$app->user->id])->one();
        if ($user->item_name == 'cliente') {
            return true;
        }
        return false;
    }

    public static function isAdmin()
    {
        $user = AuthAssignment::find()->where(['user_id' => Yii::$app->user->id])->one();
        if ($user->item_name == 'admin') {
            return true;
        }
        return false;
    }

    public static function getIds($role)
    {
        $users = AuthAssignment::findAll(['item_name' => $role]);
        foreach ($users as $user) {
            $ids[] = $user->user_id;
        }
        return $ids;
    }

    public static function getCountClientes()
    {
        return AuthAssignment::find()->where(["item_name" => "cliente"])->count();
    }

    public static function getCountFuncionarios()
    {
        return AuthAssignment::find()->where(["item_name" => "funcionario"])->count();
    }


    public static function getUserRole($id)
    {
        $user = AuthAssignment::find()->where(['user_id' => $id])->one();

        return $user->item_name;
    }
}