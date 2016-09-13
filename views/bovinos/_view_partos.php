<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use app\Models\Bovinos;
//use dosamigos\datepicker\DatePicker;
use kartik\widgets\TouchSpin;
use kartik\money\MaskMoney;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Url;
use kartik\widgets\SwitchInput;
/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */
/* @var $form yii\widgets\ActiveForm */
?>

<p>
    <?= Html::a('Registrar Parto Historico', ['create'], ['class' => 'btn btn-success']) ?>

</p>

<?php
$searchModelHijos = new app\models\GeneologiaSearch();
$searchModelHijos->codmadre=$model->cod;
$dataProviderHijos = $searchModelHijos->search(Yii::$app->request->queryParams);

  echo GridView::widget([
      'dataProvider' => Bovinos::getHijosMadres($model->cod),
      //'filterModel' => $searchModel,
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],




         [
             'attribute'=>'ano',
             'label'=>'Periodo',
             'value'=>function($data){
               return '<span class="label label-primary">' . $data["ano"] . '</span>';
             },
             'format'=>'raw',
         ],

          [
              'attribute'=>'codbov',

              'label'=>'N° de Bovino',
              'format'=>'raw',
          ],


          [
              'attribute'=>'fnac',

              'label'=>'Fecha de Parto',
              'format'=>'raw',
          ],

          [
              'attribute'=>'peso_nacer',
              'value'=>function($data){
                return  '<code>' . $data["peso_nacer"] . 'kgs.' . '</code>';
              },
              'label'=>'Peso al Nacer',
              'format'=>'raw',
          ],

          [
              'attribute'=>'cod',
              'value'=>function($data){
                return  '<code>' . $data["sexo"] .  '</code>';
              },
              'label'=>'Sexo',
              'format'=>'raw',
          ],

          [
            'attribute'=>'cod',
            'label'=>'Estatus',
            'value'=>function ($data){
              if ($data["status"]) {
                return '<span class="label label-success">Activo</span>';
              } else {

                return '<span class="label label-danger ">Desincorporado</span>';
              }
            },
            'format'=>'raw',

          ],








      ],
  ]);



 ?>



   <p class="lead">Resumen Partos</p>

   <div class="table-responsive">
     <table class="table">
       <tr>
         <th style="width:50%">N° de Machos:</th>
         <td>2</td>
       </tr>
       <tr>
         <th>N° de Hembras</th>
         <td>1</td>
       </tr>
       <tr>
         <th>Total Crias:</th>
         <td>3</td>
       </tr>
       <tr>
         <th>Total:</th>
         <td>$265.24</td>
       </tr>
     </table>
   </div>
