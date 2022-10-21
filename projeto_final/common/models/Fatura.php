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
 * @property string $estado
 *
 * @property Cliente $idCliente0
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
            [['idCliente', 'dataFatura', 'valorTotal', 'valorIva', 'estado'], 'required'],
            [['idCliente'], 'integer'],
            [['dataFatura'], 'safe'],
            [['valorTotal', 'valorIva'], 'number'],
            [['estado'], 'string'],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['idCliente' => 'idUser']],
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
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[IdCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(Cliente::class, ['idUser' => 'idCliente']);
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
