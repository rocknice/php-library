<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property string $id
 * @property string $book
 * @property string $auther
 * @property string $type
 * @property string $price
 * @property string $publish
 * @property string $date
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 10],
            [['book'], 'string', 'max' => 52],
            [['auther', 'type', 'price', 'publish', 'date'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book' => 'Book',
            'auther' => 'Auther',
            'type' => 'Type',
            'price' => 'Price',
            'publish' => 'Publish',
            'date' => 'Date',
        ];
    }
}
