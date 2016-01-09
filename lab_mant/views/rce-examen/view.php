<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RceExamen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'RCE', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rce-examen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que desea borrar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'procedencia_id',
            'reserva_id',
            'persona_id_realiza_examen',
        ],
    ]) ?>

</div>
