<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstadoRceExamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estados RCE Examen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-rce-examen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ingresar Estado RCE Examen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Exportar a Excel', ['excel'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
