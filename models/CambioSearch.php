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
    
    public $codigo_uni;
    public $nombre_uni;
    public $nombre_car;
    public $paterno_pol;
    public $materno_pol;
    public $nombre1_pol;
    public $nombre2_pol;
    public $ci_pol;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cambio', 'id_policia_cam', 'id_cargo_cam'], 'integer'],
            [['tipo_cam', 'glosa_cam', 'fdesignacion_cam', 'fecha_cam', 'estado_cam'], 'safe'],
            [['ci_pol', 'nombre_uni', 'nombre_car', 'paterno_pol', 'materno_pol', 'nombre1_pol', 'nombre2_pol'], 'safe'],
            [['codigo_uni',], 'safe'],
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
        
        $query
                ->join('LEFT OUTER JOIN', 'policia', 'cambio.id_policia_cam = policia.id_policia')
                ->join('LEFT OUTER JOIN', 'cargo', 'cambio.id_cargo_cam = cargo.id_cargo')
                ->join('LEFT OUTER JOIN', 'unidad', 'cargo.id_unidad_car = unidad.id_unidad');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

/*
        $dataProvider->sort->attributes['policia'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc'   => ['policiaCam.ci_pol' => SORT_ASC],
            'desc'  => ['policiaCam.ci_pol' => SORT_DESC],
        ];
        */
        
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
            'unidad.codigo_uni' => $this->codigo_uni,
        ]);

        $query->andFilterWhere(['like', 'glosa_cam', $this->glosa_cam])
                ->andFilterWhere(['like', 'policia.ci_pol', $this->ci_pol])
                ->andFilterWhere(['like', 'policia.paterno_pol', $this->paterno_pol])
                ->andFilterWhere(['like', 'policia.materno_pol', $this->materno_pol])
                ->andFilterWhere(['like', 'policia.nombre1_pol', $this->nombre1_pol])
                ->andFilterWhere(['like', 'policia.nombre2_pol', $this->nombre2_pol])
                ->andFilterWhere(['like', 'cargo.nombre_car', $this->nombre_car])
                ->andFilterWhere(['like', 'unidad.nombre_uni', $this->nombre_uni])
                ->andFilterWhere(['like', 'estado_cam', $this->estado_cam]);

        return $dataProvider;
    }
}
