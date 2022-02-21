<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="containe bg-secondary">        
        <div class="form-row " >
            <div class="col-md-12" >
                <?= Html::img('@web/images/icon/user.png', ['width' =>'80'], ['height'=>'80']) ?>                
                    <button type="button"class=" btn btn-secondary" style="color: white">
                    <h1 class=""></h1>                     
                    <h1><strong><?= Html::encode($this->title) ?></strong></h1>
                    </button>
                </a>
            </div>
        </div>
    </div>
<div class="user-create bg-light">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
<hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
