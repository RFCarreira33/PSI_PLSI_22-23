<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carrinho".
 *
 * @property int $idCliente
 * @property int $idProduto
 * @property int $quantidade
 *
 * @property Dados $idCliente0
 * @property Produto $idProduto0
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
            [['idCliente', 'idProduto', 'quantidade'], 'required'],
            [['idCliente', 'idProduto', 'quantidade'], 'integer'],
            [['idCliente', 'idProduto'], 'unique', 'targetAttribute' => ['idCliente', 'idProduto']],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['idProduto' => 'id']],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Dados::class, 'targetAttribute' => ['idCliente' => 'idUser']],
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
            'quantidade' => 'quantidade',
        ];
    }

    /**
     * Gets query for [[IdCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(Dados::class, ['idUser' => 'idCliente']);
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
}