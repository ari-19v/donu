<?php

namespace backend\controllers;

use \yii\rest\ActiveController;

class ApiuserController extends ActiveController
{
    
        public $modelClass = 'backend\models\User';
    
        public function actionIndex()
        {
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
    
            return [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ];
        }
}


