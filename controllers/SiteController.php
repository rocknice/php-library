<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Library;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLibrary()
    {
        $query = Library::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $books = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('library', [
            'books' => $books,
            'pagination' => $pagination,
        ]);
        // $getBooks = new Library();
        // $dataProvider = $getBooks->getData(Yii::$app->request->get());
        // // $sign=Yii::$app->request->get('sign');
        // return $this->render('library',
        // [
        //     "dataProvider"=>$dataProvider,
        //     // "searchModel"=>$searchModel,
        //     // "sign"=>$sign,
        // ]);
        // return $this->render('library');
    }
    public function actionSearch()
    {
        // if($model) {
        //     $book=$_POST['book'];
        //     $auther=$_POST['auther'];
        // }
        // $model->load(Yii::$app->request->post());
        if($model) {
            $id=Yii::$app->request->post('id');
            $model = Library::findOne($id);        
            $model->delete();
            
        }
        // return $this->render('search');
        return $this->redirect(['site/index']);
    }
    /**
    * 新建hello页面
    */
    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }
    /**
    * 新建表单页面
    */
    public function actionEntry()
    {
        $model = new EntryForm;
        // 该操作首先创建了一个 EntryForm 对象。然后尝试从 $_POST 搜集用户提交的数据， 由 Yii 的 yii\web\Request::post() 方法负责搜集。 如果模型被成功填充数据（也就是说用户已经提交了 HTML 表单）， 操作将调用 validate() 去确保用户提交的是有效数据。
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 验证 $model 收到的数据
            // 做些有意义的事 ...
            // 表达式 Yii::$app 代表应用实例，它是一个全局可访问的单例。 同时它也是一个服务定位器， 能提供 request，response，db 等等特定功能的组件。 在上面的代码里就是使用 request 组件来访问应用实例收到的 $_POST 数据。
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('entry', ['model' => $model]);
        }
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
