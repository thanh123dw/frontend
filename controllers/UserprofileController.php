<?php

namespace app\controllers;


use Yii;
use app\models\UserProfile;
use yii\web\Controller;
use yii\httpclient\Client;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;


/**
 * UserprofileController implements the CRUD actions for Userprofile model.
 */
class UserProfileController extends Controller
{
    /**
     * @inheritDoc
     */
   public function behaviors()
    {
    return [
        'access' => [
            'class' => AccessControl::class,
            'only' => ['*'], // Áp dụng cho tất cả các action
            'rules' => [
                [
                    'allow' => true,
                    // Cho phép truy cập vào các action nếu đã đăng nhập
                    'matchCallback' => function ($rule, $action) {
                        return Yii::$app->session->has('user') && Yii::$app->session->has('token');
                    }
                ],
            ],
            'denyCallback' => function ($rule, $action) {
                // Chuyển hướng đến trang đăng nhập nếu không có quyền truy cập
                return Yii::$app->response->redirect(['site/login']);
            },
        ],
        'verbs' => [
            'class' => VerbFilter::class,
            'actions' => [
                'logout' => ['post'],
            ],
        ],
    ];
}

    /**
     * Lists all Userprofile models.
     *
     * @return string | Response
     */
    public function actionIndex()
    {
        $id = Yii::$app->session->get('user')['id']; 
        // Gửi request lên server để lấy thông tin user profile
        $client = new Client();
        $response =  $client->get('http://localhost/backend/web/user-profile/get', ['id' => $id])->send();

        if($response->isOk && $response->data['success']) {
            $userprofile = $response->data;
            $userProfileModel = new UserProfile();

            // Assign the array to the model attributes
            $userProfileModel->setAttributes($userprofile['data'], false);
  
            return (
                $this->render('index', [
                    'userprofile' => $userProfileModel,
                ])
            );
        }   
        else {
            Yii::$app->session->setFlash('error', 'Không thể lấy thông tin user profile');
              return $this->renderContent('<h1>Error</h1><p>There was an error processing your request. Please try again later.</p>');
        }


    }

    /**
     * Displays a single Userprofile model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Userprofile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UserProfile();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Userprofile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

         // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Yii::$app->session->has('user') || !Yii::$app->session->has('token')) {
            return $this->redirect(['site/login']);
        }
        $id = Yii::$app->session->get('user')['id']; 

        // Tìm thông tin user profile
        $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post())) {
        // $client = new \yii\httpclient\Client();
        // $response = $client->post('http://localhost/backend/web/user-profile/save', [
        //     'id' => $id,
        //     'fullname' => $model->fullname,
        //     'username' => $model->username,
        //     'password' => $model->password,
        //     'idcard' => $model->idcard,
        //     'address' => $model->address,
        //     'phonenumber' => $model->phonenumber,
        //     'bankaccountnumber' => $model->bankaccountnumber,
        //     'taxcode' => $model->taxcode,
        // ])->send();

        // if ($response->isOk) {
        //     Yii::$app->session->setFlash('success', 'Profile updated successfully.');
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
        //     Yii::$app->session->setFlash('error', 'Failed to update profile.');
        // }

         // Load the data from the form and save it if valid
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Profile updated successfully.');
            return $this->redirect(['view', 'id' => $model->id]);
        }
    

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Userprofile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Userprofile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return UserProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserProfile::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
