<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Examen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true, 'style'=>'width:300px']) ?>

    <?= $form->field($model, 'monto')->textInput(['style'=>'width:300px']) ?>

    <?= $form->field($model, 'observaciones')->textArea(['rows' => '6', 'style'=>'width:300px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Examen' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
