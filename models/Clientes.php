<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property integer $cod
 * @property string $ced
 * @property string $razon
 * @property string $direccion
 * @property string $telefono
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ced', 'razon'], 'required'],
            [['razon'], 'string'],
            [['ced', 'telefono'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 400],
            [['ced'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'ced' => 'Cedula  o Rif.',
            'razon' => 'Razon Social',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
        ];
    }
}
