<?php
 \app\components\ExcelGrid::widget([ 
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
 'extension'=>'xls',
 'filename'=>'Horas',
 'properties' =>[
 //'creator' =>'',
 //'title'  => '',
 //'subject'  => '',
 //'category' => '',
 //'keywords'  => '',
 //'manager'  => '',
 ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'NombreTipoHora',
            'NombresProfesional',
            'NombresAdministrador',
            'hora_inicio',
        ],
    ]);
?>