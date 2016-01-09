<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\Administrador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="administrador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'persona_id')->dropDownList(
    	ArrayHelper::map(Persona::find()->all(),'id','fullName'),
    	['prompt'=>'Seleccionar Persona', 'style'=>'width:300px']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Asignar Administrador' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
