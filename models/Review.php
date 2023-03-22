<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property int $id_user
 * @property string $pluses
 * @property string $minuses
 * @property string $description
 * @property float|null $rating
 * @property int|null $id_status
 * @property int|null $id_like_rating
 * @property string|null $date_of_creation
 * @property string|null $date_of_update
 * @property string|null $author
 * @property int $id_product
 *
 * @property LikeRating $likeRating
 * @property Product $product
 * @property ReviewPhoto[] $reviewPhotos
 * @property ReviewVideo[] $reviewVideos
 * @property Status $status
 * @property User $user
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'pluses', 'minuses', 'description', 'id_product'], 'required'],
            [['id_user', 'id_status', 'id_like_rating', 'id_product'], 'integer'],
            [['pluses', 'minuses', 'description'], 'string'],
            [['rating'], 'number'],
            [['date_of_creation', 'date_of_update'], 'safe'],
            [['author'], 'string', 'max' => 255],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['id_status' => 'id']],
            [['id_like_rating'], 'exist', 'skipOnError' => true, 'targetClass' => LikeRating::class, 'targetAttribute' => ['id_like_rating' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Пользователь',
            'pluses' => 'Плюсы',
            'minuses' => 'Минусы',
            'description' => 'Описание',
            'rating' => 'Рейтинг',
            'id_status' => 'Статус',
            'id_like_rating' => 'Количество лайков',
            'date_of_creation' => 'Дата создания',
            'date_of_update' => 'Дата обновления',
            'author' => 'Автор',
            'id_product' => 'Продукт',
        ];
    }

    /**
     * Gets query for [[LikeRating]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikeRating()
    {
        return $this->hasOne(LikeRating::class, ['id' => 'id_like_rating']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'id_product']);
    }

    /**
     * Gets query for [[ReviewPhotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewPhotos()
    {
        return $this->hasMany(ReviewPhoto::class, ['id_review' => 'id']);
    }

    /**
     * Gets query for [[ReviewVideos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewVideos()
    {
        return $this->hasMany(ReviewVideo::class, ['id_review' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'id_status']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
