<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reserva */

$this->title = 'Ingresar Reserva';
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelHora' => $modelHora,
        'modelsExamen' => $modelsExamen,
    ]) ?>

</div>
