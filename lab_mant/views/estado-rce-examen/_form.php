<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoRceExamen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-rce-examen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textArea(['maxlength' => true, 'style'=>'width:300px', 'rows' => '3']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Estado RCE Examen' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
