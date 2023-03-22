<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $id_category
 * @property int|null $is_discount
 * @property int $discount
 * @property int|null $flag
 * @property string $description
 * @property string $characteristic
 * @property string|null $way_of_use
 * @property string $link
 * @property float|null $rating
 * @property string $date_of_creation
 * @property string $date_of_update
 * @property int|null $author
 * @property int $price
 * @property int|null $id_company
 *
 * @property BasketProduct[] $basketProducts
 * @property Category $category
 * @property Company $company
 * @property FavoriteProduct[] $favoriteProducts
 * @property ProductPhoto[] $productPhotos
 * @property Review[] $reviews
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_category', 'description', 'characteristic', 'link', 'price'], 'required'],
            [['id_category', 'is_discount', 'discount', 'flag', 'author', 'price', 'id_company'], 'integer'],
            [['description'], 'string'],
            [['rating'], 'number'],
            [['date_of_creation', 'date_of_update'], 'safe'],
            [['name', 'characteristic', 'way_of_use', 'link'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['id_company' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'id_category' => 'Категория',
            'is_discount' => 'Есть ли скидка',
            'discount' => 'Скидка',
            'flag' => 'Flag',
            'description' => 'Описание',
            'characteristic' => 'Характеристики',
            'way_of_use' => 'Как использовать',
            'link' => 'Ссылка',
            'rating' => 'Рейтинг',
            'date_of_creation' => 'Дата создания',
            'date_of_update' => 'Дата обновления',
            'author' => 'Автор',
            'price' => 'Цена ₽',
            'id_company' => 'Компания',
        ];
    }

    /**
     * Gets query for [[BasketProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBasketProducts()
    {
        return $this->hasMany(BasketProduct::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'id_company']);
    }

    /**
     * Gets query for [[FavoriteProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoriteProducts()
    {
        return $this->hasMany(FavoriteProduct::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[ProductPhotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductPhotos()
    {
        return $this->hasMany(ProductPhoto::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['id_product' => 'id']);
    }
}
