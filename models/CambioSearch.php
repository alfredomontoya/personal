<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cambio;

/**
 * CambioSearch represents the model behind the search form of `app\models\Cambio`.
 */
class CambioSearch extends Cambio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cambio', 'id_policia_cam', 'id_cargo_cam'], 'integer'],
            [['glosa_cam', 'fdesignacion_cam', 'fecha_cam', 'estado_cam'], 'safe'],
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
        $query = Cambio::find();

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
            'id_cambio' => $this->id_cambio,
            'id_policia_cam' => $this->id_policia_cam,
            'id_cargo_cam' => $this->id_cargo_cam,
            'fdesignacion_cam' => $this->fdesignacion_cam,
            'fecha_cam' => $this->fecha_cam,
        ]);

        $query->andFilterWhere(['like', 'glosa_cam', $this->glosa_cam])
            ->andFilterWhere(['like', 'estado_cam', $this->estado_cam]);

        return $dataProvider;
    }
}
