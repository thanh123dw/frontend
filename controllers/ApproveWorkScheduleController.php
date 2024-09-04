<?php

namespace app\controllers;

use app\models\ApproveWorkSchedule;
use Yii;
use yii\httpclient\Client;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

/**
 * ApproveWorkScheduleController implements the CRUD actions for ApproveWorkSchedule model.
 */
class ApproveWorkScheduleController extends Controller
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
                            return !Yii::$app->session->has('user') || !Yii::$app->session->has('token') || Yii::$app->session->get('user')['user_role'] != 'manager';
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
            ->setUrl('http://localhost/backend/web/approve-work-schedule/') // Sử dụng urlencode để mã hóa tham số
            ->send();

        // Kiểm tra nếu yêu cầu thành công
        if ($response->isOk && $response->data['success']) {
            $modelArray = []; // Tạo mảng để chứa các đối tượng model
            $model = new ApproveWorkSchedule();
            foreach ($response->data['data'] as $dataItem) {
                $temp= ArrayHelper::toArray($dataItem);
                $model = new ApproveWorkSchedule();
                $model->setAttributes($temp);
                $model->id=$temp['id'];
                $modelArray[] = $model; // Chuyển đổi đối tượng model thành mảng và thêm vào mảng $modelArray
            }

            // Đưa dữ liệu vào DataProvider
            $dataProvider = new ArrayDataProvider([
                'allModels' => $modelArray, // Chắc chắn $modelArray là một mảng chứa các mảng dữ liệu của model
                'pagination' => false,
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new \yii\web\HttpException(404, 'Data not found.');
        }
    }

    public function actionRequest($id)
    {
        // Khởi tạo HTTP client
        $client = new Client();
        // Tạo một đối tượng WorkSchedule từ dữ liệu nhận được
        $workSchedule = new ApproveWorkSchedule();

        if ($this->request->isPost && $workSchedule->load(Yii::$app->request->post())) {
            // Chuẩn bị dữ liệu để gửi qua API
            $postData = Yii::$app->request->post();
            // $postData["ApproveWorkSchedule"]["staffid"] = Yii::$app->session->get('user')['id'];
            // Gửi yêu cầu POST đến API để lưu dữ liệu
            $saveResponse = $client->createRequest()
                ->setMethod('POST')
                ->setUrl('http://localhost/backend/web/approve-work-schedule/request')
                ->setData($postData)
                ->send();

            // Kiểm tra nếu lưu thành công
            // Yii::error($saveResponse);

            if ($saveResponse->isOk && $saveResponse->data['success']) {
                // Nếu lưu thành công, chuyển hướng về danh sách hoặc trang khác
                return $this->redirect([
                    '/work-schedule'
                ]);
            } else {
                // Xử lý lỗi nếu lưu thất bại
                Yii::$app->session->setFlash('error', $saveResponse->data);
            }
        }
        // Gửi yêu cầu GET đến API để lấy dữ liệu theo ID
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('http://localhost/backend/web/work-schedule/get?id=' . urlencode($id))
            ->send();

        // Kiểm tra nếu yêu cầu thành công
        if ($response->isOk && $response->data['success']) {
            $data = $response->data['data'];
            $model = $data['model'];


            $workSchedule->setAttributes($model);
            $workSchedule->workscheduleid = $model['id'];
            $workSchedule->id = null;
            $shiftTypes = $data['shifttype'];

            // Render biểu mẫu cập nhật
            return $this->render('update', [
                'model' => $workSchedule,
                'shiftTypes' => $shiftTypes // Truyền danh sách loại ca làm việc cho dropdown
            ]);
        } else {
            throw new \yii\web\HttpException(404, 'Data not found.');
        }
    }

    
    public function actionApprove($id)
    {
        // Khởi tạo HTTP client
        $client = new Client();
        // Tạo một đối tượng WorkSchedule từ dữ liệu nhận được
        $workSchedule = new ApproveWorkSchedule();

        if ($this->request->isPost && $workSchedule->load(Yii::$app->request->post())) {
            // Chuẩn bị dữ liệu để gửi qua API
            $postData = Yii::$app->request->post();
            // $postData["ApproveWorkSchedule"]["staffid"] = Yii::$app->session->get('user')['id'];
            // Gửi yêu cầu POST đến API để lưu dữ liệu
            $saveResponse = $client->createRequest()
                ->setMethod('POST')
                ->setUrl('http://localhost/backend/web/approve-work-schedule/approve')
                ->setData($postData)
                ->send();

            // Kiểm tra nếu lưu thành công
            // Yii::error($saveResponse);

            if ($saveResponse->isOk && $saveResponse->data['success']) {
                // Nếu lưu thành công, chuyển hướng về danh sách hoặc trang khác
                return $this->redirect([
                    '/work-schedule'
                ]);
            } else {
                // Xử lý lỗi nếu lưu thất bại
                Yii::$app->session->setFlash('error', $saveResponse->data);
            }
        }
        // Gửi yêu cầu GET đến API để lấy dữ liệu theo ID
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('http://localhost/backend/web/approve-work-schedule/get?id=' . urlencode($id))
            ->send();

        // Kiểm tra nếu yêu cầu thành công
        if ($response->isOk && $response->data['success']) {
            $data = $response->data['data'];
            $model = $data['model'];
            
            $workSchedule->setAttributes($model);
            $workSchedule->workscheduleid = $model['id'];
            $workSchedule->id = null;
            $shiftTypes = $data['shifttype'];

            // Render biểu mẫu cập nhật
            return $this->render('view', [
                'model' => $workSchedule,
                'shiftTypes' => $shiftTypes // Truyền danh sách loại ca làm việc cho dropdown
            ]);
        } else {
            throw new \yii\web\HttpException(404, 'Data not found.');
        }
    }
}
