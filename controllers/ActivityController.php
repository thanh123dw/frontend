<?php

namespace app\controllers;

use Yii;
use GuzzleHttp\Client;
use app\models\Activity;

class ActivityController extends \yii\web\Controller
{
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }

     public function actionFetchStravaData($employeeId)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://www.strava.com/api/v3/athlete/activities', [
            'headers' => [
                'Authorization' => 'Bearer bbcb8efdc09384cd3255804c59982c00d88d146c', // Replace with the actual access token
            ],
        ]);

        $activities = json_decode($response->getBody()->getContents(), true);

        foreach ($activities as $activity) {
            $model = new Activity();
            $model->employee_id = $employeeId;
            $model->distance = $activity['distance'];
            $model->time_spent = gmdate("H:i:s", $activity['moving_time']);
            $model->start_time = $activity['start_date'];
            $model->end_time = $activity['start_date'] . ' + ' . $activity['elapsed_time'] . ' seconds';
            $model->save();
        }

        return $this->redirect(['activity/index']);
    }

}
