<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Search extends Model
{
    public $book;
    public $auther;

    public function rules()
    {
        return [
            [['book', 'auther'], 'required'],
            // ['auther', 'email'],
        ];
    }
}