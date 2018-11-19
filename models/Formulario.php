<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formulario".
 *
 * @property int $id_formulario
 * @property string $nombre_form
 * @property string $sigla_form
 * @property string $estado_form
 */
class Formulario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formulario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_form', 'sigla_form', 'estado_form'], 'required'],
            [['nombre_form'], 'string', 'max' => 128],
            [['sigla_form'], 'string', 'max' => 8],
            [['estado_form'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_formulario' => 'Id Formulario',
            'nombre_form' => 'Nombre Formulario',
            'sigla_form' => 'Sigla',
            'estado_form' => 'Estado',
        ];
    }
}
