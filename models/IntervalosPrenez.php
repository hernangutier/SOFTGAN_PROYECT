<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "intervalos_prenez".
 *
 * @property integer $cod
 * @property integer $vmax
 * @property integer $vmin
 * @property string $descripcion
 */
class IntervalosPrenez extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'intervalos_prenez';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vmax', 'vmin','descripcion'], 'required'],
            [['vmax', 'vmin'], 'integer'],
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
            'vmax' => 'Valor Maximo en Meses de Preñez',
            'vmin' => 'Valor Minimo en Meses de Preñez',
            'descripcion' => 'Descripcion',
        ];
    }


    public function getIntervalo(){
      return 'Entre ' . $this->vmin . ' a ' . $this->vmax . ' meses';
    }
}
