<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RceExamenExamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'RCE Examen Exámenes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rce-examen-examen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ingresar RCE Examen Examen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rce_examen_id',
            'examen_id',
            'monto_a_pagar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Exportar a Excel', ['excel'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
