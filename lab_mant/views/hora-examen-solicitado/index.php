<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HoraExamenSolicitadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Horas Exámenes Solicitados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hora-examen-solicitado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ingresar Hora Examen Solicitado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Fecha',
            'HoraInicio',
            'Profesional',
            'Paciente',
            'DescripcionExamen',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Exportar a Excel', ['excel'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
