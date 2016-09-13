<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupos_toros".
 *
 * @property integer $cod
 * @property string $descripcion
 */
class GruposToros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupos_toros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'unique'],
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
        ];
    }

     public function getCount(){
        return Bovinos::find()->where(['codgrupo'=>$this->cod]) ->count();
     }
}
