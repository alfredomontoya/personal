<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalledocumento".
 *
 * @property int $id_detalledocumento
 * @property int $id_tramite_dd
 * @property string $numero_dd
 * @property string $fechadocumento_dd
 * @property int $cantidad_dd
 * @property int $orignal_dd
 * @property int $copia_dd
 * @property int $legalizado_dd
 * @property int $fotocopia_dd
 * @property string $estado_dd
 * @property string $documento_dd
 *
 * @property Tramite $tramiteDd
 */
class Detalledocumento extends \yii\db\ActiveRecord
{
    /**
     * these are flags that are used by the form to dictate how the loop will handle each item
     */
    const UPDATE_TYPE_CREATE = 'create';
    const UPDATE_TYPE_UPDATE = 'update';
    const UPDATE_TYPE_DELETE = 'delete';

    const SCENARIO_BATCH_UPDATE = 'batchUpdate';


    private $_updateType;

    public $disabled;
    
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
        return 'detalledocumento';
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
            [['id_tramite_dd', 'numero_dd', 'fechadocumento_dd', 'cantidad_dd', 'orignal_dd', 'copia_dd', 'legalizado_dd', 'fotocopia_dd', 'estado_dd'], 'required'],
            [['id_tramite_dd', 'cantidad_dd', 'orignal_dd', 'copia_dd', 'legalizado_dd', 'fotocopia_dd'], 'integer'],
            ['id_tramite_dd', 'required', 'except' => self::SCENARIO_BATCH_UPDATE],
            [['fechadocumento_dd'], 'safe'],
            [['numero_dd'], 'string', 'max' => 32],
            [['estado_dd'], 'string', 'max' => 2],
            [['documento_dd'], 'string', 'max' => 128],
            [['id_tramite_dd'], 'exist', 'skipOnError' => true, 'targetClass' => Tramite::className(), 'targetAttribute' => ['id_tramite_dd' => 'id_tramite']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detalledocumento' => 'Id Detalledocumento',
            'id_tramite_dd' => 'Id Tramite Dd',
            'numero_dd' => 'Numero',
            'fechadocumento_dd' => 'Fecha',
            'cantidad_dd' => 'Cantidad',
            'orignal_dd' => 'Orignal',
            'copia_dd' => 'Copia',
            'legalizado_dd' => 'Legalizado',
            'fotocopia_dd' => 'Fotocopia',
            'estado_dd' => 'Estado Dd',
            'documento_dd' => 'Documento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTramiteDd()
    {
        return $this->hasOne(Tramite::className(), ['id_tramite' => 'id_tramite_dd']);
    }
}
