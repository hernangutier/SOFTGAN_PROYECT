<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\daterange\DateRangePicker;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DesincorporacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bovinos Desincorporados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desincorporaciones-index">
  <div class="box box-primary">
            <div class="box-header with-border">

    <?php
        $gridColumns=[
            ['class' => 'yii\grid\SerialColumn'],


            [
              'attribute'=>'codbov',
              'value'=>function ($model, $key, $index, $widget) {
                  return Html::a($model->codbov0->codbov,
                           ['view', 'id' => $model->cod],
                           ['title'=>'Ver Detalle de la Desicorporacion',
                           ]);
                   },
              'filterType'=>GridView::FILTER_SELECT2,
              'filter'=>ArrayHelper::map(app\models\Bovinos::find()->where(['status'=>false])->asArray()->all(),
              'cod', 'codbov'),
              'filterWidgetOptions'=>[
                  'pluginOptions'=>['allowClear'=>true],
              ],
              'filterInputOptions'=>['placeholder'=>'Filtrar N° de Bovino'],
              'format'=>'raw',




            ],

            [
              'attribute'=>'Categoria al Desincorporar',
              'value'=>'codcat0.descripcion',
              'format'=>'raw',




            ],

            [
            'attribute' => 'rango_fecha',
            'value' => 'fecha',
            'format'=>'raw',
            'options' => ['style' => 'width: 25%;'],
            'filter' => DateRangePicker::widget([
                'model' => $searchModel,
                'attribute' => 'rango_fecha',
                'useWithAddon'=>false,
                'convertFormat'=>true,
                'pluginOptions'=>[
                    'locale'=>['format'=>'Y-m-d']
                ],
            ])
            ],


            [
              'attribute'=>'codtipo',
              'value'=> function ($model, $key, $index, $widget) {

                    if ($model->codtipo0->ingreso) {
                      return '<span class="label label-success ">' . $model->codtipo0->descripcion . '</span>';
                    } else {
                      return '<span class="label label-danger ">' . $model->codtipo0->descripcion . '</span>';
                    }

                   //return $model->codtipo0->descripcion;
              },



              'filterType'=>GridView::FILTER_SELECT2,
              'filter'=>ArrayHelper::map(app\models\ConceptosOut::find()->asArray()->all(),
              'cod', 'descripcion'),
              'filterWidgetOptions'=>[
                  'pluginOptions'=>['allowClear'=>true],
              ],
              'filterInputOptions'=>['placeholder'=>'Concepto'],
              'format'=>'raw',




            ],


            // 'observaciones',
            // 'codcat',
            // 'costo_carne',
            // 'codtipo',

            [  'class' => '\kartik\grid\ActionColumn',
                  'template' => '{update}{delete} ',
                  // 'dropdown' => true,
                  'buttons' => [
                   'desincorporar' => function ($url, $model) {
                     return Html::a('<span class="glyphicon glyphicon-remove"></span>',
                         ['desincorporaciones/create','id'=>$model->cod],
                         ['title'=>'Desincorporar' ]);

                    },

                    'incorporar' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-thumbs-up"></span>', ['out-descarte', 'id' => $model->cod], [
                          'title' => 'Sacar de Situacion de Descarte',
                          'data' => [
                              'confirm' => 'Esta Seguro de Sacar de Situación de Descarte?',
                              'method' => 'post',
                          ],
                       ]);
                     },
                ],
              ],
        ];


        echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
        ]);
     ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); ?>
</div>
</div>
</div>
