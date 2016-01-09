<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'persona_id')->dropDownList(
    	ArrayHelper::map(Persona::find()->all(),'id','fullName'),
    	['prompt'=>'Seleccionar Persona', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'nombres') ?>

    <?= $form->field($model, 'descripcion')->textArea(['rows' => '6', 'style'=>'width:300px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Paciente' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
