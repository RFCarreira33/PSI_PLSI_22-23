<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id
 * @property int|null $categoriaPai
 * @property string $nome
 *
 * @property Categoria $categoriaPai0
 * @property Categoria[] $categorias
 * @property Produto[] $produtos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoriaPai'], 'integer'],
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 45],
            [['categoriaPai'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['categoriaPai' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoriaPai' => 'Categoria Pai',
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[CategoriaPai0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaPai0()
    {
        return $this->hasOne(Categoria::class, ['id' => 'categoriaPai']);
    }

    /**
     * Gets query for [[Categorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasMany(Categoria::class, ['categoriaPai' => 'id']);
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['idCategoria' => 'id']);
    }
}
