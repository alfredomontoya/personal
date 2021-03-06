<?php

namespace app;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Unidad;

/**
 * modelsUnidadSearch represents the model behind the search form of `app\models\Unidad`.
 */
class modelsUnidadSearch extends Unidad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_unidad'], 'integer'],
            [['nombre_uni', 'estado_uni'], 'safe'],
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
        $query = Unidad::find();

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
            'id_unidad' => $this->id_unidad,
        ]);

        $query->andFilterWhere(['like', 'nombre_uni', $this->nombre_uni])
            ->andFilterWhere(['like', 'estado_uni', $this->estado_uni]);

        return $dataProvider;
    }
}
