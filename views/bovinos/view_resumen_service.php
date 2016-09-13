<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use app\models\Servicios;
/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */

//-------------- Vista Resumen de Servcicios ----------------------
?>

<div class="row">
  <div class="col-md-3">
        <?php
            if (Servicios::getServiceActive($model->cod)) {
              echo 'Servicio Activo';
            } else {
              echo 'No Hay Servicio Activo';
            }

         ?>

  </div>
</div>
