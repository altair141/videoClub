<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RceExamenExamen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'RCE Examen Exámenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rce-examen-examen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Confirma que desea borrar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'rce_examen_id',
            'examen_id',
            'monto_a_pagar',
        ],
    ]) ?>

</div>
