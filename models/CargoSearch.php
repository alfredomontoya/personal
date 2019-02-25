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
    public $nombre_com;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cargo', 'id_unidad_car'], 'integer'],
            [['nombre_car', 'estado_car'], 'safe'],
            [['nombre_uni', 'nombre_com', ], 'safe'],
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
        
        $query->join('LEFT OUTER JOIN', 'unidad', 'cargo.id_unidad_car = unidad.id_unidad')
                ->join('LEFT OUTER JOIN', 'comando', 'unidad.id_comando_uni = comando.id_comando')
                ;
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['nombre_uni'] = [
            'asc' => ['unidad.nombre_uni' => SORT_ASC], 
            'desc' => ['unidad.nombre_uni' => SORT_DESC]
            ];
        
        $dataProvider->sort->attributes['nombre_com'] = [
            'asc' => ['comando.nombre_com' => SORT_ASC], 
            'desc' => ['comando.nombre_com' => SORT_DESC]
            ];

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
            ->andFilterWhere(['like', 'comando.nombre_com', $this->nombre_com])
                ;

        return $dataProvider;
    }
}
