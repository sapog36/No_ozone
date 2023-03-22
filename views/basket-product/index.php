<?php

use app\models\BasketProduct;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BasketProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basket-product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_user',
            [
                'attribute' => 'id_user',
                'value' => 'user.login',
            ],
            //'id_product',
            [
                'attribute' => 'id_product',
                'value' => 'product.name',
            ],
            //'count',
            [
                'attribute' => 'count',
                'value' => 'product.price',
            ],
            //'id_busket',
            [
                'class' => ActionColumn::className(),
                'template' => '{delete}' ,
                'urlCreator' => function ($action, BasketProduct $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
