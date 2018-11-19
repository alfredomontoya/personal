<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property int $id_departamento
 * @property string $nombre_dep
 * @property string $sigla1_dep
 * @property string $sigla2_dep
 * @property string $estado_dep
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_dep', 'sigla1_dep', 'sigla2_dep', 'estado_dep'], 'required'],
            [['nombre_dep'], 'string', 'max' => 23],
            [['sigla1_dep', 'estado_dep'], 'string', 'max' => 2],
            [['sigla2_dep'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_departamento' => 'Id Departamento',
            'nombre_dep' => 'Nombre Dep',
            'sigla1_dep' => 'Sigla1 Dep',
            'sigla2_dep' => 'Sigla2 Dep',
            'estado_dep' => 'Estado Dep',
        ];
    }
}
