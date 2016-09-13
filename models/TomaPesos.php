<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**

 * LoginForm is the model behind the login form.
 */
class TomaPesos extends Model
{
    
public  $tpeso;
public  $ano;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['tpeso', 'ano'], 'required'],
            [['tpeso','ano'], 'integer'],
            
            
        ];
    }

    public function attributeLabels()
    {
        return [
            'tpeso' => 'Tipo de Peso a Ralizar',
            'ano' => 'Año de Pesaje',
            
        ];
    }
    

    
}
