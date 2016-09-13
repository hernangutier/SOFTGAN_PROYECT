<?php

namespace app\models;

use Yii;
use 	yii\data\SqlDataProvider;

/**
 * This is the model class for table "bovinos".
 *
 * @property string $codbov
 * @property string $fnac
 * @property string $fcreacion
 * @property string $sexo
 * @property integer $codraza
 * @property integer $codganaderia
 * @property integer $codcat_actual
 * @property integer $codcat_ingreso
 * @property integer $codcat_futura
 * @property string $foto
 * @property string $caracteristicas
 * @property integer $codrebano
 * @property boolean $status
 * @property integer $tipo_ingreso
 * @property string $fingreso
 * @property integer $peso_nacer
 * @property integer $cod
 * @property integer $codgrupo
 * @property integer $color
 * @property integer $status_fisiologico
 * @property integer $programa_reproductivo
 * @property boolean $isdescartable
 * @property BovinosCategoria $codcatActual
 * @property BovinosCategoria $codcatIngreso
 * @property BovinosCategoria $codcatFutura
 * @property integer $codpalp
 * @property string $parto_observaciones
 * @property BovinosRazas $codraza0
 * @property BovinosRebanos $codrebano0
 * @property GruposToros $codgrupo0
 * @property Desincorporaciones[] $desincorporaciones
 * @property Geneologia $geneologia
 * @property Geneologia[] $geneologias
 * @property Geneologia[] $geneologias0
 * @property RegistroPesos[] $registroPesos
 * @property Sanidad[] $sanidads
 * @property Servicios[] $servicios
 * @property Servicios[] $servicios0
 * @property Palpaciones[] $palpaciones
 */


class Bovinos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $file;


    public static function tableName()
    {
        return 'bovinos';
    }

    /**
     * @inheritdoc
     */



    public function rules()
    {
        return [
            [['fnac', 'fingreso', 'sexo','peso_nacer','codbov','color','codraza','codcat_futura'], 'required'],
            [['cod', 'codraza', 'codganaderia', 'codcat_actual', 'codgrupo','codcat_ingreso', 'codcat_futura', 'codrebano', 'tipo_ingreso', 'peso_nacer', 'status_fisiologico', 'programa_reproductivo',], 'integer'],
            [['cod','fnac', 'fcreacion', 'fingreso'], 'safe'],
            [['status', 'isdescartable'], 'boolean'],
            [['codbov'], 'string', 'max' => 50],
            [['file'],'file'],
            [['sexo'], 'string', 'max' => 1],
            [['foto','caracteristicas'], 'string', 'max' => 200],
            [['color'], 'exist', 'skipOnError' => true, 'targetClass' => BovinosColores::className(), 'targetAttribute' => ['color' => 'cod']],
            [['codcat_actual'], 'exist', 'skipOnError' => true, 'targetClass' => BovinosCategoria::className(), 'targetAttribute' => ['codcat_actual' => 'cod']],
            [['codcat_ingreso'], 'exist', 'skipOnError' => true, 'targetClass' => BovinosCategoria::className(), 'targetAttribute' => ['codcat_ingreso' => 'cod']],
            [['codcat_futura'], 'exist', 'skipOnError' => true, 'targetClass' => BovinosCategoria::className(), 'targetAttribute' => ['codcat_futura' => 'cod']],
            [['codraza'], 'exist', 'skipOnError' => true, 'targetClass' => BovinosRazas::className(), 'targetAttribute' => ['codraza' => 'cod']],
            [['codrebano'], 'exist', 'skipOnError' => true, 'targetClass' => BovinosRebanos::className(), 'targetAttribute' => ['codrebano' => 'cod']],
            [['codgrupo'], 'exist', 'skipOnError' => true, 'targetClass' => GruposToros::className(), 'targetAttribute' => ['codgrupo' => 'cod']],
            ['fnac', 'validateFechas'],
            ['fingreso', 'validateFingreso'],
            ['peso_nacer', 'validatePeso'],




        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codbov' => 'N° de Bovino',
            'fnac' => 'Fecha Aproximada de Nacimiento',
            'fcreacion' => 'Fecha de Registro',
            'sexo' => 'Sexo',
            'codraza' => 'Raza del Bovino',
            'codganaderia' => 'Tipo de Ganaderia',
            'codcat_actual' => 'Codcat Actual',
            'codcat_ingreso' => 'Codcat Ingreso',
            'codcat_futura' => 'Categoria Futura a llevar',
            'foto' => 'Foto',
            'codrebano' => 'Rebaño o Lote',
            'status' => 'Status',
            'tipo_ingreso' => 'Tipo Ingreso',
            'fingreso' => 'Fecha de Ingreso',
            'peso_nacer' => 'Peso Nacer (Kgrs.)',
            'codgrupo'=>'Grupo de Toro Asignado',
            'status_fisiologico' => 'Status Fisiologico',
            'programa_reproductivo' => 'Programa Reproductivo',
            'isdescartable' => 'Posible Descarte',
            'caracteristicas' => 'Caracteristicas',
            'color' => 'Color',
            'file' => 'Fotografia',
            'codpalp' => 'Servicio de Palpacion',
            'parto_observaciones' => 'Observaciones en el Parto',
        ];
    }


    public function getSexoLabel(){
      if ($this->sexo=='M') {
        return '<a class="pull-center"><span class="label label-primary">M</span></a>';
      } else {
        return '<a class="pull-center"><span class="label label-danger">H</span></a>';
      }

    }

    public function getTipoIngreso(){
        if ($this->tipo_ingreso==0) return 'Cria';
        if ($this->tipo_ingreso==1) return 'Adquirido';
    }


    public function getStatusFisiologico(){
        if ($this->status_fisiologico==0) return 'Vacia';
        if ($this->status_fisiologico==1) return 'Vacia con Cria';
        if ($this->status_fisiologico==2) return 'Preñada';
        if ($this->status_fisiologico==3) return 'Preñada con Cria';

    }

    public static function getOptionsStatusFisiologico(){
      return [
              ['id'=>0,'descripcion'=>'Vacia'],
              ['id'=>1,'descripcion'=>'Vacia con Cria'],
              ['id'=>2,'descripcion'=>'Preñada'],
              ['id'=>3,'descripcion'=>'Preñada con Cria'],
          ];
    }

    public static function getArrayProgramaReporductivo(){
      return [
              ['id'=>0,'descripcion'=>'Temporada de Monta'],
              ['id'=>1,'descripcion'=>'Monta Continua'],
              ['id'=>2,'descripcion'=>'Monta Controlada'],
              ['id'=>3,'descripcion'=>'I.A'],
          ];
    }

    public function getProgramaReproductivo(){
      if ($this->programa_reproductivo==0){ return 'Temporada de Monta';  }
      if ($this->programa_reproductivo==1){ return 'Monta Continua';  }
      if ($this->programa_reproductivo==2){ return 'Monta Controlada';  }
      if ($this->programa_reproductivo==3){ return 'I.A.';  }
    }

    public function validateFechas()
        {

         if ($this->fnac>$this->fingreso) {
            $this->addError('fingreso', 'La Fecha de Nacimiento no puede ser mayor que la Fecha de Ingreso...');
         }

    }




     public static function getPorcentajePrenes(){
       return [
                    'Preñadas'=>'25',
                    'Preñadas con Cria'=>'12',
                    'Vacias'=>'48',
                    'Vacias con Cria'=>'15',

               ];
     }




    public function validateFingreso()
        {

         if ($this->fingreso>date ("Y-m-d")) {
            $this->addError('fingreso', 'La Fecha de Inreso no puede ser mayor a la Fecha Actual...');
         }
    }



    public function validatePeso()
        {

         if ($this->peso_nacer<=0) {
            $this->addError('peso_nacer', 'Debe asignar un peso valido...');
         }



        }

        public function getColor0()
       {
           return $this->hasOne(BovinosColores::className(), ['cod' => 'color']);
       }


       /**
      * @return \yii\db\ActiveQuery
      */
     public function getServicios0()
     {
         return $this->hasMany(Servicios::className(), ['codtoro' => 'cod']);
     }

    public function getCodpalp0()
    {
        return $this->hasOne(Servicios::className(), ['cod' => 'codpalp']);
    }




    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPalpaciones()
    {
        return $this->hasMany(Palpaciones::className(), ['codmadre' => 'cod']);
    }


     public function validateNBovino()
        {
        //-------------- Consultamos el Codigo -------
        if ($this->isNewRecord) {
        $sql="SELECT  count(cod) from bovinos
                                    where
                                    codbov='".$this->codbov ."' and
                                    extract(year from fnac)=extract(year from '"

                                    . $this->fnac  ."' ::date)
                                    and   tipo_ingreso=0 "
                                    ;
        $count = Yii::$app->db->createCommand($sql)->queryScalar();
      } else {

        $sql="SELECT  count(cod) from bovinos
                                    where
                                    codbov='".$this->codbov ."' and
                                    cod<>'".$this->cod ."' and
                                    extract(year from fnac)=extract(year from '"
                                    . $this->fnac  ."' ::date)";
        $count = Yii::$app->db->createCommand($sql)->queryScalar();

      }
        if ($count!=0) {
            $this->addError('codbov', 'N° de Bovino Resgitrado para la Fecha de Nacimiento...');
        }






        }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodcatActual()
    {
        return $this->hasOne(BovinosCategoria::className(), ['cod' => 'codcat_actual']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodcatIngreso()
    {
        return $this->hasOne(BovinosCategoria::className(), ['cod' => 'codcat_ingreso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodcatFutura()
    {
        return $this->hasOne(BovinosCategoria::className(), ['cod' => 'codcat_futura']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodraza0()
    {
        return $this->hasOne(BovinosRazas::className(), ['cod' => 'codraza']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodrebano0()
    {
        return $this->hasOne(BovinosRebanos::className(), ['cod' => 'codrebano']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporaciones()
    {
        return $this->hasMany(Desincorporaciones::className(), ['codbov' => 'cod']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodgrupo0()
    {
        return $this->hasOne(GruposToros::className(), ['cod' => 'codgrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHijos()
    {
        return $this->hasMany(Hijos::className(), ['codhijo' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneologia()
    {
        return $this->hasOne(Geneologia::className(), ['codhijo' => 'cod']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHijos0()
    {
        return $this->hasMany(Hijos::className(), ['codmadre' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodmadres()
    {
        return $this->hasMany(Bovinos::className(), ['cod' => 'codmadre'])->viaTable('hijos', ['codhijo' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodhijos()
    {
        return $this->hasMany(Bovinos::className(), ['cod' => 'codhijo'])->viaTable('hijos', ['codmadre' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistroPesos()
    {
        return $this->hasMany(RegistroPesos::className(), ['codbov' => 'cod']);
    }


    public static function getCalcEdad($fecha,$last_fecha){
                    // separamos en partes las fechas
              $array_nacimiento = explode ( "-", $fecha );
              $array_actual = explode ( "-", $last_fecha );

              $anos =  $array_actual[0] - $array_nacimiento[0]; // calculamos años
              $meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses
              $dias =  $array_actual[2] - $array_nacimiento[2]; // calculamos días

              //ajuste de posible negativo en $días
              if ($dias < 0)
              {
                --$meses;

                //ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
                switch ($array_actual[1]) {
                       case 1:     $dias_mes_anterior=31; break;
                       case 2:     $dias_mes_anterior=31; break;
                       case 3:
                            if (Isbisiesto($array_actual[0]))
                            {
                                $dias_mes_anterior=29; break;
                            } else {
                                $dias_mes_anterior=28; break;
                            }
                       case 4:     $dias_mes_anterior=31; break;
                       case 5:     $dias_mes_anterior=30; break;
                       case 6:     $dias_mes_anterior=31; break;
                       case 7:     $dias_mes_anterior=30; break;
                       case 8:     $dias_mes_anterior=31; break;
                       case 9:     $dias_mes_anterior=31; break;
                       case 10:     $dias_mes_anterior=30; break;
                       case 11:     $dias_mes_anterior=31; break;
                       case 12:     $dias_mes_anterior=30; break;
                }

                $dias=$dias + $dias_mes_anterior;
              }

              //ajuste de posible negativo en $meses
              if ($meses < 0)
              {
                --$anos;
                $meses=$meses + 12;
              }

              if ($meses==1) {
                $alisAnos= ' Anos ';
                $alisMeses= ' mes ';
              } else {
                $alisAnos= ' Anos ';
                $alisMeses= ' meses ';
              }

                  return  $anos . $alisAnos . $meses . $alisMeses . $dias . ' dias';
    }

    public function getEdad(){
                // separamos en partes las fechas
        $array_nacimiento = explode ( "-", $this->fnac );
        $array_actual = explode ( "-", date ("Y-m-d") );

        $anos =  $array_actual[0] - $array_nacimiento[0]; // calculamos años
        $meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses
        $dias =  $array_actual[2] - $array_nacimiento[2]; // calculamos días

        //ajuste de posible negativo en $días
        if ($dias < 0)
        {
            --$meses;

            //ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
            switch ($array_actual[1]) {
                   case 1:     $dias_mes_anterior=31; break;
                   case 2:     $dias_mes_anterior=31; break;
                   case 3:
                        if ($this->bisiesto($array_actual[0]))
                        {
                            $dias_mes_anterior=29; break;
                        } else {
                            $dias_mes_anterior=28; break;
                        }
                   case 4:     $dias_mes_anterior=31; break;
                   case 5:     $dias_mes_anterior=30; break;
                   case 6:     $dias_mes_anterior=31; break;
                   case 7:     $dias_mes_anterior=30; break;
                   case 8:     $dias_mes_anterior=31; break;
                   case 9:     $dias_mes_anterior=31; break;
                   case 10:     $dias_mes_anterior=30; break;
                   case 11:     $dias_mes_anterior=31; break;
                   case 12:     $dias_mes_anterior=30; break;
            }

            $dias=$dias + $dias_mes_anterior;
        }

        //ajuste de posible negativo en $meses
        if ($meses < 0)
        {
            --$anos;
            $meses=$meses + 12;
        }

        if ($meses==1) {
            $alisAnos= ' Anos ';
            $alisMeses= ' mes ';
        } else {
            $alisAnos= ' Anos ';
            $alisMeses= ' meses ';
        }

        return  $anos . $alisAnos . $meses . $alisMeses . $dias . ' dias';
    }





    public function bisiesto($anio_actual){
    $bisiesto=false;
    //probamos si el mes de febrero del año actual tiene 29 días
        if (checkdate(2,29,$anio_actual))
              {
                $bisiesto=true;
            }
            return $bisiesto;
        }

        public static function Isbisiesto($anio_actual){
        $bisiesto=false;
        //probamos si el mes de febrero del año actual tiene 29 días
            if (checkdate(2,29,$anio_actual))
                  {
                    $bisiesto=true;
                }
                return $bisiesto;
            }


    public static function getExtratcAno($fecha){
      return date("Y", strtotime($fecha));
    }

    public function getTipo(){
        if ($this->codganaderia==0) return 'BOVINOS CRIA';
        if ($this->codganaderia==1) return 'BOVINOS LECHE';
        if ($this->codganaderia==2) return 'AMBOS TIPOS';
    }

    public function getDias(){
        $SQL = "SELECT sp_get_day_trans(". "'" .$this->fnac . "'".")";
        return   Yii::$app->db->createCommand( $SQL ) ->queryScalar();
    }

    public static function getCountDescartables(){
        return Bovinos::find()->where(['isdescartable'=>true])->andwhere(['status'=>true]) ->count();
    }

    public static function getCountActivos(){
        return Bovinos::find()->where(['status'=>true])->count();
    }

    public static function getCountdesincorporados(){
        return Bovinos::find()->where(['status'=>false])->count();
    }

    public static function getResumenMadresGeneral(){

      $sql="select  CASE WHEN status_fisiologico=0 THEN 'Vacias'
            WHEN status_fisiologico=1 THEN 'Vacias Con Cria'
	    WHEN status_fisiologico=2 THEN 'Preñadas'
	    ELSE 'Preñadas con Crias'
	    end as descripcion

            ,count(cod) as value from bovinos
			where sexo='H'
            and codcat_actual in (select cod from bovinos_categoria where ind_reproduccion=true)
			group by status_fisiologico
			order by status_fisiologico	";


      $dataProvider = new SqlDataProvider([
            'sql' => $sql,

      ]);

          return $dataProvider;

      }



      public static function getResumenMadresPrenez(){

        $sql="select  CASE WHEN status_fisiologico=0 THEN 'Vacias'
            WHEN status_fisiologico=1 THEN 'Vacias Con Cria'
	    WHEN status_fisiologico=2 THEN 'Preñadas'
	    ELSE 'Preñadas con Crias'
	    end as descripcion

            ,count(cod) as value from bovinos
			where sexo='H'
			      and codcat_actual in (select cod from bovinos_categoria where ind_reproduccion=true)
			      and status_fisiologico in (2,3)
			group by status_fisiologico
			order by status_fisiologico";


        $dataProvider = new SqlDataProvider([
              'sql' => $sql,

        ]);

            return $dataProvider;

        }


        public static function getHijosMadres($id){

          $sql='SELECT
            bovinos.cod,
            extract(year from bovinos.fnac) as ano,
            bovinos.codbov,
            bovinos.fnac,
            bovinos.sexo,
            bovinos.peso_nacer,
            bovinos.status
          FROM
            public.geneologia,
            public.bovinos
          WHERE
            bovinos.cod = geneologia.codhijo
            and  geneologia.codmadre=' . $id .
           'order by fnac desc';


          $dataProvider = new SqlDataProvider([
                'sql' => $sql,


          ]);

              return $dataProvider;

          }



//-------------------------- DataProviders ----------------------------

public function getListPesoBajo(){
             //$dataProvider = new SqlDataProvider([
$sql ='SELECT  *  FROM registro_pesos
                WHERE
                registro_pesos.tpeso=:tpeso and
                registro_pesos.ano=:ano and
                fc_get_peso_evaluado(cod)<sp_get_avg_pesaje(:ano,:tpeso)
                and registro_pesos.peso<>0';






  $query= RegistroPesos::findBySql($sql,[':ano'=>$this->ano,':tpeso'=>$this->tpeso]);

      $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 5,
        ],
        ]);


      return $dataProvider;
}


}
