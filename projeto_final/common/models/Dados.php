<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dados".
 *
 * @property int $idUser
 * @property string $nome
 * @property string $telefone
 * @property string $nif
 * @property string $morada
 * @property string $codPostal
 *
 * @property Carrinho[] $carrinhos
 * @property Fatura[] $faturas
 * @property Produto[] $idProdutos
 * @property User $idUser0
 */
class Dados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser'], 'required'],
            [['idUser'], 'integer'],
            [['nome', 'morada'], 'string', 'max' => 45],
            [['telefone', 'nif', 'codPostal'], 'string', 'min' => 9, 'max' => 9],
            [['idUser'], 'unique'],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'nome' => 'Nome',
            'telefone' => 'Telefone',
            'nif' => 'Nif',
            'morada' => 'Morada',
            'codPostal' => 'Cod Postal',
        ];
    }

    /**
     * Gets query for [[Carrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinhos()
    {
        return $this->hasMany(Carrinho::class, ['idCliente' => 'idUser']);
    }

    /**
     * Gets query for [[Faturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaturas()
    {
        return $this->hasMany(Fatura::class, ['idCliente' => 'idUser']);
    }

    /**
     * Gets query for [[IdProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProdutos()
    {
        return $this->hasMany(Produto::class, ['id' => 'idProduto'])->viaTable('carrinho', ['idCliente' => 'idUser']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::class, ['id' => 'idUser']);
    }
}