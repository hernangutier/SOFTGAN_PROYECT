<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\VentasLotes */

$this->title = $model->cod;
$this->params['breadcrumbs'][] = ['label' => 'Ventas Lotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-lotes-view">

  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> VIRFA C.A.
          <small class="pull-right">Fecha: 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Cliente
        <address>
          <strong><?= $model->codclient0->razon  ?></strong><br>
          Ced./Rif: <?=$model->codclient0->ced  ?> <br>
          Dir: <?= $model->codclient0->direccion  ?> <br>
          Tel: <?= $model->codclient0->telefono ?><br>
          Email: info@almasaeedstudio.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>John Doe</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>N° de Control: <?= $model->ncontrol ?></b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">

      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="glyphicon glyphicon-list-alt"></i>

          <h3 class="box-title">Seleccione Bovinos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-sm-4 invoice-col">

            <?=

                 Select2::widget([
                    'name'=>'bovinos',

                    'data' => ArrayHelper::map(app\models\Bovinos::find()->asArray()->all(), 'cod', 'codbov'),
                    'options' => [
                        'placeholder' => 'Select provinces ...',
                        'id'=>'select-bovinos',


                    ],
                  'pluginOptions' => [
                        'allowClear' => true,

                    ],
                    'pluginEvents' =>[
                          'change' => 'function(){

                          if ($("select#select-bovinos").val()=="") {
                            $("#btn-add").hide();
                          } else {
                            $("#btn-add").show();
                          }
                          }
                        '
                      ]
                ]);
             ?>

          </div>

          <div id='btn-add' class="col-sm-3 invoice-col">
              <?= Html::submitButton('Agregar Bovino', ['class' => 'btn btn-default']) ?>
          </div>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>






    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <?php
                $query = app\models\VentasLotesDetal::find()->where(['codventas'=>$model->cod]);

         ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],


                'codbov',
                'cat_actual',
                'Edad',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>



      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Payment Methods:</p>
        <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Monto a Pagar 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>$250.30</td>
            </tr>
            <tr>
              <th>Tax (9.3%)</th>
              <td>$10.34</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>$5.80</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>$265.24</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button>
        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
          <i class="fa fa-download"></i> Generate PDF
        </button>
      </div>
    </div>
  </section>

</div>
