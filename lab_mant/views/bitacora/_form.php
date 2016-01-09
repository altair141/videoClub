<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\EstadoRceExamen;
use app\models\Persona;
use app\models\RceExamen;

/* @var $this yii\web\View */
/* @var $model app\models\Bitacora */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacora-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estado_rce_examen_id')->dropDownList(
    	ArrayHelper::map(EstadoRceExamen::find()->all(),'id','descripcion'),
    	['prompt'=>'Seleccionar Estado RCE Examen', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'rce_examen_id')->dropDownList(
    	ArrayHelper::map(RceExamen::find()->all(),'id','DatosRce'),
    	['prompt'=>'Seleccionar RCE Examen', 'style'=>'width:300px']
    ) ?>


    <?= $form->field($model, 'persona_id_ingresa_bitacora')->dropDownList(
    	ArrayHelper::map(Persona::find()->all(),'id','fullName'),
    	['prompt'=>'Seleccionar Persona', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'observacion')->textArea(['rows' => '6', 'style'=>'width:300px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Bitácora' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
