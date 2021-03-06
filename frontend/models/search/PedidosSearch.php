<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pedidos;

/**
 * PedidosSearch represents the model behind the search form of `frontend\models\Pedidos`.
 */
class PedidosSearch extends Pedidos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPedido', 'idCliente', 'idEncargado', 'idMensajero', 'idRepartidor', 'idEstado'], 'integer'],
            [['rireccion'], 'safe'],
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
        $query = Pedidos::find();

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
            'idPedido' => $this->idPedido,
            'idCliente' => $this->idCliente,
            'idEncargado' => $this->idEncargado,
            'idMensajero' => $this->idMensajero,
            'idRepartidor' => $this->idRepartidor,
            'idEstado' => $this->idEstado,
        ]);

        $query->andFilterWhere(['like', 'rireccion', $this->rireccion]);

        return $dataProvider;
    }
}
