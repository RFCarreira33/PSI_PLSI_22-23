<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property int $id_Categoria
 * @property int $id_Iva
 * @property string $id_Marca
 * @property string $descricao
 * @property string $imagem
 * @property string $referencia
 * @property float $preco
 * @property string|null $nome
 * @property int $Ativo
 *
 * @property Carrinho[] $carrinhos
 * @property Categoria $categoria
 * @property User[] $clientes
 * @property Iva $iva
 * @property Linhafatura[] $linhafaturas
 * @property Marca $marca
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
            [['id_Categoria', 'id_Iva', 'id_Marca', 'descricao', 'imagem', 'referencia', 'preco', 'Ativo'], 'required'],
            [['id_Categoria', 'id_Iva', 'Ativo'], 'integer'],
            [['descricao', 'imagem'], 'string'],
            [['preco'], 'number'],
            [['id_Marca', 'referencia'], 'string', 'max' => 45],
            [['nome'], 'string', 'max' => 50],
            [['id_Iva'], 'exist', 'skipOnError' => true, 'targetClass' => Iva::class, 'targetAttribute' => ['id_Iva' => 'id']],
            [['id_Marca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::class, 'targetAttribute' => ['id_Marca' => 'nome']],
            [['id_Categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['id_Categoria' => 'id']],
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
            'id_Categoria' => 'Id Categoria',
            'id_Iva' => 'Id Iva',
            'id_Marca' => 'Id Marca',
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
        return $this->hasMany(Carrinho::class, ['id_Produto' => 'id']);
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::class, ['id' => 'id_Categoria']);
    }

    /**
     * Gets query for [[Clientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(User::class, ['id' => 'id_Cliente'])->viaTable('carrinho', ['id_Produto' => 'id']);
    }

    /**
     * Gets query for [[Iva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIva()
    {
        return $this->hasOne(Iva::class, ['id' => 'id_Iva']);
    }

    /**
     * Gets query for [[Linhafaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhafaturas()
    {
        return $this->hasMany(Linhafatura::class, ['id_Produto' => 'id']);
    }

    /**
     * Gets query for [[Marca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marca::class, ['nome' => 'id_Marca']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['id_Produto' => 'id']);
    }
}