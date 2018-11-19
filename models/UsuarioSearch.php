<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form of `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'activate_us'], 'integer'],
            [['ci_us', 'nombre_us', 'direccion_us', 'telefono_us', 'username_us', 'email_us', 'password_us', 'authKey_us', 'accessToken_us'], 'safe'],
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
        $query = Usuario::find();

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
            'id_usuario' => $this->id_usuario,
            'activate_us' => $this->activate_us,
        ]);

        $query->andFilterWhere(['like', 'ci_us', $this->ci_us])
            ->andFilterWhere(['like', 'nombre_us', $this->nombre_us])
            ->andFilterWhere(['like', 'direccion_us', $this->direccion_us])
            ->andFilterWhere(['like', 'telefono_us', $this->telefono_us])
            ->andFilterWhere(['like', 'username_us', $this->username_us])
            ->andFilterWhere(['like', 'email_us', $this->email_us])
            ->andFilterWhere(['like', 'password_us', $this->password_us])
            ->andFilterWhere(['like', 'authKey_us', $this->authKey_us])
            ->andFilterWhere(['like', 'accessToken_us', $this->accessToken_us]);

        return $dataProvider;
    }
}
