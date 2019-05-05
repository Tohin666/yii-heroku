<?php

namespace app\controllers;

use app\models\tables\Comments;
use app\models\tables\Users;
use app\models\User;
use yii\rest\ActiveController;
use Yii;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\tables\Users';

    public function actionComments()
    {
        if ($userId = Yii::$app->request->get('user-id')) {
            return Comments::find()->where(['user_id' => $userId])->all();
        }

        if ($post = Yii::$app->request->post()) {
            $comment = new Comments();
//            $comment->load($post);
            $comment->task_id = $post['task_id'];
            $comment->comment = $post['comment'];
            $comment->user_id = $post['user_id'];
            return $comment->save();
        }


        return Comments::find()->all();

    }

}