<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use rmrevin\yii\fontawesome\FA;
/* @var $this yii\web\View */
/* @var $model app\models\Servicios */

$this->title = 'Resumen del Servicio';
$this->params['breadcrumbs'][] = ['label' => 'Ir a Bovinos Madres', 'url' => ['bovinos/index-madres']];


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desincorporaciones-view">
  <div class="row">
    <div class="col-md-12">
      <div class="btn-group" role="group" aria-label="...">

  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Ir a...
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href=<?= Url::to(['bovinos/index']) ?>>  Bovinos Activos</a></li>
      <li><a href=<?= Url::to(['desincorporaciones/index']) ?>>  Bovinos Desincorporados</a></li>
      <li><a href=<?= Url::to(['bovinos/index-madres']) ?>> Bovinos (Madres) </a></li>
    </ul>
  </div>
     <?php
            echo '<a href='.Url::to(['servicios/view-print','id'=>$model->cod]).' class="btn btn-default btn-group-lg"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Generar Pdf </a>';
            if ($model->status && $model->status_fisiologico!=0) {
            echo '<a href='.Url::to(['servicios/informate-parto','id'=>$model->cod]).' class="btn btn-info btn-group-lg"><span class="fa fa-info-circle" aria-hidden="true"></span> Informar Parto</a>';
            echo '<a href='.Url::to(['servicios/close','id'=>$model->cod]).' class="btn btn-danger btn-group-lg"><span class="fa fa-exclamation-triangle" aria-hidden="true"></span> Informar Aborto, Infertibilida u Otro Suceso </a>';
          }
      ?>
      <?php
            if ($model->status && $model->programa_reproductivo==3 && $model->status_fisiologico<2) {
               echo '<a href='.Url::to(['servicios/informar-prenez','id'=>$model->cod]).' class="btn btn-info btn-group-lg"><span class="fa fa-info-circle" aria-hidden="true"></span> Confirmar Preñez</a>';
               echo '<a href='.Url::to(['servicios/close','id'=>$model->cod]).' class="btn btn-danger btn-group-lg"><span class="fa fa-exclamation-triangle" aria-hidden="true"></span> Informar Aborto, Infertibilida u Otro Suceso </a>';
            }

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
                      <div class="box box-success">
                        <div class="box-body box-profile">
                          <div class="box-header with-border">
                            <i class="fa  fa-stethoscope"></i>

                            <h6 class="box-title">Servicio</h6>

                        </div>





                          <ul class="list-group list-group-unbordered">


                            <li class="list-group-item">
                              <b>Estatus del Servicio: </b> <?= $model->getStatusServiceLabel() ?>
                            </li>
                            <li class="list-group-item">
                              <b>Programa Reproductivo: </b> <?= $model->getProgramaReproductivoLabel() ?>
                            </li>

                            <li class="list-group-item">
                              <b>Fecha del Servicio: </b> <a class="pull-center"><?= date_format(date_create($model->fecha_palpacion), 'd/m/Y') ?></a>
                            </li>

                            <li class="list-group-item">
                              <b>Veterinario o Inseminador: </b> <a class="pull-center"><?=  !(is_null($model->codvet0)) ? $model->codvet0->nombre: 'No Asignado' ?></a>
                            </li>

                            <?php
                                    if ($model->programa_reproductivo==3) {
                                      echo '
                                      <li class="list-group-item">
                                        <b>Semen de Toro Padre: </b> <a class="pull-center">' . $model->codtoro0->codbov .'</a>
                                      </li>

                                      ';
                                    }

                             ?>
                            <?php

                                  if ($model->status_fisiologico>1) {
                                    echo ' <li class="list-group-item">
                                      <b>Fecha de Confirmación de Preñez: </b> <a class="pull-center">'.  date_format(date_create($model->fecha_confirmacion) , 'd/m/Y')  .'</a>
                                    </li>
                                    ';
                                  }

                             ?>

                            <li class="list-group-item">
                              <b>Diagnostico General: </b> <a class="pull-center"><?= $model->diagnostico_general ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Diagnostico Reproductivo: </b> <a class="pull-center"><?= $model->diagnostico_reproductivo ?></a>
                            </li>




                            <li class="list-group-item">
                               <?php
                                    if ($model->status_fisiologico==0){
                                        echo  '<b>Estado Fisiologico: </b> <a class="pull-center"><span class="label label-danger">' . $model->getStatusFisiologico() . '</span></a>';
                                    }
                                    if ($model->status_fisiologico==1){

                                        echo  '<b>Estado Fisiologico: </b> <a class="pull-center"><span class="label label-warning">' . $model->getStatusFisiologico() . '</span></a>';
                                    }
                                    if ($model->status_fisiologico==2){
                                        echo  '<b>Estado Fisiologico: </b> <a class="pull-center"><span class="label label-success">' . $model->getStatusFisiologico() . '</span></a>';
                                    }
                                    if ($model->status_fisiologico==3){
                                        echo  '<b>Estado Fisiologico: </b> <a class="pull-center"><span class="label label-primary">' . $model->getStatusFisiologico() . '</span></a>';
                                    }



                               ?>

                            </li>

                            <?php
                                if ($model->status_fisiologico!=0) {
                                  echo '<li class="list-group-item">
                                        <b>Tiempo Prenez Según I.D.: </b> <a class="pull-center"><code>'. $model->codinterv0->getIntervalo() . '</code></a>
                                        </li>';

                                  echo   '<li class="list-group-item">
                                              <b>Posible Fecha de Parto: </b> <a class="pull-center"><code>' . $model->getRangoParto() . '</code></a>
                                         </li>';
                                }

                             ?>






                          </ul>


                        </div>


                        <!-- /.box-body -->
                      </div>

                      <!-- Profile Image -->
                    <?php   if (!($model->status))  {
                                if ($model->efectividad) {
                                  echo '
                                    <div  class="box box-success" >
                                      <div class="box-body box-profile">

                                        <div class="box-header with-border">
                                          <i class="glyphicon glyphicon-ok"></i>';
                                }  else {
                                if ($model->status_parto!=0) {
                                  echo '
                                    <div  class="box box-danger" >
                                      <div class="box-body box-profile">

                                        <div class="box-header with-border">
                                          <i class="glyphicon glyphicon-remove"></i>';
                                    }
                                }



                      if ($model->efectividad ){
                         echo '<h3 class="box-title">Servicio efectivo</h3>
                              </div>
                              <ul class="list-group list-group-unbordered">';
                      }  else {
                        if ($model->status_parto!=0) {
                          echo '<h3 class="box-title">Servicio Fallido</h3>
                               </div>
                               <ul class="list-group list-group-unbordered">';
                        }

                      }







                        }
                      ?>

                        <?php if (!($model->status) && $model->efectividad==1) {


                          echo '
                          <li class="list-group-item">
                            <b>Fecha del Parto: </b> <a class="pull-center">' . $model->bovinos[0]->fnac . '</a>
                          </li>

                          <li class="list-group-item">
                            <b>Tipo de Parto: </b> <a class="pull-center">' . $model->getPartoResultLabel() . '</a>
                          </li>
                          <li class="list-group-item">
                            <b>Observaciones del Parto: </b> <a class="pull-center"><code>' . $model->observaciones . '</code></a>
                          </li>

                            <li class="list-group-item">
                              <b>N° del Becerro: </b> <a class="pull-center">' . $model->bovinos[0]->codbov . '</a>
                            </li>

                            <li class="list-group-item">
                              <b>Edad Actual: </b> <a class="pull-center">' . $model->bovinos[0]->getEdad() .'</a>
                            </li>

                            <li class="list-group-item">
                              <b>Sexo: </b> <a class="pull-center">' . $model->bovinos[0]->getSexoLabel() . '</a>
                            </li>

                            <li class="list-group-item">
                              <b>Peso al Nacer: </b> <a class="pull-center"><code>' . $model->bovinos[0]->peso_nacer . ' Kgrs.</code></a>
                            </li>';
                          } else {
                            //--------------- Vista del Fallo si estaba preñada ---
                          if (!($model->status) && $model->efectividad==0 && $model->status_parto!=0) {

                            echo '

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Causa</strong>

                            <p>' .  $model->getPartoResultLabel() . '</p>';

                            echo '

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Motivo o Suceso</strong>

                            <p>' .  $model->observaciones . '</p>';
                          } else {

                          }

                          };
                            ?>









                          </ul>


                        </div>


                        <!-- /.box-body -->
                      </div>


                      <!-- /.box -->




</div>

</div>
