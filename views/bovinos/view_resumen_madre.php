
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





  <!-- Main content -->


    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1-1" data-toggle="tab"><i class="fa fa-info"></i> Historial de Partos</a></li>
        <li><a href="#tab_2-2" data-toggle="tab"><i class="fa fa-th"></i> Info. Servcios</a></li>




      </ul>
      <div class="tab-content">

        <div class="tab-pane active" id="tab_1-1">
          <?php
              echo Yii::$app->controller->renderPartial('_view_partos', ['model'=>$model]);
           ?>




        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2-2">

          <?php
              echo Yii::$app->controller->renderPartial('_view_services', ['model'=>$model]);
           ?>


        </div>

        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
