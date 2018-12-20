<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Imagenes;

/**
 * ImagenesSearch represents the model behind the search form of `app\models\Imagenes`.
 */
class ImagenesSearch extends Imagenes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_imagen'], 'integer'],
            [['nombre_im', 'fecha_im', 'estado_im'], 'safe'],
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
        $query = Imagenes::find();

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
            'id_imagen' => $this->id_imagen,
            'fecha_im' => $this->fecha_im,
        ]);

        $query->andFilterWhere(['like', 'nombre_im', $this->nombre_im])
            ->andFilterWhere(['like', 'estado_im', $this->estado_im]);

        return $dataProvider;
    }
}
