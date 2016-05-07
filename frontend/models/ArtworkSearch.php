<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Artwork;

/**
 * ArtworkSearch represents the model behind the search form about `frontend\models\Artwork`.
 */
class ArtworkSearch extends Artwork
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['artwork_id', 'id_category', 'id_author', 'artwork_year_created', 'artwork_price', 'artwork_active'], 'integer'],
            [['artwork_title', 'artwork_description', 'artwork_image_path', 'artwork_thumb_path'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Artwork::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'artwork_id' => $this->artwork_id,
            'id_category' => $this->id_category,
            'id_author' => $this->id_author,
            'artwork_year_created' => $this->artwork_year_created,
            'artwork_price' => $this->artwork_price,
            'artwork_active' => $this->artwork_active,
        ]);

        $query->andFilterWhere(['like', 'artwork_title', $this->artwork_title])
            ->andFilterWhere(['like', 'artwork_description', $this->artwork_description])
            ->andFilterWhere(['like', 'artwork_image_path', $this->artwork_image_path])
            ->andFilterWhere(['like', 'artwork_thumb_path', $this->artwork_thumb_path]);

        return $dataProvider;
    }
}
