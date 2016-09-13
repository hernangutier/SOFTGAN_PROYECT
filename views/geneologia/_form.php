<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Geneologia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="geneologia-form">
  <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codmadre')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\models\Bovinos::find()->where(['codcat_actual'=>'9'])->andWhere(['=','status',true])->all(), 'cod', 'codbov')
                  ]);
     ?>
     <?= $form->field($model, 'codpadre')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\models\Bovinos::find()->where(['codcat_actual'=>'3'])->andWhere(['<>','cod',$model->codhijo])->all(), 'cod', 'codbov')
                  ]);
     ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
