<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_bovinos".
 *
 * @property integer $cod
 * @property string $descripcion
 *
 * @property StatusCausas[] $statusCausas
 */
class StatusBovinos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_bovinos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusCausas()
    {
        return $this->hasMany(StatusCausas::className(), ['codstatus' => 'cod']);
    }
}
