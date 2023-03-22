<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BasketProduct $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="basket-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_product')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\product::find()->all(),'id', 'name')) ?>


    <?= $form->field($model, 'id_user')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\user::find()->all(),'id', 'login')) ?>



    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
