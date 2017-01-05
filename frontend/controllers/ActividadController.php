<?php

namespace frontend\controllers;

use Yii;
use common\models\Actividad;
use common\models\ActividadSearch;
use common\models\CoordinadorSocialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActividadController implements the CRUD actions for Actividad model.
 */
class ActividadController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Actividad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActividadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Actividad model.
     * @param integer $Id_actividad
     * @param integer $CedulaCoordi
     * @return mixed
     */
    public function actionView($Id_actividad, $CedulaCoordi)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id_actividad, $CedulaCoordi),
        ]);
    }

    /**
     * Creates a new Actividad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Actividad();
        $searchModel1 = new CoordinadorSocialSearch();
        $dataProvider = $searchModel1->search(Yii::$app->request->queryParams);
        $aux1 = $searchModel1->CedulaCoordi;
        
         if ($searchModel1->CedulaCoordi === null)
        $searchModel1->CedulaCoordi = 000;
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_actividad' => $model->Id_actividad, 'CedulaCoordi' => $model->CedulaCoordi]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'searchModel1' => $searchModel1,
                'aux1' => $aux1,
            ]);
        }
    }

    /**
     * Updates an existing Actividad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Id_actividad
     * @param integer $CedulaCoordi
     * @return mixed
     */
    public function actionUpdate($Id_actividad, $CedulaCoordi)
    {
        $model = $this->findModel($Id_actividad, $CedulaCoordi);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_actividad' => $model->Id_actividad, 'CedulaCoordi' => $model->CedulaCoordi]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Actividad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Id_actividad
     * @param integer $CedulaCoordi
     * @return mixed
     */
    public function actionDelete($Id_actividad, $CedulaCoordi)
    {
        $this->findModel($Id_actividad, $CedulaCoordi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Actividad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Id_actividad
     * @param integer $CedulaCoordi
     * @return Actividad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id_actividad, $CedulaCoordi)
    {
        if (($model = Actividad::findOne(['Id_actividad' => $Id_actividad, 'CedulaCoordi' => $CedulaCoordi])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
