<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loja".
 *
 * @property int $id
 * @property int $id_Empresa
 * @property string $localidade
 *
 * @property Empresa $empresa
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
            [['id_Empresa', 'localidade'], 'required'],
            [['id_Empresa'], 'integer'],
            [['localidade'], 'string', 'max' => 45],
            [['id_Empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::class, 'targetAttribute' => ['id_Empresa' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_Empresa' => 'Id Empresa',
            'localidade' => 'Localidade',
        ];
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::class, ['id' => 'id_Empresa']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['id_Loja' => 'id']);
    }

    public static function getCountLojas()
    {
        return self::find()->count();
    }
}