<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalleformulario".
 *
 * @property int $id_detalleformulario
 * @property int $id_tramite_df
 * @property int $id_formulario_df
 * @property string $fecha_df
 * @property string $estado_df
 *
 * @property Tramite $tramiteDf
 */
class Detalleformulario extends \yii\db\ActiveRecord
{
    /**
     * these are flags that are used by the form to dictate how the loop will handle each item
     */
    const UPDATE_TYPE_CREATE = 'create';
    const UPDATE_TYPE_UPDATE = 'update';
    const UPDATE_TYPE_DELETE = 'delete';

    const SCENARIO_BATCH_UPDATE = 'batchUpdate';


    private $_updateType;

    //public $disabled;
    
     public function getUpdateType()
    {
        if (empty($this->_updateType)) {
            if ($this->isNewRecord) {
                $this->_updateType = self::UPDATE_TYPE_CREATE;
            } else {
                $this->_updateType = self::UPDATE_TYPE_UPDATE;
            }
        }

        return $this->_updateType;
    }

    public function setUpdateType($value)
    {
        $this->_updateType = $value;
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalleformulario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['updateType', 'required', 'on' => self::SCENARIO_BATCH_UPDATE],
            ['updateType',
                'in',
                'range' => [self::UPDATE_TYPE_CREATE, self::UPDATE_TYPE_UPDATE, self::UPDATE_TYPE_DELETE],
                'on' => self::SCENARIO_BATCH_UPDATE
            ],
            [['id_tramite_df', 'id_formulario_df', 'estado_df', 'fecha_df'], 'required'],
            [['id_tramite_df', 'id_formulario_df'], 'integer'],
            ['id_tramite_df', 'required', 'except' => self::SCENARIO_BATCH_UPDATE],
            ['id_formulario_df', 'required', 'except' => self::SCENARIO_BATCH_UPDATE],
            [['fecha_df'], 'safe'],
            [['estado_df'], 'string', 'max' => 2],
            [['id_tramite_df'], 'exist', 'skipOnError' => true, 'targetClass' => Tramite::className(), 'targetAttribute' => ['id_tramite_df' => 'id_tramite']],
            [['id_formulario_df'], 'exist', 'skipOnError' => true, 'targetClass' => Formulario::className(), 'targetAttribute' => ['id_formulario_df' => 'id_formulario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detalleformulario' => 'Id Detalleformulario',
            'id_tramite_df' => 'Tramite',
            'id_formulario_df' => 'Formulario',
            'fecha_df' => 'Fecha',
            'estado_df' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTramiteDf()
    {
        return $this->hasOne(Tramite::className(), ['id_tramite' => 'id_tramite_df']);
    }
    
    public function getFormularioDf()
    {
        return $this->hasOne(Formulario::className(), ['id_formulario' => 'id_formulario_df']);
    }
}
