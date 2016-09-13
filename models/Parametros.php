<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parametros".
 *
 * @property integer $cod
 * @property string $valor_carne
 * @property string $valor_leche
 */
class Parametros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parametros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor_carne', 'valor_leche'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'valor_carne' => 'Valor Carne',
            'valor_leche' => 'Valor Leche',
        ];
    }
}
