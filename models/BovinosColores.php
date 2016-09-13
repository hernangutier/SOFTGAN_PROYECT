<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bovinos_colores".
 *
 * @property integer $cod
 * @property string $descripcion
 */
class BovinosColores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bovinos_colores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 200],
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
        ];
    }

    public function getCount(){
        return Bovinos::find()->where(['color'=>$this->cod])->count();
    }
}
