<?php

namespace app\models;

use yii\db\ActiveRecord;

class Library extends ActiveRecord
{
    // public $book;
    // public $auther;

    // public function rules()
    // {
    //     return [
    //         [['book', 'auther'], 'required'],
    //         // ['auther', 'email'],
    //     ];
    // }
}   
    // public static function tableName()
    // {
    //     return 'library';
    // }
    // public function attributeLabels()
    // {
    //     return [
    //         'id' => 'ISBN',
    //         'book' => '书名',
    //         'auther' => '作者',
    //         'type' => '分类',
    //         'price' => '价格',
    //         'publish' => '出版社',
    //         'date' => '出版时间',
    //         // 'aend' => '下班打卡',
    //         // 'thresholdoff' => '上班签到',   
    //         // 'time' => '统计',
    //         // 'state' => '状态',
    //     ];
    // }
    // public function getData()
    // {
    //     $query = Library::find();
        
    //     if(!Yii::$app->request->get('sort')){
    //         $query->orderBy('id desc');
    //     }
        
    //     $dataProvider = new ActiveDataProvider([
    //         'query' => $query,
    //         'pagination' => [
    //                 'pageSize' => 3,
    //             ],
    //     ]);
    //     // 从参数的数据中加载过滤条件，并验证
    //     if (!($this->load($params) && $this->validate())) {
    //         return $dataProvider;
    //     };
    //     // $book = '月亮与六便士';
    //     // 增加过滤条件来调整查询对象
    //     $query->andFilterWhere(['=', 'book', $this->$book])
    //           ->andFilterWhere(['=', 'auther', $this->auther]);
    //         //   ->andFilterWhere(['=', 'auther', $this->auther])
    //         //   ->andFilterWhere(['=', 'type', $this->type])
    //         //   ->andFilterWhere(['=', 'price', $this->price])
    //         //   ->andFilterWhere(['=', 'publish', $this->publish])
    //         //   ->andFilterWhere(['=', 'date', $this->date]);

    //     return $dataProvider;
    // }