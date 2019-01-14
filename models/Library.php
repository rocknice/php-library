<?php
namespace app\models;

//web后端
use Yii;
// use common\helps\ArrayHelper;
// use app\models\User;
// use app\models\Worktime;


class Library extends\yii\db\ActiveRecord
{    
    public static function tableName()
    {
        return 'library';
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ISBN',
            'book' => '书名',
            'auther' => '作者',
            'type' => '分类',
            'price' => '价格',
            'publish' => '出版社',
            'date' => '出版时间',
            // 'aend' => '下班打卡',
            // 'thresholdoff' => '上班签到',   
            // 'time' => '统计',
            // 'state' => '状态',
        ];
    }
}