<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Hora;
use app\models\Examen;

/* @var $this yii\web\View */
/* @var $model app\models\HoraExamenSolicitado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hora-examen-solicitado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hora_id')->dropDownList(
    	ArrayHelper::map(Hora::find()->all(),'id','hora_inicio'),
    	['prompt'=>'Seleccionar Hora', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'examen_id')->dropDownList(
    	ArrayHelper::map(Examen::find()->all(),'id','descripcion'),
    	['prompt'=>'Seleccionar Examen', 'style'=>'width:300px']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Hora Examen Solicitado' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
