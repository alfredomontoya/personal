<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cargo;

/**
 * CargoSearch represents the model behind the search form of `app\models\Cargo`.
 */
class CargoSearch extends Cargo
{
    public $nombre_uni;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cargo', 'id_unidad_car'], 'integer'],
            [['nombre_car', 'estado_car'], 'safe'],
            [['nombre_uni', ], 'safe'],
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
        $query = Cargo::find();
        
        $query->joinWith('unidadCar');

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
            'id_cargo' => $this->id_cargo,
            'id_unidad_car' => $this->id_unidad_car,
        ]);

        $query->andFilterWhere(['like', 'nombre_car', $this->nombre_car])
            ->andFilterWhere(['like', 'estado_car', $this->estado_car])
            ->andFilterWhere(['like', 'unidad.nombre_uni', $this->nombre_uni])
                ;

        return $dataProvider;
    }
}
