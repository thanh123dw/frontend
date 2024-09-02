<?php

namespace app\controllers;

use yii\web\HttpException;

class ActivityController extends \yii\web\Controller
{
   
    public function actionIndex()
    {
        $id = 3;
         
            $client = new \yii\httpclient\Client([
                'baseUrl' => 'https://www.strava.com/api/v3',
            ]);

            $request = $client->createRequest()
            ->setMethod('GET')
            ->setUrl("routes/{$id}")
            ->setHeaders([
                'Authorization' => 'Bearer b3546e94506bdb57842baf4f093d0db393443fc2',
            ]);

        $response = $request->send();

            if ($response->isOk  ) {
                $clubData = $response->data;
                $segments = $clubData['segments'];

                  // Create a data provider for the segments
    $segmentsDataProvider = new \yii\data\ArrayDataProvider([
        'allModels' => $segments,
        'pagination' => [
            'pageSize' => 10,
        ],
    ]);
                 $dataProvider = new \yii\data\ArrayDataProvider([
                'allModels' => [$clubData],
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

                return $this->render('index', [
                    'clubData' => $clubData,
                    'dataProvider' => $dataProvider,
                      'segmentsDataProvider' => $segmentsDataProvider,
                ]);
            } else {
                throw new HttpException($response->statusCode, $response->content);
            }
        
        // return $this->render('index');
    }


  

}
