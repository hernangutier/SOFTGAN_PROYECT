<?php
use yii\helpers\Url;
use scotthuangzl\googlechart\GoogleChart;
use sjaakp\gcharts\PieChart;
use app\Models\Bovinos;
use kartik\widgets\Growl;
/* @var $this yii\web\View */
/* @var $actualizacion boolean */

$this->title = 'Softgan (Sistema Integral de Gestion Ganadera)';

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<?php
//-------- Actualizar Rebaño de Bovinos -------------
    $bool=Yii::$app->db->createCommand( "SELECT sp_update_categorias_all_bool()" )->queryScalar();
    if ($bool) {
      echo Growl::widget([
        'type' => Growl::TYPE_SUCCESS,
        'title' => 'Actualizacion!',
        'icon' => 'glyphicon glyphicon-remove-sign',
        'body' => 'Categorias de Bovinos Actualizadas...',
        'showSeparator' => true,
        'delay' => 2500,
        'pluginOptions' => [
            'showProgressbar' => true,
            'placement' => [
                'from' => 'top',
                'align' => 'right',
            ]
        ]
        ]);
    }
//---------------------------------------------------



 ?>
<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= app\models\Bovinos::getCountActivos() ?> <sup style="font-size: 20px"> Animales</sup></h3>

          <p>Inventario Activo</p>
        </div>
        <div class="icon">
          <i class="glyphicon glyphicon-thumbs-up"></i>
        </div>
        <a href='<?= Url::to(['bovinos/index']) ?>' class="small-box-footer">Mas Detalles <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= app\models\Bovinos::getCountDescartables() ?> <sup style="font-size: 20px"> Animales</sup></h3>

          <p>Inventario en Situacion de Descarte</p>
        </div>
        <div class="icon">
          <i class="glyphicon glyphicon-thumbs-down"></i>
        </div>
        <a href='<?= Url::to(['bovinos/index-for-descarte'])  ?>' class="small-box-footer">Mas Detalles <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= app\models\Bovinos::getCountDesincorporados() ?> <sup style="font-size: 20px"> Animales</sup></h3>

          <p>Inventario de Desincorporados</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href='<?= Url::to(['bovinos/index-desincorporados']) ?> ' class="small-box-footer">Mas Detalles  <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>




        <div class="col-12">
            <div id="carousel-1" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                        <li data-target="#carousel-1" data-slide-to="3"></li>

                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active" class="img-responsive" >
                            <img src="images/carousel1.jpg" alt="">
                            <div class="carousel-caption hidden-xs hidden-sm">
                                <h3> Administre sus Rebaños</h3>
                            </div>
                        </div>
                        <div class="item" class="img-responsive" >

                            <img src="images/carousel2.jpg" alt="">
                            <div class="carousel-caption hidden-xs hidden-sm">
                                <h3> Aplique control de su Genetica</h3>
                            </div>
                        </div>
                        <div class="item" class="img-responsive" >
                            <img src="images/carousel1.jpg" alt="">
                            <div class="carousel-caption hidden-xs hidden-sm">
                                <h3>
                                    lleve control total sobre sus potreros o parcelas
                                    con datos de relevancia..
                                </h3>
                            </div>
                        </div>
                         <div class="item" class="img-responsive" >
                            <img src="images/chart.jpg" alt="">
                            <div class="carousel-caption hidden-xs hidden-sm">
                                <h3>
                                    Genere Reporte y Graficos de Decision...
                                </h3>
                            </div>

                        </div>

                        <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev" >
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next" >
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
            </div>
        </div>

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



        </div>
