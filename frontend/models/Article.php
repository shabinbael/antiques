<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property string $article_id
 * @property string $id_author
 * @property string $article_title
 * @property string $article_text
 * @property string $article_image_path
 * @property string $article_date_added
 * @property integer $article_active
 *
 * @property Author $idAuthor
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_author', 'article_title', 'article_text'], 'required'],
            [['id_author', 'article_active'], 'integer'],
            [['article_text'], 'string'],
            [['article_date_added'], 'safe'],
            [['article_title', 'article_image_path'], 'string', 'max' => 255],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['id_author' => 'author_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'ID',
            'id_author' => Yii::t('app', 'Author'),
            'article_title' => Yii::t('app', 'Title'),
            'article_text' => Yii::t('app', 'Text'),
            'article_image_path' => Yii::t('app', 'Illustration'),
            'article_date_added' => Yii::t('app', 'Date added'),
            'article_active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAuthor()
    {
        return $this->hasOne(Author::className(), ['author_id' => 'id_author']);
    }

    /**
     * @inheritdoc
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }
}
