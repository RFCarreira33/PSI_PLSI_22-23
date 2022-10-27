<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carrinho".
 *
 * @property int $idUser
 * @property int $idProduto
 * @property int $Quantidade
 *
 * @property Produto $idProduto0
 * @property User $idUser0
 */
class Carrinho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'idProduto', 'Quantidade'], 'required'],
            [['idUser', 'idProduto', 'Quantidade'], 'integer'],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['idProduto' => 'id']],
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
            'idProduto' => 'Id Produto',
            'Quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[IdProduto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduto0()
    {
        return $this->hasOne(Produto::class, ['id' => 'idProduto']);
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
