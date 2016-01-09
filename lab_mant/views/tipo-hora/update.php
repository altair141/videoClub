<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoHora */

$this->title = 'Update Tipo Hora: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Horas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-hora-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
