<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linhafatura".
 *
 * @property int $id
 * @property int $idFatura
 * @property int $idProduto
 * @property int $quantidade
 * @property float $valor
 * @property float $valorIva
 *
 * @property Fatura $idFatura0
 * @property Produto $idProduto0
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
            [['idFatura', 'idProduto', 'quantidade', 'valor', 'valorIva'], 'required'],
            [['idFatura', 'idProduto', 'quantidade'], 'integer'],
            [['valor', 'valorIva'], 'number'],
            [['idFatura'], 'exist', 'skipOnError' => true, 'targetClass' => Fatura::class, 'targetAttribute' => ['idFatura' => 'id']],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['idProduto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idFatura' => 'Id Fatura',
            'idProduto' => 'Id Produto',
            'quantidade' => 'Quantidade',
            'valor' => 'Valor',
            'valorIva' => 'Valor Iva',
        ];
    }

    /**
     * Gets query for [[IdFatura0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdFatura0()
    {
        return $this->hasOne(Fatura::class, ['id' => 'idFatura']);
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
