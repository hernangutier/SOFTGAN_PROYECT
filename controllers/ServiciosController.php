<?php

namespace app\controllers;

use Yii;
use app\models\Servicios;
use app\models\Bovinos;
use app\models\Geneologia;
use app\models\ServiciosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use kartik\mpdf\Pdf;
use yii\helpers\Url;
use  yii\base\Model;
/**
 * ServiciosController implements the CRUD actions for Servicios model.
 */
class ServiciosController extends Controller
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

    /**
     * Lists all Servicios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiciosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servicios model.
     * @param integer $id
     * @return mixed
     */

    public function actionViewModal($id,$submit = false){
      $model = $this->findModel($id);

    if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
      return $this->renderAjax('view_modal', [
          'model' => $model,
      ]);
    }

    public function actionViewPrint($id){
      $content = $this->renderPartial('view',['model'=>$this->findModel($id)]);

            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
              // set to use core fonts only
              //'mode' => Pdf::MODE_CORE,
              // A4 paper format
              'format' => Pdf::FORMAT_A4,
              // portrait orientation
              'orientation' => Pdf::ORIENT_LANDSCAPE,
              // stream to browser inline
              'destination' => Pdf::DEST_BROWSER,
              // your html content input
              'content' => $content,
              // format content from your own css file if needed or use the
              // enhanced bootstrap css built by Krajee for mPDF formatting
              //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
              // any css to be embedded if required
              //'cssInline' => '.kv-heading-1{font-size:18px}',
               // set mPDF properties on the fly
              'options' => ['title' => 'Resumen del Servicio'],
               // call mPDF methods on the fly
              'methods' => [
                  'SetHeader'=>['Resumen del Servicio'],
                  'SetFooter'=>['{PAGENO}'],
              ]
            ]);

            // return the pdf output as per the destination setting

            return $pdf->render();
    }

    public function actionView($id)
    {


        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionView1($id)
    {
      $model= Servicios::find()->andFilterWhere(['codbov'=>$id,
                       'status'=>true])->one();


        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionInformateParto($id){
      $model=$this->findModel($id);
      $model->efectividad=1;
      $model->status=false;

      $bovino=new Bovinos();
      $bovino->foto='default.png';
      $bovino->fingreso=Date('Y-m-d');
      $bovino->fnac=Date('Y-m-d');
      $bovino->tipo_ingreso=0;
      $bovino->codganaderia=0;
      $bovino->sexo='H';
      $bovino->codpalp=$id;
      $bovino->status_fisiologico=3;
      $bovino->status=true;
      $bovino->programa_reproductivo=0;
      $model->scenario=Servicios::SCENARIO_INFO_PARTO;


      if ($model->load(Yii::$app->request->post()) && $bovino->load(Yii::$app->request->post())) {
            //$isValid = $model->validate();
            //$isValid = $bovino->validate() && $isValid;
            //if ($isValid) {
                $model->save(false);
                $bovino->save(false);
                $geneologia= new Geneologia();
                $geneologia->codmadre=$model->codbov;
                $geneologia->codhijo=$bovino->cod;
                $geneologia->save(false);
                return $this->redirect(['servicios/view','id'=>$model->cod]);
            //}
        }



          return $this->render('informate_parto',
                              ['model'=>$model,
                                'bovino'=>$bovino,
                              ]);
        }








    public function actionClose($id){
       $model=$this->findModel($id);
       $model->efectividad=false;
       $model->status=false;
       $model->status_parto=2;
       $model->scenario=Servicios::SCENARIO_INFO_PERDIDA;

       if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
          $model->codbov0->status_fisiologico=0;
              if ($model->codbov0->save(false)){
                  return $this->redirect(['view','id'=>$model->cod]);
              }
        } else {

          return $this->render('close',
                              ['model'=>$model]);
      }
    }

    /**
     * Creates a new Servicios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Servicios();
        $model->codbov=$id;
        $model->tipo=0;
        $model->fecha_palpacion=Date('Y-m-d');
        $model->scenario=Servicios::SCENARIO_NATURAL;

        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
            if ($model->status_fisiologico>1) {
              $model->status_servicio=0;
              $model->status_parto=0;


            } else {
              $model->status_servicio=1;
              $model->status=false;
              $model->efectividad=0;
           }

         if ($model->save() ) {
            return $this->redirect(['servicios/view','id'=>$model->cod]);
         }
        } else {
           return $this->render('create', [
               'model' => $model,
           ]);
    }
  }


    public function actionInseminar($id){
      $model = new Servicios();
      $model->codbov=$id;
      $model->tipo=1;
      $model->fecha_palpacion=Date('Y-m-d');
      $model->scenario=Servicios::SCENARIO_INSEMINAR;
      $model->status_servicio=1;
      $model->status_parto=0;
      $model->efectividad=2;
      $model->status=true;
      $model->programa_reproductivo=$model->codbov0->programa_reproductivo;

      if ($model->load(Yii::$app->request->post()) && $model->save() ) {
              return $this->redirect(['view','id'=>$model->cod]);

      } else {
         return $this->render('inseminar', [
             'model' => $model,
         ]);
  }
    }

  public function actionInformarPrenez($id){
    $model=$this->findModel($id);
    $model->status_servicio=0;
    $model->scenario=Servicios::SCENARIO_INFO_PRENEZ;
    if ($model->load(Yii::$app->request->post()) && $model->save() ) {
      return $this->redirect(['view','id'=>$model->cod]);
    } else {
      return $this->render('_informar_prenez', [
          'model' => $model,
      ]);
    }


  }

    /**
     * Updates an existing Servicios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cod]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Servicios model.
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
     * Finds the Servicios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Servicios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Servicios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
