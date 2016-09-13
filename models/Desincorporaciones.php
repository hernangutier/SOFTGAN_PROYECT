<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "desincorporaciones".
 *
 * @property integer $cod
 * @property integer $codbov
 * @property string $fregistro
 * @property string $fecha
 * @property integer $peso
 * @property string $observaciones
 * @property integer $codcat
 * @property string $costo_carne
 * @property string $codtipo
 *
 * @property Bovinos $codbov0
 * @property BovinosCategoria $codcat0
 * @property ConceptosOut $codtipo0
 */
class Desincorporaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
   

    public static function tableName()
    {
        return 'desincorporaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codbov', 'peso', 'codcat', 'codtipo'], 'integer'],
            [['fregistro', 'fecha'], 'safe'],
            [['peso','fecha','costo_carne'], 'required'],
            [['costo_carne'], 'number'],
            [['observaciones'], 'string', 'max' => 400],
            [['codbov'], 'exist', 'skipOnError' => true, 'targetClass' => Bovinos::className(), 'targetAttribute' => ['codbov' => 'cod']],
            [['codcat'], 'exist', 'skipOnError' => true, 'targetClass' => BovinosCategoria::className(), 'targetAttribute' => ['codcat' => 'cod']],
            [['codtipo'], 'exist', 'skipOnError' => true, 'targetClass' => ConceptosOut::className(), 'targetAttribute' => ['codtipo' => 'cod']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codbov' => 'N° de Bovino',
            'fregistro' => 'Fregistro',
            'fecha' => 'Fecha',
            'peso' => 'Ultimo Peso',
            'observaciones' => 'Motivo',
            'codcat' => 'Codcat',
            'costo_carne' => 'Costo Carne X Kg.',
            'codtipo' => 'Tipo de Desincorporacion',
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
    public function getCodcat0()
    {
        return $this->hasOne(BovinosCategoria::className(), ['cod' => 'codcat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodtipo0()
    {
        return $this->hasOne(ConceptosOut::className(), ['cod' => 'codtipo']);
    }
}
