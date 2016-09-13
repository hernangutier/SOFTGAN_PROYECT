<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\RegistroPesos;
use  yii\db\Query;
use yii\widgets\Pjax;

use miloschuman\highcharts\Highcharts;
use scotthuangzl\googlechart\GoogleChart;

/* @var $this yii\web\View */
/* @var $model app\models\RegistroPesos */


$this->title = 'Resumen del Pesaje Periodo: ' ;
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
$('#accordion-sub').on('hidden.bs.collapse', toggleChevron);
$('#accordion-sub').on('shown.bs.collapse', toggleChevron);";


$this->registerJs($script);

  ?>


<div class="container">
<!--    Solapa de Ejecucion del Pesaje  -->

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">

      <h4 class="panel-title">
        <a data-toggle="collapse" href="#colp1"><em>Indicadores de Ejecucion de Pesaje </em> 
           </a><i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>

      </h4>
    </div>
    <div id="colp1" class="panel-collapse collapse in" >
      <div class="panel-body">

  <div class="panel-group" id="accordion-sub">
  <div class="panel panel-success">
    <div class="panel-heading">

      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion-sub" href="#collapse1">
        Bovinos Pesados </a><i class="indicator glyphicon glyphicon-chevron-up  pull-right"></i>




      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse ">
      <div class="panel-body">
         <?php Pjax::begin(['id'=>'pjax-job-gridview']) ?>
        <?php


        // add conditions that should always apply here




        echo GridView::widget([
        'id'=>'job-gridview',
        'dataProvider' => $model->getListPesados(),

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
          [
            'attribute'=>'codbov',
            'label'=>'N° de Bovino',

          ],
          [
            'attribute'=>'codbov0.sexo',
            'label'=>'Sexo',

          ],
          [
            'attribute'=>'codbov0.codcatActual.descripcion',
            'label'=>'Categoria',

          ],




        ],
    ]); ?>
 <?php Pjax::end() ?>
      </div>
    </div>
  </div>
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Bovinos no Pesados </a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">

        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡Atencion!</strong> Este Grupo corresponde a bovinos listo para pesar pero no se han registrado dichos pesos...
        </div>


        <?php


        echo GridView::widget([

        'dataProvider' => $model->getListNoPesados(),

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
          [
            'attribute'=>'codbov0.codbov',
            'label'=>'N° de Bovino',

          ],
          [
            'attribute'=>'codbov0.sexo',
            'label'=>'Sexo',

          ],
          [
            'attribute'=>'codbov0.codcatActual.descripcion',
            'label'=>'Categoria',

          ],




        ],
    ]); ?>


      </div>
    </div>
  </div>
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Bovinos Pendientes por Pesar </a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Atencion!</strong> Este Grupo corresponde a bovinos no pesados por no tener la edad para el pesaje...
    </div>
        <?php


        echo GridView::widget([

        'dataProvider' => $model->getListPendientesPeso(),

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
          [
            'attribute'=>'codbov0.codbov',
            'label'=>'N° de Bovino',

          ],
          [
            'attribute'=>'codbov0.sexo',
            'label'=>'Sexo',

          ],
          [
            'attribute'=>'codbov0.codcatActual.descripcion',
            'label'=>'Categoria',

          ],




        ],
    ]); ?>










      </div>
    </div>
  </div>

   <div style="display: none">



<?=
   Highcharts::widget([
   'scripts' => [
            'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
            //'modules/exporting', // adds Exporting button/menu to chart
            'themes/default',       // applies global 'grid' theme to all charts
            'highcharts-3d',
            //'modules/drilldown'
        ]
]);
?>


</div>

<div id="chart" >

<?php
$this->registerJs(
        "$(function () {
    $('#chart').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: '<b>Ejecucion de Pesaje </b>'
        },
        tooltip: {
            pointFormat: '{series.name}:  <b>{point.percentage:.1f}%</b>  <b>{point.y} Bovinos</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Resumen ',
            data: $main,
            colors: ['#5cb85c', '#F6F6AD', '#d9534f', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        }]
    });
});"
  );
?>



</div>

</div>


      </div>
      <div class="panel-footer">
        <button class="btn btn-success" type="button">
                  Total Pesados: <span class="badge"><?= $model->getListPesados()->getCount() ?></span>
        </button>
        <button class="btn btn-warning" type="button">
                  Total No Pesados: <span class="badge"><?= $model->getListNoPesados()->getCount() ?></span>
        </button>
        <button class="btn btn-danger" type="button">
                  Total Pendientes por Pesar: <span class="badge"><?= $model->getListPendientesPeso()->getCount() ?></span>
        </button>
      </div>
    </div>
  </div>

</div>



<!--  ************************************************   -->
<!--  ************************************************   -->
<!--  ************************************************   -->
<!--  ********* Indicadores de Promedios *************   -->
<!--  ************************************************   -->
<!--  ************************************************   -->
<!--  ************************************************   -->


<div class="panel-group" id="accordion1">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
         <a data-toggle="collapse" href="#colp2">Indicadores de Promedios del Pesaje
            </a><i class="indicator glyphicon glyphicon-chevron-up  pull-right"></i>




      </h4>
    </div>
    <div id="colp2" class="panel-collapse collapse">
      <div class="panel-body">

<div class="panel-group" id="ac-avg-higth">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#ac-avg-higth" href="#collap1">
        Bovinos con Pesos Optimos <span class="badge"><?= $model->getListPesoAlto()->getCount() ?></span> </a>

      </h4>
    </div>
    <div id="collap1" class="panel-collapse collapse ">
      <div class="panel-body">
         <?php Pjax::begin(['id'=>'pjax-job-gridview']) ?>
        <?php


        // add conditions that should always apply here




        echo GridView::widget([
        'id'=>'job-gridview',
        'dataProvider' => $model->getListPesoAlto(),

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
          [
            'attribute'=>'codbov',
            'label'=>'N° de Bovino',

          ],
          [
            'attribute'=>'codbov0.sexo',
            'label'=>'Sexo',

          ],
          [
            'attribute'=>'PesoRelativoEvaluado',
            'label'=>'Peso Regsitrado',


          ],




        ],
    ]); ?>
 <?php Pjax::end() ?>
      </div>
    </div>
  </div>
  </div>
  <div class="panel-group" id="ac-avg-low">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#ac-avg-low" href="#collap2">
        Bovinos con Pesos Bajos <span class="badge"><?= $model->getListPesoBajo()->getCount() ?></span></a>
      </h4>
    </div>
    <div id="collap2" class="panel-collapse collapse">
      <div class="panel-body">

        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡Atencion!</strong> Este Grupo corresponde a bovinos con pesos evaluados por debajo del promedio evaluado...
        </div>


        <?php


        echo GridView::widget([

        'dataProvider' => $model->getListPesoBajo(),

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
          [
            'attribute'=>'codbov0.codbov',
            'label'=>'N° de Bovino',

          ],
          [
            'attribute'=>'codbov0.sexo',
            'label'=>'Sexo',

          ],
          [
            'attribute'=>'PesoRelativoEvaluado',
            'label'=>'Peso Regsitrado',


          ],




        ],
    ]); ?>

       </div>
      </div>
    </div>
  </div>




<div id="chart1" >

<?php
$this->registerJs(
        "$(function () {
    $('#chart1').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: '<b>Distribución del Pesaje Evaluado</b>'
        },
        tooltip: {
            pointFormat: '{series.name}:  <b>{point.percentage:.1f}%</b>  <b>{point.y} Bovinos</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Resumen ',
            data: $data_avg,
            colors: ['#5cb85c', '#d9534f', '#d9534f', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        }]
    });
});"
  );
?>



</div>

</div>


      </div>
      <div class="panel-footer">

      <button class="btn btn-primary" type="button">
                  Promedio Evaluado: <span class="badge"><?= $model->getAvgEvaluado() ?></span>
      </button>
      <button class="btn btn-success" type="button">
                  Maximo Peso: <span class="badge"><?= $model->getMaxPeso() ?></span>
      </button>
       <button class="btn btn-danger" type="button">
                  Minimo Peso: <span class="badge"><?= $model->getMinPeso() ?></span>
      </button>



      </div>
    </div>

      <!--  ************************************************   -->
      <!--  ************************************************   -->
      <!--  ************************************************   -->
      <!--  ***** Fin Indicadores de Promedios *************   -->
      <!--  ************************************************   -->
      <!--  ************************************************   -->
      <!--  ************************************************   -->

      <!--  ************************************************   -->
      <!--  ************************************************   -->
      <!--  ************************************************   -->
      <!--  ***** Fin Indicadores de Promedios *************   -->
      <!--  ************************************************   -->
      <!--  ************************************************   -->
      <!--  ************************************************   -->

      <div class="panel-group" id="accordion2">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
         <a data-toggle="collapse" href="#colp3">Indicadores de Promedios del Pesaje
            </a><i class="indicator glyphicon glyphicon-chevron-up  pull-right"></i>




      </h4>
    </div>
    <div id="colp3" class="panel-collapse collapse">
      <div class="panel-body">

<div class="panel-group" id="ac-avg-higth">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#ac-avg-higth" href="#collap1">
        Bovinos con Pesos Optimos <span class="badge"><?= $model->getListPesoAlto()->getCount() ?></span> </a>

      </h4>
    </div>
    <div id="collap1" class="panel-collapse collapse ">
      <div class="panel-body">
         <?php Pjax::begin(['id'=>'pjax-job-gridview']) ?>
        <?php


        // add conditions that should always apply here




        echo GridView::widget([
        'id'=>'job-gridview',
        'dataProvider' => $model->getListPesoAlto(),

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
          [
            'attribute'=>'codbov',
            'label'=>'N° de Bovino',

          ],
          [
            'attribute'=>'codbov0.sexo',
            'label'=>'Sexo',

          ],
          [
            'attribute'=>'PesoRelativoEvaluado',
            'label'=>'Peso Regsitrado',


          ],




        ],
    ]); ?>
 <?php Pjax::end() ?>
      </div>
    </div>
  </div>
  </div>
  <div class="panel-group" id="ac-avg-low">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#ac-avg-low" href="#collap2">
        Bovinos con Pesos Bajos <span class="badge"><?= $model->getListPesoBajo()->getCount() ?></span></a>
      </h4>
    </div>
    <div id="collap2" class="panel-collapse collapse">
      <div class="panel-body">

        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡Atencion!</strong> Este Grupo corresponde a bovinos con pesos evaluados por debajo del promedio evaluado...
        </div>


        <?php


        echo GridView::widget([

        'dataProvider' => $model->getListPesoBajo(),

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
          [
            'attribute'=>'codbov0.codbov',
            'label'=>'N° de Bovino',

          ],
          [
            'attribute'=>'codbov0.sexo',
            'label'=>'Sexo',

          ],
          [
            'attribute'=>'PesoRelativoEvaluado',
            'label'=>'Peso Regsitrado',


          ],




        ],
    ]); ?>

       </div>
      </div>
    </div>
  </div>




<div id="chart1" >

<?php
$this->registerJs(
        "$(function () {
    $('#chart1').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: '<b>Distribución del Pesaje Evaluado</b>'
        },
        tooltip: {
            pointFormat: '{series.name}:  <b>{point.percentage:.1f}%</b>  <b>{point.y} Bovinos</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Resumen ',
            data: $data_avg,
            colors: ['#5cb85c', '#d9534f', '#d9534f', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        }]
    });
});"
  );
?>



</div>

</div>


      </div>
      <div class="panel-footer">

      <button class="btn btn-primary" type="button">
                  Promedio Evaluado Hembras: <span class="badge"><?= $model->getAvgEvaluado() ?></span>
      </button>
      <button class="btn btn-primary" type="button">
                  Promedio Evaluado Machos: <span class="badge"><?= $model->getAvgEvaluado() ?></span>
      </button>

      <button class="btn btn-success" type="button">
                  Maximo Peso: <span class="badge"><?= $model->getMaxPeso() ?></span>
      </button>
       <button class="btn btn-danger" type="button">
                  Minimo Peso: <span class="badge"><?= $model->getMinPeso() ?></span>
      </button>



      </div>





  </div>






</div>























</div>
