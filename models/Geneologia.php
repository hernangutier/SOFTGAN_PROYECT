<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "geneologia".
 *
 * @property integer $cod
 * @property integer $codhijo
 * @property integer $codmadre
 * @property integer $codpadre
 *
 * @property Bovinos $codhijo0
 * @property Bovinos $codmadre0
 * @property Bovinos $codpadre0
 */
class Geneologia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geneologia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codhijo', 'codmadre', 'codpadre'], 'integer'],
            [['codhijo'], 'unique'],
            [['codhijo'], 'exist', 'skipOnError' => true, 'targetClass' => Bovinos::className(), 'targetAttribute' => ['codhijo' => 'cod']],
            [['codmadre'], 'exist', 'skipOnError' => true, 'targetClass' => Bovinos::className(), 'targetAttribute' => ['codmadre' => 'cod']],
            [['codpadre'], 'exist', 'skipOnError' => true, 'targetClass' => Bovinos::className(), 'targetAttribute' => ['codpadre' => 'cod']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codhijo' => 'Codhijo',
            'codmadre' => 'N° de la Madre',
            'codpadre' => 'N° del Padre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodhijo0()
    {
        return $this->hasOne(Bovinos::className(), ['cod' => 'codhijo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodmadre0()
    {
        return $this->hasOne(Bovinos::className(), ['cod' => 'codmadre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodpadre0()
    {
        return $this->hasOne(Bovinos::className(), ['cod' => 'codpadre']);
    }
}
