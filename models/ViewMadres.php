<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_madres".
 *
 * @property integer $cod
 * @property string $codbov
 */
class ViewMadres extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_madres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod'], 'integer'],
            [['codbov'], 'string', 'max' => 50],
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
        ];
    }
}
