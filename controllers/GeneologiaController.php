<?php

namespace app\controllers;

use Yii;
use app\models\Geneologia;
use app\models\GeneologiaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GeneologiaController implements the CRUD actions for Geneologia model.
 */
class GeneologiaController extends Controller
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
     * Lists all Geneologia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GeneologiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Geneologia model.
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
     * Creates a new Geneologia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {



        $model = new Geneologia();
        $model->codhijo=$id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['bovinos/view', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionGeneologia($id){
        $model= new Geneologia();


        $model = Geneologia::findOne(['codhijo' => $id]);

            if (is_null($model->codmadre)) {
               return $this->redirect(['create','id'=>$id]);
            } else {
                return $this->redirect(['update','id'=>$model->cod]);
            }
    }


    /**
     * Updates an existing Geneologia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $model = Geneologia::findOne(['codhijo' => $id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['bovinos/view1', 'id' => $id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Geneologia model.
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
     * Finds the Geneologia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Geneologia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Geneologia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
