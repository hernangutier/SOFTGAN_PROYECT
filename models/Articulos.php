<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articulos".
 *
 * @property integer $cod
 * @property string $codigo
 * @property string $descripcion
 * @property integer $codlin
 */
class Articulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo','descripcion'], 'required'],
            [['codigo'], 'string', 'max' => 20],
            [['descripcion'], 'string', 'max' => 200],
            [['codigo','descripcion'], 'unique'],
           
            [['codlin'], 'exist', 'skipOnError' => true, 'targetClass' => Lineas::className(), 'targetAttribute' => ['codlin' => 'cod']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codigo' => 'Referencia',
            'descripcion' => 'Descripción',
              'codlin' => 'lineas',

        ];
    }

    

/**
     * @return \yii\db\ActiveQuery
     */
    public function getCodlin0()
    {
        return $this->hasOne(Lineas::className(), ['cod' => 'codlin']);
    }

}
