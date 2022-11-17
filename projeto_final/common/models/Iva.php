<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "iva".
 *
 * @property int $id
 * @property int $percentagem
 * @property int $Ativo
 *
 * @property Produto[] $produtos
 */
class Iva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'iva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percentagem', 'Ativo'], 'required'],
            [['percentagem', 'Ativo'], 'integer'],
            [['Ativo'], 'in', 'range' => [0, 1]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'percentagem' => 'Percentagem',
            'Ativo' => 'Ativo',
        ];
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['id_Iva' => 'id']);
    }
}