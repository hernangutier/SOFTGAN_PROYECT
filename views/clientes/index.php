<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridExportAsset;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-index">

  <div class="bovinos">
    <div class="box box-info">
              <div class="box-header with-border">

    <p>
        <?= Html::a('Crear Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
  </div>


  <?php

  $gridColumns = [
      ['class' => 'yii\grid\SerialColumn'],


      [
          'attribute'=>'ced',
          'label'=>'Cedula o Rif',
          'vAlign'=>'middle',
          'width'=>'250px',
          'value'=>function ($searchModel, $key, $index, $widget) {
              return Html::a($searchModel->ced,
                  ['view','id'=>$searchModel->cod],
                  ['title'=>'Ver Datos del Cliente' ]);
          },


          'format'=>'raw'
      ],

      [
          'attribute'=>'razon',

      ],

      [
          'attribute'=>'direccion',

      ],

      [
          'attribute'=>'telefono',

      ],



      ['class' => 'yii\grid\ActionColumn','template' => '{update}{delete}',]
  ];

   ?>
<?php
   echo ExportMenu::widget([
   'dataProvider' => $dataProvider,
   'columns' => $gridColumns
   ]);
    ?>
   <?= GridView::widget([
       'dataProvider' => $dataProvider,
       'filterModel' => $searchModel,
       'hover'=>true,
       'pjax'=>true,

       'columns' => $gridColumns,
   ]); ?>
