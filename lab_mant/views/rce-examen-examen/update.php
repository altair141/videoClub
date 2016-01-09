<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RceExamenExamen */

$this->title = 'Actualizar RCE Examen Examen: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'RCE Examen Exámenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="rce-examen-examen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
