<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detalleformulario;

/**
 * DetalleformularioSearch represents the model behind the search form of `app\models\Detalleformulario`.
 */
class DetalleformularioSearch extends Detalleformulario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_detalleformulario', 'id_tramite_df', 'id_formulario_df'], 'integer'],
            [['fecha_df', 'estado_df'], 'safe'],
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
        $query = Detalleformulario::find();

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
            'id_detalleformulario' => $this->id_detalleformulario,
            'id_tramite_df' => $this->id_tramite_df,
            'id_formulario_df' => $this->id_formulario_df,
            'fecha_df' => $this->fecha_df,
        ]);

        $query
            ->andFilterWhere(['like', 'estado_df', $this->estado_df]);

        return $dataProvider;
    }
}
