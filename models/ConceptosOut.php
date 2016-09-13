<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conceptos_out".
 *
 * @property integer $cod
 * @property string $descripcion
 * @property boolean $ingreso
 *
 * @property Desincorporaciones[] $desincorporaciones
 * @property StatusCausas[] $statusCausas
 */
class ConceptosOut extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conceptos_out';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['ingreso'], 'boolean'],
            [['descripcion'], 'string', 'max' => 100],
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
            'ingreso' => 'Tipo de Registro Contable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporaciones()
    {
        return $this->hasMany(Desincorporaciones::className(), ['codtipo' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusCausas()
    {
        return $this->hasMany(StatusCausas::className(), ['codstatus' => 'cod']);
    }
}
