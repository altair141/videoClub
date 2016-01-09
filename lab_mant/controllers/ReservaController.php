<?php

namespace app\controllers;

use Yii;
use app\models\Reserva;
use app\models\Hora;
use app\models\HoraExamenSolicitado;
use app\models\Model;
use app\models\PacienteSearch;
use app\models\Administrador;
use app\models\Persona;
use app\models\Profesional;
use app\models\ReservaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;

/**
 * ReservaController implements the CRUD actions for Reserva model.
 */
class ReservaController extends Controller
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
     * Lists all Reserva models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReservaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reserva model.
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
     * Creates a new Reserva model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reserva();
        $modelHora = new Hora();
        $modelsExamen = [new HoraExamenSolicitado];

        if ($model->load(Yii::$app->request->post()) && $modelHora->load(Yii::$app->request->post())) {

            $modelsExamen = Model::createMultiple(HoraExamenSolicitado::classname());
            Model::loadMultiple($modelsExamen, Yii::$app->request->post());

            $valid = $model->validate();
            $valid = $modelHora->validate() && $valid;
            $valid = Model::validateMultiple($modelsExamen) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {

                    $administrador = Administrador::find()->where(['id' => Yii::$app->user->getId()])->one();
                    $modelHora->administrador_id = $administrador->id;
                    $modelHora->save(false);

                    $profesional = Profesional::find()->where(['id' => $modelHora->profesional_id])->one();
                    $persona = Persona::find()->where(['id' => $profesional->persona_id])->one();

                    $model->hora_medica_id = $modelHora->id;
                    $model->persona_id_ingresa_reserva = $persona->id;
                    $model->save(false);
                       
                    foreach ($modelsExamen as $modelExamen) 
                    {
                        $modelExamen->hora_id = $model->hora_medica_id;
                        if (! ($flag = $modelExamen->save(false))) {
                            $transaction->rollBack();
                            break;
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
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelHora' => $modelHora, 
                'modelsExamen' => (empty($modelsExamen)) ? [new HoraExamenSolicitado] : $modelsExamen,
            ]);
        }
    }

    /**
     * Updates an existing Reserva model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelHora = $model->horaMedica;
        $modelsExamen = $modelHora->horaExamenSolicitados;

        if ($model->load(Yii::$app->request->post()) && $modelHora->load(Yii::$app->request->post())) {

            $oldIDHora = ArrayHelper::map($modelHora, 'id', 'id');
            $modelHora = new Hora();
            Model::load($modelHora, Yii::$app->request->post());
            $deletedIDHora = array_diff($oldIDHora, array_filter(ArrayHelper::map($modelHora, 'id', 'id')));

            $oldIDsExamen = ArrayHelper::map($modelsExamen, 'id', 'id');
            $modelsExamen = Model::createMultiple(Pago::classname(), $modelsExamen);
            Model::loadMultiple($modelsExamen, Yii::$app->request->post());
            $deletedIDsExamen = array_diff($oldIDsExamen, array_filter(ArrayHelper::map($modelsExamen, 'id', 'id')));

            $valid = $model->validate();
            $valid = $modelHora->validate();
            $valid = Model::validateMultiple($modelsExamen) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDHora)) {
                            Hora::deleteAll(['id' => $deletedIDHora]);
                        }else if(! empty($deletedIDsExamen)) {
                            HoraExamenSolicitado::deleteAll(['id' => $deletedIDsExamen]);
                        }
                        foreach ($modelsExamen as $modelExamen) 
                        {
                            $modelExamen->hora_id = $model->hora_medica_id;
                            if (! ($flag = $modelExamen->save(false))) {
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
            'modelHora' => $modelHora, 
            'modelsExamen' => (empty($modelsExamen)) ? [new HoraExamenSolicitado] : $modelsExamen,
        ]);
    }

    /**
     * Deletes an existing Reserva model.
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
     * Finds the Reserva model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reserva the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reserva::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionExcel()
    {
        $searchModel = new ReservaSearch();
        $dataProvider = $searchModel->excel(['ModelSearch']);

        return $this->renderPartial('excel', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGetReserva($reservaId)
    {
        // find the zip code from the locations table
        $reserva = Reserva::findOne($reservaId);
        echo Json::encode($reserva);
    }
}
