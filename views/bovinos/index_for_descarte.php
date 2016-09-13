<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid\GridExportAsset;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use app\models\Bovinos;
use app\models\BovinosSearch;
use kartik\export\ExportMenu;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $searchModel app\models\BovinosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bovinos en Situacion de Descarte';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-index">
  <div class="box box-warning">
            <div class="box-header with-border">





    <?php Pjax::begin(['id' => 'bovinos']) ?>
    <?php
    //$searchModel=new busqueda();
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],


        [
            'attribute'=>'codbov',
            'label'=>'N° de Bovino',
            'vAlign'=>'middle',
            'width'=>'250px',
            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->codbov,
                    ['view1','id'=>$searchModel->cod],
                    ['title'=>'Ver Datos del Bovino' ]);
            },
            /*
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Bovinos::find()->where(['status'=>true])->orderBy('codbov')->asArray()->all(), 'cod', 'codbov'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Filtrar Bovino'],
            */
            'format'=>'raw'
        ],

        [
            'attribute'=>'Sexo',
            'value'=>'sexo',
            'filter' => Html::activeDropDownList($searchModel,
            'sexo', ArrayHelper::map([['cod'=>'H','descripcion'=>'Hembra'],
                        ['cod'=>'M','descripcion'=>'Macho']],
                        'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Sexo']),
        ],

        [
            'attribute'=>'Tipo de Ganaderia',
            'value'=>'tipo',
            'filter' => Html::activeDropDownList($searchModel,
            'codganaderia', ArrayHelper::map(app\models\TipoGanaderia::getTipos(),
            'id', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar Tipo de Ganaderia']),
        ],

        [
            'attribute'=>'Categoria Actual',
            'value'=>'codcatActual.descripcion',
            'filter' => Html::activeDropDownList($searchModel,
            'codcat_actual', ArrayHelper::map(app\models\BovinosCategoria::find()->asArray()->all(),
            'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar Categoria Actual']),
        ],

        [
            'attribute'=>'Rebaño o Lote',
            'value'=>'codrebano0.descripcion',
            'filter' => Html::activeDropDownList($searchModel,
            'codrebano', ArrayHelper::map(app\models\BovinosRebanos::find()->asArray()->all(),
            'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Rebaño o Lote']),
        ],
        [
            'attribute'=>'Raza',
            'value'=>'codraza0.descripcion',
            'filter' => Html::activeDropDownList($searchModel,
            'codraza', ArrayHelper::map(app\models\BovinosRazas::find()->asArray()->all(),
            'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Raza']),
        ],

      [
            'attribute'=>'Edad Aproximada',
            'value'=>'Edad',
        ],



        [  'class' => '\kartik\grid\ActionColumn',
              'template' => '{desincorporar}{incorporar} ',
              // 'dropdown' => true,
              'buttons' => [
               'desincorporar' => function ($url, $model) {
                 return Html::a('<span class="glyphicon glyphicon-thumbs-down"></span>',
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



        //
    ];

    echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
    ]);


     ?>
    <?= GridView::widget([
        'dataProvider' =>  $dataProvider,
        'filterModel' => $searchModel,

        'hover'=>true,

        'columns' => $gridColumns,
    ]); ?>
    <?php Pjax::end() ?>
</div>
</div>
</div>
