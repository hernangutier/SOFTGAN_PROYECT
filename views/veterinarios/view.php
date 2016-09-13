<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Veterinarios */

$this->title = $model->cod;
$this->params['breadcrumbs'][] = ['label' => 'Veterinarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veterinarios-view">
    <div class="row">

      <div class="box box-success">
        <div class="box-body box-profile">

        <ul class="list-group list-group-unbordered">



            <li class="list-group-item">
              <h3><b>Cedula: </b> <a class="pull-center"><?= $model->cedula ?></a></h3>
            </li>
            <li class="list-group-item">
              <h4><b>Nombre y Apellido: </b> <a class="pull-center"><?= $model->nombre ?></a></h4>
            </li>
            <li class="list-group-item">
              <h4><b>Direccion: </b> <a class="pull-center"><?= $model->direccion ?></a></h4>
            </li>




            <li class="list-group-item">
              <h4><b>Telefono: </b> <a class="pull-center"><span class="label label-info"><?= $model->telefono ?></span></a></h4>
            </li>

            <li class="list-group-item">
              <h4><b>Email: </b> <a class="pull-center"><code><?= $model->email ?></code></a></h4>
            </li>



          </ul>


        </div>
        <!-- /.box-body -->
      </div>

    </div>
  </div>  


</div>
