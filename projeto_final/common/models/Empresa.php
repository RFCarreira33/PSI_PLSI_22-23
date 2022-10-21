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
 * @property string $imgBackground
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
            [['designacaoSocial', 'email', 'telefone', 'nif', 'morada', 'codPostal', 'localidade', 'capitalSocial', 'imgBanner', 'imgLogo', 'imgBackground'], 'required'],
            [['capitalSocial'], 'integer'],
            [['designacaoSocial', 'email', 'morada', 'localidade'], 'string', 'max' => 45],
            [['telefone', 'nif', 'codPostal'], 'string', 'max' => 9],
            [['imgBanner', 'imgLogo', 'imgBackground'], 'string', 'max' => 255],
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
            'imgBackground' => 'Img Background',
        ];
    }
}
