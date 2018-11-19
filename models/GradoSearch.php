<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Grado;

/**
 * GradoSearch represents the model behind the search form of `app\models\Grado`.
 */
class GradoSearch extends Grado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_grado'], 'integer'],
            [['codigo_gra', 'descripcion_gra', 'tipo_gra', 'estado_gra'], 'safe'],
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
        $query = Grado::find();

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
            'id_grado' => $this->id_grado,
        ]);

        $query->andFilterWhere(['like', 'codigo_gra', $this->codigo_gra])
            ->andFilterWhere(['like', 'descripcion_gra', $this->descripcion_gra])
            ->andFilterWhere(['like', 'tipo_gra', $this->tipo_gra])
            ->andFilterWhere(['like', 'estado_gra', $this->estado_gra]);

        return $dataProvider;
    }
}
