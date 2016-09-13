<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
//use dosamigos\datepicker\DatePicker;
use kartik\widgets\TouchSpin;
use kartik\money\MaskMoney;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Url;
use kartik\widgets\SwitchInput;


/* @var $this yii\web\View */
/* @var $model app\models\Servicios */
/* @var $bovino app\models\Bovinos */

$this->title ='Informar Parto a Madre ' . $model->codbov0->codbov ;
$this->params['breadcrumbs'][] = ['label' => 'Madres', 'url' => ['index-madres']];
$this->params['breadcrumbs'][] = $this->title;


 ?>

<?php $form = ActiveForm::begin(); ?>


<section class="invoice">
  <!-- Custom Tabs (Pulled to the right) -->
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1-1" data-toggle="tab"><i class="fa fa-info"></i> Informacion del Parto</a></li>
      <li><a href="#tab_2-2" data-toggle="tab"><i class="fa fa-th"></i> Registro del Becerro</a></li>




    </ul>
    <div class="tab-content">

      <div class="tab-pane active" id="tab_1-1">
        <?php
            echo Yii::$app->controller->renderPartial('_informar', ['model'=>$model,'form'=>$form]);
         ?>




      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2-2">

        <?php
            echo Yii::$app->controller->renderPartial('_form_parto', ['bovino'=>$bovino,'form'=>$form]);
         ?>


      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_3-2">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        It has survived not only five centuries, but also the leap into electronic typesetting,
        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
        like Aldus PageMaker including versions of Lorem Ipsum.
      </div>

      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div>
  <!-- nav-tabs-custom -->

<!-- /.col -->
<div class="form-group">
        <?= Html::submitButton('Procesar',['class' => 'btn btn-success']) ?>
</div>
</section>
<?php ActiveForm::end(); ?>
