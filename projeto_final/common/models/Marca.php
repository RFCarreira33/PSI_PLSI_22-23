<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "marca".
 *
 * @property string $nome
 *
 * @property Produto[] $produtos
 */
class Marca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 45],
            [['nome'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['id_Marca' => 'nome']);
    }

    public function canDelete()
    {
        if (count($this->produtos) == 0) {
            return true;
        }
        return false;
    }
}