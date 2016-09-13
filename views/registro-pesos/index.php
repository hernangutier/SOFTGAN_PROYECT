<?php

use yii\helpers\Html;

use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\helpers\Url;

use yii\helpers\ArrayHelper;
use app\models\Bovinos;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistroPesosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro Pesos Vivos' ;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registro-pesos-index">

   <p>
        <?= Html::a('Ver Resumen', ['resumen','ano'=>$searchModel->ano,'tpeso'=>$searchModel->tpeso], ['class' => 'btn btn-pri->tpesomary']) ?>
</p>
    <?php
    $attributes = [
    [
        'group'=>true,
        'label'=>'Datos del Registro',
        'rowOptions'=>['class'=>'info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'tpeso',
                'format'=>'raw',
                'label'=>'Tipo de Pesaje',
                'value'=>'<code>'.$searchModel->tpeso0->descripcion.'</code>',
                'valueColOptions'=>['style'=>'width:20%'],
                'displayOnly'=>true
            ],

            [
                'attribute'=>'Tiempo',
                'format'=>'raw',
                'label'=>'Tiempo a Evaluar',
                'value'=>$searchModel->tpeso0->tiempo,
                'valueColOptions'=>['style'=>'width:20%'],
                'displayOnly'=>true
            ],

            [
                'attribute'=>'Maximo',
                'format'=>'raw',
                'label'=>'Maximo dias permitidos para pesar fuera de tiempo',
                'value'=>$searchModel->tpeso0->max_dias,
                'valueColOptions'=>['style'=>'width:20%'],
                'displayOnly'=>true
            ],



        ],
    ],



 [
        'columns' => [
            [
                'attribute'=>'ano',
                'format'=>'raw',
                'label'=>'Año de Pesaje',
                'value'=>'<code>' .$searchModel->ano .'</code>',
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'avg',
                'format'=>'raw',
                'label'=>'Promedio de Pesaje',
                'value'=>'<code>' .number_format($searchModel->avg,2) .'</code>',
                'valueColOptions'=>['style'=>'width:30%']
            ],






    ],
 ],

];
?>
<?php
$gridColumns = [
[
    'class'=>'kartik\grid\SerialColumn',
    'contentOptions'=>['class'=>'kartik-sheet-style'],
    'width'=>'36px',
    'header'=>'',
    'headerOptions'=>['class'=>'kartik-sheet-style']
],
[
    'attribute'=>'codbov',
    'label'=>'N° de Bovino',
    'vAlign'=>'middle',
    'width'=>'250px',
    'value'=>function ($searchModel, $key, $index, $widget) {
        return Html::a($searchModel->codbov0->codbov,
            '#',
            ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
    },
    'filterType'=>GridView::FILTER_SELECT2,
    'filter'=>ArrayHelper::map(Bovinos::find()->orderBy('codbov')->asArray()->all(), 'cod', 'codbov'),
    'filterWidgetOptions'=>[
        'pluginOptions'=>['allowClear'=>true],
    ],
    'filterInputOptions'=>['placeholder'=>'Filtrar Bovino'],
    'format'=>'raw'
],
[
    //'class'=>'kartik\grid\EditableColumn',
    'attribute'=>'fecha_plan',
    'hAlign'=>'center',
    'vAlign'=>'middle',
    'width'=>'30%',
    'format'=>'date',
    'xlFormat'=>"mmm\\-dd\\, \\-yyyy",
    'headerOptions'=>['class'=>'kv-sticky-column'],
    'contentOptions'=>['class'=>'kv-sticky-column'],


],

[
    'attribute'=>'peso',
    'vAlign'=>'middle',
    'hAlign'=>'right',
    'width'=>'7%',
    'format'=>['decimal', 2],
    'pageSummary'=>true
],
[
                'attribute'=>'codbov',
                'format'=>'raw',
                'label'=>'Peso Diario a la Fecha de Pesaje',
                'value'=>function ($searchModel, $key, $index, $widget) {
                    //-------------- Calculamos los Dias Transcurridos a la Fecha de Pesaje


                            return number_format($searchModel->pesodia,2);

                 }

],

[
                'attribute'=>'codbov',
                'format'=>'raw',
                'label'=>'Peso Relativo a Evaluar',
                'value'=>function ($searchModel, $key, $index, $widget) {
                    //-------------- Calculamos los Dias Transcurridos a la Fecha de Pesaje


                            return $searchModel->pesorelativoevaluado;

                 }

],
[
                'attribute'=>'codbov',
                'format'=>'raw',
                'label'=>'Dias Trancurridos',
                'value'=>function ($searchModel, $key, $index, $widget) {
                    $valor=($searchModel->tpeso0->edad - $searchModel->codbov0->dias);
                    if ($valor>=0) {
                            return $valor;
                        } else {
                            return 'Tiempo Exedido ';
                        }
                        ;
                 }

],

[
        'class' => '\kartik\grid\ActionColumn',
        'template' => '{update}',
        'buttons' => [

                 'update' => function ($url,$model) {
                          $valor=($model->tpeso0->edad - $model->codbov0->dias);
                    if ($valor>=0) {
                        if ($valor<=$model->tpeso0->max_dias) {
                            return  Html::a('<span class="glyphicon glyphicon-pencil"></span>',['update','id'=>$model->cod,'url'=>Url::current()]);
                        } else {
                            return '';
                        }


                       }else {
                         return  Html::a('<span class="glyphicon glyphicon-pencil"></span>',['update','id'=>$model->cod,'url'=>Url::current()]);
                       }


                    },
        ],
    ]

];
?>

<!--  vISTA DEL pESAJE  -->
 <?php
echo DetailView::widget([
    'model' => $searchModel,
    'attributes' => $attributes,
    'mode' => 'view',
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    //'hAlign'=>$hAlign,
    //'vAlign'=>$vAlign,
    //'fadeDelay'=>$fadeDelay,
    'deleteOptions'=>[ // your ajax delete parameters
        'params' => ['id' => 1000, 'kvdelete'=>true],
    ],
    'container' => ['id'=>'kv-demo'],
    //'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
]);
?>



    <?=  GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'rowOptions'=> function($model){
            $valor=($model->tpeso0->edad - $model->codbov0->dias);
                    if ($valor>=0) {
                        if ($valor<$model->tpeso0->max_dias) {
                            if ($model->peso>0)
                                return ['class'=>'info'];
                         else
                            if ($model->peso==0)
                                return ['class'=>'warning'];
                         } else

                            return ['class'=>'danger'];

                        } else {
                            return ['class'=>'success'];
                        }




        },
    'columns' => $gridColumns,
    'responsive'=>true,
    'hover'=>true
    ]);
    ?>

</div>
