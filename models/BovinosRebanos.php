<?php

namespace app\models;

use Yii;
use app\models\Bovinos;

/**
 * This is the model class for table "bovinos_rebanos".
 *
 * @property integer $cod
 * @property string $descripcion
 * @property string $sexo
 * @property integer $codgan
 *
 
 */
class BovinosRebanos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bovinos_rebanos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['sexo'], 'string'],
            [['codgan'], 'integer'],
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
            'sexo' => 'Sexo al Que Aplica',
            'codgan' => 'Tipo de Ganaderia al que Aplica',
        ];
    }

    public function getTipo(){
        if ($this->codgan==0) return 'BOVINOS CARNE';
        if ($this->codgan==1) return 'BOVINOS LECHE';
        if ($this->codgan==2) return 'AMBOS TIPOS';
    }

    public function getCount(){
        return Bovinos::find()->where(['codrebano'=>$this->cod])->count();
    }
}
