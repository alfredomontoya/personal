<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departamento;

/**
 * DepartamentoSearch represents the model behind the search form of `app\models\Departamento`.
 */
class DepartamentoSearch extends Departamento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_departamento'], 'integer'],
            [['nombre_dep', 'sigla1_dep', 'sigla2_dep', 'estado_dep'], 'safe'],
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
        $query = Departamento::find();

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
            'id_departamento' => $this->id_departamento,
        ]);

        $query->andFilterWhere(['like', 'nombre_dep', $this->nombre_dep])
            ->andFilterWhere(['like', 'sigla1_dep', $this->sigla1_dep])
            ->andFilterWhere(['like', 'sigla2_dep', $this->sigla2_dep])
            ->andFilterWhere(['like', 'estado_dep', $this->estado_dep]);

        return $dataProvider;
    }
}
