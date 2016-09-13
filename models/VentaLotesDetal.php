<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta_lotes_detal".
 *
 * @property integer $cod
 * @property integer $codbov
 * @property integer $codventa
 *
 * @property Bovinos $codbov0
 * @property VentasLotes $codventa0
 */
class VentaLotesDetal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venta_lotes_detal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codbov', 'codventa'], 'integer'],
            [['codventa'], 'required'],
            [['codbov'], 'exist', 'skipOnError' => true, 'targetClass' => Bovinos::className(), 'targetAttribute' => ['codbov' => 'cod']],
            [['codventa'], 'exist', 'skipOnError' => true, 'targetClass' => VentasLotes::className(), 'targetAttribute' => ['codventa' => 'cod']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codbov' => 'Codbov',
            'codventa' => 'Codventa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodbov0()
    {
        return $this->hasOne(Bovinos::className(), ['cod' => 'codbov']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodventa0()
    {
        return $this->hasOne(VentasLotes::className(), ['cod' => 'codventa']);
    }
}
