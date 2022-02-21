<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Roles;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SearchRol */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Roles');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class=" containe bg-light">


    <div class="containe bg-secondary">        
        <div class="form-row " >
            <div class="col-md-10" >
                <?= Html::img('@web/images/icon/rol.png', ['width' =>'80'], ['height'=>'80']) ?>                
                    <button type="button"class=" btn btn-secondary" style="color: white">
                    <h1 class=""></h1>                     
                    <h1><strong><?= Html::encode($this->title) ?></strong></h1>
                    </button>
                </a>
            </div>
                    
        <!-- <div class="col-4"> echo $this->render('_search', ['model' => $searchModel]); ?></div> -->
            <div class="col-2 "><br>
            <p>
            <strong><?= Html::a(Yii::t('app', 'Create Estado'), ['create'], ['class' => 'btn btn-success']) ?>
            </strong></p>
                
            </div>
            

        </div>
    </div>
    <div class="roles-index">


      
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'idRole',
                'Nombre',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Roles $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'idRole' => $model->idRole]);
                    }
                ],
            ],
        ]); ?>


    </div>
</section>