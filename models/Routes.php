<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "routes".
 *
 * @property int $id id маршрута
 * @property int $bus_id id автобуса
 * @property int $station_id id остановки
 * @property int $season_id id времени года (зима/лето)
 * @property int $day_id id дня (рабочий/выходной)
 * @property string $hours часы
 * @property string $minutes минуты
 *
 * @property Buses $bus
 * @property Stations $station
 * @property Days $day
 * @property Seasons $season
 */
class Routes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'routes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_id', 'station_id', 'season_id', 'day_id', 'hours', 'minutes'], 'required'],
            [['bus_id', 'station_id', 'season_id', 'day_id'], 'integer'],
            [['hours', 'minutes'], 'string', 'max' => 10],
            [['bus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Buses::className(), 'targetAttribute' => ['bus_id' => 'id']],
            [['station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stations::className(), 'targetAttribute' => ['station_id' => 'id']],
            [['day_id'], 'exist', 'skipOnError' => true, 'targetClass' => Days::className(), 'targetAttribute' => ['day_id' => 'id']],
            [['season_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seasons::className(), 'targetAttribute' => ['season_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bus_id' => 'Bus ID',
            'station_id' => 'Station ID',
            'season_id' => 'Season ID',
            'day_id' => 'Day ID',
            'hours' => 'Hours',
            'minutes' => 'Minutes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBus()
    {
        return $this->hasOne(Buses::className(), ['id' => 'bus_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStation()
    {
        return $this->hasOne(Stations::className(), ['id' => 'station_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDay()
    {
        return $this->hasOne(Days::className(), ['id' => 'day_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeason()
    {
        return $this->hasOne(Seasons::className(), ['id' => 'season_id']);
    }
}
