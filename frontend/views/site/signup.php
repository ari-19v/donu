<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use YII\helpers\ArrayHelper;
use frontend\models\Roles;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <!-- 
              
                 $roles = ArrayHelper::map(Roles::find()->where(['Nombre' => 'Trabajador'])->orderBy('Nombre')->all(), 'idRole', 'Nombre');
                    $form->field($model, 'idRole')->dropDownList($roles)
                 ?> -->

               
            
                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'celular')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'direccion')->textInput(['autofocus' => true]) ?>


                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
