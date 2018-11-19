<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Policia;

/**
 * PoliciaSearch represents the model behind the search form of `app\models\Policia`.
 */
class PoliciaSearch extends Policia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_policia'], 'integer'],
            [['escalafon_pol', 'expescalafon_pol', 'ci_pol', 'exp_pol', 'paterno_pol', 'materno_pol', 'esposo_pol', 'nombre1_pol', 'nombre2_pol', 'sexo_pol', 'fnacimiento_pol', 'dptonacimiento_pol', 'provnacimiento_pol', 'locanacimiento_pol', 'fincorporacion_pol', 'telefono_pol', 'telefonoref_pol', 'fpresentacion_pol', 'trabajosantacruz_pol', 'direccion_pol', 'estado_pol'], 'safe'],
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
        $query = Policia::find();

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
            'id_policia' => $this->id_policia,
            'fnacimiento_pol' => $this->fnacimiento_pol,
            'fincorporacion_pol' => $this->fincorporacion_pol,
            'fpresentacion_pol' => $this->fpresentacion_pol,
        ]);

        $query->andFilterWhere(['like', 'escalafon_pol', $this->escalafon_pol])
            ->andFilterWhere(['like', 'expescalafon_pol', $this->expescalafon_pol])
            ->andFilterWhere(['like', 'ci_pol', $this->ci_pol])
            ->andFilterWhere(['like', 'exp_pol', $this->exp_pol])
            ->andFilterWhere(['like', 'paterno_pol', $this->paterno_pol])
            ->andFilterWhere(['like', 'materno_pol', $this->materno_pol])
            ->andFilterWhere(['like', 'esposo_pol', $this->esposo_pol])
            ->andFilterWhere(['like', 'nombre1_pol', $this->nombre1_pol])
            ->andFilterWhere(['like', 'nombre2_pol', $this->nombre2_pol])
            ->andFilterWhere(['like', 'sexo_pol', $this->sexo_pol])
            ->andFilterWhere(['like', 'dptonacimiento_pol', $this->dptonacimiento_pol])
            ->andFilterWhere(['like', 'provnacimiento_pol', $this->provnacimiento_pol])
            ->andFilterWhere(['like', 'locanacimiento_pol', $this->locanacimiento_pol])
            ->andFilterWhere(['like', 'telefono_pol', $this->telefono_pol])
            ->andFilterWhere(['like', 'telefonoref_pol', $this->telefonoref_pol])
            ->andFilterWhere(['like', 'trabajosantacruz_pol', $this->trabajosantacruz_pol])
            ->andFilterWhere(['like', 'direccion_pol', $this->direccion_pol])
            ->andFilterWhere(['like', 'estado_pol', $this->estado_pol]);

        return $dataProvider;
    }
}
