<?php
 \app\components\ExcelGrid::widget([ 
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
 'extension'=>'xls',
 'filename'=>'Examenes',
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
            'descripcion',
            'monto',
            'observaciones',
        ],
    ]);
?>