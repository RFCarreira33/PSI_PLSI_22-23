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
 * @property Carrinho[] $carrinhos
 * @property Fatura[] $faturas
 * @property Produto[] $produtos
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
            [['nif', 'codPostal'], 'string', 'max' => 9],
            [['id_User'], 'unique'],
            [['id_User'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_User' => 'id']],
            [['nif', 'codPostal', 'telefone'], 'trim'],
            ['codPostal', 'match', 'pattern' => '^\d{4}-\d{3}?$^', 'message' => 'Código de Postal Inválido'],
            ['telefone', 'match', 'pattern' => '^\d{9}?$^', 'message' => 'Número de telefone inválido'],
            ['telefone', 'string', 'max' => 9, 'message' => 'Número de telefone com mais de 9 digitos'],
            ['nif', 'match', 'pattern' => '^\d{9}?$^', 'message' => 'NIF Inválido'],
            ['nif', 'string', 'max' => 9, 'message' => 'NIF com mais de 9 digitos'],

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
     * Gets query for [[Carrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinhos()
    {
        return $this->hasMany(Carrinho::class, ['id_Cliente' => 'id_User']);
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
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['id' => 'id_Produto'])->viaTable('carrinho', ['id_Cliente' => 'id_User']);
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

    public static function findIdentity()
    {
        return Yii::$app->user->id;
    }
}
