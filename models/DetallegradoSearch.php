<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detallegrado;

/**
 * DetallegradoSearch represents the model behind the search form of `app\models\Detallegrado`.
 */
class DetallegradoSearch extends Detallegrado
{
    public $gradoDg;
    public $policiaDg;
    public $ci_pol;
    public $escalafon_pol;
    public $paterno_pol;
    public $materno_pol;
    public $nombre1_pol;
    public $nombre2_pol;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_detallegrado', 'id_policia_dg', 'id_grado_dg'], 'integer'],
            [['glosa_dg', 'fechaascenso_dg', 'fecha_dg', 'estado_dg'], 'safe'],
            [['gradoDg', 'ci_pol', 'escalafon_pol', 'paterno_pol', 'materno_pol', 'nombre1_pol', 'nombre2_pol'], 'safe'],
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
        $query = Detallegrado::find();
        
        $query->joinWith(['policiaDg']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        /*
        $dataProvider->sort->attributes['policiaDg'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['policiaDg.escalafon_dg' => SORT_ASC],
        'desc' => ['policiaDg.escalafon_dg' => SORT_DESC],
    ];*/

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id_detallegrado' => $this->id_detallegrado,
            'id_policia_dg' => $this->id_policia_dg,
            'gradoDg.descripcion_gra' => $this->id_grado_dg,
            'fechaascenso_dg' => $this->fechaascenso_dg,
            'fecha_dg' => $this->fecha_dg,
        ]);

        $query->andFilterWhere(['like', 'glosa_dg', $this->glosa_dg])
            ->andFilterWhere(['like', 'estado_dg', $this->estado_dg])
            ->andFilterWhere(['like', 'policia.ci_pol', $this->ci_pol])
            ->andFilterWhere(['like', 'policia.escalafon_pol', $this->escalafon_pol])
            ->andFilterWhere(['like', 'policia.paterno_pol', $this->paterno_pol])
            ->andFilterWhere(['like', 'policia.materno_pol', $this->materno_pol])
            ->andFilterWhere(['like', 'policia.nombre1_pol', $this->nombre1_pol])
            ->andFilterWhere(['like', 'policia.nombre2_pol', $this->nombre2_pol])
                ;

        return $dataProvider;
    }
}
