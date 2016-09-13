<?php

namespace app\controllers;


use yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Consultas;



class ConsultasController extends Controller
{


    public function actionInventario_categorias($title){
          $model=new Consultas();
          if ($model->load(Yii::$app->request->post())){

            return  $this->redirect(Url::base(). '/report/inv-general-cat.php?cod='. $model->codcat);
          }  else {
              return $this->render('inventario_categorias',['model'=>$model,'title1'=>$title]);
          }

  }

  public function actionInventario_categorias_descarte($title){
        $model=new Consultas();
        if ($model->load(Yii::$app->request->post())){

          return  $this->redirect(Url::base(). '/report/inv-general-cat-descarte.php?cod='. $model->codcat);
        }  else {
            return $this->render('inventario_categorias',['model'=>$model,'title1'=>$title]);
        }

  }

}
