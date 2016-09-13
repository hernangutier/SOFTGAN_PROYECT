<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_causas".
 *
 * @property integer $cod
 * @property string $descripcion
 * @property integer $codstatus
 *
 * @property Desincorporaciones[] $desincorporaciones
 * @property StatusBovinos $codstatus0
 */
class StatusCausas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_causas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['codstatus'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
            [['codstatus'], 'exist', 'skipOnError' => true, 'targetClass' => StatusBovinos::className(), 'targetAttribute' => ['codstatus' => 'cod']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'descripcion' => 'Descripcion',
            'codstatus' => 'Codstatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporaciones()
    {
        return $this->hasMany(Desincorporaciones::className(), ['codcausa' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodstatus0()
    {
        return $this->hasOne(StatusBovinos::className(), ['cod' => 'codstatus']);
    }
}
