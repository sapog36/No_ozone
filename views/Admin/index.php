<?php

use app\models\Basket;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BasketSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Панель управления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Управление корзиной', ['/basket-product'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Управление пользователями', ['/user'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Управление отзывами', ['/review'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Управление товарами', ['/product'], ['class' => 'btn btn-success']) ?>
    </p>






</div>
