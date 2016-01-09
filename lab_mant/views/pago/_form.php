<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\FormaPago;
use app\models\RceExamen;


/* @var $this yii\web\View */
/* @var $model app\models\Pago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pago-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'forma_pago_id')->dropDownList(
        ArrayHelper::map(FormaPago::find()->all(),'id','descripcion'),
        ['prompt'=>'Seleccionar Forma de Pago', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'rce_examen_id')->dropDownList(
        ArrayHelper::map(RceExamen::find()->all(),'id', 'DatosRce'),
        ['prompt'=>'Seleccionar RCE Examen', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'monto')->textInput(['style'=>'width:300px']) ?>

    <?= $form->field($model, 'comprobante')->textInput(['style'=>'width:300px']) ?>

    <?= $form->field($model, 'estadopago')->textInput(['style'=>'width:300px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Pago' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
