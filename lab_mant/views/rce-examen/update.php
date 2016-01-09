<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RceExamen */

$this->title = 'Actualizar Registro Clínico Electrónico: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'RCE', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="rce-examen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPago'=>$modelsPago,
        'modelsBitacora'=>$modelsBitacora,
        'modelsExamenes'=>$modelsExamenes,
    ]) ?>

</div>
