<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form of `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente'], 'integer'],
            [['nitci_cli', 'nombre_cli', 'direccion_cli', 'telefono_cli', 'estado_cli', 'correo_cli'], 'safe'],
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
        $query = Cliente::find();

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
            'id_cliente' => $this->id_cliente,
        ]);

        $query->andFilterWhere(['like', 'nitci_cli', $this->nitci_cli])
            ->andFilterWhere(['like', 'nombre_cli', $this->nombre_cli])
            ->andFilterWhere(['like', 'direccion_cli', $this->direccion_cli])
            ->andFilterWhere(['like', 'telefono_cli', $this->telefono_cli])
            ->andFilterWhere(['like', 'estado_cli', $this->estado_cli])
            ->andFilterWhere(['like', 'correo_cli', $this->correo_cli]);

        return $dataProvider;
    }
}
