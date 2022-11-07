<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carrinho".
 *
 * @property int $id_Cliente
 * @property int $id_Produto
 * @property int $Quantidade
 *
 * @property User $cliente
 * @property Produto $produto
 */
class Carrinho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_Cliente', 'id_Produto', 'Quantidade'], 'required'],
            [['id_Cliente', 'id_Produto', 'Quantidade'], 'integer'],
            [['id_Cliente', 'id_Produto'], 'unique', 'targetAttribute' => ['id_Cliente', 'id_Produto']],
            [['id_Cliente'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_Cliente' => 'id']],
            [['id_Produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['id_Produto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_Cliente' => 'Id Cliente',
            'id_Produto' => 'Id Produto',
            'Quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(User::class, ['id' => 'id_Cliente']);
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::class, ['id' => 'id_Produto']);
    }
}
