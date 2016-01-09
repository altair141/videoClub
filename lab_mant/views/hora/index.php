<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HoraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Horas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hora-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ingresar Hora', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NombreTipoHora',
            'NombresProfesional',
            'NombresAdministrador',
            'hora_inicio',
            'fecha',
            // 'tipo_hora',
            // 'tiempo_periodo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Exportar a Excel', ['excel'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
