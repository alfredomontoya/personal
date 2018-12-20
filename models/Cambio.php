<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cambio".
 *
 * @property int $id_cambio
 * @property int $id_policia_cam
 * @property int $id_cargo_cam
 * @property string $glosa_cam
 * @property string $fdesignacion_cam
 * @property string $fecha_cam
 * @property string $estado_cam
 */
class Cambio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cambio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_policia_cam', 'id_cargo_cam', 'fecha_cam', 'estado_cam', 'tipo_cam'], 'required'],
            [['id_policia_cam', 'id_cargo_cam'], 'integer'],
            [['fdesignacion_cam', 'fecha_cam'], 'safe'],
            [['glosa_cam'], 'string', 'max' => 512],
            [['estado_cam'], 'string', 'max' => 2],
            [['id_cargo_cam'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['id_cargo_cam' => 'id_cargo']],
            [['id_policia_cam'], 'exist', 'skipOnError' => true, 'targetClass' => Policia::className(), 'targetAttribute' => ['id_policia_cam' => 'id_policia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cambio' => 'Id Cambio',
            'id_policia_cam' => 'Id Policia Cam',
            'id_cargo_cam' => 'Id Cargo Cam',
            'glosa_cam' => 'Glosa Cam',
            'tipo_cam' => 'Tipo',
            'fdesignacion_cam' => 'Fdesignacion Cam',
            'fecha_cam' => 'Fecha Cam',
            'estado_cam' => 'Estado Cam',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getCargoCam()
    {
        return $this->hasOne(Cargo::className(), ['id_cargo' => 'id_cargo_cam']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getPoliciaCam()
    {
        return $this->hasOne(Policia::className(), ['id_policia' => 'id_policia_cam']);
    }
    
}
