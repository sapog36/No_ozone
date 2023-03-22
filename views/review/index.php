<?php

use app\models\Review;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ReviewSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать отзыв', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_product',
                'value' => 'product.name',
            ],
            //'id',
            //'id_user',
            [
                'attribute' => 'id_user',
                'value' => 'user.login',
            ],
            'pluses:ntext',
            'minuses:ntext',
            'description:ntext',
            //'rating',
            //'id_status',
            //'id_like_rating',
            //'date_of_creation',
            //'date_of_update',
            //'author',
            //'id_product',

            [
                'class' => ActionColumn::className(),
                'template' => '{view} ' ,
                'urlCreator' => function ($action, Review $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
