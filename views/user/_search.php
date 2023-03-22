<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'login') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'mail') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'id_city') ?>

    <?php // echo $form->field($model, 'date_born') ?>

    <?php // echo $form->field($model, 'id_gender') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'id_currency') ?>

    <?php // echo $form->field($model, 'admin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
