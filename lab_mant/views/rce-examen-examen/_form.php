<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Examen;
use app\models\RceExamen;

/* @var $this yii\web\View */
/* @var $model app\models\RceExamenExamen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rce-examen-examen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rce_examen_id')->dropDownList(
        ArrayHelper::map(RceExamen::find()->all(),'id','DatosRce'),
        ['prompt'=>'Seleccionar RCE Examen', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'examen_id')->dropDownList(
    	ArrayHelper::map(Examen::find()->all(),'id','descripcion'),
    	['prompt'=>'Seleccionar Examen', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'monto_a_pagar')->textInput(['style'=>'width:300px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar RCE Examen Examen' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
