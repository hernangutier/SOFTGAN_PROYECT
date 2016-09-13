<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
//use dosamigos\datepicker\DatePicker;
use kartik\widgets\TouchSpin;
use kartik\money\MaskMoney;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Url;
use kartik\widgets\SwitchInput;
/* @var $this yii\web\View */
/* @var $bovino app\bovinos\Bovinos */
/* @var $form yii\widgets\ActiveForm */

?>



<div class="bovinos-form">
  <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <div class="col-xs-8">

    <?= $form->field($bovino, 'codbov')->textInput(['maxlength' => true]) ?>



    <?= $form->field($bovino,'fnac')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese Fecha de Nacimiento ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
    ]
    ])
    ?>
    <?= $form->field($bovino,'fingreso')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese la Fecha de Ingreso ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
        ]
        ])

    ?>








    <?php
        if ($bovino->isNewRecord) {
        echo $form->field($bovino, 'sexo')->dropDownList(
                    ['H'=>'Hembra','M'=>'Macho'],
                    [
                   'id'=>'id_sexo',
                   'prompt'=>'Seleccione el Sexo',
                   'onchange'=>'
                            $.get( "'.Url::to('index.php?r=bovinos/list2'.'&id=').'"+$(this).val(), function( data ) {
                              $( "select#select-catfutura" ).html( data );
                            });

                        ']

                    );
       } else {
        ?>
             <h4>Sexo: <span class="label label-primary"><?= $bovino->sexo ?></span></h4>
       <?php
        };

    ?>



    <?php //-------------- Organismos -------------

        //------- ListBox Motivos
    Pjax::begin(['id' => 'ganaderia']);
    echo $form->field($bovino, 'codganaderia')->dropDownList(
    ArrayHelper::map(\app\bovinos\TipoGanaderia::getTiposExclude(),'id','descripcion'),
    [
       'id'=>'id_ganaderia',
       'prompt'=>'Seleccione Tipo de Ganaderia',
       'onchange'=>'
                $.get( "'.Url::to('index.php?r=bovinos/list'.'&id=').'"+$(this).val(), function( data ) {
                  $( "select#select-contact" ).html( data );
                });
                $.get( "'.Url::to('index.php?r=bovinos/list1'.'&id=').'"+$(this).val()+"&sex="+$( "#bovinos-sexo" ).val(), function( data ) {
                  $( "select#select-rebano" ).html( data );
                });

            ']);
     Pjax::end();
    ?>

    <?php echo $form->field($bovino, 'codraza')->dropDownList(
        ArrayHelper::map(app\bovinos\BovinosRazas::find()->where(['codgan'=>$bovino->codganaderia])->asArray()->all(), 'cod', 'descripcion'),

    [
        'id'=>'select-contact',
        'prompt'=>'Seleccione la Raza',

    ]
    ); ?>


    <?php echo $form->field($bovino, 'codcat_futura')->dropDownList(
        ArrayHelper::map(app\bovinos\BovinosCategoria::find()->where(['sexo'=>$bovino->sexo])->asArray()->all(), 'cod', 'descripcion'),

    [
        'id'=>'select-catfutura',
        'prompt'=>'Seleccione la Categoria Futura',

    ]
    ); ?>


     <?php echo $form->field($bovino, 'codrebano')->dropDownList(
        ArrayHelper::map(app\bovinos\BovinosRebanos::find()->where(['codgan'=>$bovino->codganaderia])->andFilterWhere(['sexo'=>$bovino->sexo])->orFilterWhere(['sexo'=>'A'])->asArray()->all(), 'cod', 'descripcion'),

    [
        'id'=>'select-rebano',
        'prompt'=>'Seleccione el Lote o Rebaño',

    ]
    ); ?>



    </div>
    <div class="col-xs-4">



      <div class="thumbnail">
      <img src="images/<?= $bovino->foto ?>" alt="...">
      <div class="caption">
        <h3>Foto del Animal </h3>
        <h4>Nota: </h4>
        <p>
          Cargar despues de Guardar desde a Ficha del Animal...
        </p>


      </div>
    </div>



    </div>

    </div>









    <?=
      $form->field($bovino, 'peso_nacer')->widget(TouchSpin::classname(), [
    'options'=>['placeholder'=>'Indique el Peso al Nacer'],
    'pluginOptions' => [
        'min' => 0,
        'max' => 1100,
        'buttonup_class' => 'btn btn-primary',
        'buttondown_class' => 'btn btn-info',
        'buttonup_txt' => '<i class="glyphicon glyphicon-plus-sign"></i>',
        'buttondown_txt' => '<i class="glyphicon glyphicon-minus-sign"></i>'
    ]
    ]);
    ?>

<?php echo $form->field($bovino, 'color')->dropDownList(
   ArrayHelper::map(app\bovinos\BovinosColores::find()->asArray()->all(), 'cod', 'descripcion'),

[
   'id'=>'select-rebano',
   'prompt'=>'Seleccione el Color',

]
); ?>


<?= $form->field($bovino,'caracteristicas')->textArea(['rows' => 6]) ?>




    <div class="form-group">
        <?= Html::submitButton($bovino->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $bovino->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
