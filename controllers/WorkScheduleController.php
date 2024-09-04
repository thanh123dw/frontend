<?php

namespace app\controllers;

use app\models\WorkSchedule;
use Yii;
use yii\data\ArrayDataProvider;
use yii\httpclient\Client;
use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * WorkScheduleController implements the CRUD actions for WorkSchedule model.
 */
class WorkScheduleController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                // Apply to all actions by omitting 'only' or list specific actions
                'rules' => [
                    [
                        // Apply to all actions by omitting 'actions'
                        'allow' => false, // Deny access by default
                        // Deny access to all pages if user and token are not in session
                        'matchCallback' => function ($rule, $action) {
                            return !Yii::$app->session->has('user') || !Yii::$app->session->has('token');
                        }
                    ],
                    [
                        'allow' => true, // Allow access if user and token are in session
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        // Lấy dữ liệu staffids từ session
        $user = Yii::$app->session->get('user');
        $id = $user['id'] ?? null; 
        if (!$id) {
            return $this->redirect('site/error');
        }

        // Khởi tạo HTTP client
        $client = new Client();

        // Gửi yêu cầu GET đến API
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('http://localhost/backend/web/work-schedule/?ids=' . urlencode($id)) // Sử dụng urlencode để mã hóa tham số
            ->send();

        // Kiểm tra nếu yêu cầu thành công
        if ($response->isOk && $response->data['success']) {
            $model = $response->data['data'];

            // Đưa dữ liệu vào DataProvider
            $dataProvider = new ArrayDataProvider([
                'allModels' => $model, // Chắc chắn $model là một mảng hoặc có thể là một mảng của các mô hình
                'pagination' => false,
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new \yii\web\HttpException(404, 'Data not found.');
        }
    }

    public function actionCreate()
    {
        $model = new WorkSchedule();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect([
                    'view',
                    'id' => $model->id
                ]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }
}
