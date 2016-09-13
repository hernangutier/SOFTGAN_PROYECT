<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RegistroPesos */

$this->title = 'Resumen del Pesaje del Animal: ' . $model->codbov0->codbov;
$this->params['breadcrumbs'][] = ['label' => 'Registro Pesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registro-pesos-view">



    <?php 
    $attributes = [
    [
        'group'=>true,
        'label'=>'Datos de Bovino',
        'rowOptions'=>['class'=>'info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'codbov', 
                'format'=>'raw', 
                'label'=>'N° de Bovino',
                'value'=>'<kbd>'.$model->codbov0->codbov.'</kbd>',
                'valueColOptions'=>['style'=>'width:20%'], 
                'displayOnly'=>true
            ],

            [
                'attribute'=>'codbov', 
                'format'=>'raw',
                'label'=>'Sexo', 
                'value'=>$model->codbov0->sexo,
                'valueColOptions'=>['style'=>'width:20%'], 
                'displayOnly'=>true
            ],

            
            
        ],
    ],

    

 [
        'columns' => [
            [
                'attribute'=>'codbov', 
                'format'=>'raw',
                'label'=>'Edad Aproximada',
                'value'=>$model->codbov0->edad,
                'valueColOptions'=>['style'=>'width:30%']
            ],

            
            

            
        
    ],
 ],   

 [
        'group'=>true,
        'label'=>'Datos del Pesaje',
        'rowOptions'=>['class'=>'info']
    ],   


[
        'columns' => [
            [
                'attribute'=>'tpeso', 
                'format'=>'raw', 
               
                'value'=>$model->tpeso0->descripcion,
                'valueColOptions'=>['style'=>'width:20%'], 
                'displayOnly'=>true
            ],

            [
                'attribute'=>'codbov', 
                'format'=>'raw',
                'label'=>'Tiempo estimado para pesar', 
                'value'=>$model->tpeso0->tiempo ,
                'valueColOptions'=>['style'=>'width:20%'], 
                'displayOnly'=>true
            ],

            
            
        ],
    ],

[
        'columns' => [
            [
                'attribute'=>'fecha_plan', 
                'format'=>'raw', 
               
                'value'=>$model->fecha_plan,
                'valueColOptions'=>['style'=>'width:20%'], 
                'displayOnly'=>true
            ],

            [
                'attribute'=>'codbov', 
                'format'=>'raw',
                'label'=>'Peso al Nacer', 
                'value'=>$model->codbov0->peso_nacer . ' Kgrs',
                'valueColOptions'=>['style'=>'width:20%'], 
                'displayOnly'=>true
            ],

            
            
        ],
    ],

    [
        'group'=>true,
        'label'=>'Calculos del Pesaje',
        'rowOptions'=>['class'=>'info']
    ], 

    [
        'columns' => [
            [
                'attribute'=>'peso', 
                'format'=>'raw', 
                'label'=>'Peso  Registrado', 
                'value'=>$model->peso . ' Kgrs',
                'valueColOptions'=>['style'=>'width:20%'], 
                'displayOnly'=>true
            ],

            [
                'attribute'=>'codbov', 
                'format'=>'raw',
                'label'=>'Peso anterior Registrado', 
                'value'=>$model->codbov0->peso_nacer . ' Kgrs',
                'valueColOptions'=>['style'=>'width:20%'], 
                'displayOnly'=>true
            ],

            
            
        ],
    ],

   
];
?>


   

    
    <?php
echo DetailView::widget([
    'model' => $model,
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

</div>
