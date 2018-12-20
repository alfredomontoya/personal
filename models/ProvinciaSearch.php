<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Provincia;

/**
 * ProvinciaSearch represents the model behind the search form of `app\models\Provincia`.
 */
class ProvinciaSearch extends Provincia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_provincia', 'id_departamento_prov'], 'integer'],
            [['nombre_prov', 'estado_prov'], 'safe'],
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
        $query = Provincia::find();

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
            'id_provincia' => $this->id_provincia,
            'id_departamento_prov' => $this->id_departamento_prov,
        ]);

        $query->andFilterWhere(['like', 'nombre_prov', $this->nombre_prov])
            ->andFilterWhere(['like', 'estado_prov', $this->estado_prov]);

        return $dataProvider;
    }
}
