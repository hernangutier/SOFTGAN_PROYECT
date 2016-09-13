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
use scotthuangzl\googlechart\GoogleChart;
/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */

$this->title = 'Resumen del Animal: ' . $model->codbov;
$this->params['breadcrumbs'][] = ['label' => 'Bovinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;




?>

 <div class="bovinos-view">

<div class="row">


  <!--    Opciones -->
  <div class="col-md-12">
  <div class="btn-group" role="group" aria-label="...">
    <?php
              if ($model->status==true) {
              echo '<a href='.Url::to(['bovinos/create']).' class="btn btn-success btn-group-lg"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Crear Bovino</a>';
              echo  '<a href='.Url::to(['bovinos/update','id'=>$model->cod]) .' type="button" class="btn btn-primary btn-group-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Editar Bovino</a>';

     } ?>
  <div class="btn-group" role="group">
   <?php
      if ($model->status==true) {
                      echo  '<a href='.Url::to(['desincorporaciones/create','id'=>$model->cod]) .' type="button" class="btn btn-warning btn-group-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Desincorporar</a>';
      }
    ?>



</div>


        <a  href="javascript:window.history.back();"   class="btn btn-info btn-group-xs"> <span class="glyphicon glyphicon-repeat"> </span>     Volver</a>
  </div>
</div>
</div>

<br>



<div class="row">



<div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../web/fotos/<?= $model->foto ?> " alt="User profile picture">

              <h3 class="profile-username text-center"><?= $model->codbov ?></h3>

              <p class="text-muted text-center"><?= $model->codraza0->descripcion  ?></p>
              <p class="text-muted text-center"><?= 'Rebaño o Lote: ' . $model->codrebano0->descripcion  ?></p>
              <a href='<?= Url::to(['foto-uppload','id'=>$model->cod]) ?>' class="btn btn-primary btn-block"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span><b>  Subir Foto</b></a>
              <ul class="list-group list-group-unbordered">

                <li class="list-group-item">
                  <b>Estatus: </b> <a class="pull-right"><?= $model->status ? '<span class="label label-success">Activo</span>' : '<span class="label label-danger">Desincorporado</span>' ?></a>
                </li>

                <li class="list-group-item">
                  <b>Fecha de Nacimiento: </b> <a class="pull-right"><?= $model->fnac ?></a>
                </li>
                <li class="list-group-item">
                  <b>Fecha de Incorporación: </b> <a class="pull-right"><?= $model->fingreso ?></a>
                </li>

                <li class="list-group-item">
                  <b>Edad Aproximada: </b> <a class="pull-right"><?= $model->edad ?></a>
                </li>
                <li class="list-group-item">
                  <b>Ultimo Peso Registrado: </b> <a class="pull-right">180</a>
                </li>

                <li class="list-group-item">
                  <b>Sexo: </b> <a class="pull-right"><span class="label label-primary"><?= $model->sexo ?></span></a>
                </li>
                <li class="list-group-item">
                  <b>Categoria de Ingreso: </b> <a class="pull-right"><span class="label label-info"><?= $model->codcatIngreso->descripcion ?></span></a>
                </li>
                <li class="list-group-item">
                  <b>Categoria Actual: </b> <a class="pull-right"><span class="label label-success"><?= $model->codcatActual->descripcion ?></span></a>
                </li>

                <li class="list-group-item">
                  <b>Categoria Futura: </b> <a class="pull-right"><span class="label label-primary"><?= $model->codcatFutura->descripcion ?></span></a>
                </li>

                <li class="list-group-item">
                  <b>Tipo de Ganaderia: </b> <a class="pull-right"><?= $model->getTipo() ?></a>
                </li>

                <li class="list-group-item">
                  <b>Tipo de Ingreso: </b> <a class="pull-right"><?= $model->getTipoIngreso() ?></a>
                </li>

                <li class="list-group-item">
                  <b>Color: </b> <a class="pull-right"><?= $model->color0->descripcion ?></a>
                </li>

                <li class="list-group-item">
                  <b>Peso al Nacer: </b> <a class="pull-right"><code><?= $model->peso_nacer . ' Kgrs.'?></code></a>
                </li>

                <li class="list-group-item">
                  <b>En Situación de Descarte: </b> <a class="pull-right"><?= $model->isdescartable ? '<span class="label label-danger">Si</span>' : '<span class="label label-success">No</span>' ?></a>
                </li>

              </ul>
              <strong><i class="fa fa-file-text-o margin-r-5"></i> Caracteristicas</strong>

              <p><?php echo $model->caracteristicas ?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


</div>


<div class="col-md-9">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Indicadores y Sucesos</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-group" id="accordion">
              <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
              <div class="panel box box-primary">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      Evolucion de Peso
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="box-body">
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


                       <?php
                       echo GoogleChart::widget(array('visualization' => 'LineChart',
       'data' => array(
           array('Fecha', 'Peso'),
           array('al Destete', 200),
           array('2° Pesaje', 320),
           array('3° Pesaje', 480),
           array('4° Pesaje', 560),
       ),
       'options' => array('title' => 'Evolucion de Peso',
                          'showTip'=>true,
                           'opacity'=> '0.8',

                         )));


                        ?>


                  </div>
                </div>
              </div>
              <div class="panel box box-danger">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      Datos Geneologicos
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="box-body">

                  <div class="col-md-6">
                    <div class="box box-danger">
                      <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="../web/fotos/<?= isset($model->geneologia->codmadre0) ? $model->geneologia->codmadre0->foto : 'default.png'   ?>" alt="User profile picture">

                        <h3 class="profile-username text-center text-red">Madre</h3>
                        <h3 class="profile-username text-center"><?=  isset($model->geneologia->codmadre0) ? $model->geneologia->codmadre0->codbov : 'No Asignado'   ?></h3>

                        <p class="text-muted text-center"><?=  isset($model->geneologia->codmadre0) ? $model->geneologia->codmadre0->codraza0->descripcion : 'No Asignado'   ?></p>
                        <p class="text-muted text-center"><?=  isset($model->geneologia->codmadre0) ? 'Rebaño o Lote: ' . $model->geneologia->codmadre0->codrebano0->descripcion : 'No Asignado'   ?></p>


                    </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                      <div class="box box-primary">
                        <div class="box-body box-profile">
                          <img class="profile-user-img img-responsive img-circle" src="../web/fotos/<?= isset($model->geneologia->codmadre0) ? $model->geneologia->codmadre0->foto : 'default.png'   ?>" alt="User profile picture">

                          <h3 class="profile-username text-center text-light-blue">Padre</h3>
                          <h3 class="profile-username text-center"><?=  isset($model->geneologia->codpadre0) ? $model->geneologia->codpadre0->codbov : 'No Asignado'   ?></h3>

                          <p class="text-muted text-center"><?=  isset($model->geneologia->codpadre0) ? $model->geneologia->codpadre0->codraza0->descripcion : 'No Asignado'   ?></p>
                          <p class="text-muted text-center"><?=  isset($model->geneologia->codpadre0) ? 'Rebaño o Lote: ' . $model->geneologia->codpadre0->codrebano0->descripcion : 'No Asignado'   ?></p>
                      </div>
                      </div>
                      </div>

                </div>

                    <a href='<?=  isset($model->geneologia->codmadre0) ? Url::to(['geneologia/update','id'=>$model->cod]): Url::to(['geneologia/create','id'=>$model->cod])  ?>' class="btn btn-primary btn-block"><span class="glyphicon glyphicon-share" aria-hidden="true"></span><b> Registrar Geneologia </b></a>

              </div>

              <div class="panel box box-success">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                      Reproducción
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="box-body">
                <?php
                        echo Yii::$app->controller->renderPartial('view_resumen_madre', ['model'=>$model]);

                 ?>




                  </div>
                </div>
              </div>

              <div class="panel box box-danger">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                      Control Sanitario
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                  <div class="box-body">

                    Datos en Espera de Desarrollo!



                  </div>
                </div>
              </div>


            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

</div>
</div>
