<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Roles;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

<?php $form = ActiveForm::begin(); ?>
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
            <div class="col-md-2" ><br>
            <div class="form-group">
                <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        </div>
       
    </div>
<div class="form-row">
    <div class="col-3">
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?php
            $roles =ArrayHelper::map(Roles::find()->orderBy('Nombre')->all(), 'idRole', 'Nombre');
        ?>
        <?= $form->field($model, 'idRole')->dropDownList($roles) ?>
        <?= $form->field($model, 'status')->textInput() ?>
        <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-6">
        <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>   
        
    </div>
   
    <div class="col-3">
        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?>

        <?= $form->field($model, 'verification_token')->textInput(['maxlength' => true]) ?>
    </div>
</div>






  <!-- $form->field($model, 'status')->textInput() ?> -->




    <?php ActiveForm::end(); ?>

</div>
