<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
 * @property string $designacaoSocial
 * @property string $email
 * @property string $telefone
 * @property string $nif
 * @property string $morada
 * @property string $codPostal
 * @property string $localidade
 * @property int $capitalSocial
 * @property string $imgBanner
 * @property string $imgLogo
 *
 * @property Loja[] $lojas
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacaoSocial', 'email', 'telefone', 'nif', 'morada', 'codPostal', 'localidade', 'capitalSocial', 'imgBanner', 'imgLogo'], 'required'],
            [['capitalSocial', 'valorDesconto'], 'integer'],
            [['designacaoSocial', 'email', 'morada', 'localidade'], 'string', 'max' => 45],
            [['telefone', 'nif'], 'string', 'min' => 9, 'max' => 9],
            [['codPostal'], 'string', 'min' => 8, 'max' => 8],
            [['imgBanner', 'imgLogo'], 'string', 'max' => 255],
            [['imgBanner', 'imgLogo'], 'match', 'pattern' => "^\.(?:jpe?g|png)$^", 'message' => 'Formato de imagem inválido'],
            [['codigoDesconto'], 'string', 'max' => 10]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'designacaoSocial' => 'Designacao Social',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'nif' => 'Nif',
            'morada' => 'Morada',
            'codPostal' => 'Cod Postal',
            'localidade' => 'Localidade',
            'capitalSocial' => 'Capital Social',
            'imgBanner' => 'Img Banner',
            'imgLogo' => 'Img Logo',
            'codigoDesconto' => 'Codigo Desconto',
            'valorDesconto' => 'Valor Desconto'
        ];
    }

    /**
     * Gets query for [[Lojas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojas()
    {
        return $this->hasMany(Loja::class, ['idEmpresa' => 'id']);
    }
}