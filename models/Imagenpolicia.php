<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagenpolicia".
 *
 * @property int $id_imagenpolicia
 * @property int $id_policia_imp
 * @property string $fecha_imp
 * @property string $estado_imp
 */
class Imagenpolicia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagenpolicia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_policia_imp', 'fecha_imp', 'estado_imp'], 'required'],
            [['id_policia_imp'], 'integer'],
            [['fecha_imp'], 'safe'],
            [['namefile_imp'], 'string', 'max' => 512],
            [['estado_imp'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_imagenpolicia' => 'Id Imagenpolicia',
            'id_policia_imp' => 'Id Policia Imp',
            'namefile_imp' => 'Nombre archivo Imp',
            'fecha_imp' => 'Fecha Imp',
            'estado_imp' => 'Estado Imp',
        ];
    }
}
