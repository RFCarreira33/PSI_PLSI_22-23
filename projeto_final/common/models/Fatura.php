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
 * @property string $localidade
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
            [['id_Cliente', 'nome', 'nif', 'codPostal', 'telefone', 'morada', 'localidade', 'email', 'valorTotal', 'valorIva'], 'required'],
            [['id_Cliente'], 'integer'],
            [['dataFatura'], 'safe'],
            [['valorTotal', 'valorIva'], 'number'],
            [['nome', 'morada', 'localidade'], 'string', 'max' => 45],
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
            'localidade' => 'Localidade',
            'email' => 'Email',
            'dataFatura' => 'Data Fatura',
            'valorTotal' => 'Valor Total',
            'valorIva' => 'Valor Iva',
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
}
