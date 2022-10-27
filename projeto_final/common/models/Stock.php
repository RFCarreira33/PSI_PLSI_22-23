<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $idLoja
 * @property int $idProduto
 * @property int $quantidade
 *
 * @property Loja $idLoja0
 * @property Produto $idProduto0
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLoja', 'idProduto', 'quantidade'], 'required'],
            [['idLoja', 'idProduto', 'quantidade'], 'integer'],
            [['idLoja'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::class, 'targetAttribute' => ['idLoja' => 'id']],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['idProduto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLoja' => 'Id Loja',
            'idProduto' => 'Id Produto',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[IdLoja0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLoja0()
    {
        return $this->hasOne(Loja::class, ['id' => 'idLoja']);
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
