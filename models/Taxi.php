<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "taxi".
 *
 * @property int $id id такси
 * @property string $name название такси
 * @property string $phone телефон
 * @property string $price цена
 * @property string $comment комментарий
 */
class Taxi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'taxi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'price', 'comment'], 'required'],
            [['comment'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            [['price'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'price' => 'Price',
            'comment' => 'Comment',
        ];
    }
}
