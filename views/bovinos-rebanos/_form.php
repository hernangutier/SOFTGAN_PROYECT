<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\BovinosRebanos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bovinos-rebanos-form">

    <?php $form = ActiveForm::begin(); ?>

    
            <div class="user-panel">
            <div class="pull-left image">
                <img src="images/ganado_engorda.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <span class="badge"><?= $model->getCount() ?></span>

                
            </div>
        </div>
    

    <?= $form->field($model, 'codgan')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\models\TipoGanaderia::getTipos(), 'id', 'descripcion')
                  ]); 
     ?> 

    <?= $form->field($model, 'sexo')->dropDownList(
                    ['H'=>'Hembra','M'=>'Macho',
                    'A'=>'Ambos Sexos',]
                    )
    ?> 

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
