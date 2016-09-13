<?php

namespace app\models;


use Yii;
use app\models\TipoGanaderia;
use app\models\Bovinos;

/**
 * This is the model class for table "bovinos_razas".
 *
 * @property integer $cod
 * @property string $descripcion
 * @property integer $codgan
 *
 
 */
class BovinosRazas extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    
    

    public static function tableName()
    {
        return 'bovinos_razas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codgan'], 'integer'],
            [['descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'descripcion' => 'Denominacion de la Raza',
            'codgan' => 'Tipo de Ganaderia',
        ];
    }

    public function getTipo(){
        if ($this->codgan==0) return 'BOVINOS CARNE';
        if ($this->codgan==1) return 'BOVINOS LECHE';
        if ($this->codgan==2) return 'AMBOS TIPOS';
    }
    public function getCount(){
        return Bovinos::find()->where(['codraza'=>$this->cod])->count();
    }
}
