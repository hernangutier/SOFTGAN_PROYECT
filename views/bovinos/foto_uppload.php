<?php
use kartik\widgets\FileInput;
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
/* @var $model app\models\Bovinos */
/* @var $form yii\widgets\ActiveForm */
$this->title ='Subir Foto del Animal';
$this->params['breadcrumbs'][] = ['label' => 'Datos del Bovinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bovinos-form">
  <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?php
    echo $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]);


     ?>

       <?php ActiveForm::end(); ?>
