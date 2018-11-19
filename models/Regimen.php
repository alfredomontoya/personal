<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regimen".
 *
 * @property int $id_regimen
 * @property string $nombre_reg
 * @property string $sigla_reg
 * @property string $estado_reg
 */
class Regimen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regimen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_reg', 'sigla_reg', 'estado_reg'], 'required'],
            [['nombre_reg'], 'string', 'max' => 64],
            [['sigla_reg'], 'string', 'max' => 4],
            [['estado_reg'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_regimen' => 'Id Regimen',
            'nombre_reg' => 'Nombre Reg',
            'sigla_reg' => 'Sigla Reg',
            'estado_reg' => 'Estado Reg',
        ];
    }
}
