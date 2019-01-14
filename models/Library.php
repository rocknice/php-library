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
            'id' => 'ID',
            'name' => '名字',
            'phone' => '借书人电话',
            // 'nickname' => '员工名',
            // 'astart' => '上班签到',
            // 'thresholdon' => '上班签到',
            // 'aend' => '下班打卡',
            // 'thresholdoff' => '上班签到',   
            // 'time' => '统计',
            // 'state' => '状态',
        ];
    }
}