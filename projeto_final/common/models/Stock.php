<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id_Loja
 * @property int $id_Produto
 * @property int $quantidade
 *
 * @property Loja $loja
 * @property Produto $produto
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
            [['id_Loja', 'id_Produto', 'quantidade'], 'required'],
            [['id_Loja', 'id_Produto', 'quantidade'], 'integer'],
            [['id_Loja'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::class, 'targetAttribute' => ['id_Loja' => 'id']],
            [['id_Produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['id_Produto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_Loja' => 'Id Loja',
            'id_Produto' => 'Id Produto',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[Loja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoja()
    {
        return $this->hasOne(Loja::class, ['id' => 'id_Loja']);
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
