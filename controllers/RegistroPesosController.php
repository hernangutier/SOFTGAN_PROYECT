<?php

namespace app\controllers;

use Yii;
use yii\db\Connection;
use app\models\RegistroPesos;
use app\models\RegistroPesosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\Bovinos;
use yii\data\SqlDataProvider;

/**
 * RegistroPesosController implements the CRUD actions for RegistroPesos model.
 */
class RegistroPesosController extends Controller
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

    
    public function actionResumen($ano,$tpeso) {
    $dataProvider = new SqlDataProvider([
    'sql' => 'SELECT * FROM fc_resumen_pesaje(:p1,:p2)',
    'params' => [':p1' => $ano,':p2'=>$tpeso],

    ]);
    
    


    $model=new RegistroPesos();
    $model->ano=$ano;
    $model->tpeso=$tpeso;
    /*
    $dataProvider = new ActiveDataProvider([
        'query' => Bovinos::find(),
        'pagination' => false
    ]);
    */
 
    return $this->render('resumen', [
        'dataProvider' => $dataProvider,
        'main' => $model->getJsonListEjecucionPesaje($ano,$tpeso),
        'data_avg' => $model->getJsonListAvgPesaje($ano,$tpeso),
        'model'=>$model,
    ]);
}

   


    /**
     * Lists all RegistroPesos models.
     * @return mixed
     */
    public function actionIndex($ano,$tpeso)
    {
        $searchModel = new RegistroPesosSearch();
        $searchModel->ano=$ano;
        $searchModel->tpeso=$tpeso;
        //-------- Actualizamos los Registros ----
        $SQL = "select sp_update_pesaje(".$ano.",".$tpeso.")";
        

        Yii::$app->db->createCommand( $SQL )->execute();    
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RegistroPesos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RegistroPesos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RegistroPesos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cod]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RegistroPesos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$url)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect($url);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RegistroPesos model.
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
     * Finds the RegistroPesos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RegistroPesos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RegistroPesos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
