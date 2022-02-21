<?php

namespace backend\controllers;

use backend\models\Roles;
use backend\models\search\SearchRol;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RolController implements the CRUD actions for Roles model.
 */
class RolController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Roles models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchRol();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Roles model.
     * @param int $idRole Id Role
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idRole)
    {
        return $this->render('view', [
            'model' => $this->findModel($idRole),
        ]);
    }

    /**
     * Creates a new Roles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Roles();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idRole' => $model->idRole]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Roles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idRole Id Role
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idRole)
    {
        $model = $this->findModel($idRole);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idRole' => $model->idRole]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Roles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idRole Id Role
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idRole)
    {
        $this->findModel($idRole)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Roles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idRole Id Role
     * @return Roles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idRole)
    {
        if (($model = Roles::findOne(['idRole' => $idRole])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
