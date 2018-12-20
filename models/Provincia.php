<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provincia".
 *
 * @property int $id_provincia
 * @property int $id_departamento_prov
 * @property string $nombre_prov
 * @property string $estado_prov
 */
class Provincia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provincia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_departamento_prov', 'nombre_prov', 'estado_prov'], 'required'],
            [['id_departamento_prov'], 'integer'],
            [['nombre_prov'], 'string', 'max' => 64],
            [['estado_prov'], 'string', 'max' => 2],
            [['nombre_prov', 'id_departamento_prov'], 'unique', 'targetAttribute' => ['nombre_prov', 'id_departamento_prov']],
            [['id_departamento_prov'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['id_departamento_prov' => 'id_departamento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_provincia' => 'Id Provincia',
            'id_departamento_prov' => 'Id Departamento Prov',
            'nombre_prov' => 'Nombre Prov',
            'estado_prov' => 'Estado Prov',
        ];
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentoProv()
    {
        return $this->hasOne(Departamento::className(), ['id_departamento' => 'id_departamento_prov']);
    }
}
