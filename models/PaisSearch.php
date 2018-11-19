<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pais;

/**
 * PaisSearch represents the model behind the search form of `app\models\Pais`.
 */
class PaisSearch extends Pais
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pais'], 'integer'],
            [['codigoalf2_pais', 'codigoalf3_pais', 'codigonum_pais', 'nombre_pais', 'descripcion_pais', 'estado_pais'], 'safe'],
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
        $query = Pais::find();

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
            'id_pais' => $this->id_pais,
        ]);

        $query->andFilterWhere(['like', 'codigoalf2_pais', $this->codigoalf2_pais])
            ->andFilterWhere(['like', 'codigoalf3_pais', $this->codigoalf3_pais])
            ->andFilterWhere(['like', 'codigonum_pais', $this->codigonum_pais])
            ->andFilterWhere(['like', 'nombre_pais', $this->nombre_pais])
            ->andFilterWhere(['like', 'descripcion_pais', $this->descripcion_pais])
            ->andFilterWhere(['like', 'estado_pais', $this->estado_pais]);

        return $dataProvider;
    }
}
