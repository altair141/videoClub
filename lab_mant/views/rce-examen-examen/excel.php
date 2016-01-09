<?php
 \app\components\ExcelGrid::widget([ 
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
 'extension'=>'xls',
 'filename'=>'RceExamenExamen',
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
            'DescripcionRce',
            'DescripcionExamen',
            'monto_a_pagar',
        ],
    ]);
?>