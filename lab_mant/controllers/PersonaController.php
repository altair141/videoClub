<?php

namespace app\controllers;

use Yii;
use app\models\Persona;
use app\models\PersonaSearch;
use app\models\Administrador;
use app\models\AdministradorSearch;
use app\models\Profesional;
use app\models\ProfesionalSearch;
use app\models\Paciente;
use app\models\PacienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
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
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persona model.
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
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {

        $model = new Persona();
        $modelAdmin = new Administrador();
        $modelProfesional = new Profesional();
        $modelPaciente = new Paciente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            if($model->perfil == 1){
                $model->save(false);
                $modelAdmin->persona_id = $model->id;
                $modelAdmin->save(false);
                
                if($model->save(false))
                {
                   return $this->redirect(['view', 'id' => $model->id]);
                }

            }else if($model->perfil == 2){
                $model->save(false);
                $modelProfesional->persona_id = $model->id;
                $modelProfesional->save(false);
                
                if($model->save(false))
                {
                   return $this->redirect(['view', 'id' => $model->id]);
                }
            }else if($model->perfil == 3){
                $model->save(false);
                $modelPaciente->persona_id = $model->id;
                $modelPaciente->descripcion = $model->descripcion;
                $modelPaciente->save(false);
                
                if($model->save(false))
                {
                   return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Administrador::find()->where(['persona_id'=>$model->id] )->exists()){
            $model->perfil = 1;
        } else if(Profesional::find()->where(['persona_id'=>$model->id] )->exists()){
            $model->perfil = 2;
        } else if(Paciente::find()->where(['persona_id'=>$model->id] )->exists()){
            $model->perfil = 3;
            $paciente = Paciente::find()->where(['persona_id'=>$model->id])->one();
            $model->descripcion = $paciente->descripcion;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->perfil == 1){
                $admin = Administrador::find()->where(['persona_id'=>$model->id])->one();
                $model->save(false);
                $admin->save(false);
                
                if($model->save(false))
                {
                   return $this->redirect(['view', 'id' => $model->id]);
                }

            }else if($model->perfil == 2){
                $profesional = Profesional::find()->where(['persona_id'=>$model->id])->one();
                $model->save(false);
                $profesional->save(false);
                
                if($model->save(false))
                {
                   return $this->redirect(['view', 'id' => $model->id]);
                }
            }else if($model->perfil == 3){
                $paciente = Paciente::find()->where(['persona_id'=>$model->id])->one();
                $model->save(false);
                $paciente->descripcion = $model->descripcion;
                $paciente->save(false);
                
                if($model->save(false))
                {
                   return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Persona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if(Administrador::find()->where(['persona_id'=>$model->id] )->exists()){
            $admin = Administrador::find()->where(['persona_id'=>$model->id] )->one();
            $admin->delete();
            $model->delete();
        } else if(Profesional::find()->where(['persona_id'=>$model->id] )->exists()){
            $profesional = Profesional::find()->where(['persona_id'=>$model->id] )->one();
            $profesional->delete();
            $model->delete();
        } else if(Paciente::find()->where(['persona_id'=>$model->id] )->exists()){
            $paciente = Paciente::find()->where(['persona_id'=>$model->id] )->one();
            $paciente->delete();
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionExcel()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->excel(['ModelSearch']);

        return $this->renderPartial('excel', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPdf(){
        Yii::$app->response->format = 'pdf';
        //Can you it if needed to rotate the page
        Yii::$container->set(Yii::$app->response->formatters['pdf']['class'], [
            'orientation' => 'Landscape', // This value will be ignored if format is a string value.
            'beforeRender' => function($mpdf, $data) {},
            ]);

        $this->layout = '//print';
        return $this->render('view', [
            'model' => $model,
            ]);
    }
}
