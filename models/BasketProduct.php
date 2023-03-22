<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "basket_product".
 *
 * @property int $id
 * @property int $id_product
 * @property int $count
 * @property int $id_user
 * @property int $id_busket
 *
 * @property Basket $busket
 * @property Product $product
 * @property User $user
 */
class BasketProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basket_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product',  'id_user'], 'required'],
            [['id_product', 'count', 'id_user', 'id_busket'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_busket'], 'exist', 'skipOnError' => true, 'targetClass' => Basket::class, 'targetAttribute' => ['id_busket' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Продукт',
            'count' => 'Цена',
            'id_user' => 'Пользователь',
            'id_busket' => 'Номер корзины',
        ];
    }

    /**
     * Gets query for [[Busket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusket()
    {
        return $this->hasOne(Basket::class, ['id' => 'id_busket']);
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
