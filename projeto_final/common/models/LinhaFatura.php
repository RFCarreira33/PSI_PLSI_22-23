<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linhafatura".
 *
 * @property int $id
 * @property int $id_Fatura
 * @property int $id_Produto
 * @property int $quantidade
 * @property float $valor
 * @property float $valorIva
 *
 * @property Fatura $fatura
 * @property Produto $produto
 */
class LinhaFatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linhafatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_Fatura', 'id_Produto', 'quantidade', 'valor', 'valorIva'], 'required'],
            [['id_Fatura', 'id_Produto', 'quantidade'], 'integer'],
            [['valor', 'valorIva'], 'number'],
            [['id_Fatura'], 'exist', 'skipOnError' => true, 'targetClass' => Fatura::class, 'targetAttribute' => ['id_Fatura' => 'id']],
            [['id_Produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['id_Produto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_Fatura' => 'Id Fatura',
            'id_Produto' => 'Id Produto',
            'quantidade' => 'Quantidade',
            'valor' => 'Valor',
            'valorIva' => 'Valor Iva',
        ];
    }

    /**
     * Gets query for [[Fatura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFatura()
    {
        return $this->hasOne(Fatura::class, ['id' => 'id_Fatura']);
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
