<?php

namespace app\models;

use app\controllers\AdminController;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $mail
 * @property string $phone
 * @property int $id_city
 * @property string $date_born
 * @property int $id_gender
 * @property string $photo
 * @property int $id_currency
 * @property int $admin
 *
 * @property BasketProduct[] $basketProducts
 * @property Basket[] $baskets
 * @property City $city
 * @property Company[] $companies
 * @property Currency $currency
 * @property FavoriteProduct[] $favoriteProducts
 * @property Gender $gender
 * @property Ordering[] $orderings
 * @property Review[] $reviews
 * @property UserAddress[] $userAddresses
 * @property UserCard[] $userCards
 */
class User extends \yii\db\ActiveRecord  implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'mail', 'phone', 'id_city', 'date_born', 'id_gender', 'photo', 'id_currency'], 'required'],
            [['id_city', 'id_gender', 'id_currency', 'admin'], 'integer'],
            [['date_born'], 'safe'],
            [['login', 'password', 'mail', 'phone', 'photo'], 'string', 'max' => 255],
            [['id_currency'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['id_currency' => 'id']],
            [['id_gender'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::class, 'targetAttribute' => ['id_gender' => 'id']],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'mail' => 'Email',
            'phone' => 'Телефон',
            'id_city' => 'Город',
            'date_born' => 'Дата рождения',
            'id_gender' => 'Пол',
            'photo' => 'Фото',
            'id_currency' => 'Валюта',
            'admin' => 'Admin',
        ];
    }

    /**
     * Gets query for [[BasketProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBasketProducts()
    {
        return $this->hasMany(BasketProduct::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'id_city']);
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'id_currency']);
    }

    /**
     * Gets query for [[FavoriteProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoriteProducts()
    {
        return $this->hasMany(FavoriteProduct::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::class, ['id' => 'id_gender']);
    }

    /**
     * Gets query for [[Orderings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderings()
    {
        return $this->hasMany(Ordering::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[UserAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAddresses()
    {
        return $this->hasMany(UserAddress::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[UserCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCards()
    {
        return $this->hasMany(UserCard::class, ['id_user' => 'id']);
    }


#######################################################################################
#######################################################################################

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['login' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {

    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }


}
