<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Procedencia;
use app\models\Examen;
use app\models\RceExamen;
use app\models\Reserva;
use app\models\Persona;
use app\models\Profesional;
use app\models\Pago;
use app\models\FormaPago;
use app\models\EstadoRceExamen;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\web\Response;
use yii\helpers\Url;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\RceExamen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rce-examen-form">

	<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    
    <?= $form->field($model, 'procedencia_id')->dropDownList(
    	ArrayHelper::map(Procedencia::find()->all(),'id','descripcion'),
    	['prompt'=>'Seleccionar Procedencia', 'style'=>'width:300px']
    ) ?>

    <?php
        $rces = RceExamen::find('reserva_id')->all();
        $ids = [];
        foreach($rces as $i => $rce){
            $ids[$i] = $rce->reserva_id;
        }

        $data = ArrayHelper::map(Reserva::find()->where(['not in', 'id', $ids])->all(),'id','ReservaSelect'); 
    ?>

    <?= $form->field($model, "reserva_id")->widget(Select2::classname(), [
        'data' => $data,
        'options' => [
            'placeholder' => 'Seleccionar Reserva...','id'=>'reservaId',
        ],
        'pluginOptions' => [
            'width' => '300px',
            'disabled' => !$model->isNewRecord,
        ],
    ]);?>

    <?php 
        $data = ArrayHelper::map(Profesional::find()->all(),'id','Nombres');
    ?>        
        <?= $form->field($model, "persona_id_realiza_examen")->widget(Select2::classname(), [
        'data' => $data,
        'options' => [
            'placeholder' => 'Seleccionar Profesional que realiza el Examen...',
        ],
        'pluginOptions' => [
            'width' => '300px',
            'disabled' => !$model->isNewRecord,
        ],
    ]);?>

<?php
foreach($modelsExamenes as $i => $modelExamen)
{
$script = <<< JS
// here you right all your javascript stuff
$('#reservaId').change(function(){
    var reservaId = $(this).val();

    $.get('index.php?r=examen/get-datos-examen',{ reservaId : reservaId },function(data){
        var data = $.parseJSON(data);
        $('#rceexamenexamen-$i-monto_a_pagar').attr('value',data[$i].monto);
        $('#rceexamenexamen-$i-descripcion').attr('value',data[$i].descripcion);
        $('#rceexamenexamen-$i-observaciones').attr('value',data[$i].observaciones);
    });
});

JS;
}
$this->registerJs($script);
?>
    
 	
    <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>Exámenes</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsExamenes[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'monto_a_pagar',
                    'descripcion',
                    'observaciones'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsExamenes as $i => $modelExamen): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Examen</h3>
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
                            <div class="col-sm-4">
                                <?= $form->field($modelExamen, "[{$i}]monto_a_pagar")->textInput(['maxlength' => 128,
                                'style' => 'width:300px']) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelExamen, "[{$i}]descripcion")->textInput(['maxlength' => 128,
                                'style' => 'width:300px']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <?= $form->field($modelExamen, "[{$i}]observaciones")->textInput(['maxlength' => 128,
                                'style' => 'width:300px']) ?>
                            </div>
                        </div>                
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>Pagos</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper2', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items2', // required: css class selector
                'widgetItem' => '.item2', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item2', // css class
                'deleteButton' => '.remove-item2', // css class
                'model' => $modelsPago[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'forma_pago_id',
                    'monto',
                    'comprobante',
                    'estadopago',
                ],
            ]); ?>

            <div class="container-items2"><!-- widgetContainer -->
            <?php foreach ($modelsPago as $i => $modelPago): ?>
                <div class="item2 panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Pago</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item2 btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item2 btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelPago->isNewRecord) {
                                echo Html::activeHiddenInput($modelPago, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelPago, "[{$i}]forma_pago_id")->dropDownList(
                                    ArrayHelper::map(FormaPago::find()->all(),'id','descripcion'),
                                    ['prompt'=>'Seleccionar Forma de Pago', 'style'=>'width:300px', 'disabled' => !$modelPago->isNewRecord]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelPago, "[{$i}]monto")->textInput(['maxlength' => 128,
                                'disabled' => !$modelPago->isNewRecord]) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelPago, "[{$i}]comprobante")->textInput(['maxlength' => 128,
                                'disabled' => !$modelPago->isNewRecord]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelPago, "[{$i}]estadopago")->dropDownList(
                                    array(1=>'Pendiente',2=>'Listo')
                                ); ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>Bitácoras</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper3', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items3', // required: css class selector
                'widgetItem' => '.item3', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item3', // css class
                'deleteButton' => '.remove-item3', // css class
                'model' => $modelsBitacora[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'estado_rce_examen_id',
                    'observacion',
                ],
            ]); ?>

            <div class="container-items3"><!-- widgetContainer -->
            <?php foreach ($modelsBitacora as $i => $modelBitacora): ?>
                <div class="item3 panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Bitácora</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item3 btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item3 btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelBitacora->isNewRecord) {
                                echo Html::activeHiddenInput($modelBitacora, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelBitacora, "[{$i}]estado_rce_examen_id")->dropDownList(
                                    ArrayHelper::map(EstadoRceExamen::find()->all(),'id','descripcion'),
                                    ['prompt'=>'Seleccionar Estado RCE Examen', 'style'=>'width:300px']
                                ) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelBitacora, "[{$i}]observacion")->textInput(['maxlength' => true]) ?>
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


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>