<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linhafatura".
 *
 * @property int $id
 * @property int $id_Fatura
 * @property string $produto_nome
 * @property string $produto_referencia
 * @property int $quantidade
 * @property float $valor
 * @property float $valorIva
 *
 * @property Fatura $fatura
 */
class Linhafatura extends \yii\db\ActiveRecord
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
            [['id_Fatura', 'produto_nome', 'produto_referencia', 'quantidade', 'valor', 'valorIva'], 'required'],
            [['id_Fatura', 'quantidade'], 'integer'],
            [['valor', 'valorIva'], 'number'],
            [['produto_nome', 'produto_referencia'], 'string', 'max' => 45],
            [['id_Fatura'], 'exist', 'skipOnError' => true, 'targetClass' => Fatura::class, 'targetAttribute' => ['id_Fatura' => 'id']],
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
            'produto_nome' => 'Produto Nome',
            'produto_referencia' => 'Produto Referencia',
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
}
