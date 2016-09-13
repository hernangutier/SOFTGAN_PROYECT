<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use app\Models\Bovinos;
use rmrevin\yii\fontawesome\FA;
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


<?php
$searchModel = new app\models\ServiciosSearch();
                    $searchModel->codbov=$model->cod;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                      echo GridView::widget([
                          'dataProvider' => $dataProvider,
                          //'filterModel' => $searchModel,
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],


                             ['class' => 'yii\grid\ActionColumn',
                             'template' => '{ver}',
                             // 'dropdown' => true,
                             'buttons' => [
                              'ver' => function ($url, $model) {
                                return Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('eye')]),
                                      Url::to(['servicios/view','id'=>$model->cod]),
                                      ['title'=>'Ver Servicio']
                                    );
                                },
                              ],
                             ],



                              [
                                  'attribute'=>'fecha_palpacion',
                                  'value'=>function($model){
                                    return date_format(date_create($model->fecha_palpacion), 'd/m/Y');
                                  },
                                  'format'=>'raw',
                              ],
                              [
                                  'attribute'=>'programa_reproductivo',
                                  'value'=>function($model){
                                    if ($model->programa_reproductivo==0){
                                      return  FA::icon('calendar-check-o') . 'Temporada de Monta';
                                    }
                                    if ($model->programa_reproductivo==3){
                                      return  FA::icon('tencent-weibo') . ' I.A.';
                                    }
                                  },
                                  'format'=>'raw',

                              ],


                              [
                                'attribute'=>'status',
                                'value'=>function($model){
                                    if ($model->status) {
                                      return '<span class="label label-success">Activo</span>';
                                    } else {
                                      return '<span class="label label-danger">Finalizado</span>';
                                    }


                                },
                                'format'=>'raw',
                              ],

                              [
                                'attribute'=>'status_servicio',
                                'value'=>function($model){
                                    if ($model->status_servicio==0) {
                                      return '<span class="label label-success">Preñada</span>';
                                    } else {
                                      if ($model->status_servicio==1) {
                                      return '<span class="label label-danger">No Preñada</span>';
                                    } else {
                                      return '<span class="label label-info">En Espera de Confirmación</span>';
                                    }
                                  }


                                },
                                'format'=>'raw',
                              ],



                              [
                                'attribute'=>'efectividad',
                                'label'=>'Valoracion Final del Servcio',
                                'value'=>function($model){
                                    if ($model->efectividad==0) {
                                      return '<span class="label label-danger">Fallido</span>';
                                    } else {
                                      if ($model->efectividad==1) {
                                      return '<span class="label label-success">Efectivo</span>';
                                    } else {
                                      return '<span class="label label-info">En Espera</span>';
                                    }
                                  }


                                },
                                'format'=>'raw',
                              ],


                              [  'class' => 'yii\grid\ActionColumn',
                              'template' => '{imprimir}{parto}{suceso}',
                              // 'dropdown' => true,
                              'buttons' => [
                               'imprimir' => function ($url, $model) {
                                 return Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('file-pdf-o')]),
                                     ['servicios/view-print','id'=>$model->cod],

                                     ['title'=>'Generar PDF',
                                     'class'=>'green',
                                    ]);

                                },
                                /*
                                'parto' => function ($url, $model) {
                                 if ($model->status_fisiologico>1 && $model->status && $model->status_parto==0) {
                                  return Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('intersex')]),
                                      ['servicios/informate-parto','id'=>$model->cod],
                                      ['title'=>'Informar Parto',
                                       'style'=>"color: #5cb85c",
                                      ]);
                                   }
                                 },


                                 'suceso' => function ($url, $model) {
                                  if ($model->status_fisiologico!=0 && $model->status) {
                                   return Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('minus-square-o')]),
                                       ['servicios/close','id'=>$model->cod],
                                       ['title'=>'Registrar Perdida o Inefectividad del Servicio',
                                        'style'=>"color: #d9534f",
                                       ]);
                                    }
                                  },
                                */

                                ],
                              ],
                              // 'fecha_teorica_parto',
                              // 'diagnostico_reproductivo',
                              // 'diagnostico_general',
                              // 'valuacion',
                              // 'tipo',
                              // 'codtoro',
                              // 'status:boolean',



                      ],]);



 ?>
