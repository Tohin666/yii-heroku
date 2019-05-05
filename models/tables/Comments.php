<?php

namespace app\models\tables;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $task_id
 * @property string $comment
 * @property string $photo
 * @property string $created_at
 * @property string $updated_at
 * @property int $user_id
 *
 * @property Users $user
 * @property Tasks $task
 */
class Comments extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'comment'], 'required'],
            [['task_id', 'user_id'], 'integer'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['photo'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
//            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'comment' => 'Comment',
            'photo' => 'Photo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'task_id']);
    }
}
