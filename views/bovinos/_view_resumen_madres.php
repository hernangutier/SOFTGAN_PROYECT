
<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\dropdown\DropdownX;
use yii\data\ActiveDataProvider;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\editable\Editable;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use rmrevin\yii\fontawesome\FA;
use yii\bootstrap\Modal;
use app\models\Bovinos;
/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */
?>

<section class="invoice">
<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Resumen Partos</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php
        echo Yii::$app->controller->renderPartial('_view_partos', ['model'=>$model]);
     ?>
  </div>
  <!-- /.box-body -->
</div>

<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Resumen Servicios</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php
        echo Yii::$app->controller->renderPartial('_view_services', ['model'=>$model]);
     ?>
  </div>
  <!-- /.box-body -->
</div>
</section>
