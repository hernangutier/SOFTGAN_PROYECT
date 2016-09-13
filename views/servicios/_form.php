<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Servicios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicios-form">
<?php

$this->registerJs('
$(document).ready(function() {
  if ($("select#servicios-status_fisiologico").val()<2)  {

    $("#valoracion").hide();
} else {
  $("#valoracion").show();
}
});');

?>


    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model,'fecha_palpacion')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese Fecha del Servicio ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
    ]
    ])
    ?>

    <?=
    $form->field($model, 'codvet')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(app\models\Veterinarios::find()->asArray()->all(), 'cod', 'nombre'),
          'options' => ['placeholder' => 'Seleccione el Vetrinario o Inseminador ...'],
          'pluginOptions' => [
              'allowClear' => true
          ],
        ]);
     ?>

    <?= $form->field($model, 'diagnostico_general')->textInput() ?>


    <?= $form->field($model,'diagnostico_reproductivo')->textArea(['rows' => 6]) ?>




    <?= $form->field($model, 'status_fisiologico')->dropDownList(
                    ['0'=>'Vacia',
                    '1'=>'Vacia con Cria',
                    '2'=>'Preñada',
                    '3'=>'Preñada con Cria',

                    ],

                    ['onchange'=>'

                      if ($("select#servicios-status_fisiologico").val()<2) {

                          $("#valoracion").hide();
                      } else {
                        $("#valoracion").show();
                      }

                    ']
                  )


    ?>

 <div id="valoracion">

    <?php echo $form->field($model, 'codinterv')->dropDownList(
       ArrayHelper::map(app\models\IntervalosPrenez::find()->asArray()->all(), 'cod', 'descripcion'),

    [
       'id'=>'select-rebano',
       'prompt'=>'Seleccione la Valoración de Preñez',

    ]
    ); ?>



    <?php if ($model->codbov0->programa_reproductivo==4){
      echo $form->field($model, 'codtoro')->textInput();
    }
    ?>

 </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
