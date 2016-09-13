<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%palpaciones}}".
 *
 * @property integer $cod
 * @property integer $codmadre
 * @property integer $tid
 * @property integer $status_fisiologico
 *
 * @property Bovinos $codmadre0
 */
class Palpaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'palpaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codmadre', 'tid', 'status_fisiologico'], 'integer'],
            [['status_fisiologico'], 'required'],
            [['codmadre'], 'exist', 'skipOnError' => true, 'targetClass' => Bovinos::className(), 'targetAttribute' => ['codmadre' => 'cod']],
            ['tid','chequear'],
        ];
    }


    public function chequear(){
          $this->addError($attribute,'Error ...');
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codmadre' => 'Codmadre',
            'tid' => 'Tid',
            'status_fisiologico' => 'Status Fisiologico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodmadre0()
    {
        return $this->hasOne(Bovinos::className(), ['cod' => 'codmadre']);
    }
}
