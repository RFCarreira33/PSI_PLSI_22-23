<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property int $idCategoria
 * @property int $idIva
 * @property string $marca
 * @property string $descricao
 * @property string $imagem
 * @property string $referencia
 * @property float $preco
 * @property string|null $nome
 * @property int $Ativo
 *
 * @property Carrinho[] $carrinhos
 * @property Categoria $idCategoria0
 * @property Iva $idIva0
 * @property Linhafatura[] $linhafaturas
 * @property Marca $marca0
 * @property Stock[] $stocks
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCategoria', 'idIva', 'marca', 'descricao', 'imagem', 'referencia', 'preco', 'Ativo'], 'required'],
            [['idCategoria', 'idIva', 'Ativo'], 'integer'],
            [['descricao', 'imagem'], 'string'],
            [['preco'], 'number'],
            [['marca', 'referencia'], 'string', 'max' => 45],
            [['nome'], 'string', 'max' => 50],
            [['idIva'], 'exist', 'skipOnError' => true, 'targetClass' => Iva::class, 'targetAttribute' => ['idIva' => 'id']],
            [['marca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::class, 'targetAttribute' => ['marca' => 'nome']],
            [['idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['idCategoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCategoria' => 'Id Categoria',
            'idIva' => 'Id Iva',
            'marca' => 'Marca',
            'descricao' => 'Descricao',
            'imagem' => 'Imagem',
            'referencia' => 'Referencia',
            'preco' => 'Preco',
            'nome' => 'Nome',
            'Ativo' => 'Ativo',
        ];
    }

    /**
     * Gets query for [[Carrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinhos()
    {
        return $this->hasMany(Carrinho::class, ['idProduto' => 'id']);
    }

    /**
     * Gets query for [[IdCategoria0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoria0()
    {
        return $this->hasOne(Categoria::class, ['id' => 'idCategoria']);
    }

    /**
     * Gets query for [[IdIva0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIva()
    {
        return $this->hasOne(Iva::class, ['id' => 'idIva']);
    }

    /**
     * Gets query for [[Linhafaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhafaturas()
    {
        return $this->hasMany(Linhafatura::class, ['idProduto' => 'id']);
    }

    /**
     * Gets query for [[Marca0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarca0()
    {
        return $this->hasOne(Marca::class, ['nome' => 'marca']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['idProduto' => 'id']);
    }
}
