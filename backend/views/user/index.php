<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\User;
use backend\components\TreeList;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class=" containe bg-light">
    <div class="containe bg-secondary">        
        <div class="form-row " >
            <div class="col-md-10" >
                <?= Html::img('@web/images/icon/user.png', ['width' =>'80'], ['height'=>'80']) ?>                
                    <button type="button"class=" btn btn-secondary" style="color: white">
                    <h1 class=""></h1>                     
                    <h1><strong><?= Html::encode($this->title) ?></strong></h1>
                    </button>
                </a>
            </div>
                      
           <!-- <div class="col-4"> echo $this->render('_search', ['model' => $searchModel]); ?></div> -->
            <div class="col-2 "><br>
            <p>
            <strong><?= Html::a(Yii::t('app', 'Create Usuario'), ['create'], ['class' => 'btn btn-success']) ?>
            </strong></p>
                
            </div>
            

        </div>
    </div>
<div class="user-index">

 

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
        //  'data' => $data,
        //  'pageList' => $pageList,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idRole',
            'username',
            // 'auth_key',
            // 'password_hash',
            //'password_reset_token',
            //'email:email',
            //'celular',
            //'direccion',
             'status',
            //'created_at',
            //'updated_at',
            //'verification_token',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
</section>
