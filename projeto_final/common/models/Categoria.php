<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id
 * @property int|null $id_CategoriaPai
 * @property string $nome
 *
 * @property Categoria $categoriaPai
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
            [['id_CategoriaPai'], 'integer'],
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 45],
            [['id_CategoriaPai'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['id_CategoriaPai' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_CategoriaPai' => 'Id Categoria Pai',
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[CategoriaPai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaPai()
    {
        return $this->hasOne(Categoria::class, ['id' => 'id_CategoriaPai']);
    }

    /**
     * Gets query for [[Categorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasMany(Categoria::class, ['id_CategoriaPai' => 'id']);
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['id_Categoria' => 'id']);
    }
}