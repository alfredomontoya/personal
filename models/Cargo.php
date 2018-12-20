<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cargo".
 *
 * @property int $id_cargo
 * @property int $id_unidad_car
 * @property string $nombre_car
 * @property string $estado_car
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_unidad_car', 'nombre_car', 'estado_car'], 'required'],
            [['id_unidad_car'], 'integer'],
            [['nombre_car'], 'string', 'max' => 128],
            [['estado_car'], 'string', 'max' => 2],
            [['id_unidad_car'], 'exist', 'skipOnError' => true, 'targetClass' => Unidad::className(), 'targetAttribute' => ['id_unidad_car' => 'id_unidad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cargo' => 'Id Cargo',
            'id_unidad_car' => 'Id Unidad Car',
            'nombre_car' => 'Nombre Car',
            'estado_car' => 'Estado Car',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getUnidadCar()
    {
        return $this->hasOne(Unidad::className(), ['id_unidad' => 'id_unidad_car']);
    }
    
    
    
}
