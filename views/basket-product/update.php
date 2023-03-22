<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BasketProduct $model */

$this->title = 'Update Basket Product: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Basket Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="basket-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
