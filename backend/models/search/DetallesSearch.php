<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetallePedido;

/**
 * DetallesSearch represents the model behind the search form of `backend\models\DetallePedido`.
 */
class DetallesSearch extends DetallePedido
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDetallePedido', 'idPedido', 'idProducto', 'cantidad'], 'integer'],
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
        $query = DetallePedido::find();

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
            'idDetallePedido' => $this->idDetallePedido,
            'idPedido' => $this->idPedido,
            'idProducto' => $this->idProducto,
            'cantidad' => $this->cantidad,
        ]);

        return $dataProvider;
    }
}
