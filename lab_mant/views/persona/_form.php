<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rut')->textInput(['maxlength' => true, 'style'=>'width:300px']) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true, 'style'=>'width:300px']) ?>

    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true, 'style'=>'width:300px']) ?>

    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true, 'style'=>'width:300px']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'style'=>'width:300px']) ?>

    <?= $form->field($model, 'fecha_nacimiento')->widget(
    DatePicker::className(), [
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ],
        'options' => [
            'style'=>'width:260px',
        ],
    ]);?>

    <?= $form->field($model, 'identificadorfacebook')->textInput(['maxlength' => true, 'style'=>'width:300px']) ?>

    <?= $form->field($model, 'perfil')->radioList(array(1=>'Administrador',2=>'Profesional',3=>'Paciente')); ?>

    <?= $form->field($model, 'descripcion')->textArea(['rows' => '6', 'style'=>'width:300px']) ?>
    <label>(opcional, sólo si la persona a ingresar corresponde a un paciente)</label>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Persona' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>