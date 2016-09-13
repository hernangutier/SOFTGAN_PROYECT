<?php

namespace app\models;

use Yii;
use app\models\Bovinos;

/**
 * This is the model class for table "bovinos_categoria".
 *
 * @property integer $cod
 * @property string $sexo
 * @property integer $emin
 * @property integer $emax
 * @property integer $edescarte
 * @property string $descripcion
 * @property boolean $isfutura
 * @property boolean $ind_reproduccion
 *
 * @property Bovinos[] $bovinos
 * @property Bovinos[] $bovinos0
 * @property Bovinos[] $bovinos1
 * @property Desincorporaciones[] $desincorporaciones
 */
class BovinosCategoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bovinos_categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sexo', 'descripcion'], 'string'],
            [['emin', 'emax', 'edescarte'], 'integer'],
            [['descripcion'], 'required'],
            [['isfutura', 'ind_reproduccion'], 'boolean'],
            [['descripcion'], 'unique'],
            ['emin','chequear'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'sexo' => 'Sexo',
            'emin' => 'Edad Minima (Meses)',
            'emax' => 'Edad Maxima (Meses)',
            'edescarte' => 'Edada Maxima a Descartar (Años)',
            'descripcion' => 'Descripcion',
            'isfutura' => 'Aplica a Categoria Futura',
            'ind_reproduccion'=>'Aplica Procesos e Indicadores de Reproducción',
        ];
    }

    public function chequear(){

        $this->addError('emin','erroor');

    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBovinos()
    {
        return $this->hasMany(Bovinos::className(), ['codcat_actual' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBovinos0()
    {
        return $this->hasMany(Bovinos::className(), ['codcat_ingreso' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBovinos1()
    {
        return $this->hasMany(Bovinos::className(), ['codcat_futura' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporaciones()
    {
        return $this->hasMany(Desincorporaciones::className(), ['codcat' => 'cod']);
    }
    public function getCount(){
        return Bovinos::find()->where(['codcat_actual'=>$this->cod])->count();
    }
}
