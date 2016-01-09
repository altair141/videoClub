<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rut',
            'nombres',
            'apellido_paterno',
            'apellido_materno',
            // 'email:email',
            // 'fecha_nacimiento',
            // 'identificadorfacebook',
            'Perfil',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    <p>
        <?= Html::a('Ingresar Nueva Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>
        <?= Html::a('Exportar a Excel', ['excel'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
