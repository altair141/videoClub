<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Paciente;
use app\models\Persona;
use app\models\Profesional;
use app\models\Administrador;
use app\models\Hora;
use app\models\Examen;
use app\models\TipoHora;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use yii\grid\GridView;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?php 
        $data = ArrayHelper::map(Paciente::find()->all(),'id','Nombres');
    ?>

    <?= $form->field($model, 'paciente_id')->widget(Select2::classname(), [
        'data' => $data,
        'options' => [
            'placeholder' => 'Seleccionar Paciente ...',
        ],
        'pluginOptions' => [
            'width' => '300px',
        ],
    ]);?>

    <?= $form->field($modelHora, "tipo_hora_id")->dropDownList(
        ArrayHelper::map(TipoHora::find()->all(),'id','nombre'),
        ['prompt'=>'Seleccionar Tipo de Hora', 'style'=>'width:300px']
    ) ?>

    <?php 
        $data = ArrayHelper::map(Profesional::find()->all(),'id','Nombres');
    ?>        
    <?= $form->field($modelHora, "profesional_id")->widget(Select2::classname(), [
        'data' => $data,
        'options' => [
            'placeholder' => 'Seleccionar Profesional...',
        ],
        'pluginOptions' => [
            'width' => '300px',
            'disabled' => !$model->isNewRecord,
        ],
    ]);?>

    <?= $form->field($modelHora, "hora_inicio")->widget(
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

    <?= $form->field($modelHora, 'fecha')->widget(
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

    <?= $form->field($modelHora, 'tiempo_periodo')->textInput(['style'=>'width:300px']) ?>

    <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>Exámenes Solicitados</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsExamen[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'examen_id',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsExamen as $i => $modelExamen): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Examen Solicitado</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelExamen->isNewRecord) {
                                echo Html::activeHiddenInput($modelExamen, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                
                                <?php 
                                    $data = ArrayHelper::map(Examen::find()->all(),'id','InfoExamen');
                                ?>        
                                    <?= $form->field($modelExamen, "[{$i}]examen_id")->widget(Select2::classname(), [
                                    'data' => $data,
                                    'options' => [
                                        'placeholder' => 'Seleccionar Examen...',
                                    ],
                                    'pluginOptions' => [
                                        'width' => '300px',
                                        'disabled' => !$model->isNewRecord,
                                    ],
                                ]);?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
        </div>
    </div>

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

    <?= $form->errorSummary($model); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Reserva' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
