<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $model app\models\Consultas */
/* @var $title1 String */

$this->title = $title1;

$this->params['breadcrumbs'][] = $this->title;

?>





<div class="cargos-create">
 <?php
  $_POST['url']=Url::toRoute('bovinos/view','https');
  echo "<script>\n";
  echo "var url_js='".$_POST['url']."'\n";
  echo "</script>\n";
 ?>
  <?php $form = ActiveForm::begin(); ?>

      <?=
      $form->field($model, 'codcat')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(app\models\BovinosCategoria::find()->asArray()->all(), 'cod', 'descripcion'),
            'options' => ['placeholder' => 'Select Categoria ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
            'pluginEvents' => [
                "change" => "function(e) {
                          $('resultado').text('los nuevos elementos de texto');
                          alert(url_js);
                }",

],
          ]);
       ?>


</div>

<div class="resultado">
   Hola
</div>

<p>

  <div class="form-group">
      <?= Html::submitButton(Yii::t('app', '{icon}<b> Generar PDF </b>', ['icon' => FA::icon('file-pdf-o')]),['class'=>'btn btn-default ']) ?>
  </div>


<?php ActiveForm::end(); ?>

</p>
