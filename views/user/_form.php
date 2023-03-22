<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passwordConfirm')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_city')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\city::find()->all(),'id', 'city')) ?>

    <?= $form->field($model, 'id_gender')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\gender::find()->all(),'id', 'gender')) ?>

    <?= $form->field($model, 'agree')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton('Создать аккаунт', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
