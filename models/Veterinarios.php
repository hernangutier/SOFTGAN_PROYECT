<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veterinarios".
 *
 * @property integer $cod
 * @property string $cedula
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 *
 * @property Servicios[] $servicios
 */
class Veterinarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'veterinarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'nombre',], 'required'],
            [['cedula'], 'string', 'max' => 25],
            [['nombre'], 'string', 'max' => 150],
            [['direccion'], 'string', 'max' => 400],
            [['telefono'], 'string', 'max' => 70],
            [['email'], 'string', 'max' => 100],
            [['cedula'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'cedula' => 'Cedula',
            'nombre' => 'Nombre',
            'direccion' => 'Dirección',
            'telefono' => 'Telefono',
            'email' => 'e-mail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicios()
    {
        return $this->hasMany(Servicios::className(), ['codvet' => 'cod']);
    }
}
