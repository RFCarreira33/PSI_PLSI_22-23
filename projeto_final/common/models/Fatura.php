<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fatura".
 *
 * @property int $id
 * @property int $idCliente
 * @property string $dataFatura
 * @property float $valorTotal
 * @property float $valorIva
 *
 * @property Dados $idCliente0
 * @property Linhafatura[] $linhafaturas
 */
class Fatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCliente', 'valorTotal', 'valorIva'], 'required'],
            [['idCliente'], 'integer'],
            [['dataFatura'], 'safe'],
            [['valorTotal', 'valorIva'], 'number'],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Dados::class, 'targetAttribute' => ['idCliente' => 'idUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCliente' => 'Id Cliente',
            'dataFatura' => 'Data Fatura',
            'valorTotal' => 'Valor Total',
            'valorIva' => 'Valor Iva',
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
     * Gets query for [[Linhafaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhafaturas()
    {
        return $this->hasMany(Linhafatura::class, ['idFatura' => 'id']);
    }
}
