<?php
 \app\components\ExcelGrid::widget([ 
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
 'extension'=>'xls',
 'filename'=>'HorasExamenesSolicitados',
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
            'HoraInicio',
            'DescripcionExamen',
        ],
    ]);
?>