<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HoraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hora-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tipo_hora_id') ?>

    <?= $form->field($model, 'profesional_id') ?>

    <?= $form->field($model, 'administrador_id') ?>

    <?= $form->field($model, 'hora_inicio') ?>

    <?php // echo $form->field($model, 'tipo_hora') ?>

    <?php // echo $form->field($model, 'tiempo_periodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Actualizar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
