<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cargos}}".
 *
 * @property integer $cod
 * @property string $fecha
 * @property integer $coduser
 * @property integer $codprov
 * @property integer $ntrans
 * @property string $ffact
 * @property string $nfact
 * @property integer $tipo
 * @property integer $status
 *
 * @property CargosTipo $tipo0
 * @property Proveedores $codprov0
 * @property CargosDt[] $cargosDts
 */
class Cargos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cargos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'ffact'], 'safe'],
            [['coduser', 'codprov', 'ntrans', 'tipo', 'status'], 'integer'],
            [['nfact'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'fecha' => 'Fecha',
            'coduser' => 'Coduser',
            'codprov' => 'Codprov',
            'ntrans' => 'Ntrans',
            'ffact' => 'Ffact',
            'nfact' => 'Nfact',
            'tipo' => 'Tipo',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo0()
    {
        return $this->hasOne(CargosTipo::className(), ['cod' => 'tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodprov0()
    {
        return $this->hasOne(Proveedores::className(), ['cod' => 'codprov']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargosDts()
    {
        return $this->hasMany(CargosDt::className(), ['codcargo' => 'cod']);
    }
}
