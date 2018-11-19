<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grado".
 *
 * @property int $id_grado
 * @property string $codigo_gra
 * @property string $descripcion_gra
 * @property string $tipo_gra
 * @property string $estado_gra
 */
class Grado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_gra', 'descripcion_gra', 'tipo_gra', 'estado_gra'], 'required'],
            [['codigo_gra'], 'string', 'max' => 8],
            [['descripcion_gra'], 'string', 'max' => 32],
            [['tipo_gra'], 'string', 'max' => 4],
            [['estado_gra'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_grado' => 'Id Grado',
            'codigo_gra' => 'Codigo Gra',
            'descripcion_gra' => 'Descripcion Gra',
            'tipo_gra' => 'Tipo Gra',
            'estado_gra' => 'Estado Gra',
        ];
    }
}
