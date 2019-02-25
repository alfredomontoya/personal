<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comando".
 *
 * @property int $id_comando
 * @property int $id_departamento_com
 * @property string $codigo_com
 * @property string $nombre_com
 * @property string $fecha_com
 * @property string $estado_com
 */
class Comando extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comando';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_departamento_com', 'codigo_com', 'nombre_com', 'fecha_com', 'estado_com'], 'required'],
            [['id_departamento_com'], 'integer'],
            [['fecha_com'], 'safe'],
            [['codigo_com'], 'string', 'max' => 8],
            [['nombre_com'], 'string', 'max' => 64],
            [['estado_com'], 'string', 'max' => 2],
            [['id_departamento_com'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['id_departamento_com' => 'id_departamento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_comando' => 'Id Comando',
            'id_departamento_com' => 'Id Departamento Com',
            'codigo_com' => 'Codigo Com',
            'nombre_com' => 'Nombre Com',
            'fecha_com' => 'Fefcha Com',
            'estado_com' => 'Estado Com',
        ];
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getDepartamentoCom(){
        return $this->hasOne(Departamento::className(), ['id_departamento' => 'id_departamento_com']);
    }
    
    public function getUnidadesCom()
    {
        return $this->hasMany(Unidad::className(), ['id_comando_uni' => 'id_comando']);
    }
    
    public function getUnidadesCount()
    {
        return $this->hasMany(Unidad::className(), ['id_comando_uni' => 'id_comando'])->count('id_unidad');
    }
    
}
