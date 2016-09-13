<?php

namespace app\controllers;

use Yii;
use app\models\Bovinos;
use app\models\BovinosSearch;
use app\models\MadresSearch;
use app\models\TomaPesos;
use app\models\Servicios;
use app\models\Geneologia;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\BovinosRazas;
use app\models\BovinosRebanos;
use app\models\BovinosCategoria;
use yii\widgets\Pjax;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * BovinosController implements the CRUD actions for Bovinos model.
 */
class BovinosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionTomapesos(){
        $model = new TomaPesos();
        $model->ano=2010;
        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['registro-pesos/index', 'ano' => $model->ano,'tpeso' => $model->tpeso]);
        } else {

            return $this->render('tomapesos', [
                'model' => $model,
            ]);
         }
        }



    public function actionParto($id,$tipo){
          //-------------- Inicializamos el Parto ----
          $parto= new app\models\Partos();
          $bovinos= new app\models\Bovinos();
          $parto->codpalp=$id;


    }

    /**
     * Lists all Bovinos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BovinosSearch();
          $searchModel->status=True;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }


    public function actionViewResumenMadre($id){
      return $this->render('view_resumen_madre', [
          'model' => $this->findModel($id),
      ]);

    }

    public function actionIndexMadres()
    {
        $searchModel = new MadresSearch();
        $searchModel->status=True;
        $searchModel->sexo='H';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        /*
        if (Yii::$app->request->post('hasEditable'){
             $id=Yii::$app->request->post('editableKey');
             $modelTemp=$this->findModel($id);
             $out=Json::encode(['output'=>'','message'=>'']);
             $post[];


        }
        */

        return $this->render('index_madres', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }


    public function actionIndexForDescarte()
    {
        $searchModel = new BovinosSearch();
        $searchModel->status=True;
        $searchModel->isdescartable=true;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index_for_descarte', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    public function actionIndexDesincorporados()
    {
        $searchModel = new BovinosSearch();
        $searchModel->status=false;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index_desincorporados', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionFotoUppload($id){
      $model=$this->findModel($id);
      if ($model->load(Yii::$app->request->post())) {
          $model->file=UploadedFile::getInstance($model,'file');
          $model->file->saveAs('fotos/'. $model->cod .'.' . $model->file->extension);
          $model->foto=$model->cod .'.' . $model->file->extension;
          if ($model->save()) {
            return $this->render('view1',['model'=>$model]);
          }

      }

      return $this->render('foto_uppload', [
          'model' =>$model ,
      ]);
    }


    public function actionView($id)
    {
  $model= $this->findModel($id);
  $modelTemp=$model;

  // Check if there is an Editable ajax request
if (isset($_POST['hasEditable'])) {
    // use Yii's response format to encode output as JSON
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    // read your posted model attributes
    if ($model->load($_POST) && $model->save()  ) {
        // read or convert your posted information

        if ($model->codgrupo!=$modelTemp->codgrupo) {
                $value = $model->codgrupo;
                return ['output'=>$value, 'message'=>''];
        }



        // return JSON encoded output in the below format
        return ['output'=>'', 'message'=>''];

        // alternatively you can return a validation error
        // return ['output'=>'', 'message'=>'Validation error'];
    }
    // else if nothing to do always return an empty JSON encoded output
    else {
        return ['output'=>'', 'message'=>''];
    }
}


        return $this->render('view', [
            'model' => $model,
        ]);

    }

    /**
     * Creates a new Bovinos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

     public function actionView1($id)
     {
       return $this->render('view1', [
           'model' => $this->findModel($id),
       ]);


     }

    public function actionCreate()
    {
        $model = new Bovinos();
        $model->foto='default.png';
        $model->fingreso=Date('Y-m-d');
        $model->tipo_ingreso=0;
        $model->codganaderia=0;
        $model->sexo='H';
        $model->programa_reproductivo=0;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view1', 'id' => $model->cod]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionEstadisticaMadres(){
      //---------- Resumen actual de madres reproductoras ---
      return $this->render('estadistica_madres', [
          'model' => new Bovinos(),
      ]);
    }


    public function actionInformateParto(){
          $model = new Bovinos();
          return $this->render('informate_parto', [
              'model' => $model,

          ]);
    }

    public function actionCreateParto($id)
    {
        $model = new Bovinos();
        $model->foto='default.png';
        $model->fingreso=Date('Y-m-d');
        $model->tipo_ingreso=0;
        $model->codganaderia=0;
        $model->sexo='H';
        $model->codpalp=$id;
        $model->status_fisiologico=3;
        $palpacion=Servicios::findOne($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $geneologia= new Geneologia();

                  $palpacion->status=false;
                  $geneologia->codhijo=$model->cod;
                  $geneologia->codmadre=$palpacion->codbov;
                  $palpacion->codbov0->status_fisiologico=0;
                      if ($palpacion->save() && $geneologia->save() && $palpacion->codbov0->save() ){
                            return $this->redirect(['index-madres']);
                      }

        } else {
            return $this->render('create_parto', [
                'model' => $model,

            ]);
        }
    }


    /**
     * Updates an existing Bovinos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view1', 'id' => $model->cod]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionOutDescarte($id){
      $model=$this->findModel($id);
          $model->isdescartable=false;
            if ($model->save()){
              return $this->redirect(['index-for-descarte']);
            }
    }

    /**
     * Deletes an existing Bovinos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bovinos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bovinos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bovinos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function  actionList($id){
        //--------- Listado de OrganismosDep ----

        $countCausas = BovinosRazas::find()
                ->where(['codgan' => $id])
                ->andFilterWhere(['is', 'codgan', null])
                ->count();


        $causas = BovinosRazas::find()
                ->where(['codgan' => $id])
                ->orderBy('descripcion DESC')
                ->andFilterWhere(['is', 'codgan', null])
                ->all();



        if($countCausas>0){
            foreach($causas as $causa){
                echo "<option value='".$causa->cod."'>".$causa->descripcion."</option>";
            }
        }
        else{
            echo "<option> No hay Registros </option>";
        }
    }


    public function  actionList2($id){
        //--------- Listado de OrganismosDep ----

        $countCausas = $countCausas = BovinosCategoria::find()
                ->where(['sexo' => $id])
                ->orFilterWhere(['sexo'=> 'A'])
                ->andFilterWhere(['=', 'isfutura', true])
                ->count();


        $causas = BovinosCategoria::find()
                ->where(['sexo' => $id])
                ->orFilterWhere(['sexo'=> 'A'])
                ->andFilterWhere(['=', 'isfutura', true])
                ->orderBy('descripcion DESC')
                ->all();



        if($countCausas>0){
            foreach($causas as $causa){
                echo "<option value='".$causa->cod."'>".$causa->descripcion."</option>";
            }
        }
        else{
            echo "<option> No hay Registros </option>";
        }
    }


    public function  actionList1($id,$sex){
        //--------- Listado de OrganismosDep ----

        $countCausas = BovinosRebanos::find()
                ->where(['codgan' => $id])
                ->andFilterWhere(['sexo'=> $sex])
                ->orFilterWhere(['sexo'=> 'A'])

                ->count();


        $causas = BovinosRebanos::find()
                ->where(['codgan' => $id])

                ->andFilterWhere(['sexo'=> $sex])
                ->orFilterWhere(['sexo'=> 'A'])
                ->all();



        if($countCausas>0){
            foreach($causas as $causa){
                echo "<option value='".$causa->cod."'>".$causa->descripcion."</option>";
            }
        }
        else{
            echo "<option> No hay Registros </option>";
        }
    }
}
