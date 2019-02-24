<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buses".
 *
 * @property int $id id автобуса
 * @property string $num номер маршрута
 * @property string $owner владелец
 * @property string $comment комментарий
 *
 * @property Routes[] $routes
 */
class Buses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num', 'owner', 'comment'], 'required'],
            [['comment'], 'string'],
            [['num'], 'string', 'max' => 50],
            [['owner'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => 'Num',
            'owner' => 'Owner',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoutes()
    {
        return $this->hasMany(Routes::className(), ['bus_id' => 'id']);
    }
}
