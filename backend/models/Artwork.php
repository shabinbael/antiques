<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "artwork".
 *
 * @property string $artwork_id
 * @property integer $id_category
 * @property string $id_author
 * @property integer $artwork_year_created
 * @property string $artwork_title
 * @property string $artwork_description
 * @property string $artwork_price
 * @property string $artwork_image_path
 * @property string $artwork_thumb_path
 * @property integer $artwork_active
 *
 * @property Author $idAuthor
 * @property Category $idCategory
 */
class Artwork extends \yii\db\ActiveRecord
{
    public $image;
    public $thumb;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artwork';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'id_author', 'artwork_title', 'image', 'thumb'], 'required'],
            [['id_category', 'id_author', 'artwork_year_created', 'artwork_price', 'artwork_active'], 'integer'],
            [['artwork_description'], 'string'],
            [['image', 'thumb'], 'file'],
            [['artwork_title', 'artwork_image_path', 'artwork_thumb_path'], 'string', 'max' => 255],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['id_author' => 'author_id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'artwork_id' => 'ID',
            'id_category' => Yii::t('app', 'Category ID'),
            'id_author' => Yii::t('app', 'Author'),
            'artwork_year_created' => Yii::t('app', 'Year Created'),
            'artwork_title' => Yii::t('app', 'Artwork Title'),
            'artwork_description' => Yii::t('app', 'Description'),
            'artwork_price' => Yii::t('app', 'Price'),
            'image' => Yii::t('app', 'Photo'),
            'thumb' => Yii::t('app', 'Preview'),
            'artwork_image_path' => Yii::t('app', 'Image path'),
            'artwork_thumb_path' => Yii::t('app', 'Thumbnail path'),
            'artwork_active' => Yii::t('app', 'Active'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliders()
    {
        return $this->hasMany(Slider::className(), ['id_artwork' => 'artwork_id']);
    }

    /**
     * @inheritdoc
     * @return ArtworkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArtworkQuery(get_called_class());
    }
}
