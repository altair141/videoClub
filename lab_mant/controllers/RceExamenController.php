<?php

namespace app\controllers;

use Yii;
use app\models\Bitacora;
use app\models\BitacoraSearch;
use app\models\Hora;
use app\models\HoraExamenSolicitado;
use app\models\Reserva;
use app\models\Pago;
use app\models\RceExamenExamen;
use app\models\RceExamenExamenSearch;
use app\models\RceExamen;
use app\models\Examen;
use app\models\Persona;
use app\models\RceExamenSearch;
use app\models\FormaPago;
use app\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * RceExamenController implements the CRUD actions for RceExamen model.
 */
class RceExamenController extends Controller
{
    public function behaviors()
    {
        return [
            'access' =>[
                'class' => AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' =>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all RceExamen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RceExamenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RceExamen model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RceExamen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RceExamen();
        $modelsPago = [new Pago];
        $modelsBitacora = [new Bitacora];
        $modelsExamenes = [new RceExamenExamen];

        $userId = Yii::$app->user->getId();
        $persona = Persona::find()->where(['id' => $userId])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            $modelsPago = Model::createMultiple(Pago::classname());
            Model::loadMultiple($modelsPago, Yii::$app->request->post());
            $modelsBitacora = Model::createMultiple(Bitacora::classname());
            Model::loadMultiple($modelsBitacora, Yii::$app->request->post());
            $modelsExamenes = Model::createMultiple(RceExamenExamen::classname());
            Model::loadMultiple($modelsExamenes, Yii::$app->request->post());


            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPago) && $valid;
            $valid = Model::validateMultiple($modelsBitacora) && $valid;
            $valid = Model::validateMultiple($modelsExamenes) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPago as $modelPago) 
                        {
                            $modelPago->rce_examen_id = $model->id;
                            if (! ($flag = $modelPago->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        foreach ($modelsBitacora as $modelBitacora) 
                        {
                            $modelBitacora->rce_examen_id = $model->id;

                            $modelBitacora->persona_id_ingresa_bitacora = $persona->id;

                            if (! ($flag = $modelBitacora->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        $reserva = Reserva::find()->where(['id' => $model->reserva_id])->one();
                        $hora = Hora::find()->where(['id' => $reserva->hora_medica_id])->one();
                        $examenes = HoraExamenSolicitado::find()->where(['hora_id' => $hora->id])->all();

                        for ($i = 0; $i < count($examenes); ++$i) 
                        {        
                            $examen = Examen::find()->where(['id' => $examenes[$i]->examen_id])->one();

                            $modelsExamenes[$i] = new RceExamenExamen();
                            $modelsExamenes[$i]->rce_examen_id = $model->id;
                            $modelsExamenes[$i]->examen_id = $examenes[$i]->examen_id;
                            $modelsExamenes[$i]->monto_a_pagar = $examen->monto;
                            if (! ($flag = $modelsExamenes[$i]->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        } 
        else {
            return $this->render('create', [
                'model' => $model,
                'modelsPago' => (empty($modelsPago)) ? [new Pago] : $modelsPago,
                'modelsBitacora' => (empty($modelsBitacora)) ? [new Bitacora] : $modelsBitacora,
                'modelsExamenes' => (empty($modelsExamenes)) ? [new RceExamenExamen] : $modelsExamenes,
            ]);
        }
    }

    /**
     * Updates an existing RceExamen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelsPago = $model->pagos;
        $modelsBitacora = $model->bitacoras;
        $modelsExamenes = $model->rceExamenExamens;

        foreach ($modelsExamenes as $modelExamen) 
        {
            $examen = Examen::find()->where(['id' => $modelExamen->examen_id])->one();
            $modelExamen->descripcion = $examen->descripcion;
            $modelExamen->observaciones = $examen->observaciones;          
        }

        if ($model->load(Yii::$app->request->post())) {

            $oldIDsPago = ArrayHelper::map($modelsPago, 'id', 'id');
            $modelsPago = Model::createMultiple(Pago::classname(), $modelsPago);
            Model::loadMultiple($modelsPago, Yii::$app->request->post());
            $deletedIDsPago = array_diff($oldIDsPago, array_filter(ArrayHelper::map($modelsPago, 'id', 'id')));

            $oldIDsExamen = ArrayHelper::map($modelsExamenes, 'id', 'id');
            $modelsExamenes = Model::createMultiple(Examen::classname(), $modelsExamenes);
            Model::loadMultiple($modelsExamenes, Yii::$app->request->post());
            $deletedIDsExamen = array_diff($oldIDsExamen, array_filter(ArrayHelper::map($modelsExamenes, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPago) && $valid;
            $valid = Model::validateMultiple($modelsBitacora) && $valid;
            $valid = Model::validateMultiple($modelsExamenes) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDsPago)) {
                            Pago::deleteAll(['id' => $deletedIDsPago]);
                        }else if(! empty($deletedIDsBitacora)) {
                            Bitacora::deleteAll(['id' => $deletedIDsBitacora]);
                        }else if(! empty($deletedIDsREE)) {
                            RceExamenExamen::deleteAll(['id' => $deletedIDsREE]);
                        }
                        foreach ($modelsPago as $modelPago) 
                        {
                            $modelPago->rce_examen_id = $model->id;
                            if (! ($flag = $modelPago->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        foreach ($modelsBitacora as $modelBitacora) 
                        {
                            $modelBitacora->rce_examen_id = $model->id;
                            if (! ($flag = $modelBitacora->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        $reserva = Reserva::find()->where(['id' => $model->reserva_id])->one();
                        $hora = Hora::find()->where(['id' => $reserva->hora_medica_id])->one();
                        $examenes = HoraExamenSolicitado::find()->where(['hora_id' => $hora->id])->all();

                        for ($i = 0; $i < count($examenes); ++$i) 
                        {        
                            $examen = Examen::find()->where(['id' => $examenes[$i]->examen_id])->one();

                            $modelsExamenes[$i] = new RceExamenExamen();
                            $modelsExamenes[$i]->rce_examen_id = $model->id;
                            $modelsExamenes[$i]->examen_id = $examenes[$i]->examen_id;
                            $modelsExamenes[$i]->monto_a_pagar = $examen->monto;
                            if (! ($flag = $modelsExamenes[$i]->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsPago' => (empty($modelsPago)) ? [new Pago] : $modelsPago,
            'modelsBitacora' => (empty($modelsBitacora)) ? [new Bitacora] : $modelsBitacora,
            'modelsExamenes' => (empty($modelsExamenes)) ? [new RceExamenExamen] : $modelsExamenes,
        ]);
    }

    /**
     * Deletes an existing RceExamen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RceExamen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RceExamen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RceExamen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
