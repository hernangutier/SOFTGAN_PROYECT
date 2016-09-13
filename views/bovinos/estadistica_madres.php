<?php

use yii\helpers\Html;
use sjaakp\gcharts\PieChart;
use app\models\Bovinos;

/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */

$this->title ='Resumen Rebaño Madres';
$this->params['breadcrumbs'][] = ['label' => 'Bovinos Madres', 'url' => ['index-madres']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="resumen-madres-reproduccion">
<div class="row">


<div class="col-md-6 col-xs-12">


  <div class="box box-primary">
    <div class="box-header with-border">
      <i class="fa fa-pie-chart"></i>

      <h3 class="box-title">Distribucion General</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">


        <?= PieChart::widget([
            'height' => '350px',
            'dataProvider' => Bovinos::getResumenMadresGeneral(),
            'columns' => [
              'descripcion:string',
              'value'
            ],

            ])
      ?>




      </div>
    </div>
</div>
    <!-- /.box-body-->


    <div class="col-md-6 col-xs-12">


      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-pie-chart"></i>

          <h3 class="box-title">Distribucion de Preñez</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">


          <?= PieChart::widget([
              'height' => '350px',
              'dataProvider' => Bovinos::getResumenMadresPrenez(),
              'columns' => [
                'descripcion:string',
                'value'
              ],

              ])
        ?>




          </div>
        </div>
    </div>
        <!-- /.box-body-->

  </div>



</div>
