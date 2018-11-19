<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pais".
 *
 * @property int $id_pais
 * @property string $codigoalf2_pais
 * @property string $codigoalf3_pais
 * @property string $codigonum_pais
 * @property string $nombre_pais
 * @property string $descripcion_pais
 * @property string $estado_pais
 */
class Pais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigoalf2_pais', 'codigoalf3_pais', 'codigonum_pais', 'nombre_pais', 'descripcion_pais', 'estado_pais'], 'required'],
            [['codigoalf2_pais', 'estado_pais'], 'string', 'max' => 2],
            [['codigoalf3_pais'], 'string', 'max' => 4],
            [['codigonum_pais'], 'string', 'max' => 8],
            [['nombre_pais', 'descripcion_pais'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pais' => 'Id Pais',
            'codigoalf2_pais' => 'Codigoalf2 Pais',
            'codigoalf3_pais' => 'Codigoalf3 Pais',
            'codigonum_pais' => 'Codigonum Pais',
            'nombre_pais' => 'Nombre Pais',
            'descripcion_pais' => 'Descripcion Pais',
            'estado_pais' => 'Estado Pais',
        ];
    }
}
