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
    public $nombre_com;
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
            [['ci_pol', 'nombre_uni', 'nombre_car', 'nombre_com', 'paterno_pol', 'materno_pol', 'nombre1_pol', 'nombre2_pol'], 'safe'],
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
                ->join('LEFT OUTER JOIN', 'unidad', 'cargo.id_unidad_car = unidad.id_unidad')
                ->join('LEFT OUTER JOIN', 'comando', 'unidad.id_comando_uni= comando.id_comando')
                ;
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['ci_pol'] = [
            'asc' => ['policia.ci_pol' => SORT_ASC], 
            'desc' => ['policia.ci_pol' => SORT_DESC]
            ];
        $dataProvider->sort->attributes['paterno_pol'] = [
            'asc' => ['policia.paterno_pol' => SORT_ASC], 
            'desc' => ['policia.paterno_pol' => SORT_DESC]
            ];
        $dataProvider->sort->attributes['materno_pol'] = [
            'asc' => ['policia.materno_pol' => SORT_ASC], 
            'desc' => ['policia.materno_pol' => SORT_DESC]
            ];
        $dataProvider->sort->attributes['nombre1_pol'] = [
            'asc' => ['policia.nombre1_pol' => SORT_ASC], 
            'desc' => ['policia.nombre1_pol' => SORT_DESC]
            ];
        $dataProvider->sort->attributes['nombre2_pol'] = [
            'asc' => ['policia.nombre2_pol' => SORT_ASC], 
            'desc' => ['policia.nombre2_pol' => SORT_DESC]
            ];
        $dataProvider->sort->attributes['nombre_car'] = [
            'asc' => ['cargo.nombre_car' => SORT_ASC], 
            'desc' => ['cargo.nombre_car' => SORT_DESC]
            ];
        
        $dataProvider->sort->attributes['codigo_uni'] = [
            'asc' => ['unidad.codigo_uni' => SORT_ASC], 
            'desc' => ['unidad.codigo_uni' => SORT_DESC]
            ];
        $dataProvider->sort->attributes['nombre_uni'] = [
            'asc' => ['unidad.nombre_uni' => SORT_ASC], 
            'desc' => ['unidad.nombre_uni' => SORT_DESC]
            ];
        $dataProvider->sort->attributes['nombre_com'] = [
            'asc' => ['comando.nombre_com' => SORT_ASC], 
            'desc' => ['comando.nombre_com' => SORT_DESC]
            ];
        
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
                ->andFilterWhere(['like', 'unidad.codigo_uni', $this->codigo_uni])
                ->andFilterWhere(['like', 'unidad.nombre_uni', $this->nombre_uni])
                ->andFilterWhere(['like', 'comando.nombre_com', $this->nombre_com])
                ->andFilterWhere(['like', 'tipo_cam', $this->tipo_cam])
                ->andFilterWhere(['like', 'estado_cam', $this->estado_cam])
                ;

        return $dataProvider;
    }
}
