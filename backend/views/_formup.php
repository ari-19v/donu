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

    <?php
        $roles =ArrayHelper::map(Roles::find()->orderBy('Nombre')->all(), 'idRole', 'Nombre');
    ?>
    <?= $form->field($model, 'idRole')->dropDownList($roles) ?>
    <!-- $form->field($model, 'idRole')->textInput() ?> -->

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

     <!-- $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

  <!-- $form->field($model, 'status')->textInput() ?> -->


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
