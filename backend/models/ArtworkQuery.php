<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Artwork]].
 *
 * @see Artwork
 */
class ArtworkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Artwork[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Artwork|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
