<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class TipoGanaderia extends Model
{
    public  $id;
    public $descripcion;





    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id del Peso',
            'descripcion' => 'Descripcion',

        ];
    }

    //--- para casos incluyentes
    public static function getTipos(){
        return [
                ['id'=>'0','descripcion'=>'BOVINOS CRIA'],
                ['id'=>'1','descripcion'=>'BOVINOS LECHE'],
                ['id'=>'2','descripcion'=>'AMBOS TIPOS'],
            ];
    }

    //-------- Para Casos Excluyentes -----
    public static function getTiposExclude(){
        return [
                ['id'=>'0','descripcion'=>'BOVINOS CRIA'],
                ['id'=>'1','descripcion'=>'BOVINOS LECHE'],

            ];
    }

    public function getTipoValue(){
        if ($this->id==0) return 'BOVINOS CRIA';
        if ($this->id==1) return 'BOVINOS LECHE';
        if ($this->id==2) return 'AMBOS TIPOS';
    }



}
