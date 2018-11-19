<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_clase_pro', 'stock_pro', 'stockmax_pro', 'stockmin_pro'], 'integer'],
            [['codigo_pro', 'descripcion_pro', 'foto_pro', 'fecha_pro', 'estado_pro'], 'safe'],
            [['precio_pro'], 'number'],
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
        $query = Producto::find();

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
            'id_producto' => $this->id_producto,
            'id_clase_pro' => $this->id_clase_pro,
            'precio_pro' => $this->precio_pro,
            'stock_pro' => $this->stock_pro,
            'stockmax_pro' => $this->stockmax_pro,
            'stockmin_pro' => $this->stockmin_pro,
            'fecha_pro' => $this->fecha_pro,
        ]);

        $query->andFilterWhere(['like', 'codigo_pro', $this->codigo_pro])
            ->andFilterWhere(['like', 'descripcion_pro', $this->descripcion_pro])
            ->andFilterWhere(['like', 'foto_pro', $this->foto_pro])
            ->andFilterWhere(['like', 'estado_pro', $this->estado_pro]);

        return $dataProvider;
    }
}
