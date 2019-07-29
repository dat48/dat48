<?php

namespace frontend\models;

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
 * @property string $document
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Experiences extends \yii\db\ActiveRecord
{
    public $file;
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
            [['user_id', 'experience', 'name_company', 'start_date', 'end_date', 'description_work', 'document', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['experience', 'name_company', 'start_date', 'end_date', 'description_work', 'document'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['file'],'file','extensions'=>'jpg,png,doc,docx,pdf,jpge','maxSize' => 5120000, 'tooBig' => 'Kích thước lớn nhất là 5 MB'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'experience' => 'Kinh Nghiệm',
            'name_company' => 'Tên công ty',
            'start_date' => 'Ngày bắt đầu',
            'end_date' => 'Ngày kết thúc',
            'description_work' => 'Mổ tả công việc',
            'document' => 'tài liệu',
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
