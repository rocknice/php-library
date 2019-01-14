<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Library;
use app\models\LibrarySearch;
use yii\data\Pagination;
// use common\helps\ArrayHelper;
// use app\models\User;
use yii\helpers\Json;


class LibraryController extends Controller
{
    public function actionIndex(){
        
        $searchModel = new LibrarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        // $sign=Yii::$app->request->get('sign');
        return $this->render('index',
        [
            "dataProvider"=>$dataProvider,
            "searchModel"=>$searchModel,
            // "sign"=>$sign,
        ]);
    }
    /*
     * 操作链接使用的单个删除
     */
    // public function actionDelete(){
    //     $id=Yii::$app->request->get('id');
    //     $model = Library::findOne($id);        
    //     $model->delete();
    //     return $this->redirect(['library/index']);
    // }
    /*
     * 操作js使用的单个删除
     */
    public function actionDelete_js($id){
        try{
            $model = Library::findOne($id);        
            $model->delete();
            return Json::encode(['done'=>true]);
        } catch (Exception $e) {
            return Json::encode(['done'=>false,'error'=>$e->getMessage()]);
        }
    }
    // /*
    //  * 多选删除js
    //  */
    // public function actionDelete_all(){
    //     try{
    //         $ids=Yii::$app->request->post('ids');
    //         $ids=explode(',',$ids);
    //         //数组直接查询
    //         $lists = Library::find()->where(['in','id',$ids])->all();     
    //         foreach($lists as $list){
    //             $list->delete();
    //         }
    //         echo Json::encode(['done'=>true]);
    //     } catch (Exception $e) {
    //         echo Json::encode(['done'=>false,'error'=>$e->getMessage()]);
    //     }
    // }
 
}
