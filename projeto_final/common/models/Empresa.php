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
 * @property string $favIcon
 * @property string|null $codigoDesconto
 * @property int|null $valorDesconto
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
			[['designacaoSocial', 'email', 'telefone', 'nif', 'morada', 'codPostal', 'localidade', 'capitalSocial'], 'required'],
			[['capitalSocial'], 'integer'],
			[['designacaoSocial', 'email', 'morada', 'localidade'], 'string', 'max' => 45],
			[['imgBanner', 'imgLogo', 'favIcon'], 'string', 'max' => 255],
			[['imgBanner', 'imgLogo', 'favIcon'], 'match', 'pattern' => "^\.(?:jpe?g|png)$^", 'message' => 'Formato de imagem inválido'],
			[['nif', 'codPostal', 'telefone'], 'trim'],
			['codPostal', 'match', 'pattern' => '^\d{4}-\d{3}?$^', 'message' => 'Código de Postal Inválido'],
			['telefone', 'match', 'pattern' => '^\d{9}?$^', 'message' => 'número de telefone inválido'],
			['telefone', 'string', 'max' => 9, 'message' => 'número de telefone com mais de 9 digitos'],
			['nif', 'match', 'pattern' => '^\d{9}?$^', 'message' => 'NIF Inválido'],
			['nif', 'string', 'max' => 9, 'message' => 'NIF com mais de 9 digitos'],
			[['codigoDesconto'], 'string', 'max' => 10, 'message' => 'Código de desconto não pode ter mais de 10 caracteres'],
			[['codigoDesconto'], 'string', 'min' => 3, 'message' => 'Código de desconto tem de ter no minimo 3 caracteres'],
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
			'favIcon' => 'Fav Icon',
			'codigoDesconto' => 'Codigo Desconto',
			'valorDesconto' => 'Valor Desconto',
		];
	}

	/**
	 * Gets query for [[Lojas]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getLojas()
	{
		return $this->hasMany(Loja::class, ['id_Empresa' => 'id']);
	}
}
