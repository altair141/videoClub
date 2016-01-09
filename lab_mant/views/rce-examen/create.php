<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RceExamen */

$this->title = 'Crear Registro Clínico Electrónico';
$this->params['breadcrumbs'][] = ['label' => 'RCE', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rce-examen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPago'=>$modelsPago,
        'modelsBitacora'=>$modelsBitacora,
        'modelsExamenes'=>$modelsExamenes,
    ]) ?>

</div>
