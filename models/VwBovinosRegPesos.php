<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vw_bovinos_reg_pesos".
 *
 * @property string $codbov
 * @property string $fnac
 * @property string $fecha_real
 * @property string $peso_registrado
 * @property string $ganancia_diaria
 * @property string $ganacia_mes
 * @property integer $tpeso
 */
class VwBovinosRegPesos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vw_bovinos_reg_pesos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fnac', 'fecha_real'], 'safe'],
            [['peso_registrado', 'ganancia_diaria', 'ganacia_mes'], 'number'],
            [['tpeso'], 'integer'],
            [['codbov'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codbov' => 'Codbov',
            'fnac' => 'Fnac',
            'fecha_real' => 'Fecha Real',
            'peso_registrado' => 'Peso Registrado',
            'ganancia_diaria' => 'Ganancia Diaria',
            'ganacia_mes' => 'Ganacia Mes',
            'tpeso' => 'Tpeso',
        ];
    }
}
