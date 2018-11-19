<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receipt_detail".
 *
 * @property int $id
 * @property int $receipt_id
 * @property string $item_name
 * @property string $descripcion
 * @property int $opcion1
 * @property int $opcion2
 * @property int $opcion3
 * @property int $opcion4
 *
 * @property Receipt $receipt
 */
class ReceiptDetail extends \yii\db\ActiveRecord
{
    
    /**
     * these are flags that are used by the form to dictate how the loop will handle each item
     */
    const UPDATE_TYPE_CREATE = 'create';
    const UPDATE_TYPE_UPDATE = 'update';
    const UPDATE_TYPE_DELETE = 'delete';

    const SCENARIO_BATCH_UPDATE = 'batchUpdate';


    private $_updateType;
    
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
        return 'receipt_detail';
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
            ['receipt_id', 'required', 'except' => self::SCENARIO_BATCH_UPDATE],
            [['receipt_id', 'opcion1', 'opcion2', 'opcion3', 'opcion4'], 'integer'],
            [['item_name'], 'string', 'max' => 255],
            [['descripcion'], 'string', 'max' => 64],
            [['receipt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receipt::className(), 'targetAttribute' => ['receipt_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receipt_id' => 'Receipt ID',
            'item_name' => 'Item Name',
            'descripcion' => 'Descripcion',
            'opcion1' => 'Opcion1',
            'opcion2' => 'Opcion2',
            'opcion3' => 'Opcion3',
            'opcion4' => 'Opcion4',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceipt()
    {
        return $this->hasOne(Receipt::className(), ['id' => 'receipt_id']);
    }
}
