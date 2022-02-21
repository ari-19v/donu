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

    <div class="form-row">
        <div class="col-4">
            <!-- $form->field($model, 'idRole')->textInput() ?> -->

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <!-- $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?> -->

            <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
           
        </div>
        <div class="col-4">
           
            <?php
                $roles =ArrayHelper::map(Roles::find()->orderBy('Nombre')->all(), 'idRole', 'Nombre');
            ?>
            <?= $form->field($model, 'idRole')->dropDownList($roles) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    


  <!-- $form->field($model, 'status')->textInput() ?> -->


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
