<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loja".
 *
 * @property int $id
 * @property int $idEmpresa
 * @property string $localidade
 *
 * @property Empresa $idEmpresa0
 * @property Produto[] $idProdutos
 * @property Stock[] $stocks
 */
class Loja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEmpresa', 'localidade'], 'required'],
            [['idEmpresa'], 'integer'],
            [['localidade'], 'string', 'max' => 45],
            [['idEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::class, 'targetAttribute' => ['idEmpresa' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idEmpresa' => 'Id Empresa',
            'localidade' => 'Localidade',
        ];
    }

    /**
     * Gets query for [[IdEmpresa0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa0()
    {
        return $this->hasOne(Empresa::class, ['id' => 'idEmpresa']);
    }

    /**
     * Gets query for [[IdProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProdutos()
    {
        return $this->hasMany(Produto::class, ['id' => 'idProduto'])->viaTable('stock', ['idLoja' => 'id']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['idLoja' => 'id']);
    }
}
