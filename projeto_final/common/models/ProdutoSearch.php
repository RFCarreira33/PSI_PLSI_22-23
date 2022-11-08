<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Produto;

/**
 * ProdutoSearch represents the model behind the search form of `common\models\Produto`.
 */
class ProdutoSearch extends Produto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_Categoria', 'idIva', 'Ativo'], 'integer'],
            [['marca', 'descricao', 'imagem', 'referencia', 'nome'], 'safe'],
            [['preco'], 'number'],
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
        $query = Produto::find();

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
            'id' => $this->id,
            'id_Categoria' => $this->id_Categoria,
            'idIva' => $this->idIva,
            'preco' => $this->preco,
            'Ativo' => $this->Ativo,
        ]);

        $query->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'imagem', $this->imagem])
            ->andFilterWhere(['like', 'referencia', $this->referencia])
            ->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }
}
