<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property string $author_id
 * @property string $author_name
 * @property string $author_bio
 * @property string $author_image_path
 * @property integer $author_active
 *
 * @property Article[] $articles
 * @property Artwork[] $artworks
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_name'], 'required'],
            [['author_bio'], 'string'],
            [['author_active'], 'integer'],
            [['author_name', 'author_image_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'author_id' => 'ID',
            'author_name' => Yii::t('app', 'Name'),
            'author_bio' => Yii::t('app', 'Bio'),
            'author_image_path' => Yii::t('app', 'Portrait'),
            'author_active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['id_author' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtworks()
    {
        return $this->hasMany(Artwork::className(), ['id_author' => 'author_id']);
    }

    /**
     * @inheritdoc
     * @return AuthorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AuthorQuery(get_called_class());
    }
}
