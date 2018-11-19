<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Formulario;

/**
 * FormularioSearch represents the model behind the search form of `app\models\Formulario`.
 */
class FormularioSearch extends Formulario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_formulario'], 'integer'],
            [['nombre_form', 'sigla_form', 'estado_form'], 'safe'],
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
        $query = Formulario::find();

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
            'id_formulario' => $this->id_formulario,
        ]);

        $query->andFilterWhere(['like', 'nombre_form', $this->nombre_form])
            ->andFilterWhere(['like', 'sigla_form', $this->sigla_form])
            ->andFilterWhere(['like', 'estado_form', $this->estado_form]);

        return $dataProvider;
    }
}
