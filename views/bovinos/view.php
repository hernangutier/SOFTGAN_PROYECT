<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\dropdown\DropdownX;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\editable\Editable;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */

$this->title = 'Datos del Animal: ' . $model->codbov;
$this->params['breadcrumbs'][] = ['label' => 'Bovinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;




$script="function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find('i.indicator')
        .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);
$('#accordion1').on('hidden.bs.collapse', toggleChevron);
$('#accordion1').on('shown.bs.collapse', toggleChevron);
$('#accordion2').on('shown.bs.collapse', toggleChevron);
$('#accordion3').on('shown.bs.collapse', toggleChevron);
$('#accordion-sub').on('hidden.bs.collapse', toggleChevron);
$('#accordion-sub').on('shown.bs.collapse', toggleChevron);";


$this->registerJs($script);


?>
<div class="box box-primary">

          <!-- /.box-header -->
          <!-- form start -->
          <form role="form">
            <div class="box-body">

<div class="bovinos-view">

    <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //-------------Atributos de la Vista General --------
    //---------------------------------------------------
    //---------------------------------------------------
     -->

    <?php

    $attributes = [
    [
        'group'=>true,
        'label'=>'Datos Basicos',
        'rowOptions'=>['class'=>'info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'codbov',
                'format'=>'raw',
                'value'=>'<kbd>'.$model->codbov.'</kbd>',
                'valueColOptions'=>['style'=>'width:20%'],
                'displayOnly'=>true
            ],

            [
                'attribute'=>'sexo',
                'label'=>'Sexo #',
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:20%']
            ],

            [
                'attribute'=>'status',
                'label'=>'Estatus?',
                'format'=>'raw',
                'value'=>$model->status ? '<span class="label label-success">Activo</span>' : '<span class="label label-danger">Desincorporado</span>',
                'valueColOptions'=>['style'=>'width:50%']
            ],

        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'codbov',
                'format'=>'raw',
                'label'=>'Rebaño o Lote',
                'value'=>$model->codrebano0->descripcion,
                'valueColOptions'=>['style'=>'width:20%'],
                'displayOnly'=>true
            ],

            [
                'attribute'=>'codbov',
                'label'=>'Raza ',
                'value'=>$model->codraza0->descripcion,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:20%']
            ],

            [
                'attribute'=>'codgan',
                'label'=>'Tipo de Ganaderia ',
                'value'=>$model->getTipo(),
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:20%']
            ],


        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'fnac',
                'format'=>'date',
                'valueColOptions'=>['style'=>'width:30%']
            ],

            [
                'attribute'=>'fingreso',
                'format'=>'date',
                'valueColOptions'=>['style'=>'width:30%']
            ],

            [
                'attribute'=>'codbov',
                'label'=>'Tipo de Ingreso ',
                'value'=>$model->getTipoIngreso(),
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],


    ],
 ],
  [
        'columns' => [
            [
                'attribute'=>'codcat_ingreso',
                'format'=>'raw',
                'label'=>'Categoria de Ingreso',
                'value'=>$model->codcatIngreso->descripcion,
                'valueColOptions'=>['style'=>'width:20%'],
                'displayOnly'=>true
            ],

            [
                'attribute'=>'codcat_actual',
                'label'=>'Categoria Actual',
                'value'=>$model->codcatActual->descripcion,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:20%']
            ],

            [
                'attribute'=>'codcat_futura',
                'label'=>'Categoria a Futuro ',
                'value'=>$model->codcatFutura->descripcion,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:20%']
            ],

        ],
    ],
 [
        'columns' => [
            [
                'attribute'=>'edad',
                'format'=>'raw',
                'valueColOptions'=>['style'=>'width:30%']
            ],

            [
                'attribute'=>'color',
                'label'=>'Color ',
                'value'=>$model->color0->descripcion,


                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:20%']
            ],


            [
                'attribute'=>'isdescartable',
                'label'=>'En situacion de Descarte',
                'format'=>'raw',
                'value'=>$model->isdescartable ? '<span class="label label-warning">Si</span>' : '<span class="label label-success">No</span>',
                'valueColOptions'=>['style'=>'width:50%']
            ],




    ],
 ],





    [
        'group'=>true,
        'label'=>'Informacion de Pesos Registrados',
        'rowOptions'=>['class'=>'info'],
        //'groupOptions'=>['class'=>'text-center']
    ],

    [
        'columns' => [
            [
                'attribute'=>'peso_nacer',
                'valueColOptions'=>['style'=>'width:30%'],
            ],

        ]
    ],


];

?>

    <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //------------- Fin  Atributos ----------------------
    //---------------------------------------------------
    //---------------------------------------------------
    -->


    <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //------------- Opciones del Menu -------------------
    //---------------------------------------------------
    //---------------------------------------------------
    -->



    <div class="btn-group" role="group" aria-label="...">
      <?php
                if ($model->status==true) {
                echo '<a href='.Url::to(['bovinos/create']).' class="btn btn-success btn-group-lg"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Crear Bovino</a>';
                echo  '<a href='.Url::to(['bovinos/update','id'=>$model->cod]) .' type="button" class="btn btn-primary btn-group-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Editar Bovino</a>';

       } ?>
    <div class="btn-group" role="group">
     <?php
        if ($model->status==true) {
          echo '<button type="button"  class="btn btn-warning dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
          echo '<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                    Desincorporar
                <span class="caret"></span>';
          echo  '</button>
                <ul class="dropdown-menu">
                    <li><a href='. Url::to(['desincorporaciones/create','id'=>$model->cod ]) .  '>Registrar Venta</a></li>
                    <li><a href="#">Registrar Otros Motivo</a></li>
                </ul>';

        }
      ?>



  </div>

          <?php
                if ($model->status==true){
                  echo '<a  href='. Url::to(['geneologia/create','id'=>$model->cod]) .'   class="btn btn-primary btn-group-xs"> <span class="glyphicon glyphicon-repeat"> </span>     Registrar Geneologia</a>';
                }
           ?>
          <a  href="javascript:window.history.back();"   class="btn btn-info btn-group-xs"> <span class="glyphicon glyphicon-repeat"> </span>     Volver</a>
    </div>

<br>
<br>















    <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //------------- Panel Collapsable General -----------
    //---------------------------------------------------
    //---------------------------------------------------
    -->

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">

      <h4 class="panel-title">
        <a data-toggle="collapse" href="#colp1">Datos Generales...
           </a><i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>

      </h4>
    </div>
    <div id="colp1" class="panel-collapse collapse in" >
      <div class="panel-body">
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
    </div>
    </div>

     <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //------------- Final Panel Collapsable General -----
    //---------------------------------------------------
    //---------------------------------------------------
     -->


      <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //------------- Panel Collapsable Pesaje ------------
    //---------------------------------------------------
    //---------------------------------------------------
     -->


<div class="panel-group" id="accordion1">
  <div class="panel panel-default">
    <div class="panel-heading">

      <h4 class="panel-title">
        <a data-toggle="collapse" href="#colp2">Registro de Pesos Vivo
           </a><i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>

      </h4>
    </div>
    <div id="colp2" class="panel-collapse collapse " >
      <div class="panel-body">
 <?php

     $query = app\models\RegistroPesos::find()->where(['codbov'=>$model->cod])->andFilterWhere(['>', 'peso', 0]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
 ?>

 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'codbov',
            [
                'attribute'=>'tpeso0.descripcion',
                'label'=>'Descripcion del Peso',

            ],
            'fecha_plan',
            'peso',

            ['class' => 'yii\grid\ActionColumn','template' => '{view}',]
        ],
    ]); ?>

</div>
</div>
</div>

    <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //------------- Fin Panel Collapsable Pesaje --------
    //---------------------------------------------------
    //---------------------------------------------------
     -->



    <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //-------------Panel Collapsable Sanidad ------------
    //---------------------------------------------------
    //---------------------------------------------------
     -->

<div class="panel-group" id="accordion2">
  <div class="panel panel-default">
    <div class="panel-heading">

      <h4 class="panel-title">
        <a data-toggle="collapse" href="#colp3">Datos de Sanidad
           </a><i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>

      </h4>
    </div>
    <div id="colp3" class="panel-collapse collapse " >
      <div class="panel-body">

    </div>
    </div>
    </div>

    <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //-------------Panel Collapsable Otros Datos---------
    //---------------------------------------------------
    //---------------------------------------------------
     -->

     <div class="panel-group" id="accordion3">
  <div class="panel panel-default">
    <div class="panel-heading">

      <h4 class="panel-title">
        <a data-toggle="collapse" href="#colp4">Otros Datos
           </a><i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>

      </h4>
    </div>
    <div id="colp4" class="panel-collapse collapse " >
      <div class="panel-body">





<?php
    if ($model->sexo=='H'){
        echo DetailView::widget([
    'model'=>$model,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'Historial de Lactancia' . $model->cod,
        'type'=>DetailView::TYPE_DANGER,
    ],
    'attributes'=>[

        ['attribute'=>'fingreso', 'type'=>DetailView::INPUT_DATE],
    ]
]);
    }
?>
</div>
</div>
</div>

    <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //-------Final Panel Collapsable Otros Datos---------
    //---------------------------------------------------
    //---------------------------------------------------
     -->


     <!--
    //---------------------------------------------------
    //---------------------------------------------------
    //-------Panel Collapsable Datos de Reproduccion-----
    //---------------------------------------------------
    //---------------------------------------------------
     -->

     <div class="panel-group" id="accordion3">
  <div class="panel panel-default">
    <div class="panel-heading">

      <h4 class="panel-title">
        <a data-toggle="collapse" href="#colp5">Datos de Reproducción
           </a><i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>

      </h4>
    </div>
    <div id="colp5" class="panel-collapse collapse " >
      <div class="panel-body">





    </div>
    </div>
    </div>

</div>

</div>
</div>
