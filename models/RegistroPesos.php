<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\data\ActiveDataProvider;


/**
 * This is the model class for table "registro_pesos".
 *
 * @property integer $codbov
 * @property string $tpeso
 * @property string $fecha_plan
 * @property integer $tpeso
 * @property integer $cod
 * @property string $fecha_real
 * @property integer $ano
 * @property Bovinos $codbov0
 * @property PesajeValues $tpeso0
 */
class RegistroPesos extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registro_pesos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codbov','tpeso','ano'], 'integer'],
            [['tpeso', 'fecha_plan'], 'required'],
            [['fecha_plan', 'fecha_real'], 'safe'],
            [['peso', ], 'number'],
            [['codbov'], 'exist', 'skipOnError' => true, 'targetClass' => Bovinos::className(), 'targetAttribute' => ['codbov' => 'cod']],
            [['tpeso'], 'exist', 'skipOnError' => true, 'targetClass' => PesajeValues::className(), 'targetAttribute' => ['tpeso' => 'cod']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codbov' => 'Codbov',
            'tpeso' => 'Descripcion del Peso',
            'fecha_plan' => 'Fecha Planificada para Pesar',
            'peso' => 'Peso Neto Registrado',
            'cod' => 'Cod',
            'fecha_real' => 'Fecha Real de Pesaje',

        ];
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
    public function getTpeso0()
    {
        return $this->hasOne(PesajeValues::className(), ['cod' => 'tpeso']);
    }

    public function getAvg(){
        $SQL = "SELECT sp_get_avg_pesaje(". $this->ano . ",".  $this->tpeso0->cod .  ")";
        return   Yii::$app->db->createCommand( $SQL ) ->queryScalar();
    }

    public function getPesoDia(){
         if ($this->peso>0) {
        return   (($this->peso - $this->codbov0->peso_nacer)/$this->getDias_al_Pesaje());
    } else {
        return 0;
    }
    }

    public function getPesoRelativoEvaluado(){
    $sql = "
              SELECT  fc_get_peso_evaluado(" . $this->cod .")";




    if ($this->peso>0) {
        $rawData = Yii::$app->db->createCommand($sql)->queryScalar();
        return number_format($rawData,2);
    } else {
        return number_format(0,2);
    }
    }

    public function getDias_al_Pesaje(){
        if (!(empty($this->fecha_real))) {
            $SQL = "SELECT sp_get_day_trans(". "'" .$this->codbov0->fnac . "',".  "'" .$this->fecha_real . "'".")";
        return   Yii::$app->db->createCommand( $SQL ) ->queryScalar();
        } else {
            return 1;
        }

    }

    //-------- Indicadores de Calculos ----------

    public function getIntPesados(){
        return RegistroPesos::find()->where(['ano'=>$this->ano])
        ->andFilterWhere(['tpeso'=>$this->tpeso])
        ->andFilterWhere(['>','peso',0])->count();
    }

    public function getIntNoPesados(){
        return RegistroPesos::find()->where(['ano'=>$this->ano])
        ->andFilterWhere(['tpeso'=>$this->tpeso])
        ->andFilterWhere(['=','peso',0])->count();
    }


    //-------------- Set de Datos ------------------

    public function getListPesados(){



          //$dataProvider = new SqlDataProvider([
    $sql = 'SELECT * from registro_pesos r
           where r.ano=:ano
           and r.tpeso=:tpeso and r.peso>0
           and (((sp_get_day_pesaje(r.tpeso))-sp_get_day_trans((select b.fnac from bovinos b where b.cod=r.codbov)))<
           (select p.max_dias from pesaje_values p where p.cod=r.tpeso))';
    $count = Yii::$app->db->createCommand("
          SELECT count(cod) from registro_pesos r
           where r.ano=" . $this->ano .
           "and r.tpeso=" .$this->tpeso . "and r.peso>0
           and (((sp_get_day_pesaje(r.tpeso))-sp_get_day_trans((select b.fnac from bovinos b where b.cod=r.codbov)))<
           (select p.max_dias from pesaje_values p where p.cod=r.tpeso))")->queryScalar();






      $query= RegistroPesos::findBySql($sql,[':ano'=>$this->ano,':tpeso'=>$this->tpeso]);
      $query2=RegistroPesos::findBySql($sql,[':ano'=>$this->ano,':tpeso'=>$this->tpeso]);
          $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'totalCount'=>$count,
            'pagination' => [
                'pageSize' => 10,
            ],
            ]);



          return $dataProvider;



    }


    public function getListNoPesados(){


          //$dataProvider = new SqlDataProvider([
    $sql = 'SELECT * from registro_pesos r
           where r.ano=:ano
           and r.tpeso=:tpeso and r.peso=0
           and (((sp_get_day_pesaje(r.tpeso))-sp_get_day_trans((select b.fnac from bovinos b where b.cod=r.codbov)))<
           (select p.max_dias from pesaje_values p where p.cod=r.tpeso))';




      $query= RegistroPesos::findBySql($sql,[':ano'=>$this->ano,':tpeso'=>$this->tpeso]);

          $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
            ]);


          return $dataProvider;



    }


     public function getListPendientesPeso(){


          //$dataProvider = new SqlDataProvider([
    $sql = 'SELECT * from registro_pesos r
           where r.ano=:ano
           and r.tpeso=:tpeso and r.peso=0
           and (((sp_get_day_pesaje(r.tpeso))-sp_get_day_trans((select b.fnac from bovinos b where b.cod=r.codbov)))>
           (select p.max_dias from pesaje_values p where p.cod=r.tpeso))';




      $query= RegistroPesos::findBySql($sql,[':ano'=>$this->ano,':tpeso'=>$this->tpeso]);

          $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
            ]);


          return $dataProvider;



    }



    //----------- Funciones que retornan Json ---
    public function getJsonListEjecucionPesaje($ano,$tpeso){
      $sql = "SELECT * FROM fc_resumen_pesaje(" . $ano . "," .$tpeso . ")";
      $rawData = Yii::$app->db->createCommand($sql)->queryAll();


    foreach ($rawData as $data) {
    $main_data[] = [
        'name' => $data['descripcion'],
        'y' => $data['valor'],

    ];
    };

       return json_encode($main_data);
    }


    public function getJsonListAvgPesaje($ano,$tpeso){

      $sql = "SELECT * FROM fc_resumen_pesajes_avg(" . $ano . "," .$tpeso . ")";
      $rawData = Yii::$app->db->createCommand($sql)->queryAll();


    foreach ($rawData as $data) {
    $main_data[] = [
        'name' => $data['descripcion'],
        'y' => $data['valor'],

    ];
    };

       return json_encode($main_data);
    }





    public function getAvgEvaluado(){
      $sql = "SELECT * FROM sp_get_avg_pesaje(" . $this->ano . "," .$this->tpeso . ")";
      $rawData = Yii::$app->db->createCommand($sql)->queryScalar();
      return number_format($rawData,2);
    }

    public function getMaxPeso(){
      $sql = "
              SELECT  max(fc_get_peso_evaluado(reg.cod)) from   registro_pesos reg
              WHERE
              reg.ano=" . $this->ano .
              "and reg.tpeso=" .$this->tpeso ;
         $rawData = Yii::$app->db->createCommand($sql)->queryScalar();
         return number_format($rawData,2);
    }


    public function getMinPeso(){
      $sql = "
              SELECT  min(fc_get_peso_evaluado(reg.cod)) from   registro_pesos reg
              WHERE
              reg.ano=" . $this->ano .
              "and reg.tpeso=" .$this->tpeso .
              "and reg.peso>0" ;
         $rawData = Yii::$app->db->createCommand($sql)->queryScalar();
         return number_format($rawData,2);
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

    public function getListPesoAlto(){
      $sql ='SELECT  *  FROM registro_pesos
                    WHERE
                    registro_pesos.tpeso=:tpeso and
                    registro_pesos.ano=:ano and
                    fc_get_peso_evaluado(cod)>sp_get_avg_pesaje(:ano,:tpeso)
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
