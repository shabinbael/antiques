<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Slider;

/**
 * SliderSearch represents the model behind the search form about `backend\models\Slider`.
 */
class SliderSearch extends Slider
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slider_id', 'id_artwork'], 'integer'],
            [['slider_image_path', 'slider_title', 'slider_text'], 'safe'],
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
        $query = Slider::find();

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
            'slider_id' => $this->slider_id,
            'id_artwork' => $this->id_artwork,
        ]);

        $query->andFilterWhere(['like', 'slider_image_path', $this->slider_image_path])
            ->andFilterWhere(['like', 'slider_title', $this->slider_title])
            ->andFilterWhere(['like', 'slider_text', $this->slider_text]);

        return $dataProvider;
    }
}
