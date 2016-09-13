<?php

use yii\helpers\Html;

use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\grid\GridExportAsset;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VentasLotesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas por Lotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-lotes-index">

  <div class="bovinos">
    <div class="box box-primary">
              <div class="box-header with-border">
    <p>
        <?= Html::a('Aperturar Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute'=>'ncntrol',
                'label'=>'N° de Control',
                'vAlign'=>'middle',
                'width'=>'250px',
                'value'=>function ($searchModel, $key, $index, $widget) {
                    return Html::a($searchModel->ncontrol,
                        ['view','id'=>$searchModel->cod],
                        ['title'=>'Ver Datos del Bovino',

                        ]);
                },

                'format'=>'raw'
            ],

            [
              'attribute'=>'codclient',
              'value'=>function ($model, $key, $index, $widget) {
                  return Html::a($model->codclient0->razon,
                           ['clientes/view', 'id' => $model->codclient0->cod],
                           ['title'=>'Ver Detalle del Cliente',
                             'style'=>"color:#5cb85c",
                           ]);
                   },
              'filterType'=>GridView::FILTER_SELECT2,
              'filter'=>ArrayHelper::map(app\models\Clientes::find()->asArray()->all(),
              'cod', 'razon'),
              'filterWidgetOptions'=>[
                  'pluginOptions'=>['allowClear'=>true],
              ],
              'filterInputOptions'=>['placeholder'=>'Filtrar N° de Bovino'],
              'format'=>'raw',




            ],

            'fecha',

            [
                'attribute'=>'status',
                'value'=>function ($model, $key, $index, $widget) {

                      if ($model->status==0) {
                        return '<span class="label label-warning">Pendiente</span>';
                      } else {
                        if ($model->status==1){
                        return '<span class="label label-primary">Procesada</span>';
                      } else {
                        return '<span class="label label-danger">Anulada</span>';
                      }
                    }
              },
                'filter' => Html::activeDropDownList($searchModel,
                'status', ArrayHelper::map(app\models\VentasLotes::getStatusOptions(),
                'id', 'value'),['class'=>'form-control','prompt' => 'Filtrar Estatus']),
                'format'=>'raw',
            ],



            // 'status',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
</div>
