<?php

namespace app\models;

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
class RegForm extends User
{

    public $passwordConfirm;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password','passwordConfirm', 'mail', 'phone', 'id_city', 'id_gender',  'agree'], 'required', 'message' => 'Поле обязательно для заполнения'],
            ['login', 'match', 'pattern' => '/^[a-zA-Z0-9]{1,}$/u', 'message' => 'Только латинские буквы и цифры'],
            ['login', 'unique' , 'message' => 'Такой логин уже используется'],
            ['mail', 'email', 'message' => 'Некорректный email'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать' ],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true , 'message' => 'Необходимо согласиться' ],
            ['phone', 'match', 'pattern' => '/^[0-9\s\-\(\)\+]{11,18}$/u', 'message' => 'Введите номер телефона'],
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
            'passwordConfirm' => 'Подтверждение пароля',
            'agree' => 'Даю согласие на обработку данных',
        ];
    }


}
