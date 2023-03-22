<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordering".
 *
 * @property int $id
 * @property int $id_user
 * @property int|null $id_busket
 * @property int $id_address
 * @property int|null $id_delivery
 * @property int $id_status
 * @property string $date
 *
 * @property UserAddress $address
 * @property Basket $busket
 * @property OrderDelivery $delivery
 * @property OrderStatus $status
 * @property User $user
 */
class Ordering extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordering';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_address', 'id_status'], 'required'],
            [['id_user', 'id_busket', 'id_address', 'id_delivery', 'id_status'], 'integer'],
            [['date'], 'safe'],
            [['id_busket'], 'exist', 'skipOnError' => true, 'targetClass' => Basket::class, 'targetAttribute' => ['id_busket' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_address'], 'exist', 'skipOnError' => true, 'targetClass' => UserAddress::class, 'targetAttribute' => ['id_address' => 'id']],
            [['id_delivery'], 'exist', 'skipOnError' => true, 'targetClass' => OrderDelivery::class, 'targetAttribute' => ['id_delivery' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatus::class, 'targetAttribute' => ['id_status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Номер пользователя',
            'id_busket' => 'Номер корзины',
            'id_address' => 'Адресс',
            'id_delivery' => 'Доставка',
            'id_status' => 'Статус',
            'date' => 'Дата',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(UserAddress::class, ['id' => 'id_address']);
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
     * Gets query for [[Delivery]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDelivery()
    {
        return $this->hasOne(OrderDelivery::class, ['id' => 'id_delivery']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(OrderStatus::class, ['id' => 'id_status']);
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
