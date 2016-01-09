<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reserva */

$this->title = 'Actualizar Reserva: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="reserva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelHora' => $modelHora,
        'modelsExamen' => $modelsExamen,
    ]) ?>

</div>
