<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicios".
 *
 * @property integer $cod
 * @property integer $codbov
 * @property integer $programa_reproductivo
 * @property integer $status_fisiologico
 * @property string $fecha_palpacion
 * @property string $fecha_confirmacion
 * @property string $diagnostico_reproductivo
 * @property string $diagnostico_general
 * @property integer $codinterv
 * @property integer $tipo
 * @property integer $codtoro
 * @property boolean $status
 * @property integer $codvet
 * @property integer $efectividad
 * @property string $observaciones
 * @property integer $result_servicio
 * @property integer $status_servicio
 * @property integer $status_parto
 *
 * @property Bovinos[] $bovinos
 * @property Bovinos $codbov0
 * @property Bovinos $codtoro0
 * @property IntervalosPrenez $codinterv0
 * @property Veterinarios $codvet0
 */
class Servicios extends \yii\db\ActiveRecord
{


  const SCENARIO_INSEMINAR = 'inseminar';
  const SCENARIO_NATURAL = 'create';
  const SCENARIO_INFO_PRENEZ = '_informar_prenez';
  const SCENARIO_INFO_PARTO = 'informate_parto';
  const SCENARIO_INFO_PERDIDA = 'close';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diagnostico_reproductivo','diagnostico_general'], 'required','on' => ['create','_informar_prenez']],
            [['codinterv','fecha_confirmacion'], 'required','on' => ['_informar_prenez']],
            [['codvet'], 'required','on' => ['inseminar','create']],
            [['codtoro'], 'required','on' => 'inseminar'],
            [['codbov', 'programa_reproductivo', 'status_fisiologico', 'codinterv', 'tipo', 'codtoro', 'codvet', 'result_servicio', 'status_servicio', 'status_parto'], 'integer'],
            [['fecha_confirmacion'], 'safe'],
            [['status_fisiologico'], 'required'],
            [['status'], 'boolean'],
            [['diagnostico_reproductivo', 'diagnostico_general', 'observaciones'], 'string', 'max' => 400],
            [['codbov'], 'exist', 'skipOnError' => true, 'targetClass' => Bovinos::className(), 'targetAttribute' => ['codbov' => 'cod']],
            [['codtoro'], 'exist', 'skipOnError' => true, 'targetClass' => Bovinos::className(), 'targetAttribute' => ['codtoro' => 'cod']],
            [['codinterv'], 'exist', 'skipOnError' => true, 'targetClass' => IntervalosPrenez::className(), 'targetAttribute' => ['codinterv' => 'cod']],
            [['codvet'], 'exist', 'skipOnError' => true, 'targetClass' => Veterinarios::className(), 'targetAttribute' => ['codvet' => 'cod']],
            ['status_fisiologico', 'chek_id'],
            ['fecha_palpacion', 'validar'],
            ['fecha_palpacion', 'validarFechaActual'],
            ['fecha_confirmacion', 'validar_fechas','on'=>['_informar_prenez']],

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
            'programa_reproductivo' => 'Programa Reproductivo',
            'status_fisiologico' => 'Estatus Fisiologico',
            'fecha_palpacion' => 'Fecha del Servicio',
            'fecha_confirmacion' => 'Fecha Confirmacion',
            'diagnostico_reproductivo' => 'Diagnostico Reproductivo',
            'diagnostico_general' => 'Diagnostico General',
            'codinterv' => 'Tiempo Segun I.D.',
            'tipo' => 'Tipo',
            'codtoro' => 'Semen Padre',
            'status' => 'Estado del Servicio',
            'codvet' => 'Veterinario o Inseminador',
            'efectividad' => 'Valoracion del Servicio',
            'observaciones' => 'Observaciones',
            'result_servicio' => 'Resultado Servicio',
            'status_servicio' => 'Valoración de Preñes del Servicio',
            'status_parto' => 'Status Parto',
        ];
    }



    public function scenarios()
{
  return [
      self::SCENARIO_INSEMINAR => ['codtoro','codvet','status','result_servicio','fecha_palpacion'],
      self::SCENARIO_NATURAL => ['diagnostico_reproductivo', 'diagnostico_general','status','codinterv','codvet','efectividad','status_fisiologico','fecha_palpacion'],
      self::SCENARIO_INFO_PRENEZ => ['diagnostico_reproductivo', 'diagnostico_general','codinterv','status_fisiologico','fecha_confirmacion','status_servicio'],
      self::SCENARIO_INFO_PARTO => ['observaciones', 'result_servicio','fecha_confirmacion','fecha_palpacion'],
      self::SCENARIO_INFO_PERDIDA => ['observaciones', 'status_parto','result_servicio','efectividad','status'],


  ];
}


    public function validar()
    {
       if (Servicios::find()->andFilterWhere(['>=','fecha_palpacion',$this->fecha_palpacion])->andFilterWhere(['codbov'=>$this->codbov])->count()!=0) {
          $this->addError('fecha_palpacion', 'Ya existe un servicio para esta fecha o despues de esta fecha');
       }
    }

    public function validar_fechas(){
      if ($this->fecha_palpacion>$this->fecha_confirmacion){
            $this->addError('fecha_confirmacion', 'Fecha de confirmación invalida: Es menor a la Fecha del Servicio del '. $this->fecha_palpacion);
      }
    }


    public function getStatusServiceLabel(){
          if ($this->efectividad==2) {
            return '<a class="pull-center"><span class="label label-info">En espera...</span></a>';
          }
          if ($this->efectividad==1) {
            return '<a class="pull-center"><span class="label label-success">Efectivo</span></a>';
          }
          if ($this->efectividad==0) {
            return '<a class="pull-center"><span class="label label-danger">Fallido</span></a>';
          }
    }


    public function getProgramaReproductivoLabel(){
          if ($this->programa_reproductivo==0) {
            return '<a class="pull-center"><span class="label label-primary">Temporada de Monta</span></a>';
          }
          if ($this->programa_reproductivo==3) {
            return '<a class="pull-center"><span class="label label-primary">I.A</span></a>';
          }

    }

    public function getPartoResultLabel(){
          if ($this->result_servicio==0) {
            return '<a class="pull-center"><span class="label label-success">Parto Normal</span></a>';
          }
          if ($this->result_servicio==1) {
            return '<a class="pull-center"><span class="label label-warning">Parto Problematico</span></a>';
          }
          if ($this->result_servicio==2) {
            return '<a class="pull-center"><span class="label label-danger">Aborto</span></a>';
          }
          if ($this->result_servicio==3) {
            return '<a class="pull-center"><span class="label label-danger">Servicio Infertil</span></a>';
          }

    }



    public function validarFechaActual()
        {

         if ($this->fecha_palpacion>date ("Y-m-d")) {
            $this->addError('fecha_palpacion', 'La Fecha del Servicio no puede ser mayor a la Fecha Actual...');
         }
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBovinos()
    {
        return $this->hasMany(Bovinos::className(), ['codpalp' => 'cod']);
    }


    public static function getServiceActive($id){

               return Servicios::find()->andFilterWhere(['codbov'=>$id,
                                'status'=>true,
                             ])->count();


    }





    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodbov0()
    {
        return $this->hasOne(Bovinos::className(), ['cod' => 'codbov']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodtoro0()
    {
        return $this->hasOne(Bovinos::className(), ['cod' => 'codtoro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodinterv0()
    {
        return $this->hasOne(IntervalosPrenez::className(), ['cod' => 'codinterv']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodvet0()
    {
        return $this->hasOne(Veterinarios::className(), ['cod' => 'codvet']);
    }


    public function chek_id(){
     if ($this->status_fisiologico>1 && $this->codinterv==null){
       $this->addError('codinterv', 'Seleccone en Tiempo de Preñez Segun I.D.');
     }
   }


   public function getFechaMinParto(){
   $sql = "
             SELECT  sp_get_li_parto(" . $this->cod .")";





     return  $rawData = Yii::$app->db->createCommand($sql)->queryScalar();

   }


   public function getFechaMaxParto(){
   $sql = "
             SELECT  sp_get_ls_parto(" . $this->cod .")";





     return  $rawData = Yii::$app->db->createCommand($sql)->queryScalar();

   }


   public function getRangoParto(){
     return ' del ' . $this->getFechaMaxParto() . ' al ' . $this->getFechaMinParto();
   }


   public function getStatusFisiologico(){
     if ($this->status_fisiologico==0){
       return 'Vacia';
     }
     if ($this->status_fisiologico==1){
       return 'Vacia con Cria';
     }
     if ($this->status_fisiologico==2){
       return 'Preñada';
     }
     if ($this->status_fisiologico==3){
       return 'Preñada con Cria';
     }
   }
}
