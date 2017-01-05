<?php

namespace frontend\controllers;

use Yii;
use common\models\LaborSocial;
use common\models\LaborSocialSearch;
use common\models\EstudianteSearch;
use common\models\CoordinadorSocialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LaborSocialController implements the CRUD actions for LaborSocial model.
 */
class LaborSocialController extends Controller
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
     * Lists all LaborSocial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LaborSocialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LaborSocial model.
     * @param integer $Id_actividad
     * @param integer $Cedula
     * @param integer $CedulaCoordi
     * @return mixed
     */
    public function actionView($Id_actividad, $Cedula, $CedulaCoordi)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id_actividad, $Cedula, $CedulaCoordi),
        ]);
    }

    /**
     * Creates a new LaborSocial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LaborSocial();
        $searchModel1 = new EstudianteSearch();
        $dataProvider = $searchModel1->search(Yii::$app->request->queryParams);
        $aux1 = $searchModel1->Cedula;
        
     /*  if($searchModel===null)
       {
           $searchModel->Cedula='111';
       }    */
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_actividad' => $model->Id_actividad, 'Cedula' => $model->Cedula, 'CedulaCoordi' => $model->CedulaCoordi]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'searchModel1' => $searchModel1,
                'dataProvider' => $dataProvider,
                'aux1' => $aux1,
                
               
            ]);
        }
    }

    /**
     * Updates an existing LaborSocial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Id_actividad
     * @param integer $Cedula
     * @param integer $CedulaCoordi
     * @return mixed
     */
    public function actionUpdate($Id_actividad, $Cedula, $CedulaCoordi)
    {
        $model = $this->findModel($Id_actividad, $Cedula, $CedulaCoordi);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_actividad' => $model->Id_actividad, 'Cedula' => $model->Cedula, 'CedulaCoordi' => $model->CedulaCoordi]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LaborSocial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Id_actividad
     * @param integer $Cedula
     * @param integer $CedulaCoordi
     * @return mixed
     */
    public function actionDelete($Id_actividad, $Cedula, $CedulaCoordi)
    {
        $this->findModel($Id_actividad, $Cedula, $CedulaCoordi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LaborSocial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Id_actividad
     * @param integer $Cedula
     * @param integer $CedulaCoordi
     * @return LaborSocial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id_actividad, $Cedula, $CedulaCoordi)
    {
        if (($model = LaborSocial::findOne(['Id_actividad' => $Id_actividad, 'Cedula' => $Cedula, 'CedulaCoordi' => $CedulaCoordi])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
