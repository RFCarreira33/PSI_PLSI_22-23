<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fatura".
 *
 * @property int $id
 * @property int $id_Cliente
 * @property string $nome
 * @property string $nif
 * @property string $codPostal
 * @property string $telefone
 * @property string $morada
 * @property string $email
 * @property string $dataFatura
 * @property float $valorTotal
 * @property float $valorIva
 *
 * @property Dados $cliente
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
            [['id_Cliente', 'nome', 'nif', 'codPostal', 'telefone', 'morada', 'email', 'valorTotal', 'valorIva'], 'required'],
            [['id_Cliente'], 'integer'],
            [['dataFatura'], 'safe'],
            [['subtotal', 'valorIva', 'valorDesconto', 'valorTotal'], 'number'],
            [['nome', 'morada'], 'string', 'max' => 45],
            [['nif', 'codPostal', 'telefone'], 'string', 'max' => 9],
            [['email'], 'string', 'max' => 255],
            [['id_Cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Dados::class, 'targetAttribute' => ['id_Cliente' => 'id_User']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_Cliente' => 'Id Cliente',
            'nome' => 'Nome',
            'nif' => 'Nif',
            'codPostal' => 'Cod Postal',
            'telefone' => 'Telefone',
            'morada' => 'Morada',
            'email' => 'Email',
            'dataFatura' => 'Data Fatura',
            'subtotal' => 'Subtotal',
            'valorIva' => 'Valor Iva',
            'valorDesconto' => 'Valor Desconto',
            'valorTotal' => 'Valor Total',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Dados::class, ['id_User' => 'id_Cliente']);
    }

    /**
     * Gets query for [[Linhafaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhafaturas()
    {
        return $this->hasMany(Linhafatura::class, ['id_Fatura' => 'id']);
    }
    public static function getTotalFaturado()
    {
        $total = Fatura::find()->sum('valorTotal');
        return $total;
    }
}