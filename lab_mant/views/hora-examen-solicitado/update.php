<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HoraExamenSolicitado */

$this->title = 'Actualizar Hora Examen Solicitado: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Horas Exámenes Solicitados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="hora-examen-solicitado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
