<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Persona;
use app\models\TipoHora;
use app\models\Administrador;
use app\models\Profesional;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Hora */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hora-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_hora_id')->dropDownList(
        ArrayHelper::map(TipoHora::find()->all(),'id','nombre'),
        ['prompt'=>'Seleccionar Tipo de Hora', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'profesional_id')->dropDownList(
        ArrayHelper::map(Profesional::find()->all(),'id', 'Nombres'),
        ['prompt'=>'Seleccionar Profesional', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'administrador_id')->dropDownList(
        ArrayHelper::map(Administrador::find()->all(),'id','Nombres'),
        ['prompt'=>'Seleccionar Administrador', 'style'=>'width:300px']
    ) ?>

    <?= $form->field($model, 'hora_inicio')->widget(
    TimePicker::className(), [
    'pluginOptions' => [
        'format' => 'HH:MM',
        'showMeridian' => false,
        'minuteStep' => 1
    ],
    'options' => [
        'style' => 'width:260px'
    ],
    'addonOptions' => [
        'asButton' => true,
        'inline-addon' => true
    ]
    ]); ?>

    <?= $form->field($model, 'tiempo_periodo')->textInput(['style'=>'width:300px']) ?>

    <?= $form->field($model, 'fecha')->widget(
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


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
