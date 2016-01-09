<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoRceExamen */

$this->title = 'Actualizar Estado Rce Examen: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estados RCE Examen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="estado-rce-examen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
