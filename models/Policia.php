<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "policia".
 *
 * @property int $id_policia
 * @property string $escalafon_pol
 * @property string $expescalafon_pol
 * @property string $ci_pol
 * @property string $exp_pol
 * @property string $paterno_pol
 * @property string $materno_pol
 * @property string $esposo_pol
 * @property string $nombre1_pol
 * @property string $nombre2_pol
 * @property string $sexo_pol
 * @property string $fnacimiento_pol
 * @property string $dptonacimiento_pol
 * @property string $provnacimiento_pol
 * @property string $locanacimiento_pol
 * @property string $fincorporacion_pol
 * @property string $telefono_pol
 * @property string $telefonoref_pol
 * @property string $fpresentacion_pol
 * @property string $trabajosantacruz_pol
 * @property string $direccion_pol
 * @property string $estado_pol
 */
class Policia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'policia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['escalafon_pol', 'expescalafon_pol', 'ci_pol', 'exp_pol', 'paterno_pol', 'nombre1_pol', 'nombre2_pol', 'sexo_pol', 'fnacimiento_pol', 'estado_pol'], 'required'],
            [['fnacimiento_pol', 'fincorporacion_pol', 'fpresentacion_pol'], 'safe'],
            [['escalafon_pol', 'ci_pol', 'telefono_pol', 'telefonoref_pol'], 'string', 'max' => 16],
            [['expescalafon_pol', 'exp_pol', 'sexo_pol', 'trabajosantacruz_pol'], 'string', 'max' => 4],
            [['paterno_pol', 'materno_pol', 'esposo_pol', 'nombre1_pol', 'nombre2_pol'], 'string', 'max' => 32],
            [['dptonacimiento_pol', 'provnacimiento_pol', 'locanacimiento_pol'], 'string', 'max' => 128],
            [['direccion_pol'], 'string', 'max' => 256],
            [['estado_pol'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_policia' => 'Id Policia',
            'escalafon_pol' => 'Escalafon Pol',
            'expescalafon_pol' => 'Expescalafon Pol',
            'ci_pol' => 'Ci Pol',
            'exp_pol' => 'Exp Pol',
            'paterno_pol' => 'Paterno Pol',
            'materno_pol' => 'Materno Pol',
            'esposo_pol' => 'Esposo Pol',
            'nombre1_pol' => 'Nombre1 Pol',
            'nombre2_pol' => 'Nombre2 Pol',
            'sexo_pol' => 'Sexo Pol',
            'fnacimiento_pol' => 'Fnacimiento Pol',
            'dptonacimiento_pol' => 'Dptonacimiento Pol',
            'provnacimiento_pol' => 'Provnacimiento Pol',
            'locanacimiento_pol' => 'Locanacimiento Pol',
            'fincorporacion_pol' => 'Fincorporacion Pol',
            'telefono_pol' => 'Telefono Pol',
            'telefonoref_pol' => 'Telefonoref Pol',
            'fpresentacion_pol' => 'Fpresentacion Pol',
            'trabajosantacruz_pol' => 'Trabajosantacruz Pol',
            'direccion_pol' => 'Direccion Pol',
            'estado_pol' => 'Estado Pol',
        ];
    }
}
