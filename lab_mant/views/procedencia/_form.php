<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Procedencia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="procedencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true, 'style'=>'width:300px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Procedencia' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
