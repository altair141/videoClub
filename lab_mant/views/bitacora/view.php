<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bitacora */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bitácoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bitacora-view">

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
            'estado_rce_examen_id',
            'rce_examen_id',
            'persona_id_ingresa_bitacora',
            'observacion',
        ],
    ]) ?>

</div>
