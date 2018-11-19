<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tramite;

/**
 * TramiteSearch represents the model behind the search form of `app\models\Tramite`.
 */
class TramiteSearch extends Tramite
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tramite', 'id_usuario_tra', 'id_cliente_tra', 'cantidadbultos_tra'], 'integer'],
            [['numero_tra', 'aduana_tra', 'procedencia_tra', 'proveedor_tra', 'referencia_tra', 'regimen_tra', 'mercancia_tra', 'docembarque_tra', 'partidaarancelaria_tra', 'estado_tra', 'glosa_tra', 'fecha_tra'], 'safe'],
            [['peso_tra', 'tipocambio_tra', 'valorfob_tra', 'fletes_tra', 'seguro_tra', 'otrosgastos_tra', 'valorcifsus_tra', 'valorcifbs_tra'], 'number'],
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
        $query = Tramite::find();

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
            'id_tramite' => $this->id_tramite,
            'id_usuario_tra' => $this->id_usuario_tra,
            'id_cliente_tra' => $this->id_cliente_tra,
            'cantidadbultos_tra' => $this->cantidadbultos_tra,
            'peso_tra' => $this->peso_tra,
            'tipocambio_tra' => $this->tipocambio_tra,
            'valorfob_tra' => $this->valorfob_tra,
            'fletes_tra' => $this->fletes_tra,
            'seguro_tra' => $this->seguro_tra,
            'otrosgastos_tra' => $this->otrosgastos_tra,
            'valorcifsus_tra' => $this->valorcifsus_tra,
            'valorcifbs_tra' => $this->valorcifbs_tra,
            'fecha_tra' => $this->fecha_tra,
        ]);

        $query->andFilterWhere(['like', 'numero_tra', $this->numero_tra])
            ->andFilterWhere(['like', 'aduana_tra', $this->aduana_tra])
            ->andFilterWhere(['like', 'procedencia_tra', $this->procedencia_tra])
            ->andFilterWhere(['like', 'proveedor_tra', $this->proveedor_tra])
            ->andFilterWhere(['like', 'referencia_tra', $this->referencia_tra])
            ->andFilterWhere(['like', 'regimen_tra', $this->regimen_tra])
            ->andFilterWhere(['like', 'mercancia_tra', $this->mercancia_tra])
            ->andFilterWhere(['like', 'docembarque_tra', $this->docembarque_tra])
            ->andFilterWhere(['like', 'partidaarancelaria_tra', $this->partidaarancelaria_tra])
            ->andFilterWhere(['like', 'estado_tra', $this->estado_tra])
            ->andFilterWhere(['like', 'glosa_tra', $this->glosa_tra]);

        return $dataProvider;
    }
}
