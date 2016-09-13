<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid\GridExportAsset;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use app\models\Bovinos;
use app\models\Servicios;
use app\models\BovinosSearch;
use kartik\export\ExportMenu;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use kartik\editable\Editable;
use rmrevin\yii\fontawesome\FA;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BovinosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hembras Reproductoras';
$this->params['breadcrumbs'][] = $this->title;
?>




 <div class="bovinos">
    <div class="box box-danger">
              <div class="box-header with-border">
                <p>
                  <?=
                       Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('pie-chart')]) . ' Ver Resumen Reproductivo',
                      ['bovinos/estadistica-madres'],

                      ['title'=>'Ver Resumen Reproductivo',
                      'class'=>"btn btn-success",
                     ]);


                   ?>


                </p>
              </div>




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
          'class'=>'kartik\grid\ExpandRowColumn',
          'width'=>'50px',
          'value'=>function ($model, $key, $index, $column) {
              return GridView::ROW_COLLAPSED;
          },
          'detail'=>function ($model, $key, $index, $column) {
              return Yii::$app->controller->renderPartial('_view_resumen_madres', ['model'=>$model]);
          },
          'headerOptions'=>['class'=>'kartik-sheet-style'],
          'expandOneOnly'=>true

        ],

        [
              'class'=>'kartik\grid\EditableColumn',
              'attribute'=>'programa_reproductivo',

              'editableOptions'=>    [
              'name'=>'province',
              'asPopover' => true,
              'header' => 'Programa Reproductivo',

              'inputType' => Editable::INPUT_DROPDOWN_LIST,
              'data'=> [0 => 'Temporada de Monta', 1 => 'Monta Continua', 2 => 'Monta Controlada', 3 => 'I.A.'], // any list of values
              'options' => ['class'=>'form-control', 'prompt'=>'Seleccione Programa Reproductivo...'],
              'editableValueOptions'=>['class'=>'text-primary'],
              'displayValueConfig'=> [
              '0' => FA::icon('calendar-check-o') . ' Temporada de Monta',
              '1' => '<i class="glyphicon glyphicon-thumbs-down"></i> fail',
              '2' => '<i class="glyphicon glyphicon-hourglass"></i> waived',
              '3' => FA::icon('tencent-weibo') . ' I.A',
              ],
              ],
              'hAlign'=>'right',
              'vAlign'=>'middle',
              'width'=>'7%',



        ],

        [
            'attribute'=>'status_fisiologico',
            'value'=>function ($model, $key, $index, $widget) {

                  if ($model->status_fisiologico==0) {
                    return '<span class="label label-danger">' . $model->statusfisiologico . '</span>';
                  } else {
                    if ($model->status_fisiologico==1){
                    return '<span class="label label-warning ">' . $model->statusfisiologico . '</span>';
                  } else {
                    if ($model->status_fisiologico==2) {
                        return '<span class="label label-success ">' . $model->statusfisiologico . '</span>';
                    } else {
                      return '<span class="label label-primary ">' . $model->statusfisiologico . '</span>';
                    }

                  }
                }
          },
            'filter' => Html::activeDropDownList($searchModel,
            'status_fisiologico', ArrayHelper::map(app\models\Bovinos::getOptionsStatusFisiologico(),
            'id', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar Estado Fisiologico']),
            'format'=>'raw',
        ],




        [
            'attribute'=>'Categoria Actual',
            'value'=>'codcatActual.descripcion',
            'filter' => Html::activeDropDownList($searchModel,
            'codcat_actual', ArrayHelper::map(app\models\BovinosCategoria::find()->where(['ind_reproduccion'=>true])->asArray()->all(),
            'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar Categoria Actual']),
        ],

        [
          'attribute'=>'isdescartable',
          'filter' =>['0'=>'No',
                      '1'=>'Si'],
          'value'=>function ($model, $key, $index, $widget){
            if ($model->isdescartable==true) {
              return '<span class="label label-danger">Si</span>';
            } else {

              return '<span class="label label-success ">No</span>';
            }
          },
          'format'=>'raw',
          'options'=>[
            'prompt'=>'Seleeciones',
          ]
        ],



      [
            'attribute'=>'Edad Aproximada',
            'value'=>'Edad',
        ],



        [  'class' => '\kartik\grid\ActionColumn',
              'template' => '{palpar}{inseminar}{ver}',
              // 'dropdown' => true,
              'buttons' => [
               'palpar' => function ($url, $model) {

                    if (Servicios::getServiceActive($model->cod)==0 && $model->programa_reproductivo==0 ) {
                        //return  Servicios::getServiceActive($model->cod);

                      return Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('hand-lizard-o')]),
                          ['servicios/create','id'=>$model->cod],

                          ['title'=>'Registrar Servicio de Palpación',
                          'class'=>'green',
                         ]);

                    }








                },




                  'inseminar' => function ($url, $model) {
                   if (Servicios::getServiceActive($model->cod)==0 && $model->programa_reproductivo==3 ) {
                    return Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('tencent-weibo')]),
                        ['servicios/inseminar','id'=>$model->cod],
                        ['title'=>'Realizar Servicio de Inseminación',
                         'style'=>"color: #5cb85c",
                        ]);
                     }
                   },



                   'ver' => function ($url, $model) {

                        if (Servicios::getServiceActive($model->cod)!=0) {
                            //return  Servicios::getServiceActive($model->cod);

                          return Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('stethoscope')]) . ' Servicio Activo',
                              ['servicios/view1','id'=>$model->cod],

                              ['title'=>'Administrar Servicio Activo',
                              'class'=>"btn btn-success",
                             ]);

                        }
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
        'pjax'=>true,
    'pjaxSettings'=>[
        'neverTimeout'=>true,

    ]
    ]); ?>

</div>
</div>
</div>
