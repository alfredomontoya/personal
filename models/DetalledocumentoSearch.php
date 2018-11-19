<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detalledocumento;

/**
 * DetalledocumentoSearch represents the model behind the search form of `app\models\Detalledocumento`.
 */
class DetalledocumentoSearch extends Detalledocumento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_detalledocumento', 'id_tramite_dd', 'cantidad_dd', 'orignal_dd', 'copia_dd', 'legalizado_dd', 'fotocopia_dd'], 'integer'],
            [['numero_dd', 'fechadocumento_dd', 'estado_dd', 'documento_dd'], 'safe'],
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
        $query = Detalledocumento::find();

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
            'id_detalledocumento' => $this->id_detalledocumento,
            'id_tramite_dd' => $this->id_tramite_dd,
            'fechadocumento_dd' => $this->fechadocumento_dd,
            'cantidad_dd' => $this->cantidad_dd,
            'orignal_dd' => $this->orignal_dd,
            'copia_dd' => $this->copia_dd,
            'legalizado_dd' => $this->legalizado_dd,
            'fotocopia_dd' => $this->fotocopia_dd,
        ]);

        $query
            ->andFilterWhere(['like', 'numero_dd', $this->numero_dd])
            ->andFilterWhere(['like', 'estado_dd', $this->estado_dd])
            ->andFilterWhere(['like', 'documento_dd', $this->documento_dd]);

        return $dataProvider;
    }
}
