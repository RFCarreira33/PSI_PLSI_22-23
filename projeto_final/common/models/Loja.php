<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loja".
 *
 * @property int $id
 * @property string $localidade
 *
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
            [['localidade'], 'required'],
            [['localidade'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'localidade' => 'Localidade',
        ];
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
