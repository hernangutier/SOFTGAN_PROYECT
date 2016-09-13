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

     <?= $form->field($model, 'codtoro')->widget(Select2::classname(), [
                   'data' => ArrayHelper::map(app\models\Bovinos::find()->where(['codcat_actual'=>'13'])->andWhere(['=','status',true])->all(), 'cod', 'codbov'),
                   'options' => ['placeholder' => 'Seleccione Semen del Torpo Padre ...'],
                   'pluginOptions' => [
                       'allowClear' => true
                   ],

                   ]);
      ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
