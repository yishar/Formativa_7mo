<?php

namespace common\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CoordinadorSocial;

/**
 * CoordinadorSocialSearch represents the model behind the search form about `common\models\CoordinadorSocial`.
 */
class CoordinadorSocialSearch extends CoordinadorSocial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CedulaCoordi', 'Nombre', 'Apellido'], 'safe'],
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
        $query = CoordinadorSocial::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'CedulaCoordi', $this->CedulaCoordi])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Apellido', $this->Apellido]);

        return $dataProvider;
    }
}
