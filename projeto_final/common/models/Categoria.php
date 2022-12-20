<?php

namespace common\models;

use Yii;
use yii\validators\when;

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
            [['id_CategoriaPai'], 'exist', 'when' => function ($model, $attribute) {
                if ($model->$attribute == $model->id) {
                    $this->addError($attribute, 'A categoria pai não pode ser a mesma que a categoria');
                    return false;
                }
            }],
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

    public function canDelete()
    {
        if (count($this->produtos) == 0 && count($this->categorias) == 0) {
            return true;
        }
        return false;
    }

    public static function getCountCategorias()
    {
        return Categoria::find()->count();
    }

    public static function getCategoriasPai()
    {
        $categorias = Categoria::find()->all();
        $categoriasPai = [];
        foreach ($categorias as $categoria) {
            $categoriasFilho = Categoria::find()->where(['id_CategoriaPai' => $categoria->id])->all();
            if (count($categoriasFilho) > 0) {
                $categoriasPai[] = $categoria->id;
            }
        }
        // query for categorias that are used as Categoria Pai
        return $categoriasPai;
    }

    public static function checkChildren($category)
    {
        foreach ($category->categorias as $child) {

            echo '<li><a class="dropdown-item" href="<?= Url::toRoute(["produto/search?category="' . $child->nome . '])">' . $child->nome . '</a></li>';
            echo '<ul>';
            if (sizeof($child->categorias) > 0) {
                $child->checkChildren($child);
            }
            echo '</ul>';
        }
    }
}
