<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Dados;

/**
 * DadosSearch represents the model behind the search form of `common\models\Dados`.
 */
class DadosSearch extends Dados
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser'], 'integer'],
            [['nome', 'telefone', 'nif', 'morada', 'codPostal'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Dados::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idUser' => $this->idUser,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'telefone', $this->telefone])
            ->andFilterWhere(['like', 'nif', $this->nif])
            ->andFilterWhere(['like', 'morada', $this->morada])
            ->andFilterWhere(['like', 'codPostal', $this->codPostal]);

        return $dataProvider;
    }
}
