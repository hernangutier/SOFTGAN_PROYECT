<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Servicios */


?>

<div class="row">




            <div class="col-md-12">

                      <!-- Profile Image -->
                      <div class="box box-success">
                        <div class="box-body box-profile">






                          <ul class="list-group list-group-unbordered">



                            <li class="list-group-item">
                              <b>Fecha del Servicio: </b> <a class="pull-center"><?= date_format(date_create($model->fecha_palpacion), 'd/m/Y') ?></a>
                            </li>

                            <li class="list-group-item">
                              <b>Veterinario o Inseminador: </b> <a class="pull-center"><?=  !(is_null($model->codvet0)) ? $model->codvet0->nombre: 'No Asignado' ?></a>
                            </li>

                            <li class="list-group-item">
                              <b>Diagnostico General: </b> <a class="pull-center"><?= $model->diagnostico_general ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Diagnostico Reproductivo: </b> <a class="pull-center"><?= $model->diagnostico_reproductivo ?></a>
                            </li>




                            <li class="list-group-item">
                              <b>Estado Fisiologico: </b> <a class="pull-center"><span class="label label-info"><?= $model->getStatusFisiologico() ?></span></a>
                            </li>

                            <?php
                              if ($model->status_fisiologico!=0) {
                                    echo '<li class="list-group-item">
                                              <b>Tiempo Prenez Según I.D.: </b> <a class="pull-center"><code>' . $model->codinterv0->getIntervalo()  . '</code></a>
                                          </li>';
                              }

                             ?>


                            <li class="list-group-item">
                              <b>Posible Fecha de Parto: </b> <a class="pull-center"><code> <?= $model->getRangoParto()  ?></code></a>
                            </li>



                          </ul>


                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->




</div>
</div>
