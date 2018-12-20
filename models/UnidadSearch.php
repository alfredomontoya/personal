<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Unidad;

/**
 * UnidadSearch represents the model behind the search form of `app\models\Unidad`.
 */
class UnidadSearch extends Unidad
{
    public $nombre_com;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_unidad', 'id_comando_uni'], 'integer'],
            [['codigo_uni', 'nombre_uni', 'estado_uni'], 'safe'],
            [['nombre_com',], 'safe'],
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
        $query = Unidad::find();///->joinWith(['comandoUni']);

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
            'id_comando_uni' => $this->id_comando_uni,
        ]);

        $query->andFilterWhere(['like', 'codigo_uni', $this->codigo_uni])
            ->andFilterWhere(['like', 'nombre_uni', $this->nombre_uni])
            ->andFilterWhere(['like', 'estado_uni', $this->estado_uni])
            //->andFilterWhere(['like', 'comando.nombre_com', $this->nombre_com])
                ;

        return $dataProvider;
    }
}
