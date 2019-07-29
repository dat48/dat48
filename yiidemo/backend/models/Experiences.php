<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "experiences".
 *
 * @property int $id
 * @property int $user_id
 * @property string $experience
 * @property string $name_company
 * @property string $start_date
 * @property string $end_date
 * @property string $description_work
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Experiences extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'experiences';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'experience', 'name_company', 'start_date', 'end_date', 'description_work', ], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['experience', 'start_date', 'end_date'], 'safe'],
            [['name_company', 'description_work'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User',
            'experience' => 'Experience',
            'name_company' => 'Name Company',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'description_work' => 'Description Work',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
