<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detallegrado;

/**
 * DetallegradoSearch represents the model behind the search form of `app\models\Detallegrado`.
 */
class DetallegradoSearch extends Detallegrado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_detallegrado', 'id_policia_dg', 'id_grado_dg'], 'integer'],
            [['glosa_dg', 'fechaascenso_dg', 'fecha_dg', 'estado_dg'], 'safe'],
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
        $query = Detallegrado::find();

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
            'id_detallegrado' => $this->id_detallegrado,
            'id_policia_dg' => $this->id_policia_dg,
            'gradoDg.descripcion_gra' => $this->id_grado_dg,
            'fechaascenso_dg' => $this->fechaascenso_dg,
            'fecha_dg' => $this->fecha_dg,
        ]);

        $query->andFilterWhere(['like', 'glosa_dg', $this->glosa_dg])
            ->andFilterWhere(['like', 'estado_dg', $this->estado_dg]);

        return $dataProvider;
    }
}
