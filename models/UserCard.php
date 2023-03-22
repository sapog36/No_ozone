<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_card".
 *
 * @property int $id
 * @property int $card_number
 * @property string $date
 * @property int $cvv
 * @property int $id_user
 *
 * @property User $user
 */
class UserCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_number', 'date', 'cvv', 'id_user'], 'required'],
            [['card_number', 'cvv', 'id_user'], 'integer'],
            [['date'], 'safe'],
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
            'card_number' => 'Номер карты',
            'date' => 'Дата',
            'cvv' => 'Cvv код',
            'id_user' => 'Пользователь',
        ];
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
