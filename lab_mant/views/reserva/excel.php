<?php
 \app\components\ExcelGrid::widget([ 
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
 'extension'=>'xls',
 'filename'=>'Reservas',
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
            'NombresPaciente',
            'NombresPersona',
            'HoraInicio',
            'fecha',
        ],
    ]);
?>