<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bovinos_ganaderia".
 *
 * @property integer $cod
 * @property string $descripcion
 *
 * @property Bovinos[] $bovinos
 * @property BovinosCategoria[] $bovinosCategorias
 * @property BovinosRazas[] $bovinosRazas
 */
class BovinosGanaderia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bovinos_ganaderia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 100],
            [['descripcion'], 'unique']
        ];
    }

//------------ Hoal -----------	    

	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBovinos()
    {
        return $this->hasMany(Bovinos::className(), ['codganaderia' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBovinosCategorias()
    {
        return $this->hasMany(BovinosCategoria::className(), ['codtipo' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBovinosRazas()
    {
        return $this->hasMany(BovinosRazas::className(), ['codgan' => 'cod']);
    }
}
