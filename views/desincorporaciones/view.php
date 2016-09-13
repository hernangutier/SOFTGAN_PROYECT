<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Desincorporaciones */

$this->title = 'Resumen de la Desicorporacion';
$this->params['breadcrumbs'][] = ['label' => 'Bovinos Desincorporados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desincorporaciones-view">
  <div class="row">
    <div class="col-md-12">
    <div class="btn-group" role="group" aria-label="...">
   <?php
          echo '<a href='.Url::to(['bovinos/index']).' class="btn btn-success btn-group-lg"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>  Ir a Bovinos Activos</a>';
          echo '<a href='.Url::to(['bovinos/index-for-descarte']).' class="btn btn-warning btn-group-lg"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Ir a Bovinos es Situacion de Descarte</a>';
          echo '<a href='.Url::to(['desincorporaciones/index']).' class="btn btn-danger btn-group-lg"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Ir a Desincorporaciones </a>';
          echo '<a href='.Url::to(['bovinos/view1','id'=>$model->codbov0->cod]).' class="btn btn-primary btn-group-lg"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Ver Ficha del Animal </a>';
     ?>

    </div>
    </div>

  </div>
  <br>

<div class="row">



  <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="../web/fotos/<?= $model->codbov0->foto ?> " alt="User profile picture">

                <h3 class="profile-username text-center"><?= $model->codbov0->codbov ?></h3>

                <p class="text-muted text-center"><?= $model->codbov0->codraza0->descripcion  ?></p>
                <p class="text-muted text-center"><?= 'Rebaño o Lote: ' . $model->codbov0->codrebano0->descripcion  ?></p>





                <ul class="list-group list-group-unbordered">



                  <li class="list-group-item">
                    <b>Fecha de Nacimiento: </b> <a class="pull-right"><?=    date_format(date_create( $model->codbov0->fnac), 'd/m/Y')   ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha de Incorporación: </b> <a class="pull-right"><?= date_format(date_create( $model->codbov0->fingreso), 'd/m/Y')  ?></a>
                  </li>




                  <li class="list-group-item">
                    <b>Sexo: </b> <a class="pull-right"><span class="label label-primary"><?= $model->codbov0->sexo ?></span></a>
                  </li>
                  <li class="list-group-item">
                    <b>Categoria de Ingreso: </b> <a class="pull-right"><span class="label label-info"><?= $model->codbov0->codcatIngreso->descripcion ?></span></a>
                  </li>

                  <li class="list-group-item">
                    <b>Tipo de Ganaderia: </b> <a class="pull-right"><?= $model->codbov0->getTipo() ?></a>
                  </li>

                  <li class="list-group-item">
                    <b>Tipo de Ingreso: </b> <a class="pull-right"><?= $model->codbov0->getTipoIngreso() ?></a>
                  </li>

                  <li class="list-group-item">
                    <b>Color: </b> <a class="pull-right"><?= $model->codbov0->color0->descripcion ?></a>
                  </li>

                  <li class="list-group-item">
                    <b>Peso al Nacer: </b> <a class="pull-right"><code><?= $model->codbov0->peso_nacer . ' Kgrs.'?></code></a>
                  </li>



                </ul>


              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
            <div class="col-md-9">

                      <!-- Profile Image -->
                      <div class="box box-danger">
                        <div class="box-body box-profile">






                          <ul class="list-group list-group-unbordered">



                            <li class="list-group-item">
                              <h3><b>Concepto: </b> <a class="pull-center"><?= $model->codtipo0->descripcion ?></a></h3>
                            </li>
                            <li class="list-group-item">
                              <h4><b>Fecha de Desincorporación: </b> <a class="pull-center"><?= date_format(date_create($model->fecha), 'd/m/Y') ?></a></h4>
                            </li>
                            <li class="list-group-item">
                              <h4><b>Edad al Desincorporar: </b> <a class="pull-center"><?= app\models\Bovinos::getCalcEdad($model->codbov0->fnac,$model->fecha) ?></a></h4>
                            </li>




                            <li class="list-group-item">
                              <h4><b>Categoria al Desincorporar: </b> <a class="pull-center"><span class="label label-info"><?= $model->codcat0->descripcion ?></span></a></h4>
                            </li>

                            <li class="list-group-item">
                              <h4><b>Peso Registrado: </b> <a class="pull-center"><code><?= $model->peso . ' Kgrs.'?></code></a></h4>
                            </li>

                            <li class="list-group-item">
                              <h4><b>Costo Kgr/Carne: </b> <a class="pull-center"><code><?=  number_format($model->costo_carne,2) . ' Bsf.' ?></code></a></h4>
                            </li>

                            <li class="list-group-item">
                              <h4><b>Total Costo Operación: </b> <a class="pull-center"><code><?=  number_format($model->peso*$model->costo_carne,2) . ' Bsf.' ?></code></a></h4>
                            </li>



                          </ul>
                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Descripcion del Motivo</strong>

                          <p><?php echo $model->observaciones ?></p>

                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->




</div>

</div>
