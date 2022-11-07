<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dados".
 *
 * @property int $id_User
 * @property string $nome
 * @property string $telefone
 * @property string $nif
 * @property string $morada
 * @property string $codPostal
 *
 * @property Fatura[] $faturas
 * @property User $user
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
            [['id_User', 'nome', 'telefone', 'nif', 'morada', 'codPostal'], 'required'],
            [['id_User'], 'integer'],
            [['nome', 'morada'], 'string', 'max' => 45],
            [['telefone', 'nif', 'codPostal'], 'string', 'max' => 9],
            [['id_User'], 'unique'],
            [['id_User'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_User' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_User' => 'Id User',
            'nome' => 'Nome',
            'telefone' => 'Telefone',
            'nif' => 'Nif',
            'morada' => 'Morada',
            'codPostal' => 'Cod Postal',
        ];
    }

    /**
     * Gets query for [[Faturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaturas()
    {
        return $this->hasMany(Fatura::class, ['id_Cliente' => 'id_User']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_User']);
    }
}
