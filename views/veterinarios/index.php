<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VeterinariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Veterinarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veterinarios-index">

  <div class="bovinos">
    <div class="box box-primary">
              <div class="box-header with-border">
                <p>
                    <?= Html::a('Crear Veterinario', ['create'], ['class' => 'btn btn-success']) ?>

                </p>
              </div>



              <?= ListView::widget([
                  'dataProvider' => $dataProvider,
                  'itemOptions' => ['class' => 'item'],
                  'itemView' => function ($model, $key, $index, $widget) {
                          return
                          '<div class="row">
                          <div class="col-md-6">


                            <div class="box box-success">
                              <div class="box-body box-profile">

                              <ul class="list-group list-group-unbordered">
                              <div class="btn-group" role="group" aria-label="...">
                                  <a  class="btn btn-danger" href="#"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                                  <a  class="btn btn-primary"  href='. Url::to(['veterinarios/update', 'id'=>$model->cod]) .' ><span class="glyphicon glyphicon-pencil" </span></a>
                              </div>


                                  <li class="list-group-item">
                                    <b>Cedula: </b> <a class="pull-center">'. $model->cedula . '</a>
                                  </li>
                                  <li class="list-group-item">
                                    <b>Nombre y Apellido: </b> <a class="pull-center">' . $model->nombre . '</a>
                                  </li>
                                  <li class="list-group-item">
                                    <b>Direccion: </b> <a class="pull-center">' . $model->direccion . '</a>
                                  </li>




                                  <li class="list-group-item">
                                    <b>Telefono: </b> <a class="pull-center"><span class="label label-default">' . $model->telefono  .'</span></a>
                                  </li>

                                  <li class="list-group-item">
                                    <b>Email: </b> <a class="pull-center"><code>'.  $model->email .'</code></a>
                                  </li>



                                </ul>


                              </div>
                              <!-- /.box-body -->
                            </div>



                            </div>
                          </div>';



                  },
          ]) ?>




</div>
</div>
</div>
