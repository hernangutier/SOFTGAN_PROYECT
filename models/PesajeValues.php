<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesaje_values".
 *
 * @property integer $cod
 * @property string $descripcion
 * @property integer $edad
 * @property integer $tipo_pesaje
 * @property integer $max_dias
 *
 * @property RegistroPesos[] $registroPesos
 */
class PesajeValues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesaje_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['edad', 'tipo_pesaje', 'max_dias'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'descripcion' => 'Descripcion',
            'edad' => 'Tiempo',
            'tipo_pesaje' => 'Tipo Pesaje',
            'max_dias' => 'Maximo de Dias permitido para pesaje fuera de tiempo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistroPesos()
    {
        return $this->hasMany(RegistroPesos::className(), ['tpeso' => 'cod']);
    }

     public function getTiempo(){
        if ($this->tipo_pesaje==0) {
            return $this->edad. ' Dias';
        } else {
            if ($this->tipo_pesaje==1) {
                return $this->edad. ' Meses';
            } else {
                return $this->edad. ' Años';
            }    
        }
    }
}
