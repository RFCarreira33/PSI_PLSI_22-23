<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carrinho".
 *
 * @property int $idCliente
 * @property int $idProduto
 * @property int $Quantidade
 *
 * @property Produto $idProduto0
 * @property User $idCliente0
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
            [['idCliente', 'idProduto', 'Quantidade'], 'required'],
            [['idCliente', 'idProduto', 'Quantidade'], 'integer'],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['idProduto' => 'id']],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idCliente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'Id Cliente',
            'idProduto' => 'Id Produto',
            'Quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[IdProduto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduto0()
    {
        return $this->hasOne(Produto::class, ['id' => 'idProduto']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(User::class, ['id' => 'idCliente']);
    }
}
