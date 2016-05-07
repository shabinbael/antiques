<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property string $slider_id
 * @property string $id_artwork
 * @property string $slider_image_path
 * @property string $slider_title
 * @property string $slider_text
 *
 * @property Artwork $idArtwork
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_artwork', 'slider_image_path'], 'required'],
            [['id_artwork'], 'integer'],
            [['slider_text'], 'string'],
            [['slider_image_path', 'slider_title'], 'string', 'max' => 255],
            [['id_artwork'], 'exist', 'skipOnError' => true, 'targetClass' => Artwork::className(), 'targetAttribute' => ['id_artwork' => 'artwork_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'slider_id' => Yii::t('app', 'ID'),
            'id_artwork' => Yii::t('app', 'Artwork'),
            'slider_image_path' => Yii::t('app', 'Photo'),
            'slider_title' => Yii::t('app', 'Title'),
            'slider_text' => Yii::t('app', 'Text'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArtwork()
    {
        return $this->hasOne(Artwork::className(), ['artwork_id' => 'id_artwork']);
    }

    /**
     * @inheritdoc
     * @return SliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SliderQuery(get_called_class());
    }
}
