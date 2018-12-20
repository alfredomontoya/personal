<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidad".
 *
 * @property int $id_unidad
 * @property string $codigo_uni
 * @property string $nombre_uni
 * @property string $estado_uni
 * @property int $id_comando_uni
 */
class Unidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_uni', 'nombre_uni', 'estado_uni', 'id_comando_uni'], 'required'],
            [['id_comando_uni'], 'integer'],
            [['codigo_uni'], 'string', 'max' => 8],
            [['nombre_uni'], 'string', 'max' => 128],
            [['estado_uni'], 'string', 'max' => 2],
            [['codigo_uni'], 'unique'],
            [['id_comando_uni'], 'exist', 'skipOnError' => true, 'targetClass' => Comando::className(), 'targetAttribute' => ['id_comando_uni' => 'id_comando']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_unidad' => 'Id Unidad',
            'codigo_uni' => 'Codigo Uni',
            'nombre_uni' => 'Nombre Uni',
            'estado_uni' => 'Estado Uni',
            'id_comando_uni' => 'Id Comando Uni',
            'cargosCount' => Yii::t('app', 'Count Cargos'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getComandoUni(){
        return $this->hasOne(Comando::className(), ['id_comando' => 'id_comando_uni']);
    }
    
    public function getCargosUni()
    {
        return $this->hasMany(Cargo::className(), ['id_unidad_car' => 'id_unidad']);
    }

    public function getCargosCount()
    {
        return $this->hasMany(Cargo::className(), ['id_unidad_car' => 'id_unidad'])->sum('id_cargo');
    }
    
}
