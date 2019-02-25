<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comando;

/**
 * ComandoSearch represents the model behind the search form of `app\models\Comando`.
 */
class ComandoSearch extends Comando
{
    public $nombre_dep;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_comando', 'id_departamento_com'], 'integer'],
            [['codigo_com', 'nombre_com', 'fecha_com', 'estado_com'], 'safe'],
            [['nombre_dep',], 'safe'],
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
        $query = Comando::find();

        $query->join('LEFT OUTER JOIN', 'departamento', 'comando.id_departamento_com = departamento.id_departamento')
                ;
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['nombre_dep'] = [
            'asc' => ['departamento.nombre_dep' => SORT_ASC], 
            'desc' => ['departamento.nombre_dep' => SORT_DESC]
            ];
 

        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_comando' => $this->id_comando,
            'id_departamento_com' => $this->id_departamento_com,
            'fecha_com' => $this->fecha_com,
        ]);

        $query->andFilterWhere(['like', 'codigo_com', $this->codigo_com])
            ->andFilterWhere(['like', 'nombre_com', $this->nombre_com])
            ->andFilterWhere(['like', 'estado_com', $this->estado_com])
            ->andFilterWhere(['like', 'departamento.nombre_dep', $this->nombre_dep])
                ;

        return $dataProvider;
    }
}
