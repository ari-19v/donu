<?php

namespace backend\controllers;

use backend\models\EstadoPedidos;
use backend\models\search\EstadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstadosController implements the CRUD actions for EstadoPedidos model.
 */
class EstadosController extends Controller
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
     * Lists all EstadoPedidos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EstadosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstadoPedidos model.
     * @param int $idEstado Id Estado
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idEstado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idEstado),
        ]);
    }

    /**
     * Creates a new EstadoPedidos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new EstadoPedidos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idEstado' => $model->idEstado]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EstadoPedidos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idEstado Id Estado
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idEstado)
    {
        $model = $this->findModel($idEstado);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEstado' => $model->idEstado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EstadoPedidos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idEstado Id Estado
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idEstado)
    {
        $this->findModel($idEstado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstadoPedidos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idEstado Id Estado
     * @return EstadoPedidos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEstado)
    {
        if (($model = EstadoPedidos::findOne(['idEstado' => $idEstado])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
