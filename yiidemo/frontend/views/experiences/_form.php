<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Experiences */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="experiences-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

     <!-- <?= $form->field($model, 'user_id')->textInput() ?>  -->

    <?= $form->field($model, 'experience')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'ngày sinh nhật của bạn'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]); ?>
    
    <?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'ngày sinh nhật của bạn'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]); ?>

    <?= $form->field($model, 'description_work')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
