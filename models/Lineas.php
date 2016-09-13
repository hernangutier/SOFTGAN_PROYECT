<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lineas".
 *
 * @property integer $cod
 * @property string $descripcion
 *
 * @property Articulos[] $articulos
 */
class Lineas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lineas';
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
    public function getArticulos()
    {
        return $this->hasMany(Articulos::className(), ['codlin' => 'cod']);
    }
}
