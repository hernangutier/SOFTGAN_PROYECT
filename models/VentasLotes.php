<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventas_lotes".
 *
 * @property integer $cod
 * @property integer $codclient
 * @property string $fecha
 * @property string $avg_peso
 * @property string $precio_carne
 * @property integer $status
 * @property string $ncontrol
 *
 * @property Clientes $codclient0
 */
class VentasLotes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ventas_lotes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codclient', 'avg_peso', 'ncontrol','precio_carne'], 'required'],
            [['codclient', 'status'], 'integer'],
            [['fecha'], 'safe'],
            [['avg_peso', 'precio_carne'], 'number'],
            [['ncontrol'], 'string', 'max' => 50],
            [['ncontrol'], 'unique'],
            [['codclient'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['codclient' => 'cod']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codclient' => 'Cliente o Comprador',
            'fecha' => 'Fecha',
            'avg_peso' => 'Peso Promedio',
            'precio_carne' => 'Precio Carne X Kgr.',
            'status' => 'Status',
            'ncontrol' => 'N° Control (Forma Libre)',
            'status'=>'Estatus',
        ];
    }

    public static function getStatusOptions(){
      return [
                ['id'=>0,'value'=>'Pendiente'],
                ['id'=>1,'value'=>'Procesada'],
                ['id'=>2,'value'=>'Anulada'],
             ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodclient0()
    {
        return $this->hasOne(Clientes::className(), ['cod' => 'codclient']);
    }
}
