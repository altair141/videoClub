<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FormaPago */

$this->title = 'Actualizar Forma de Pago: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Formas de Pago', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="forma-pago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
